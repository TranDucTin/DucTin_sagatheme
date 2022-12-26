export default class Menu {
    constructor() {
        this.$this = $('#main-menu')
        this.elementItem = '.hamburger-menu, html, #main-menu, #header'
        this.$header = $('#header, #main-menu-mobile')
        this.li = this.$this.find('.main-menu-ul >li>a')
        this.liLevel1 = this.$this.find('.main-menu-ul >li')
        this.liLeve2 = this.$this.find('.main-menu-ul .main-menu-dropdown li>a')
        this.isopenmenu = 'is-open-menu'
        this.isopenmenuchild = 'open-menu-child'
        this.isopenchild = 'is-open-child'
    }
    init() {
        if (this.$this.length) {
            this.openMainMenu()
            this.clickArowOpenDropdownMenuLeve1()
            this.clickLiOpenDropdownMenuLeve1()
            this.clickArowOpenDropdownMenuLeve2()
            this.clickOutsite()
            this.clickLiOpenDropdownMenuLeve2()
        }
    }

    /* micro function */
    microOpenCloseLevel1(currentElement, openClass, isLiLv1 = false) {
            const ele = currentElement.currentTarget
            const eleParent = $(ele).parent()
            if ($(window).width() < 1025) {
                if (eleParent.find('ul').length && !eleParent.hasClass(openClass)) {
                    this.liLevel1.removeClass(openClass)
                    eleParent.addClass(openClass)
                    if (isLiLv1) {
                        return false
                    }
                } else {
                    eleParent.removeClass(openClass)
                }
            }
            return true
        }
        /* end micro */

    openMainMenu() {
        this.$header.on('click', '.hamburger-menu', (e) => {
            const ele = e.currentTarget

            if ($(ele).hasClass(this.isopenmenu)) {
                $(this.elementItem).removeClass(this.isopenmenu)
            } else {
                $(this.elementItem).addClass(this.isopenmenu)
            }
        })
    }

    clickArowOpenDropdownMenuLeve1() {
        this.liLevel1.on('click', '.arrows-lv1', (e) => {
            this.microOpenCloseLevel1(e, this.isopenchild)
        })
    }

    clickLiOpenDropdownMenuLeve1() {
        this.li.on('click', (e) => {
            return this.microOpenCloseLevel1(e, this.isopenchild, true)
        })
    }

    clickArowOpenDropdownMenuLeve2() {
        this.$this.find('.main-menu-ul').on('click', '.arrows-lv2', (e) => {
            const ele = e.currentTarget
            const eleParent = $(ele).parent()
            if ($(window).width() < 1025) {
                if (eleParent.find('.menu-child').length && !eleParent.hasClass(this.isopenmenuchild)) {
                    eleParent.addClass(this.isopenmenuchild)
                } else {
                    // eleParent.addClass(this.isopenmenuchild)
                    eleParent.removeClass(this.isopenmenuchild)
                }
            }
        })
    }

    clickOutsite() {
        $(document).on('click', (event) => {
            if (!$(event.target).closest('#header.is-open-menu').length) {
                $(this.elementItem).removeClass(this.isopenmenu)
            }
        })
    }

    clickLiOpenDropdownMenuLeve2() {
        this.liLeve2.on('click', (e) => {
            const ele = e.currentTarget
            const eleParent = $(ele).parent()
            if ($(window).width() < 1025 && eleParent.find('ul').length && !eleParent.hasClass(this.isopenmenuchild)) {
                this.li.removeClass(this.isopenmenuchild)
                eleParent.addClass(this.isopenmenuchild)
                return false
            }
            return true
        })
    }
}

// function Menu(e){
//   let list = document.querySelector('ul');

//   e.menu === 'menu' ? e.menu = 'close' : e.name = "menu"
// }

new Menu().init()