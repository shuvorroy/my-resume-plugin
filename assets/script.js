$ = new jQuery.noConflict()
$(document).ready(function(){
  $('#info-loader').show();
  $( "span[data-info-key='my_details']" ).addClass('tab-active');
  var data ={
    'info_key' : 'my_details',
    'action' :'get-value'
  }
  var temp = wp.template('my_details');
  $.ajax(ajaxurl, {
    data: data,
    method: "POST",
    success: function (data) {
      $('#info-loader').hide();
      $("#show-data").append(temp(data));
      $("#show-data").addClass('show-data-show');
    }
  });

  $(document).on('click', '.mp-info-tab', function(e){
    $('.mp-info-tab').removeClass('tab-active');
    e.preventDefault();
    $("#show-data").removeClass('show-data-show');
    $("#show-data").html("");
    $('#info-loader').show();
    $(this).addClass('tab-active');
    var info_key  = $(this).data('info-key');
    var data ={
      'info_key' : info_key,
      'action' :'get-value'
    }
    var temp = wp.template(info_key);
    $.ajax(ajaxurl, {
      data: data,
      method: "POST",
      success: function (data) {
        $('#info-loader').hide();
        $("#show-data").append(temp(data));
        $("#show-data").addClass('show-data-show');
      }
    });
  })
})
