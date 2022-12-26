export default class ADA {
  constructor () {
    this.$html = $('html')
  }
  init () {
    this.skipToCotent()
    this.hiddenFocus()
    this.dectectFocus()
    this.removetabindexdots()
    this.setuptabindex()
    this.initADA()
  }
  skipToCotent () {
    $('.skip-link').on('click', () => {
      $('#main-content h1,#main-content a').eq(0).focus()
    })
  }
  hiddenFocus () {
    $(document).on('click mousedown', (e) => {
      $('a,a *,button, button *,input,.checkmark-radio, .custom-tab,div,li, p,*').removeClass('mouse')
      $(e.target).addClass('mouse').parent().addClass('mouse')
      $(e.target).parents('a,.cont-bound ').addClass('mouse')
      $('.status-focus').removeClass('status-focus')
      $('.focus-status').removeClass('focus-status')
    })
  }
  dectectFocus () {
    $('.main-menu-ul > li > a').on('focusin', () => {
      $('.hovering').removeClass('hovering')
    })
    $(window).keydown((event) => {
      const $focus = $('a:focus')
      if (event.keyCode === 40 && $focus.parent().hasClass('has-sub')) {
        event.preventDefault()
        $focus.parent().addClass('hovering')
      }
    })
    $('a,button,input,div').on('focusin', (e) => {
      if (!$(e.target).parents('.slick-initialized').length && !$(e.target).parents('.social').length) {
        $('.focus-status').removeClass('focus-status')
      }
      if (!$(e.target).parents('.dropdown-select-c8').length) {
        $('.dropdown-select-c8').each((i, ele) => {
          $(ele).removeClass('show focus').find('.dropdown-menu').removeClass('show')
        })
      }
    })
  }
  removetabindexdots () {
    setTimeout(() => {
      $('.tns-nav button').attr('tabindex', '0')
    }, 500)
  }
  setuptabindex () {
    const $header = $('.header')
    $header.attr('tabindex', '0').focus().removeAttr('tabindex')
  }
  initADA () {
    $('h1').attr('tabindex', '0')
    $('.popup-is-open').removeAttr('tabindex')
    $('.tiny-prev,.tiny-next').keydown((e) => {
      if (e.keyCode === 13) {
        $(e.target).trigger('click').removeClass('mouse')
      }
    })
  }
}

new ADA().init()
