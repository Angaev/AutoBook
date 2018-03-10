
$(document).ready ( function() {
  var NO_LIKE_PRESSED = 1;
  var LIKE_PRESSED = 2;
  
  $("#fileChoice").change(function() {
      console.log('Done');
  })

  $("#deleteAvatar").click(function() {
    $.ajax ({
        url:"actions/delete_avatar.php",
        type: "POST",
        dataType : "json",
        data: ({}),
        beforeSend: function() {
          console.log("Отправка");
        },
        success: function(data) {
            $("#avatar").attr("src", data);
            $("#deleteAvatar").text("Удалено");
            $("#deleteAvatar").attr("disabled", true);
            }
        })
    })
  })

