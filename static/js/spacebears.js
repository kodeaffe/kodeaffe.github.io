var Spacebears = {
  IMG: {
    base: 'static/img/spacebears/',
    width: 50,
    height: 75
  },

  SND: {
    num: 4,
    base: 'static/snd/spacebears/',
    applause: 'static/snd/spacebears/applause.wav',
    bung: 'static/snd/spacebears/bung.wav'
  },


  Sprite: function(id) {
    this.num_sounds = 4;
    this.id = id;
    this.img = new Image(Spacebears.IMG.width, Spacebears.IMG.height);
    this.img.src = Spacebears.IMG.base + 'sprite.png';
    this.pos = { x: 0, y: 0 };

    var filename = Spacebears.SND.base + (id % Spacebears.SND.num) + '.wav';
    this.sound = new Audio(filename);
    this.sound.preload = 'auto';
  },


  Game: function() {
    /* sounds */
    this.applause = new Audio(Spacebears.SND.applause);
    this.bung = new Audio(Spacebears.SND.bung);


    /* current (hi)score */
    this.fastest = 0;

    this.miss = 0;
    this.setMiss = function(value) {
      /* set miss value and ui */
      this.miss = value;
      $('#miss').html(value);
    };
    this.addMiss = function(value) {
      /* add value to miss */
      this.setMiss(this.miss + value);
    };

    this.score = 0;
    this.setScore = function(value) {
      /* set score value and ui */
      this.score = value;
      $('#score').html(value);
    };
    this.addScore = function(value) {
      /* add value to score */
      this.setScore(this.score + value);
    };


    /* timer */
    this.timeout_id = undefined;
    this.timeout = 1000;
    this.elapsed = 0;
    this.setElapsed = function(value) {
      /* set elapsed time */
      this.elapsed = value;
      $('#elapsed').html(Math.floor(this.elapsed / 1000));
    };
    this.tick = function() {
      /* tick-tock the clock */
      this.setElapsed(this.elapsed + this.timeout);
      // setTimeout needs a reference to the proper context; lame
      var game = this;
      this.timeout_id = window.setTimeout(
        function() { game.draw(); }, this.timeout);
    };


    /* canvas */
    this.sprites = undefined;
    this.canvas = $('#board');
    this.ctx = this.canvas[0].getContext('2d');
    this.ctx.globalCompositeOperation = 'destination-over';

    this.clearCanvas = function() {
      /* clear the game board */
      this.ctx.clearRect(0, 0, this.canvas.width(), this.canvas.height());
    };

    this.draw = function() {
      /* draw the game board */
      this.clearCanvas();
      for (i = 0; i < this.sprites.length; i++) {
        var sprite = this.sprites[i];
        sprite.pos.x = Spacebears.random(this.canvas.width(), sprite.img.width);
        sprite.pos.y = Spacebears.random(this.canvas.height(), sprite.img.height);
        this.ctx.drawImage(sprite.img, sprite.pos.x, sprite.pos.y);
      }
      this.tick();
    };


    /* game flow */
    this.paused = true;
    this.startpause = function() {
      /* handle when user clicks on start/pause button */
      button = $('#startpause');
      if (this.paused) {
        button.html('Pause');
				button.removeClass('btn-success').addClass('btn-warning');
        this.start();
      } else {
        button.html('Continue');
				button.removeClass('btn-warning').addClass('btn-success');
        this.pause();
      }
    };

    this.start = function() {
      /* start the game */
      this.paused = false;
      this.draw();
			$('html, body').animate({
				scrollTop: $("#board").offset().top - 150
			}, 100);
    };

    this.pause = function() {
      /* pause the game */
      this.paused = true;
      window.clearTimeout(this.timeout_id);
    };

    this.reset = function() {
      /* reset the game state */
      this.pause();
      this.clearCanvas();
      this.setMiss(0);
      this.setScore(0);
      this.setElapsed(0);

      $('#startpause').html('Start');
			button.removeClass('btn-warning').addClass('btn-success');
    };


    /* settings */
    this.winscore = 10;
    this.setWinScore = function() {
      /* set the winning score */
      this.winscore = $('#settings-winscore').val();
    };

    this.setSpeed = function() {
      /* set movement speed of the bears */
      this.timeout = 1000 - (($('#settings-speed').val() - 1) * 100);
    };

    this.setBears = function() {
      /* set number of bears in game */
      var sprites = new Array();
      for (i = 0; i < $('#settings-bears').val(); i++) {
        sprites.push(new Spacebears.Sprite(i));
      }
      this.sprites = sprites;
    };


    /* user interaction */
    this.win = function() {
      /* enact user win situation */
      this.pause();
      this.applause.play();

      var elapsed = Math.floor(this.elapsed / 1000);
      if (this.elapsed < this.fastest || this.fastest == 0) {
        this.fastest = this.elapsed;
        $('#fastest').html(elapsed);
      }

			$('#win-elapsed').html(elapsed);
			$('#win-score').html(this.score);
      $('#win').modal();
      this.reset();
    };

    this.evaluateClick = function(evt) {
      /* evaluate the click: hit or miss */
      var bung = true;
			var board_offset = $('#board').offset();
			var x = evt.pageX - board_offset.left;
			var y = evt.pageY - board_offset.top;

      for (i = 0; i < this.sprites.length; i++) {
        var s = this.sprites[i];
        var in_x = x > s.pos.x && x < s.pos.x + s.img.width;
        var in_y = y > s.pos.y && y < s.pos.y + s.img.height;
        if (in_x && in_y) {
          this.addScore(1);
          s.sound.play();
          bung = false;
          break;
        }
      }

      if (bung) {
        this.addMiss(1);
        this.addScore(-1);
        this.bung.play();
      }
    };

    this.mouseClicked = function(evt) {
      /* handle when the mouse was clicked on the canvas */
      if (this.paused) {
        return;
      }

      this.evaluateClick(evt);

      if (this.score >= this.winscore) {
        this.win();
      }
    };


    this.run = function() {
      /* run the game */
      var game = this;
      $('#settings-winscore').change(function(evt){ game.setWinScore(); });
      game.setWinScore();

      $('#settings-speed').change(function(evt){ game.setSpeed(); });
      game.setSpeed();

      $('#settings-bears').change(function(evt){ game.setBears(); });
      game.setBears();

      $('#board').click(function(evt) { game.mouseClicked(evt); });
      $('#startpause').click(function(evt) { game.startpause(); });
      $('#reset').click(function(evt) { game.reset(); });
    }
  }, /* end Game */


  random: function(max, pos) {
    /* get a random position different from pos, but within max */
    var val = Math.floor(Math.random() * max);
    if (val - pos < 0) {
      // could as well be 0
      return Spacebears.random(max, pos);
    } else if (val + pos > max) {
      // could as well be max
      return Spacebears.random(max, pos);
    } else {
      return val;
    }
  }
};



$(function() {
  new Spacebears.Game().run();
});
