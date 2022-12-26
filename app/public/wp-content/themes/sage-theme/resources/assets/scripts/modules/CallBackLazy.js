export default class CallBackLazy {
  constructor () {
    this.$html = $('html')
  }
  call (elementTmp, element) {
    const datasrc = element.getAttribute('data-src')
    if (elementTmp === 'IMG') {
      element.setAttribute('src', datasrc)
    } else {
      $(element).css({
        'background-image': `url('${datasrc}')`
      })
    }
    $(element).addClass('b-loaded').removeClass('lazy').removeAttr('data-src')
  }
}
