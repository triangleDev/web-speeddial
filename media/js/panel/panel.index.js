(function() {

  $(function() {
    var hidePanel, panelContent, showPanel, sidebar;
    sidebar = $('.panel-content .sidebar');
    panelContent = $('.panel-content .body-content');
    $.fn.actionControll = function(options) {
      var init_actions, self, url;
      if (options == null) options = {};
      url = options.url || $(this).attr('href' || null);
      if (!url) return;
      self = $(this);
      self.pseudoAjaxLoadingProgress();
      init_actions = function(data) {
        self.html(data);
        $('button.cancel-btn', self).on('click', function(e) {
          e.preventDefault();
          return self.empty();
        });
        return $('button[type="submit"]', self).on('click', function(e) {
          var form, formData;
          e.preventDefault();
          form = $('form', self);
          formData = form.serialize();
          return $.ajax({
            url: form.attr('action'),
            type: form.attr('method').toUpperCase() || 'POST',
            data: formData,
            success: function(data) {
              if (!data) {
                self.empty();
                if (options.success) return options.success(data);
              } else {
                return init_actions(data);
              }
            },
            error: function() {
              return form.prepend($('<span></span>').inlineAlert());
            }
          });
        });
      };
      return $.ajax({
        url: url,
        success: function(data) {
          return init_actions(data);
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
    hidePanel = function() {
      sidebar.hide(500);
      return panelContent.css('width', '100%');
    };
    $('a.close', sidebar).on('click', function(e) {
      e.preventDefault();
      return hidePanel();
    });
    $('ul#cat_tree a').on('click', function(e) {
      return e.preventDefault();
    });
    $('a.show_categories').on('click', function(e) {
      e.preventDefault();
      if (!sidebar.is(':visible')) return showPanel();
    });
    $('a.add-category, a.add-site').on('click', function(e) {
      var self;
      e.preventDefault();
      self = $(this);
      return $('div.adding-form').actionControll({
        url: self.attr('href')
      });
    });
    return $('a.account-info, a.account-settings').on('click', function(e) {
      e.preventDefault();
      if (sidebar.is(':visible')) hidePanel();
      panelContent.pseudoAjaxLoadingProgress();
      return panelContent.load($(this).attr('href'));
    });
  });

}).call(this);
