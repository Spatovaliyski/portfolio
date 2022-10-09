jQuery(document).ready(function ($) {
  "use strict";

  $('body').addClass("loaded load-reveal");
  setTimeout(() => {
    $('body').removeClass('load-reveal');
  }, 1000);
  /**
   * HEADROOM INIT
   */

  let hrConfig = {
    offset: 20
  };
  let headerHeadroom = document.querySelector(".headroom-snap");
  let headroom = new Headroom(headerHeadroom, hrConfig);
  headroom.init();
  /**
   * Copy to clipboard for the second "Chat" button
   */

  $("#copy-chat-clipboard").click(function (event) {
    event.preventDefault();
    navigator.clipboard.writeText($(this).attr("href"));
    $('.copy-chat-popup').addClass('is-visible');
    setTimeout(() => {
      $('.copy-chat-popup').removeClass('is-visible');
    }, 1200);
  });
  /**
   * Handle the menu switching animation (section scroll to) with timeouts
   */

  $('.menu-item:not(".redirect")').click(function (e) {
    e.preventDefault();

    if ($('body').hasClass('is-animation-ongoing')) {
      return false;
    }

    function clearState() {
      $('.section').removeClass('hide-section, show-section');
    }

    clearState();
    $('body').addClass('is-animation-ongoing');
    $('.section').addClass('hide-section');
    let link = $(this).find('a').attr('href');
    setTimeout(() => {
      $('.section').removeClass('hide-section');
      $('.section').addClass('show-section');
      $('html, body').animate({
        scrollTop: $(link).offset().top - 120
      }, 0);
    }, 1000);
    setTimeout(() => {
      $('body').removeClass('is-animation-ongoing');
      clearState();
    }, 2000);
  }); // Simple check: if we aren't on the homepage, we remove the nav direction buttons

  if (!$('body').hasClass('page-template-template-homepage')) {
    $('.home-tab').remove();
  } // Paste link to this classname based on the Resume button


  function copyResumeLink() {
    let link = $('.menu-item.cv a').attr('href');
    $('.applicaiton-link').attr('href', link);
  }

  copyResumeLink();
});
/*!
 * headroom.js v0.12.0 - Give your page some headroom. Hide your header until you need it
 * Copyright (c) 2020 Nick Williams - http://wicky.nillia.ms/headroom.js
 * License: MIT
 */

!function (t, n) {
  "object" == typeof exports && "undefined" != typeof module ? module.exports = n() : "function" == typeof define && define.amd ? define(n) : (t = t || self).Headroom = n();
}(this, function () {
  "use strict";

  function t() {
    return "undefined" != typeof window;
  }

  function d(t) {
    return function (t) {
      return t && t.document && function (t) {
        return 9 === t.nodeType;
      }(t.document);
    }(t) ? function (t) {
      var n = t.document,
          o = n.body,
          s = n.documentElement;
      return {
        scrollHeight: function () {
          return Math.max(o.scrollHeight, s.scrollHeight, o.offsetHeight, s.offsetHeight, o.clientHeight, s.clientHeight);
        },
        height: function () {
          return t.innerHeight || s.clientHeight || o.clientHeight;
        },
        scrollY: function () {
          return void 0 !== t.pageYOffset ? t.pageYOffset : (s || o.parentNode || o).scrollTop;
        }
      };
    }(t) : function (t) {
      return {
        scrollHeight: function () {
          return Math.max(t.scrollHeight, t.offsetHeight, t.clientHeight);
        },
        height: function () {
          return Math.max(t.offsetHeight, t.clientHeight);
        },
        scrollY: function () {
          return t.scrollTop;
        }
      };
    }(t);
  }

  function n(t, s, e) {
    var n,
        o = function () {
      var n = !1;

      try {
        var t = {
          get passive() {
            n = !0;
          }

        };
        window.addEventListener("test", t, t), window.removeEventListener("test", t, t);
      } catch (t) {
        n = !1;
      }

      return n;
    }(),
        i = !1,
        r = d(t),
        l = r.scrollY(),
        a = {};

    function c() {
      var t = Math.round(r.scrollY()),
          n = r.height(),
          o = r.scrollHeight();
      a.scrollY = t, a.lastScrollY = l, a.direction = l < t ? "down" : "up", a.distance = Math.abs(t - l), a.isOutOfBounds = t < 0 || o < t + n, a.top = t <= s.offset[a.direction], a.bottom = o <= t + n, a.toleranceExceeded = a.distance > s.tolerance[a.direction], e(a), l = t, i = !1;
    }

    function h() {
      i || (i = !0, n = requestAnimationFrame(c));
    }

    var u = !!o && {
      passive: !0,
      capture: !1
    };
    return t.addEventListener("scroll", h, u), c(), {
      destroy: function () {
        cancelAnimationFrame(n), t.removeEventListener("scroll", h, u);
      }
    };
  }

  function o(t) {
    return t === Object(t) ? t : {
      down: t,
      up: t
    };
  }

  function s(t, n) {
    n = n || {}, Object.assign(this, s.options, n), this.classes = Object.assign({}, s.options.classes, n.classes), this.elem = t, this.tolerance = o(this.tolerance), this.offset = o(this.offset), this.initialised = !1, this.frozen = !1;
  }

  return s.prototype = {
    constructor: s,
    init: function () {
      return s.cutsTheMustard && !this.initialised && (this.addClass("initial"), this.initialised = !0, setTimeout(function (t) {
        t.scrollTracker = n(t.scroller, {
          offset: t.offset,
          tolerance: t.tolerance
        }, t.update.bind(t));
      }, 100, this)), this;
    },
    destroy: function () {
      this.initialised = !1, Object.keys(this.classes).forEach(this.removeClass, this), this.scrollTracker.destroy();
    },
    unpin: function () {
      !this.hasClass("pinned") && this.hasClass("unpinned") || (this.addClass("unpinned"), this.removeClass("pinned"), this.onUnpin && this.onUnpin.call(this));
    },
    pin: function () {
      this.hasClass("unpinned") && (this.addClass("pinned"), this.removeClass("unpinned"), this.onPin && this.onPin.call(this));
    },
    freeze: function () {
      this.frozen = !0, this.addClass("frozen");
    },
    unfreeze: function () {
      this.frozen = !1, this.removeClass("frozen");
    },
    top: function () {
      this.hasClass("top") || (this.addClass("top"), this.removeClass("notTop"), this.onTop && this.onTop.call(this));
    },
    notTop: function () {
      this.hasClass("notTop") || (this.addClass("notTop"), this.removeClass("top"), this.onNotTop && this.onNotTop.call(this));
    },
    bottom: function () {
      this.hasClass("bottom") || (this.addClass("bottom"), this.removeClass("notBottom"), this.onBottom && this.onBottom.call(this));
    },
    notBottom: function () {
      this.hasClass("notBottom") || (this.addClass("notBottom"), this.removeClass("bottom"), this.onNotBottom && this.onNotBottom.call(this));
    },
    shouldUnpin: function (t) {
      return "down" === t.direction && !t.top && t.toleranceExceeded;
    },
    shouldPin: function (t) {
      return "up" === t.direction && t.toleranceExceeded || t.top;
    },
    addClass: function (t) {
      this.elem.classList.add.apply(this.elem.classList, this.classes[t].split(" "));
    },
    removeClass: function (t) {
      this.elem.classList.remove.apply(this.elem.classList, this.classes[t].split(" "));
    },
    hasClass: function (t) {
      return this.classes[t].split(" ").every(function (t) {
        return this.classList.contains(t);
      }, this.elem);
    },
    update: function (t) {
      t.isOutOfBounds || !0 !== this.frozen && (t.top ? this.top() : this.notTop(), t.bottom ? this.bottom() : this.notBottom(), this.shouldUnpin(t) ? this.unpin() : this.shouldPin(t) && this.pin());
    }
  }, s.options = {
    tolerance: {
      up: 0,
      down: 0
    },
    offset: 0,
    scroller: t() ? window : null,
    classes: {
      frozen: "headroom--frozen",
      pinned: "headroom--pinned",
      unpinned: "headroom--unpinned",
      top: "headroom--top",
      notTop: "headroom--not-top",
      bottom: "headroom--bottom",
      notBottom: "headroom--not-bottom",
      initial: "headroom"
    }
  }, s.cutsTheMustard = !!(t() && function () {}.bind && "classList" in document.documentElement && Object.assign && Object.keys && requestAnimationFrame), s;
});
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

(function () {
  const siteNavigation = document.getElementById('site-navigation');
  const siteBody = document.body; // Return early if the navigation doesn't exist.

  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByClassName('menu-toggle')[0]; // Return early if the button doesn't exist.

  if ('undefined' === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName('ul')[0]; // Hide menu toggle button if menu is empty and return early.

  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }

  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  } // Toggle the .toggled class and the aria-expanded value each time the button is clicked.


  button.addEventListener('click', function () {
    siteBody.classList.toggle('is-menu-opened');
    siteNavigation.classList.toggle('toggled');

    if (button.getAttribute('aria-expanded') === 'true') {
      button.setAttribute('aria-expanded', 'false');
    } else {
      button.setAttribute('aria-expanded', 'true');
    }
  }); // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.

  document.addEventListener('click', function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove('toggled');
      siteBody.classList.remove('is-menu-opened');
      button.setAttribute('aria-expanded', 'false');
    }
  }); // Get all the link elements within the menu.

  const links = menu.getElementsByTagName('a'); // Get all the link elements with children within the menu.

  const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a'); // Toggle focus each time a menu link is focused or blurred.

  for (const link of links) {
    link.addEventListener('focus', toggleFocus, true);
    link.addEventListener('blur', toggleFocus, true);
  } // Toggle focus each time a menu link with children receive a touch event.


  for (const link of linksWithChildren) {
    link.addEventListener('touchstart', toggleFocus, false);
  }
  /**
   * Sets or removes .focus class on an element.
   */


  function toggleFocus() {
    if (event.type === 'focus' || event.type === 'blur') {
      let self = this; // Move up through the ancestors of the current link until we hit .nav-menu.

      while (!self.classList.contains('nav-menu')) {
        // On li elements toggle the class .focus.
        if ('li' === self.tagName.toLowerCase()) {
          self.classList.toggle('focus');
        }

        self = self.parentNode;
      }
    }

    if (event.type === 'touchstart') {
      const menuItem = this.parentNode;
      event.preventDefault();

      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove('focus');
        }
      }

      menuItem.classList.toggle('focus');
    }
  }
})();