$(document).ready ( function() {
  $('#commentBtn').on('click', function() {
      console.log($.trim($('#textInput').val()));
      if ($.trim($('#textInput').val())){
          $("#commentBtn").addClass("disabled");
          $("#commentBtn").html("Отправка");
      }
  })

  $('.btn-danger').on('click', function() {
      $('.btn-danger').addClass("disabled");
      $('.btn-danger').html("Подождите");
  })

})