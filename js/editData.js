
$(document).ready ( function() {
  
  $("#deleteAvatar").click(function() {
    $.ajax ({
        url:"actions/delete_avatar.php",
        type: "POST",
        dataType : "json",
        data: ({}),
        success: function(data) {
              $("#avatar").attr("src", data);
              $("#deleteAvatar").text("Удалено");
              $("#deleteAvatar").attr("disabled", true);
            }
        })
    })
  })

