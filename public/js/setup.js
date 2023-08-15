$(document).ready(function () {
      $.ajax({
        url: "https://ecato.my.id/api/user/me",
        type: "GET",
        async: true,
        headers: {
            "Authorization": "Bearer " + $.cookie("token")
        },
        success: function(data){
            if(data.instance_code == null && data.role == 3){
              console.log(data);
              $("#userverify").hide();
              $("#wrapper,#wrapper2").show();
              document.title = "Set Up Your Institution";
              $("#card2").on("keypress", function(e) {
                if (e.which == 13) {
                  $("#confirm").click();
                }
              });
              $('#image').on('change', function() {
                var input = this;
                var reader = new FileReader();
                if(input.files[0].size > 1048576){
                  alert("Image size is too big! (Max. 1 MB)");
                  input.value = "";
                  return false;
               };
            
                reader.onload = function() {
                  $("#avatar-placeholder").text('');
                  $("#avatar-placeholder").css("background-color","white");
                  var dataURL = reader.result;
                  $('#avatar-placeholder').html('<img id="avatar-img" src="' + dataURL + '">');
                };
            
                reader.readAsDataURL(input.files[0]);
              });

              $("#confirm").click(function(e){
                e.preventDefault();
                if(!$("#ins-name").val() || (!$.trim($("#ins-name").val()).length)
                || !$("#address").val() || (!$.trim($("#address").val()).length)
                || !$("#email").val() || (!$.trim($("#email").val()).length)
                ){
                  alert("Please fill the required fields!");
                } else {
                  if(!$("#image").val()){
                    alert("Please upload an avatar!");
                  } else {
                    var image = $('#image')[0].files[0];
                    var formData = new FormData();
                    formData.append('image', image);
                    $.ajax({
                      type:'POST',
                      url:'https://ecato.my.id/api/instance/upload/avatar',
                      data:formData,
                      cache:false,
                      contentType: false,
                      processData: false,
                      success:function(imgData){
                        var imgUrl = imgData.url.replace("/storage/img/avatar/","");
                        $.ajax({
                          type: 'POST',
                          url: 'https://ecato.my.id/api/instance/create',
                          async: true,
                          headers: {
                            "Authorization": "Bearer " + $.cookie("token")
                          },
                          data: {
                              name: $("#ins-name").val(),
                              type: $("#ins-type").val(),
                              country: $("#country").val(),
                              address: $("#address").val(),
                              email: $("#email").val(),
                              website: $("#website").val(),
                              avatar: imgUrl
                            },
                          success: function(created){
                            $.ajax({
                              type: 'PUT',
                              url: 'https://ecato.my.id/api/user/me/update',
                              async: true,
                              headers: {
                                "Authorization": "Bearer " + $.cookie("token")
                              },
                              data: {
                                instance_code: created.data.code
                              },
                              success: function(userUpdate){
                                console.log(userUpdate);
                                window.location.href = "https://ecato.my.id/" + created.data.code;
                              },
                              error:function(){
                                console.log("Something's wrong.");
                              }
                            });
                          },
                          error:function(){
                            console.log("Something's wrong.");
                          }
                        }); 
                      },
                      error:function(){
                        console.log("Something's wrong.");
                      }
                    });
                  }
                }
              });



            } else {
              document.title = "Cato - Unauthorized";
              $("body").html('<p id="userverify" style="font-weight:bold;font-size:30px;padding: 20px">401 Unauthorized</p>');
            }
        },
        error: function(){
          document.title = "Cato - Unauthorized";
          $("body").html('<p id="userverify" style="font-weight:bold;font-size:30px;padding: 20px">401 Unauthorized</p>');
        }
      });
    
    
});