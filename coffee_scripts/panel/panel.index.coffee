
$ ->

  sidebar = $('.panel-content .sidebar')
  panelContent = $('.panel-content .body-content')

  $.fn.actionControll = (options = {})->
    url = options.url || $(this).attr 'href' || null
    return if ! url
    self = $(this)
    self.pseudoAjaxLoadingProgress()

    init_actions = (data)->
      self.html data
      $('button.cancel-btn', self).on 'click', (e)->
        e.preventDefault()
        self.empty()
      $('button[type="submit"]', self).on 'click', (e)->
        e.preventDefault()
        form = $('form', self)
        console.log form
        console.log form.serialize()
        formData = form.serialize()
        $.ajax 
          url: form.attr('action'),
          type: form.attr('method').toUpperCase() || 'POST' ,
          data: formData,
          success: (data)->
            if ! data
              self.empty();
              options.success data if options.success
            else
              init_actions data
          error: ()->
            form.prepend $('<span></span>').inlineAlert()

    $.ajax (
      url: url,
      success: (data)->
        init_actions data
      error: ()->
        self.inlineAlert()

    )

  showPanel = ()->
    sidebar.show 500
    panelContent.css 'width', 'auto'

  hidePanel = ()->
    sidebar.hide 500
    panelContent.css 'width', '100%'

  $('a', sidebar).on 'click', (e)->
    e.preventDefault()
    hidePanel()

  $('a.show_categories').on 'click', (e)->
    e.preventDefault()
    showPanel() if ! sidebar.is ':visible'

  $('a.add-category, a.add-site').on 'click', (e)->
    e.preventDefault()
    self =$(this)
    $('div.adding-form').actionControll {
      url: self.attr('href')
    }

  $('a.account-info, a.account-settings').on 'click', (e)->
    e.preventDefault()
    hidePanel() if sidebar.is ':visible'
    panelContent.pseudoAjaxLoadingProgress();
    panelContent.load $(this).attr('href')