
$ ->
  $('.dropdown-toggle').dropdown()
  sidebar = $('.panel-content .sidebar')
  panelContent = $('.panel-content .body-content')

  $.fn.form_controll = (options = {})->

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
  $('div.adding-form').pseudoAjaxLoadingProgress()
#$('a.add-category').
