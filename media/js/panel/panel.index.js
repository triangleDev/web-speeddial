(function() {

  $(function() {
    var panelContent, showPanel, sidebar;
    $('.dropdown-toggle').dropdown();
    sidebar = $('.panel-content .sidebar');
    panelContent = $('.panel-content .body-content');
    $.fn.form_controll = function(options) {
      if (options == null) options = {};
    };
    showPanel = function() {
      sidebar.show(500);
      return panelContent.css('width', 'auto');
    };
    $('a', sidebar).on('click', function(e) {
      e.preventDefault();
      sidebar.hide(500);
      return panelContent.css('width', '100%');
    });
    $('a.show_categories').on('click', function(e) {
      e.preventDefault();
      if (!sidebar.is(':visible')) return showPanel();
    });
    return $('div.adding-form').pseudoAjaxLoadingProgress();
  });

}).call(this);
