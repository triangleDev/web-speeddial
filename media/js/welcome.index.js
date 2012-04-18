(function() {
  var root;

  root = typeof exports !== "undefined" && exports !== null ? exports : this;

  $(function() {
    $('body').addClass('impress-not-supported');
    root.impress = impress();
    root.impress.init();
    return setInterval(function() {
      return impress.next();
    }, 3500);
  });

}).call(this);
