
$(document).ready ( function() {
  
  $("#like_button").click(function() {
    $.ajax ({
        url:"actions/like_ajax.php",
        type: "POST",
        dataType : "json", 
        data: ({book_id: $("#book_id").val()}),
        beforeSend: function() {
            $("#likeBtn_text").text("Отправляется...");
            $("#like_button").addClass("disabled");

        },
        success: function(data) {
            $("#like_count").text(data);
            if (Number($("#likeBtn_status").val()) === 1) {
                $("#likeBtn_status").val(2);
                $("#likeBtn_text").text("Больше не нравится");
                
                $("#likeBtn_icon").addClass("glyphicon-thumbs-down");
                $("#likeBtn_icon").removeClass("glyphicon-heart");
                
                $("#like_button").addClass("btn-primary");
                $("#like_button").removeClass("btn-info disabled");
            } else {
                $("#likeBtn_status").val(1);
                $("#likeBtn_text").text("Мне нравится");

                $("#likeBtn_icon").removeClass("glyphicon-thumbs-down");
                $("#likeBtn_icon").addClass("glyphicon-heart");
                
                $("#like_button").removeClass("btn-primary disabled");
                $("#like_button").addClass("btn-info");
            }
        }
    })
  })

})
