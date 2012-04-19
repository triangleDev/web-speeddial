
root = exports ? this
$ ->
  $('body').addClass 'impress-not-supported'
  root.impress = impress()

  root.auto_slide_control = $('.slide-control button')
  root.auto_slide_control.click ()->
    if $(this).hasClass 'btn-success'
      $(this).removeClass 'btn-success'
      $(this).addClass 'btn-danger'
      return $(this).text 'auto_slide_off'
    $(this).removeClass 'btn-danger'
    $(this).addClass 'btn-success'
    $(this).text 'auto_slide_on'

  root.impress.init()
  setInterval(
    ()->
      return if auto_slide_control.hasClass 'btn-danger'
      impress.next()
    ,
    3500
  )
