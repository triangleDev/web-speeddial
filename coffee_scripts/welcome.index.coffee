
root = exports ? this
$ ->
  $('body').addClass 'impress-not-supported'
  root.impress = impress()
  root.impress.init()
  setInterval(
    ()->
      impress.next()
    ,
    3500
  )
