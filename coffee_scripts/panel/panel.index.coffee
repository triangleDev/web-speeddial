
$ ->
  $('.dropdown-toggle').dropdown()
  sidebar = $('.panel-content .sidebar')
  panelContent = $('.panel-content .body-content')

  $.fn.actionControll = (options = {})->
    url = options.url || $(this).attr 'href' || null
    return if ! url
    self = $(this)
    self.pseudoAjaxLoadingProgress()
    $.ajax (
      url: url,
      success: (data)->
        self.html data
      error: ()->
        self.inlineAlert()

    )

  showPanel = ()->
    sidebar.show 500
    panelContent.css 'width', 'auto'

  $('a', sidebar).on 'click', (e)->
    e.preventDefault()
    sidebar.hide 500
    panelContent.css 'width', '100%'

  $('a.show_categories').on 'click', (e)->
    e.preventDefault()
    showPanel() if ! sidebar.is ':visible'

  $('a.add-category').on 'click', (e)->
    e.preventDefault()
    self =$(this)
    $('div.adding-form').actionControll {
      url: self.attr('href')
    }