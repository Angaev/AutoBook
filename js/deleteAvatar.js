
$(document).ready ( function() {
  
  $("#deleteAvatar").click(function() {
    bootbox.confirm("Удалить безвозвратно?", function(result) {
      if (result) {
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
      }
    });

    })
  })

