$(function() {
	var path = window.location.pathname;
	path = path.substring(path.lastIndexOf('/') + 1);
	var items = $('ul.nav.navbar-nav').children();
	$.each(items, function(idx, item) {
		item = $(item);
		var link = item.find('a');
		if (link.attr('href') == path) {
			item.addClass('active');
		}
	});
});

