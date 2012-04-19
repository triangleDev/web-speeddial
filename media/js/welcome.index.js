(function() {
  var root;
  root = typeof exports !== "undefined" && exports !== null ? exports : this;
  $(function() {
    $('body').addClass('impress-not-supported');
    root.impress = impress();
    root.auto_slide_control = $('.slide-control button');
    root.auto_slide_control.click(function() {
      if ($(this).hasClass('btn-success')) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        return $(this).text('auto_slide_off');
      }
      $(this).removeClass('btn-danger');
      $(this).addClass('btn-success');
      return $(this).text('auto_slide_on');
    });
    root.impress.init();
    return setInterval(function() {
      if (auto_slide_control.hasClass('btn-danger')) {
        return;
      }
      return impress.next();
    }, 3500);
  });
}).call(this);
