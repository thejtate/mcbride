(function($){
	var patterns = {
		text: /^['"]?(.+?)["']?$/,
		url: /^url\(["']?(.+?)['"]?\)$/
	};

	function clean(content) {
		if(content && content.length) {
			var text = content.match(patterns.text)[1],
				url = text.match(patterns.url);
			return url ? '<img src="' + url[1] + '" />': text;
		}
	}

	function inject(prop, elem, content) {
		if(prop != 'after') prop = 'before';
		if(content = clean(elem.currentStyle[prop])) {
		  suffix = elem.currentStyle['suffix'];
			$(elem)[prop == 'before' ? 'prepend' : 'append'](
				$(document.createElement('span')).addClass(prop + (typeof(suffix) == 'string' ? suffix : '')).html(content)
			);
		}
	}

	$.pseudo = function(elem) {
	  if (typeof(elem.preudo_processed) != 'undefined') {
	    return;
	  }
	  elem.preudo_processed = true;
		inject('before', elem);
		inject('after', elem);
		elem.runtimeStyle.behavior = null;
	};
	
})(jQuery);