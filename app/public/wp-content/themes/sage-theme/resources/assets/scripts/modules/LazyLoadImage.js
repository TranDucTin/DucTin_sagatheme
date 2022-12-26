import CallBackLazy from './CallBackLazy'
const callBack = new CallBackLazy()
export default class LazyLoadImage {
  constructor () {
    this.lazyimage = '.lazy:visible'
  }
  init () {
    this.lazyLoadImage()
    $(window).on('resize orientationchange', () => {
      this.lazyLoadImage()
    })
  }
  lazyLoadImage () {
    if ($(this.lazyimage).length) {
      this.hasSlider()
      this.lazyloadimageCustom()
      $(window).on('scroll', () => {
        this.lazyloadimageCustom()
      })
    }
  }
  hasSlider (element) {
    const sliderLazy = $(element).parents('.slider-lazy')
    const prevActive = sliderLazy.find('.slick-current').prev().find('.lazy')
    const nextActive = sliderLazy.find('.slick-current').next().find('.lazy')
    const srcprev = prevActive.attr('data-src')
    const srcnext = nextActive.attr('data-src')
    if (prevActive.length) {
      if (prevActive[0].nodeName === 'IMG') {
        prevActive.attr('src', srcprev)
      } else {
        prevActive.css({
          'background-image': `url('${srcprev}')`
        })
      }
    }
    if (nextActive.length) {
      if (nextActive[0].nodeName === 'IMG') {
        nextActive.attr('src', srcnext)
      } else {
        nextActive.css({
          'background-image': `url('${srcnext}')`
        })
      }
    }
    prevActive.removeClass('lazy').addClass('b-loaded')
    nextActive.removeClass('lazy').addClass('b-loaded')
  }
  lazyloadimageCustom () {
    $(this.lazyimage).each((index, element) => {
      const elementScroll = $(element).offset().top - window.innerHeight - (window.innerHeight / 3.5)
      const scrollBody = $(window).scrollTop()
      // console.log(element, elementScroll, scrollBody)
      if (elementScroll < scrollBody) {
        // console.log(element, $(element).offset().width)
        const elementTmp = element.tagName
        callBack.call(elementTmp, element)
        if ($(element).parents('.fix-height').length) {
          $(element).on('load', () => {
            setTimeout(() => {
              window.callFixHeight()
            }, 200)
          })
        }
        if ($(element).parents('.slider-lazy').hasClass('slick-initialized')) {
          this.hasSlider(element)
        }
      }
    })
  }
}

new LazyLoadImage().init()
