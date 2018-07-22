////=include application/components/typed-customized.js

/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Base = {
  // All pages
  common: {
    init: function() {
      //=include application/components/hero.js
      //=include application/components/footer-form.js
    }
  },
  archive: {
	  init: function() {
		  //=include plugins/featured-image.js
		}
	},
  // Home page
  home: {
    init: function() {
      //=include application/pages/home.js
    }
  },
  page_product: {
    init: function() {
      //=include application/pages/product.js
    }
  },
  page_about:{
    init: function() {
		jQuery("meta[name=viewport]").attr("content", "width=768");
    }
  },
  page_careers:{
    init: function() {
		jQuery("meta[name=viewport]").attr("content", "width=768");
    }
  },
  post_type_archive_customer: {
    init: function() {
      //=include application/pages/customers.js
    }
  },
  post_type_archive_resource: {
  	init: function(){
  		//=include application/pages/resources.js
  	}
  },
  page_template_template_persona: {
  	init: function(){
  		//=include application/pages/persona.js
  	}
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Base;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
