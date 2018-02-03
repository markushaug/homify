window._ = require('lodash');
window.Chartist = require('chartist');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.$ = window.jQuery = require('jquery');

  // Bootstrap Sass
  require('bootstrap-sass');

  // Bootstrap Notify
  require('bootstrap-notify');

  // Bootstrap Select
  require('bootstrap-select');

  // Bootstrap Select
  require('bootstrap-switch');

  // FlatUI Radiocheck
  require('flatui-radiocheck');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

/*!

 =========================================================
 * Light Bootstrap Dashboard - v1.3.1.0
 =========================================================

 * Product Page: http://www.creative-tim.com/product/light-bootstrap-dashboard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE.md)

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */

var searchVisible = 0;
var transparent = true;

var transparentDemo = true;
var fixedTop = false;

var navbar_initialized = false;

$(document).ready(function() {
  var window_width = $(window).width();

  // check if there is an image set for the sidebar's background
  lbd.checkSidebarImage();

  // Init navigation toggle for small screens
  if (window_width <= 991) {
    lbd.initRightMenu();
  }

  //  Activate the tooltips
  $('[rel="tooltip"]').tooltip();

  //      Activate the switches with icons
  if ($('.switch').length != 0) {
    $('.switch')['bootstrapSwitch']();
  }
  //      Activate regular switches
  if ($("[data-toggle='switch']").length != 0) {
    $("[data-toggle='switch']").wrap('<div class="switch" />').parent().bootstrapSwitch();
  }

  $('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
  }).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
  });

  // Fixes sub-nav not working as expected on IOS
  $('body').on('touchstart.dropdown', '.dropdown-menu', function(e) {
    e.stopPropagation();
  });
});

// activate collapse right menu when the windows is resized
$(window).resize(function() {
  if ($(window).width() <= 991) {
    lbd.initRightMenu();
  }
});

window.lbd = {
  misc: {
    navbar_menu_visible: 0
  },

  checkSidebarImage: function() {
    var $sidebar = $('.sidebar');
    var image_src = $sidebar.data('image');

    if (image_src !== 'undefined') {
      var sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>'
      $sidebar.append(sidebar_container);
    }
  },
  initRightMenu: function() {
    if (!this.navbar_initialized) {
      var $navbar = $('nav').find('.navbar-collapse').first().clone(true);

      var $sidebar = $('.sidebar');
      var sidebar_color = $sidebar.data('color');

      var $logo = $sidebar.find('.logo').first();
      var logo_content = $logo[0].outerHTML;

      var ul_content = '';

      $navbar.attr('data-color', sidebar_color);

      //add the content from the regular header to the right menu
      $navbar.children('ul').each(function() {
        var content_buff = $(this).html();
        ul_content = ul_content + content_buff;
      });

      // add the content from the sidebar to the right menu
      var content_buff = $sidebar.find('.nav').html();
      ul_content = ul_content + content_buff;


      ul_content = '<div class="sidebar-wrapper">' +
        '<ul class="nav navbar-nav">' +
        ul_content +
        '</ul>' +
        '</div>';

      var navbar_content = logo_content + ul_content;

      $navbar.html(navbar_content);

      $('body').append($navbar);

      var background_image = $sidebar.data('image');
      if (background_image != 'undefined') {
        $navbar.css('background', "url('" + background_image + "')")
          .removeAttr('data-nav-image')
          .addClass('has-image');
      }


      var $toggle = $('.navbar-toggle');

      $navbar.find('a').removeClass('btn btn-round btn-default');
      $navbar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
      $navbar.find('button').addClass('btn-simple btn-block');

      var lbd = this;
      $toggle.click(function() {
        if (lbd.misc.navbar_menu_visible == 1) {
          $('html').removeClass('nav-open');
          lbd.misc.navbar_menu_visible = 0;
          $('#bodyClick').remove();
          setTimeout(function() {
            $toggle.removeClass('toggled');
          }, 400);

        } else {
          setTimeout(function() {
            $toggle.addClass('toggled');
          }, 430);

          var div = '<div id="bodyClick"></div>';
          $(div).appendTo("body").click(function() {
            $('html').removeClass('nav-open');
            lbd.misc.navbar_menu_visible = 0;
            $('#bodyClick').remove();
            setTimeout(function() {
              $toggle.removeClass('toggled');
            }, 400);
          });

          $('html').addClass('nav-open');
          lbd.misc.navbar_menu_visible = 1;

        }
      });
      this.navbar_initialized = true;
    }
  }
}

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this,
      args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    }, wait);
    if (immediate && !timeout) func.apply(context, args);
  };
};

$(function () {
  $('[data-toggle="checkbox"]').radiocheck({
    checkboxTemplate: '<span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span>'
  });
  $('[data-toggle="checkbox"]').on('change', function (e) {
    e && e.preventDefault() && e.stopPropagation();
    $(this).prop('checked') ? $(this).data('radiocheck').check() : $(this).data('radiocheck').uncheck() ;
    $(this).parent('.checkbox').toggleClass('checked');
  });
});
