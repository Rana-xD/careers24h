(function (e, d) {
  function g(a) {
    a.hasOwnProperty("data-simple-scrollbar") || Object.defineProperty(a, "data-simple-scrollbar", new SimpleScrollbar(a));
  }

  function l(a, b) {
    function c(a) {
      var c = a.pageY - e;
      e = a.pageY;
      h(function () {
        b.el.scrollTop += c / b.scrollRatio;
      });
    }

    function f() {
      a.classList.remove("ss-grabbed");
      d.body.classList.remove("ss-grabbed");
      d.removeEventListener("mousemove", c);
      d.removeEventListener("mouseup", f);
    }

    var e;
    a.addEventListener("mousedown", function (b) {
      e = b.pageY;
      a.classList.add("ss-grabbed");
      d.body.classList.add("ss-grabbed");
      d.addEventListener("mousemove", c);
      d.addEventListener("mouseup", f);
      return !1;
    });
  }

  function f(a) {
    this.target = a;
    this.direction = window.getComputedStyle(this.target).direction;
    this.bar = '<div class="ss-scroll">';
    this.wrapper = d.createElement("div");
    this.wrapper.setAttribute("class", "ss-wrapper");
    this.el = d.createElement("div");
    this.el.setAttribute("class", "ss-content");
    "rtl" === this.direction && this.el.classList.add("rtl");

    for (this.wrapper.appendChild(this.el); this.target.firstChild;) {
      this.el.appendChild(this.target.firstChild);
    }

    this.target.appendChild(this.wrapper);
    this.target.insertAdjacentHTML("beforeend", this.bar);
    this.bar = this.target.lastChild;
    l(this.bar, this);
    this.moveBar();
    this.el.addEventListener("scroll", this.moveBar.bind(this));
    this.el.addEventListener("mouseenter", this.moveBar.bind(this));
    this.target.classList.add("ss-container");
    var b = window.getComputedStyle(a);
    "0px" === b.height && "0px" !== b["max-height"] && (a.style.height = b["max-height"]);
  }

  function k() {
    for (var a = d.querySelectorAll("*[ss-container]"), b = 0; b < a.length; b++) {
      g(a[b]);
    }
  }

  var h = e.requestAnimationFrame || e.setImmediate || function (a) {
    return setTimeout(a, 0);
  };

  f.prototype = {
    moveBar: function moveBar(a) {
      var b = this.el.scrollHeight,
          c = this;
      this.scrollRatio = this.el.clientHeight / b;
      var d = "rtl" === c.direction ? c.target.clientWidth - c.bar.clientWidth + 18 : -1 * (c.target.clientWidth - c.bar.clientWidth);
      h(function () {
        1 <= c.scrollRatio ? c.bar.classList.add("ss-hidden") : (c.bar.classList.remove("ss-hidden"), c.bar.style.cssText = "height:" + Math.max(100 * c.scrollRatio, 10) + "%; top:" + c.el.scrollTop / b * 100 + "%;right:" + d + "px;");
      });
    }
  };
  d.addEventListener("DOMContentLoaded", k);
  f.initEl = g;
  f.initAll = k;
  e.SimpleScrollbar = f;
})(window, document);

var el = document.querySelector('.scrollbar');
SimpleScrollbar.initEl(el);
var el = document.querySelector('#scrollbar');
SimpleScrollbar.initEl(el);
