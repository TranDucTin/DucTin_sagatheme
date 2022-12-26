/* eslint-disable */
import config from './cf-edit-content.js'
function loadEdit(){
	var elm = 'h1,h2,h3,h4,h5,h6,ul,p,img'
	var element = $(elm)
	var notEdit = '#header,#footer,header,footer'
	var index = 0
	var UrlCall = ajaxurl
	var resetData = {
		item: []
	}
  var appendHTML = function (e, id) {
    let positon = e.offset()
    if (positon != null) {
      let w = e.width()
      let h = e.height()
      let top = positon.top
      let left = positon.left
      if (window.jQuery != undefined && window.Zepto == undefined) {
        h = e.innerHeight()
        w = e.innerWidth()
      }
      let popupHTML = `<div class="edit-popup " id="` + id + `" style="top:` + top + `px;left:` + left + `px;">
      <div class="edit-popup-innter">
        <div class="edit-popup-container ">
          <p><strong>List Update:</strong></p>
          <div class="row">
            <div class="group-input col-lg-6 edit-title">
              <label for="title-` + id + `">
                <input type="checkbox" name="title-` + id + `" id="title-` + id + `">Title:
    
              </label>
              <input type="number" data-id="title-` + id + `" class="count">
            </div>
            <div class="group-input col-lg-6 edit-des">
              <label for="des-` + id + `">
                <input type="checkbox" name="des-` + id + `" id="des-` + id + `">Description:
    
              </label>
              <input type="number" data-id="des-` + id + `" class="count">
            </div>
          </div>
          <div class="group-input edit-img">
            <label for="image-` + id + `">
              <input type="checkbox" name="image-` + id + `" id="image-` + id + `">Image:
    
            </label>
            <select name="" id="image-type-` + id + `" class="select-type">
              <option value="png">.png</option>
              <option value="jpg">.jpg</option>
              <option value="svg">.svg</option>
            </select>
            <select name="" id="image-size-jpg-` + id + `" class="select-size size-jpg">
              <option value="2000-1000">2000*1000px</option>
              <option value="1000-600">1000*600px</option>
              <option value="200-200">200*200px</option>
            </select>
            <select name="" id="image-size-png-` + id + `" class="select-size size-png choose">
              <option value="300-300">300*300px</option>
              <option value="200-200">200*200px</option>
            </select>
          </div>
          <div class="group-input edit-bg">
            <label for="bg-` + id + `">
              <input type="checkbox" name="bg-` + id + `" id="bg-` + id + `">Background:
            </label>
            <input type="text" data-id="bg-` + id + `" placeholder="Link images" class="edit-bg-link">
          </div>
          <p><strong>List Add More:</strong></p>
          <div class="group-heading-edit">
            <div class="row">
              <div class="group-input col-lg-4">
                <label for="content-` + id + `">
                  <input type="checkbox" name="content-` + id + `" id="content-` + id + `">All content
    
                </label>
              </div>
              <div class="group-input col-lg-4">
                <label for="heading-1-` + id + `">
                  <input type="checkbox" name="heading-1-` + id + `" id="heading-1-` + id + `">H1:
    
                </label>
                <input type="number" data-id="heading-1-` + id + `" class="count">
              </div>
              <div class="group-input col-lg-4">
                <label for="heading-2-` + id + `">
                  <input type="checkbox" name="heading-2-` + id + `" id="heading-2-` + id + `">H2:
    
                </label>
                <input type="number" data-id="heading-2-` + id + `" class="count">
              </div>
            </div>
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="heading-3-` + id + `">
                  <input type="checkbox" name="heading-3-` + id + `" id="heading-3-` + id + `">H3:
    
                </label>
                <input type="number" data-id="heading-3-` + id + `" class="count">
              </div>
              <div class="group-input col-lg-6">
                <label for="heading-4-` + id + `">
                  <input type="checkbox" name="heading-4-` + id + `" id="heading-4-` + id + `">H4:
    
                </label>
                <input type="number" data-id="heading-4-` + id + `" class="count">
              </div>
            </div>
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="heading-5-` + id + `">
                  <input type="checkbox" name="heading-5-` + id + `" id="heading-5-` + id + `">H5:
    
                </label>
                <input type="number" data-id="heading-5-` + id + `" class="count">
              </div>
              <div class="group-input col-lg-6">
                <label for="heading-6-` + id + `">
                  <input type="checkbox" name="heading-6-` + id + `" id="heading-6-` + id + `">H6:
    
                </label>
                <input type="number" data-id="heading-6-` + id + `" class="count">
              </div>
            </div>
          </div>
    
          <div class="group-content-edit">
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="heading-all-` + id + `">
                  <input type="checkbox" name="heading-all-` + id + `" id="heading-all-` + id + `">All Heading:
                </label>
              </div>
              <div class="group-input col-lg-6">
                <label for="add-ul_ol-` + id + `">
                  <input type="checkbox" name="add-ul_ol-` + id + `" id="add-ul_ol-` + id + `">Add Ol, Ul:
    
                </label>
              </div>
            </div>
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="add-table-` + id + `">
                  <input type="checkbox" name="add-table-` + id + `" id="add-table-` + id + `">Add table:
    
                </label>
              </div>
              <div class="group-input col-lg-6">
                <label for="add-image_left-` + id + `">
                  <input type="checkbox" name="add-image_left-` + id + `" id="add-image_left-` + id + `">Add image left:
    
                </label>
              </div>
            </div>
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="add-image_right-` + id + `">
                  <input type="checkbox" name="add-image_right-` + id + `" id="add-image_right-` + id + `">Add image right:
    
                </label>
              </div>
              <div class="group-input col-lg-6">
                <label for="add-image_center-` + id + `">
                  <input type="checkbox" name="add-image_center-` + id + `" id="add-image_center-` + id + `">Add image
                  center:
    
                </label>
              </div>
            </div>
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="add-1_p-` + id + `">
                  <input type="checkbox" name="add-1_p-` + id + `" id="add-1_p-` + id + `">Add 1 p:
    
                </label>
                <input type="number" data-id="add-1_p-` + id + `" class="count">
              </div>
              <div class="group-input col-lg-6">
                <label for="add-2_p-` + id + `">
                  <input type="checkbox" name="add-2_p-` + id + `" id="add-2_p-` + id + `">Add 2 p:
                </label>
                <input type="number" data-id="add-2_p-` + id + `" class="count">
              </div>
            </div>
            <div class="row">
              <div class="group-input col-lg-6">
                <label for="add-1_button-` + id + `">
                  <input type="checkbox" name="add-1_button-` + id + `" id="add-1_button-` + id + `">Add 1 button:
    
                </label>
                <input type="number" data-id="add-1_button-` + id + `" class="count">
              </div>
              <div class="group-input col-lg-6">
                <label for="add-2_button-` + id + `">
                  <input type="checkbox" name="add-2_button-` + id + `" id="add-2_button-` + id + `">Add 2 button:
                </label>
                <input type="number" data-id="add-2_button-` + id + `" class="count">
              </div>
            </div>
            <div class="group-input">
              <label for="add-image-` + id + `">
                <input type="checkbox" name="add-image-` + id + `" id="add-image-` + id + `">Add image:
              </label>
              <select name="" id="image-size-` + id + `" class="select-size choose">
                <option value="2000-1000">2000*1000px</option>
                <option value="1000-600">1000*600px</option>
                <option value="200-200">200*200px</option>
              </select>
    
            </div>
          </div>
        </div>
        <button class="edit-cancel">Cancel</button>
        <button class="edit-reset">Reset</button>
        <button class="edit-done">Save</button>
      </div>
    </div>
    `
      $('body').append('<div class="edit-container" style="top:' + top + 'px;left:' + left + 'px;width: ' + w + 'px;height: ' + h + 'px"><div class="edit-content-btn" data-id="#' + id + '" >+</div></div>')
      $('body').append(popupHTML)
    }

  }

  setTimeout(() => {
    if ($('.has-animation,.animation ').length) {
      $('.has-animation,.animation').removeClass('has-animation animation')
    }
    $('body').append('<div class="list-edit-focus"><ul></ul></div>')
    let ii = 1
    element.each((i, e) => {
      if (!$(e).parent().hasClass('edit-section') && !$(e).parents(notEdit).length && $(e).parents().css('display') != 'none') {
        if ($(e).is('.bg')) {
          $(e).addClass('edit-bg')
        }
        $(e).parent().addClass('edit-section').attr({
          'data-index': 'edit' + index,
          // contenteditable: true
        })
        if($(e).parent().hasClass('edit-focus')){
          $('.list-edit-focus ul').append('<li><a href="javascript:void(0)" class="scroll-err-edit" data-id="edit'+index+'">'+ii+'</a></li>')
          ii++
        }
        resetData.item.push({
          content: $(e).parent().html(),
          id: 'edit' + index,
        })
        appendHTML($(e).parent(), 'edit' + index)
        index++
      }
    })

    detectAfterLoaded('detect-edit')
    showErrorElm()
    $(".edit-content-btn").on({
      mouseenter: function () {
        let id = $(this).data('id').replace('#', '')

        let item =  $('.edit-section[data-index="' + id + '"]').children(elm)
        item.css('opacity', .5)

      },
      mouseleave: function () {
        let id = $(this).data('id').replace('#', '')
        let item =  $('.edit-section[data-index="' + id + '"]').children(elm)
        item.css('opacity', '')
      }
    })
    setTimeout(() => {
      detectAfterLoaded('detect-edit2')
      unpdateAfterEdit()
    }, 1000);
    $(window).resize(() => {
      unpdateAfterEdit()
    })
  }, 1500)
  var detectAfterLoaded = (classIndex) => {
    let data = {
      item: []
    }
    $('.edit-content-btn').each((i, e) => {
      let positon = $(e).offset()
      if (data.item.length < 1) {
        data.item.push({
          left: positon.left,
          top: positon.top
        })
      } else {
        let a = true
        data.item.forEach((ee, ii) => {
          if (ee.top == positon.top && ee.left == positon.left) {
            a = false
            $(e).addClass(classIndex)
            return false
          }
        })
        if (a) {
          data.item.push({
            left: positon.left,
            top: positon.top
          })
        }
      }
    })

  }
  var detectUpdate = (id) => {
    let titleElm = 'h1,h2,h3,h4,h5,h6'
    let desElm = 'p'
    let imgElm = 'img'
    let bg = '.bg'
    let popup = $(id)
    let content = $('[data-index=' + id.replace('#', '') + ']')
    if (!content.children(titleElm).length) {
      popup.find('.edit-title').addClass('d-none')
    } else {
      popup.find('.edit-title').removeClass('d-none')
    }
    if (!content.children(desElm).length) {
      popup.find('.edit-des').addClass('d-none')
    } else {
      popup.find('.edit-des').removeClass('d-none')
    }
    if (!content.children(imgElm).length) {
      popup.find('.edit-img').addClass('d-none')
    } else {
      popup.find('.edit-img').removeClass('d-none')
    }
    if (!content.children(bg).length) {
      popup.find('.edit-bg').addClass('d-none')
    } else {
      popup.find('.edit-bg').removeClass('d-none')
    }
  }
  var unpdateAfterEdit = () => {
    $('.edit-popup').each((i, e) => {
      let id = $(e).attr('id')
      let item =  $('.edit-section[data-index="' + id + '"]')
      let positon = item.offset()
      if (positon != undefined) {
        let w = item.width()
        let h = item.height()
        let top = positon.top
        let left = positon.left
        if (window.jQuery != undefined && window.Zepto == undefined) {
          h = item.innerHeight()
          w = item.innerWidth()
        }
        if (top < 0) {
          top = 0
        }
        if (left < 0) {
          left = 0
        }
        $(e).css({
          top: top,
          left: left
        })
        $('.edit-content-btn[data-id="#'+id+'"]').parent().css({
          top: top,
          left: left,
          width: w,
          height: h
        })
      }

    })

  }
  var updateTitle = (id, count) => {

    if ($('#title-' + id + '').is(":checked")) {
      let count = $('[data-id="title-' + id + '"]').val()
      let titleElm = 'h1,h2,h3,h4,h5,h6'
      let contentTile = config.updateTitle
      if (count > 0) {
        contentTile = contentTile.substring(0, count);
      }
      $('[data-index=' + id.replace('#', '') + ']').children(titleElm).text(contentTile)
    }

  }
  var updateDes = (id) => {
    if ($('#des-' + id + '').is(":checked")) {
      let count = $('[data-id="des-' + id + '"]').val()
      let desElm = 'p'
      let contentDes = config.updateDescription
      if (count > 0) {

        contentDes = contentDes.substring(0, count);
        console.log(contentDes)
      }
      $('[data-index=' + id.replace('#', '') + ']').children(desElm).text(contentDes)
    }
  }
  var updateAllContent = (id) => {
    if ($('#content-' + id + '').is(":checked")) {
      $('[data-index=' + id.replace('#', '') + ']').children(elm).remove()
      let content = config.allContent
      $('[data-index=' + id.replace('#', '') + ']').append(content)
    } else {
      updateContent(id)
      addContent(id)
    }

  }
  var updateImage = (id) => {
    var defaul = 'https://via.placeholder.com/'
    if ($('#image-' + id + '').is(":checked")) {
      let pr = $('#image-' + id + '').parents('.group-input')
      var type = pr.find('.select-type').val()
      let size
      var w
      var h
      let img
      if (pr.find('.select-size.choose').length) {
        size = pr.find('.select-size.choose').val()
        w = size.split('-')[0]
        h = size.split('-')[1]
        switch (type) {
          case 'png':
            img = defaul + w + 'x' + h + '.png'
            break;
          case 'jpg':
            img = defaul + w + 'x' + h + '.jpg'
        }

      } else {
        img = config.svg
      }
      $('[data-index=' + id.replace('#', '') + ']').children('img').attr('src', img)
    }
  }
  var updateBG = (id) => {
    var bg = config.bg
    if ($('#bg-' + id).is(":checked")) {
      if($('#'+id).find('.edit-bg-link').val() != ''){
        bg = $('#'+id).find('.edit-bg-link').val()
        console.log( $('#'+id).find('.edit-bg-link').val())
      }
      console.log(bg)
      $('[data-index=' + id.replace('#', '') + ']').children('.bg').css('background-image','url('+bg+')')
    }
  }
  var addImage = (id) => {
    var defaul = 'https://via.placeholder.com/'
    if ($('#add-image-' + id + '').is(":checked")) {
      let pr = $('#add-image-' + id + '').parents('.group-input')
      let size = pr.find('.select-size.choose').val()
      var w = size.split('-')[0]
      var h = size.split('-')[1]
      let img = defaul + w + 'x' + h + '.jpg'
      $('[data-index=' + id.replace('#', '') + ']').append('<p><img src="' + img + '" alt="image test"></p>')
    }
  }
  var addHeading = (id) => {
    let h1 = config.addH1
    let h2 = config.addH2
    let h3 = config.addH3
    let h4 = config.addH4
    let h5 = config.addH5
    let h6 = config.addH6
    if ($('#heading-all-' + id + '').is(":checked")) {
      $('[data-index=' + id.replace('#', '') + ']').append(h1, h2, h3, h4, h5, h6)
    } else {
      $('#' + id).find('.group-heading-edit .group-input').each((i, e) => {
        if ($(e).find('input[type="checkbox"]:checked').length) {
          let chooseH = $(e).find('input[type="checkbox"]:checked').attr('id').split('-')[1]
          let h
          switch (parseInt(chooseH)) {
            case 1:
              h = h1;
              break;
            case 2:
              h = h2;
              break;
            case 3:
              h = h3;
              break;
            case 4:
              h = h4;
              break;
            case 5:
              h = h5;
              break;
            case 6:
              h = h6;
          }
          let count = $(e).find('[type="number"]').val()
          if (count > 0) {
            h = $(h).text($(h).text().substring(0, 10))
          }

          $('[data-index=' + id.replace('#', '') + ']').append(h)
        }
      })
    }

  }
  var addContentTag = (id) => {
    let ul = config.addAlOl
    let table = config.addTable
    let image_left = config.imageLeft
    let image_right = config.imageRight
    let image_center = config.imageCenter
    let p1 = config.oneP
    let p2 = config.twoP
    let button1 = config.addButton
    let button2 = config.add2Button
    $('#' + id).find('.group-content-edit .group-input').each((i, e) => {
      if ($(e).find('input[type="checkbox"]:checked').length) {
        let chooseH = $(e).find('input[type="checkbox"]:checked').attr('id').split('-')[1]

        let h
        switch (chooseH) {
          case 'ul_ol':
            h = ul;
            break;
          case 'table':
            h = table;
            break;
          case 'image_left':
            h = image_left;
            break;
          case 'image_right':
            h = image_right;
            break;
          case 'image_center':
            h = image_center;
            break;
          case '1_p':
            h = p1;
            break;
          case '2_p':
            h = p2;
            break;
          case '1_button':
            h = button1;
            break;
          case '2_button':
            h = button2;
        }
        let count = $(e).find('[type="number"]').val()
        if (count > 0) {
          h = $(h).text($(h).text().substring(0, 10))
        }
        $('[data-index=' + id.replace('#', '') + ']').append(h)
      }
    })
  }
  var focusErrorElm = () =>{
    $(document).on('change','.edit-focus input', function(){
      let active = false 
      if($(this).is(':checked')){
        active = true
      }
      let id = $(this).parents('.edit-container').find('.edit-content-btn').data('id').replace('#','')
      callAjax(id,active)
    })
  }
  var showErrorElm = () =>{
    $(document).on('click','.scroll-err-edit', function(){
      let id = $(this).data('id')
      $(window).scrollTop($('.edit-section[data-index="' + id + '"]').offset().top - $('header').height() - 30)
    })
  }
  var callAjax = (id,active) => {

    let item =  $('.edit-section[data-index="' + id + '"]')
    let classEl 
    if(item.attr('class').indexOf(' ') != -1){
      classEl = '.' + item.attr('class').split(' ')[0]
    }else{
      classEl = '.' + item.attr('class')
    }
    let index = $(classEl).index(item)
    let html = item.html()
    let data = {
    	selector: classEl,
      index: index,
      active: active,
    	html: html,
    	'action': 'update_html_by_token',
    	'token_9th' : token_9th,
    	'url' : window.location.href
    }
    $.ajax({
    	url: UrlCall,
    	type: 'post',
    	data: data,
    	success: function (res) {
    		alertify.set('notifier','position', 'bottom-right');
    		alertify.success('Save ngon lành cành đào!');
    		console.log(data)
    	},
    	error: function (xhr, status, error) {
    		console.log(error)
    	}
    })
  }
  var updateContent = (id) => {
    updateTitle(id)
    updateDes(id)
    updateImage(id)
    updateBG(id)
  }
  var addContent = (id) => {
    addHeading(id)
    addContentTag(id)
    addImage(id)
  }
  var control = () => {
    $(document).on('change', '.select-type', function (e) {
      $(this).parent().find('.select-size').removeClass('choose')
      $(this).parent().find('.size-' + $(this).val() + '').addClass('choose')

    })
    $(document).on('click', '.edit-content-btn', function (e) {
      
      $('.edit-popup').removeClass('open-edit')
      let id = $(this).data('id')
      detectUpdate(id)
      $(id).addClass('open-edit')
      $(id).find('input').prop('checked', false).val('')

      let h = $(id).height()
      let w = $(id).width()
      if (window.jQuery != undefined && window.Zepto == undefined) {
        h = $(id).innerHeight()
        w = $(id).innerWidth()
      }
      let top = e.pageY - h
      let left = e.pageX - w

      if (top < 0) {
        top = 0
      }
      if (left < 0) {
        left = 0
      }
      $(id).css({
        top: top,
        left: left
      })
    })

    $(document).on('click', '.edit-cancel', function () {
      $('.edit-popup').removeClass('open-edit')
    })
    $(document).on('change', '.group-input [type="number"], .group-input [type="text"],.group-input select', function (e) {
      $(e.currentTarget).parent().find('[type="checkbox"]').prop('checked', true)
    })
    $(document).on('keyup keydown', function (e) {
      if (e.keyCode == 27) {
        $('.edit-popup').removeClass('open-edit')
      }
    })
    $(document).on('click', '.edit-done', function () {
      let par = $(this).parents('.edit-popup')
      let id = par.attr('id')
      console.log(id)
      updateAllContent(id)
      unpdateAfterEdit()
      callAjax(id,false)
      $('.edit-popup').removeClass('open-edit')
      $('.edit-content-btn[data-id="#'+id+'"]').parent().append( `<label for="edit-focus-` + id + `" class="edit-focus">
      <input type="checkbox" name="edit-focus-` + id + `" id="edit-focus-` + id + `">Focus:
    </label> `)

    })
    $(document).on('click', '.edit-reset', function () {

      let id = $(this).parents('.edit-popup').attr('id')
      resetData.item.map(f => {
        if (f.id == id) {
          $('.edit-section[data-index="' + id + '"]').html(f.content)
        }
      })

      callAjax(id,false)
      unpdateAfterEdit()
      $('.edit-popup').removeClass('open-edit')

    })
  }
  control()
  focusErrorElm()
}

window.loadEdit = loadEdit;

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};


var insertParam =  function insertParam(paramName, paramValue)
{
    var url = window.location.href;
    if (url.indexOf(paramName + "=") >= 0)
    {
        var prefix = url.substring(0, url.indexOf(paramName));
        var suffix = url.substring(url.indexOf(paramName));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + paramName + "=" + paramValue + suffix;
    }
    else
    {
    if (url.indexOf("?") < 0)
        url += "?" + paramName + "=" + paramValue;
    else
        url += "&" + paramName + "=" + paramValue;
    }
    window.location.href = url;
}

var token_9th_url = getUrlParameter('token-9th');
if (typeof(token_9th_url) != "undefined" && token_9th_url!=''){
	token_9th = token_9th_url;
	setTimeout(function(){ window.loadEdit() }, 1000);
}
setTimeout(function(){
	$(document).ready(function() { 
		$('#wp-admin-bar-en-edit-content a').attr('href','javascript:void(0)');
	 	$(document).on('click', '#wp-admin-bar-en-edit-content a,.new-editor-a', function () {
			// window.loadEdit();
			$.ajax({
				url: ajaxurl,
				type: 'post',
				data: {'action': 'generator_token'},
				success: function (res) {
					var obj = JSON.parse(res);
					token_9th = obj.token;
					insertParam('token-9th',token_9th);
				},
				error: function (xhr, status, error) {
					console.log(error)
				}
			})
		})
	});
}, 2000);
