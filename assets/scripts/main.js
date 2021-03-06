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
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        var articlecontent;

        if (!Modernizr.touch){
          $("main").on('mouseenter','article.brick',function () {
            $(this).find('img').attr('src', $(this).data('img'));
            $(this).addClass("hover");
          });

          $("main").on('mouseleave','article.brick',function () {
            $(this).removeClass("hover");
          });
        }

        //post logic
        if($(".posts").length){
          //invert order of elements on mobile single movie page
          if (window.matchMedia("(max-width: 1109px)").matches) {
            console.log('mobile');
            var $synopsis = $('main .posts .entry-content');
            var $slideshow = $('main .posts .caroussel');
            var $links = $('main .posts .links');
            $synopsis.appendTo('main .posts .col2-mobile');
            $links.appendTo('main .posts .col2-mobile');
            $slideshow.appendTo('main .posts .col2-mobile');
            //$slideshow.insertAfter($('main .posts .entry-content'));
          } else {
          }
        }

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {

        function setCookie(cname, cvalue, exdays) {
          var d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          var expires = "expires="+ d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
          var name = cname + "=";
          var decodedCookie = decodeURIComponent(document.cookie);
          var ca = decodedCookie.split(';');
          for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
        }
        // JavaScript to be fired on the home page

        //if visitor hasn't come in 1 day
        if(!(getCookie("visited") === "ok")){

        //we hide the navigation and the scroll
        $('nav.nav-primary').hide();
          $('body').addClass('no-scroll');

        // we show the introduction
          $('#introduction').show();
        }

        // here's what happen on click
        $('#introduction').click(function(e){
          e.preventDefault();
          $('body').removeClass('no-scroll');
          $(this).fadeOut('slow');
          $('nav.nav-primary').fadeIn('slow');
          setCookie("visited", "ok", 1);
        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
