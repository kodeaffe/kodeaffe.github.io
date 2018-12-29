/* Javascript for portfolio */

var Portfolio = {
	buildItem: function(data) {
		var date_range = '';
		if (data.start && data.end) {
			date_range = data.start + ' - ' + data.end;
		} else if (data.start) {
			date_range = data.start;
		} else if (data.end) {
			date_range = '- ' + data.end;
		}
		var header = '<h4>' + data.header + ' (' + date_range + ')</h4>';
		var description = '<p>' + data.description + '</p>';
		var technologies = '<p>TECHNOLOGIES: ' + data.technologies.join(', ') + '</p>';
		if (data.link_href) {
			var link = '<p>LINK: <a href="' + data.link_href + '">' + data.link_text + '</a></p>';
		} else {
			var link = '';
		}

		var item = '<div class="item">' + header + description + technologies + link + '</div>';
		return item;
	},


	buildTechnologies: function(data) {
		// filter duplicates by using an object
		var technologiesObj = {};
		$.each(data, function(idx, techs) {
			$.each(techs, function(idx, tech) {
				var tech_lc = tech.toLowerCase();
				if (tech_lc in technologiesObj) {
					technologiesObj[tech_lc]['count']++;
				} else {
					technologiesObj[tech_lc] = {
						'name': tech,
						'count': 1
					};
				}
			});
		});

		var technologies = [];
		$.each(technologiesObj, function(idx, data) {
			technologies.push(data);
		});
		technologies.sort(function(a, b){return a.count - b.count}).reverse();

		// wrap them in HTML
		var result = [];
		$.each(technologies, function(idx, key) {
			var tech = technologies[idx];
			result.push('<li>' + tech['name'] + ' (' + tech['count'] + ')</li>');
		});
		return result.join('\n');
	},


	build: function(data) {
		var years = [];
		var technologies = [];
		$.each(data, function(idx, data_year) {
			var year = [];
			year.push('<button type="button" class="btn btn-default toggle-year" aria-label="'+ data_year.year + '" id="toggle-year-' + data_year.year + '">' + data_year.year + ' <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>');
			year.push('<div class="year" id="year-' + data_year.year + '">');
			$.each(data_year.items, function(idx, data_item) {
				year.push(Portfolio.buildItem(data_item));
				technologies.push(data_item.technologies);
			});
			year.push('</div>');
			years.push(year.join('\n'));
		});
		$('#years').append(years);
		$('#technologies ul').append(Portfolio.buildTechnologies(technologies));
		$('.year').hide();
	},

	
	toggleYear: function(toggle) {
			var year = $(toggle).next();
			var icon = $(toggle).find('.glyphicon');
			if ($(year).is(':visible')) {
				$(year).hide();
				$(icon).removeClass('glyphicon-triangle-bottom').addClass('glyphicon-triangle-right');
			} else {
				$(year).show();
				$(icon).removeClass('glyphicon-triangle-right').addClass('glyphicon-triangle-bottom');
			}

	},


	showOnly: function(count) {
		$('.year').hide();
		var currentYear = new Date().getFullYear();
		for (var year = currentYear; year > currentYear - count; year--) {
			var toggle = $('#toggle-year-' + year);
			Portfolio.toggleYear(toggle);
		}
	},


	init: function() {
		$.getJSON('static/data/portfolio.json', function( data ) {
			Portfolio.build(data);
			$('.toggle-year').click(function() {
				Portfolio.toggleYear(this);
				return false;
			});
			Portfolio.showOnly(5);
		});
	}
};



$(function() {
	Portfolio.init();
});
