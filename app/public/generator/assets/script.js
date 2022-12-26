(function () {
  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        $(".loader").addClass("d-none");
        $('.load-error').addClass("d-none");
        $('.load-done').addClass("d-none");
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          $(".loader").removeClass("d-none");
          $(".form-button").attr("disabled", true);
          $.ajax({
            async: false,
            url: "/generator/add.php",
            type: 'post',
            data: {
              "title": $('#title').val(),
              "name": $('#key_name').val()
            },
            success: function (response) {
              $(".loader").addClass("d-none");
              $('.form-button').attr("disabled", false);
              var data = $.parseJSON(response);
              if (data.f !== "") {
                $('.load-error p').html(data.f);
                $('.load-error').removeClass("d-none");
              }
              if (data.t !== "") {
                $('.load-done p').html(data.t);
                $('.load-done').removeClass("d-none");
                $('.shortable').append(data.content);
              }
            }
          });
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);

})();

function blockSpecialChar(e) {
  var k;
  document.all ? k = e.keyCode : k = e.which;
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 45 || k == 32 || (k >= 48 && k <= 57));
}

function blockSpecialCharName(e) {
  var k;
  console.log(e.which);
  document.all ? k = e.keyCode : k = e.which;
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 95 || (k >= 48 && k <= 57));
}
$(document).ready(function () {
  $('.shortable').sortable();
  $('.shortable').disableSelection();
  $('.form-button').click(function () {
    setTimeout(() => {
      if ($('.needs-validation').hasClass('.')) {

      }
    }, 300);
  });
  $('#bt-sync').click(function () {

    $.ajax({
      async: false,
      url: "/generator/update-acf.php",
      type: 'post',
      data: {
        "sync": 1
      },
      success: function (response) {
        $('.load-sync').removeClass("d-none");
      }
    });
    $('.load-sync').removeClass("d-none");
  });
  $('#bt-saveorder').click(function () {
    var modules = [];
    $("#all-modules li").each(function (index) {
      modules.push($(this).attr('rel-name'));
    });
    $.ajax({
      async: false,
      url: "/generator/save-order-acf.php",
      type: 'post',
      data: {
        "modules": modules.join('|')
      },
      success: function (response) {
        $('.load-sync').removeClass("d-none");
      }
    });
    $('.load-sync').removeClass("d-none");
  });
  $('.btn-filter').on('click', function () {
    var btn = $('.btn-filter')
    btn.removeClass('active')
    $(this).addClass('active')
    var filter = $(this).attr('data-filter')
    var item = $('.custom-control')
    item.removeClass('cate-active')
    if (filter != '') {
      item.each(function (index, itemCurrent) {
        if ($(itemCurrent).attr('data-category') == filter) {
          $(itemCurrent).addClass('cate-active')
        }
      })
    } else {
      item.addClass('cate-active')
    }
    countSync()
    checkAfterFilter('checkall-dev')
    checkAfterFilter('checkall-sta')
  })
  var countSync = function() {
    setTimeout(function(){
      $('.count-dev span').text($('[data-id=checkall-dev]').find('.custom-control:visible').length)
      $('.count-sta span').text($('[data-id=checkall-sta]').find('.custom-control:visible').length)

    },500)


  }
  var checkAfterFilter = function(id){
    if($('#'+id).is(':checked')){
      $('[data-id='+id+']').find('.custom-control:visible input[type=checkbox]').prop("checked", true);
      $('[data-id='+id+']').find('.custom-control:hidden input[type=checkbox]').prop("checked", false);
    }else{
      $('[data-id='+id+']').find('input[type=checkbox]').prop("checked", false);
    }
    console.log(id, 'input', $('[data-id='+id+']').find('input[type=checkbox]').length, '   checked  ',$('[data-id='+id+']').find('input[type=checkbox]:checked').length )
  }
  var checkAll = function(){
    $('.check-all').change(function() {
      var id = $(this).attr('id')
      if(this.checked) {
        $('[data-id='+id+']').find('.custom-control:visible input[type=checkbox]').prop("checked", true);
      }else{
        $('[data-id='+id+']').find('input[type=checkbox]').prop("checked", false);
      }
    });
    $('.wrap-checkbox').find('input[type=checkbox]').change(function(){
      var pr = $(this).parents('.wrap-control')
      let id = pr.data('id')
      if(!pr.find('.custom-control:visible input[type=checkbox]:checked').length){
    
        $('#'+id).prop("checked", false);
      }else{
        if(pr.find('.custom-control:visible input[type=checkbox]:checked').length == pr.find('.custom-control:visible input[type=checkbox]').length){
          $('#'+id).prop("checked", true);
        }
      }
    })
  }

  var filterDate = function(){
    $('#search-date').click(function () {
      var startDate = $('#start-date').val()
      var endDate = $('#end-date').val()
      if(isValidDate(startDate) && isValidDate(endDate)){
        display(startDate,endDate)
        countSync()
        checkAfterFilter('checkall-dev')
        checkAfterFilter('checkall-sta')
      }else{
        alert('times is failed')
      }
   
    })
    $('#reset-date').click(function () {
      $('#start-date').val('')
      $('#end-date').val('')
      $('.custom-control[data-date]').css('display','')
      countSync()
      checkAfterFilter('checkall-dev')
      checkAfterFilter('checkall-sta')
    })
  }

  function isValidDate(s) {
    var bits = s.split('/');
    var d = new Date(bits[2], bits[1] - 1, bits[0]);
    return d && (d.getMonth() + 1) == bits[1];
  }
  var display = function (startDate, endDate) {
    var d1 = startDate.split("/");
    var d2 = endDate.split("/");
    var from = new Date(d1[2], parseInt(d1[1])-1, d1[0]);
    var to   = new Date(d2[2], parseInt(d2[1])-1, d2[0]);
    if(from > to){
      alert('Start time must be less than end time!')
    }else{
      $('.custom-control[data-date]').each(function(){
        var dateCheck = $(this).data('date');
  
        var c = dateCheck.split("/");
  
        var check = new Date(c[2], parseInt(c[1])-1, c[0]);
        var checked = check > from && check < to
        if(checked){
          $(this).css('display','')
        }else{
          $(this).css('display','none')
        }
      })
    }

  }
  function settingPin(){
    // var a = $('.h1-pin').offset().top + $('.h1-pin').height()
    // var scrollTop = $(window).scrollTop()
    // if(scrollTop >= a){
    //   $('.pin-header').addClass('pinned')
    // }else{
    //   $('.pin-header').removeClass('pinned')
    // }
   

  }

  function exceSyncItem(){
    var syncItem = false
    $('.btn-sync-one').on('click', function(){
      var e = $(this)
      var parent = e.closest('.col-5')
      var info = parent.next('.col-7')
      var urlMedia = parent.find('.media-url').attr('url')
      var from = e.attr('from')
      url = from =='staging' ? developLink  : stagingLink

      if(syncItem === false && urlMedia.length > 0){
        $.ajax({
          url: url+"/generator/inc/import-media.php",
          type: 'post',
          data: {
            "mediaUrl": urlMedia
          },
          beforeSend: function(){
            syncItem = true
            info.find('.loader').removeClass('d-none')
          },
          success: function (response) {
            
            info.find('.loader').addClass('d-none')
            var res = JSON.parse(response)
            info.find('.btn-status').addClass('d-none')
            if(res.status == 'success'){
              info.find('.done').removeClass('d-none')
            }else if(res.status == 'exists'){
               info.find('.warning').removeClass('d-none').text('Media already exists')
            }else{
              info.find('.failed').removeClass('d-none').text('File is not exists')
            }
            setTimeout(function(){
              syncItem = false
            },300)
          }
        });

      }
    })
  }

  function exceSyncAll(){
    var syncDevAll = false
    $('.btn-sync-all').on('click', function(){
      var from = $(this).attr('from')
      var wraper = $('.wrap-develop')
      var itemId = '#item-dev-'
      var url = stagingLink
      if(from == 'staging'){
        wraper = $('.wrap-staging')
        itemId = '#item-stag-'
        url =  developLink
      }
      console.log(wraper)
      
      if(syncDevAll === false){
        syncDevAll = true
        if(wraper.find($('.custom-control-input')).is(":checked")){
         
          let setListId = function(){
              return new Promise((resolve, reject) => {
                var listId = []
                wraper.find( $("input.custom-control-input:checked") ).each(function(){
                  var idItem = $(this).attr('key')
                  listId.push(idItem)
                });
                resolve(listId)
              })
          }

          let syncItems = function(listId){
            return new Promise((resolve, reject)=>{
              var exceSync = function(i){
                if(i >= 0){
                  var indexI = listId[i]
                  var checkBox = $(itemId+indexI)
                  var parent = checkBox.closest('.col-5')
                  var info = parent.next('.col-7')
                  var urlMedia = parent.find('.media-url').attr('url')
                 
                  if(typeof urlMedia != 'undefined'){
                    info.find('.loader').removeClass('d-none')
                    $.ajax({
                      async: false,
                      url: url+"/generator/inc/import-media.php",
                      type: 'post',
                      data: {
                        "mediaUrl": urlMedia
                      }
                    
                    }).done(response => {
                      var res = JSON.parse(response)
                      info.find('.btn-status').addClass('d-none')
                      if(res.status == 'success'){
                        info.find('.done').removeClass('d-none')
                      }else if(res.status == 'exists'){
                         info.find('.warning').removeClass('d-none').text('Media already exists')
                      }else{
                        info.find('.failed').removeClass('d-none').text('File is not exists')
                      }
                      setTimeout(function(){
                        info.find('.loader').addClass('d-none')
                        exceSync(parseInt(i)-1)
                      },500)
                    })
                  }
                }
                if(i==0){
                  resolve()
                }
              }
              exceSync( parseInt(listId.length)-1) 
            })
          }
          setListId()
          .then(listId => syncItems(listId ) ).then(()=> syncDevAll=false)
        }else{
          alert('Please choose at least one media item')
        }
      }
    })
  }



  $(window).on('scroll', function(){
    settingPin()
  })
  settingPin()
  filterDate()
  checkAll()
  countSync()
  exceSyncItem()
  exceSyncAll()
})