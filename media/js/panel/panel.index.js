(function() {

  $(function() {
    var panelContent, showPanel, sidebar;
    $('.dropdown-toggle').dropdown();
    sidebar = $('.panel-content .sidebar');
    panelContent = $('.panel-content .body-content');
    $.fn.actionControll = function(options) {
      var self, url;
      if (options == null) options = {};
      url = options.url || $(this).attr('href' || null);
      if (!url) return;
      self = $(this);
      self.pseudoAjaxLoadingProgress();
      return $.ajax({
        url: url,
        success: function(data) {
          return self.html(data);
        },
        error: function() {
          return self.inlineAlert();
        }
      });
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
    return $('a.add-category').on('click', function(e) {
      var self;
      e.preventDefault();
      self = $(this);
      return $('div.adding-form').actionControll({
        url: self.attr('href')
      });
    });
  });

}).call(this);
