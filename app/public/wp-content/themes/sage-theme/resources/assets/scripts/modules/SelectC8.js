export default class SelectC8 {
  constructor () {
    this.$callSelectC8 = $('.select-c8')
    this.$callSelectC8Option = '.select-c8 option'
    this.formSelectC8 = '.form-select-c8'
    this.dropdownSelectC8 = 'dropdown-select-c8'
    this.dropdownMenu = '.dropdown-menu'
    this.arrow = '<span class="caret-c8 icomoon icon-chevron-down absolute right-7 top-8"></span>'
    this.dropdownOpen = `.dropdown-select-c8.show, ${this.dropdownMenu}.show`
    this.title = ''
  }
  init () {
    if (this.$callSelectC8.length) {
      this.renderSelectToDropdown()
      this.clickToggle()
      this.clickSelect()
      this.focusSelect()
      this.closeSelect()
      this.changeSelectC8()
      this.hoverLiRemoveClass()
      this.clickOutClose()
      this.keyOption()
    }
  }
  renderHtml (element, textTitle) {
    const eleParent = $(element).parent()
    eleParent.find('.dropdown').remove()
    eleParent.after()
      .append(`<div class='dropdown shadow-none rounded-0 border-0 no-bg h-auto p-0 relative  ${this.dropdownSelectC8}'>
          <a class='dropdown-toggle form-control shadow-none no-underline relative' href='javascript:;' role='button' data-toggle='dropdown' aria-haspopup='true'>
          <span class="filter-option d-block text-truncate">${textTitle}</span>${this.arrow}</a>
          <div class='dropdown-menu dropdown-menu-c8 absolute top-full left-0 right-0 hidden border-1 border-t-0  border-black bg-white text-reset w-full rounded-0'>
          <ul class="list-inline m-0 pl-0 list-none"></ul>
          </div>
        </div>`)
    $(element).each((idx, elm) => {
      let tabIndex = 1
      let disabled = ''
      $(element).find('option', elm).each((id, el) => {
        if ($(el).prop('disabled')) {
          disabled = 'disabled'
        }
        eleParent.find('.dropdown ul').append(`<li class="${disabled} m-0 p-0" tabindex="${tabIndex}">
        <a href="javascript:;" class="block width-full px-10 py-5 border-b-1 border-rgbaBlack no-underline ${disabled}">${el.text}</a>
        </li>`)
        tabIndex++
        disabled = ''
      })
    })
  }
  titleUndefined (element) {
    this.title = $(element).data('title')
    if (typeof title === 'undefined') {
      let indexActive = 0
      $(element).children('option').each((indexChild, elementChild) => {
        if (typeof $(elementChild).attr('selected') !== 'undefined') {
          // console.log(elementChild)
          this.title = $(elementChild).text()
          indexActive = $(elementChild).index()
        }
      })
      if (indexActive === 0) {
        this.title = $(element).find('option').first().attr('selected', 'selected').text()
      }
    }
    return this.title
  }
  renderSelectToDropdown () {
    this.$callSelectC8.each((index, element) => {
      if (!$(element).hasClass('select-done')) {
        this.title = $(element).data('title')
        this.titleUndefined(element)
        this.renderHtml(element, this.title)
        const active = $(element).parents(this.formSelectC8).find('.dropdown-select-c8 .filter-option').text()
        $(element).parents(this.formSelectC8).find(`${this.dropdownMenu} li`).each((id, el) => {
          if (active === $(el).find('a').text()) {
            $(el).addClass('selected')
          }
        })
        $(element).addClass('select-done')
        this.title = ''
      }
    })
  }
  clickToggle () {
    $(document).on('click', '.dropdown-toggle', (e) => {
      const $dropdownRemove = $(`${this.dropdownMenu}, .dropdown-select-c8`)
      const ele = e.currentTarget
      const eleParent = $(ele).parent()
      const eleParents = eleParent.find(this.dropdownMenu)
      const show = 'show z-10'
      const hidden = 'hidden'
      if (eleParent.hasClass(show)) {
        // $dropdownRemove.removeClass(show)
        eleParent.removeClass(show)
        eleParents.addClass(hidden)
      } else {
        $dropdownRemove.removeClass(show)
        eleParent.addClass(show)
        eleParents.removeClass(hidden)
      }
      // $dropdownRemove.removeClass(show)
      return false
    })
  }
  multiSelect (ele, index) {
    const dropParent = $(ele).parents(this.formSelectC8)
    const selected = 'selected'
    let string = ''
    if ($(ele).parent().hasClass(selected)) {
      $(ele).parent().removeClass(selected).addClass('not-hover')
      $(ele).parents(this.formSelectC8).find(this.$callSelectC8Option).eq(index).removeAttr(selected)
      // val = $(ele).parents(formSelectC8).find($callSelectC8Option).eq(index).val()
      if ($(ele).parents('ul').find('li.selected:not(.disabled)').length < 1) {
        string = $(ele).parents('ul').find('li.disabled a').text().trim() + ', '
        // string.slice(0, string.length - 2)
      }
    } else {
      $(ele).parent().addClass(selected).removeClass('not-hover')
    }

    $(ele).parents('ul').find('li.selected:not(.disabled)').each((indexLI, el) => {
      // index = indexLI
      const value = $(el).find('a').text().trim()
      string += value + ', '
    })

    if (!$(ele).parents('.' + this.dropdownSelectC8).hasClass('no-trigger-active')) {
      $(ele).parents('.' + this.dropdownSelectC8).find('.dropdown-toggle .filter-option').text(string.slice(0, string.length - 2))
    }
    dropParent.find(this.$callSelectC8Option).prop(selected, false)
    setTimeout(() => {
      $.each(string.split(', '), (i, e) => {
        dropParent.find(`.select-c8 option[value="${e}"]`).attr(selected, selected)
      })
      dropParent.find(this.$callSelectC8).change()
    }, 100)

    // console.log('string: ' + string)

    return false
  }
  singleSelect (ele, index) {
    const text = $(ele).text()
    if (!$(ele).parents('.' + this.dropdownSelectC8).hasClass('no-trigger-active')) {
      $(ele).parents('.' + this.dropdownSelectC8).find('.dropdown-toggle .filter-option').text(text)
    }
    $(ele).parents('ul').find('li').removeClass('selected')
    $(ele).parent().addClass('selected')

    const dropParent = $(ele).parents(this.formSelectC8)
    setTimeout(() => {
      $(ele).parents(this.formSelectC8).find(this.$callSelectC8Option).removeAttr('selected').eq(index).attr('selected', 'selected')
      const val = $(ele).parents(this.formSelectC8).find(this.$callSelectC8Option).eq(index).val()
      dropParent.find(this.$callSelectC8).val(val).change()
      $(ele).parents(`${this.dropdownMenu}, .dropdown-select-c8`).removeClass('show z-10')
      $(ele).parents(this.dropdownMenu).addClass('hidden')
    }, 100)
  }
  clickSelect () {
    $(document).on('click', '.dropdown-select-c8 li a', (e) => {
      const ele = e.currentTarget
      const index = $(ele).parents('li').index()
      $('.' + this.dropdownSelectC8).removeClass('focus')
      $(ele).parents('.form-control').find('.dropdown-toggle').addClass('active')
      $(ele).parents('ul').find('li').removeClass('focus')

      if ($(ele).parents(this.formSelectC8).hasClass('multiselect')) {
        this.multiSelect(ele, index)
      } else {
        this.singleSelect(ele, index)
      }
    })
  }
  hoverLiRemoveClass () {
    $('.' + this.dropdownSelectC8).find('li').on('hover', () => {
      $('.' + this.dropdownSelectC8).find('li').removeClass('not-hover').find('a').blur()
    })
  }
  focusSelectUp (liFocus, index, totalOption, li, focus) {
    if (liFocus.length < 1 || index === 0) {
      li.removeClass(focus).eq(totalOption - 1).addClass(focus)
    } else {
      li.removeClass(focus).eq(index).prev().addClass(focus)
    }
  }
  focusSelectDown (liFocus, index, totalOption, li, focus) {
    if (liFocus.length < 1 || totalOption - 1 === index) {
      li.removeClass(focus).first().addClass(focus)
    } else {
      li.removeClass(focus).eq(index).next().addClass(focus)
    }
  }
  focusSelect () {
    $('.' + this.dropdownSelectC8).keydown((e) => {
      const ele = e.currentTarget
      const li = $(ele).find('li')
      const liFocus = $(ele).find('li.focus')
      const totalOption = li.length
      const index = liFocus.index()
      const focus = 'focus'
      switch (e.keyCode) {
        case 13:
          if (liFocus.length && $(ele).find('li.focus.disabled').length === 0) {
            li.removeClass('selected')
            liFocus.addClass('selected').removeClass(focus).find('a').trigger('click')
          }
          break
        case 38:
          $(ele).addClass(focus)
          this.focusSelectUp(liFocus, index, totalOption, li, focus)
          break
        case 40:
          $(ele).addClass(focus)
          this.focusSelectDown(liFocus, index, totalOption, li, focus)
          break
        case 9:
          li.removeClass(focus)
          break
        default:
          // console.log('nothing')
          break
      }
    })
  }
  closeSelect () {
    $('.' + this.dropdownSelectC8).on('hide.bs.dropdown', () => {
      $('.dropdown-select-c8, .dropdown-select-c8 li').removeClass('focus')
    })
  }
  changeSelectC8 () {
    this.$callSelectC8.change(() => {
      this.$callSelectC8.trigger('changeSelect')
    })
  }
  clickOutClose () {
    $(document).click((event) => {
      if (!$(event.target).closest('.dropdown-select-c8.show, .dropdown-menu.show, .dropdown-select-c8 *').length) {
        $(this.dropdownOpen).removeClass('show z-10')
        $(this.dropdownMenu).addClass('hidden')
      }
    })
  }
  keyOption () {
    $(document).keyup((e) => {
      if (e.keyCode === 27 && $('.dropdown-select-c8.show').length) {
        $(this.dropdownOpen).removeClass('show z-10')
        $(this.dropdownMenu).addClass('hidden')
      }
      window.addEventListener('keydown', (keydownEvent) => {
        // space and arrow keys
        if ([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1 && $('.dropdown-select-c8.show').length) {
          keydownEvent.preventDefault()
        }
      }, false)
    })
  }
}

new SelectC8().init()
