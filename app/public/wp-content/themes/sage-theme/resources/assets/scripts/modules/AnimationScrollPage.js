export default class AnimationScrollPage {
  constructor () {
    this.$elems = $('.animation')
    this.winH = window.innerHeight
    this.winW = window.innerWidth
    this.offset = window.innerHeight
    this.wintop = null
    this.topcoords = null
  }
  init () {
    if ($(window).width() >= 1200) {
      $(window).on('scroll resize', () => {
        this.animationEle()
      })
    }
  }
  animationEle () {
    this.$elems = $('.animation')
    this.winH = window.innerHeight
    this.winW = window.innerWidth
    this.offset = this.winH
    if (this.winW > 1024 && !$('body').hasClass('no-animation')) {
      this.wintop = $(window).scrollTop()
      this.$elems.each((index, ele) => {
        const $elm = $(ele)
        if ($elm.hasClass('set-animation')) {
          return true
        }
        this.topcoords = $elm.offset().top
        if (this.wintop > (this.topcoords - this.offset)) {
          $elm.addClass('set-animation')
        }
        return true
      })
    }
  }
}

new AnimationScrollPage().init()
