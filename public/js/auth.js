var role;
var suppage = 1;
var loading = false;

function signIn(){
    document.title = "Cato | Sign in";
    window.history.pushState({}, "", "?type=signin");
    $("#signup").hover(function(){
        $(this).css({"border-color":"#FF7A00", "color":"#FF7A00"});
    }, function(){
        $(this).css({"border-color":"#E9EAEB", "color":"black"});
    })
    $("#signup-div").css({"display":"none"});
    $("#signup1").css({"display":"none"});
    $("#signup2").css({"display":"none"});
    $("#signin-div").css({"display":"block"});
    $("#signin").css({"border-color":"#FF7A00", "color":"#FF7A00"});
    $("#signup").css({"border-color":"#E9EAEB", "color":"black"});
}

function signUp(){
    document.title = "Cato | Sign up";
    window.history.pushState({}, "", "?type=signup");
    
    $("#signin").hover(function(){
        $(this).css({"border-color":"#FF7A00", "color":"#FF7A00"});
    }, function(){
        $(this).css({"border-color":"#E9EAEB", "color":"black"});
    })  
    $("#signin-div").css({"display":"none"});
    $("#signup-div").css({"display":"block"});
    $("#signup").css({"border-color":"#FF7A00", "color":"#FF7A00"});
    $("#signin").css({"border-color":"#E9EAEB", "color":"black"});
    if(suppage == 1){
        $("#signup4").hide();
        $("#signup3").css({"display":"none"});
        $("#signup2").css({"display":"none"});
        $("#signup1").css({"display":"block"});
    } else if(suppage == 2){
        $("#signup4").hide();
        $("#signup3").css({"display":"none"});
        $("#signup1").css({"display":"none"});
        $("#signup2").css({"display":"block"});
    } else if(suppage == 3){
        $("#signup4").hide();
        $("#signup2").css({"display":"none"});
        $("#signup1").css({"display":"none"});
        $("#signup3").css({"display":"block"});
    } else {
        $("#signup3").css({"display":"none"});
        $("#signup2").css({"display":"none"});
        $("#signup1").css({"display":"none"});
        $("#signup4").show();
    }
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        $.ajax({
            url: "https://ecato.my.id/api/user/me",
            type: "GET",
            async: true,
            headers: {
                "Authorization": "Bearer " + $.cookie("token")
            },
            success: function(data){
                if(data.instance_code == null && data.role == 3)
                    window.location.replace("https://ecato.my.id/setup");
                else
                    window.location.replace("https://ecato.my.id/" + data.instance_code);
            }
        });
        $("#signup4").hide();
        $("#code-title").hide();
        $("#code-input").hide();
        $("#error").hide();
        $("#check").hide();
        $("#signin-div").on("keypress", function(e) {
            if (e.which == 13) {
              $("#in-button").click();
            }
          });
        $("#signup2").on("keypress", function(e) {
            if (e.which == 13) {
              $(".next").click();
            }
          });
        $("#signup3").on("keypress", function(e) {
            if (e.which == 13) {
              $(".signup-btn").click();
            }
          });
        var urlParams = new URLSearchParams(window.location.search);
        if(urlParams.get('type') == "signin") signIn(); 
        else if(urlParams.get('type') == "signup") signUp(); 
        else signIn();

        while(loading == true){
            setTimeout(function(){
                $(".loading-msg").text("Logging in .");
            }, 500); 
            setTimeout(function(){
                $(".loading-msg").text("Logging in ..");
            }, 500);
            setTimeout(function(){
                $(".loading-msg").text("Logging in ...");
            }, 500); 
        }
        $("#signup").click(function(){
            $("#loading").hide();
            $(this).unbind('mouseenter mouseleave');
            signUp();
        })
        $("#signin").click(function(){
            $("#loading").hide();
            $(this).unbind('mouseenter mouseleave');
            signIn();
        })
        $("#cto").click(function(){
            window.location = "https://ecato.my.id/";
        })
        $("#newacc").click(function(){
            $("#signup").unbind('mouseenter mouseleave');
            signUp();
        })
        $("#haveacc").click(function(){
            $("#signin").unbind('mouseenter mouseleave');
            signIn();
        })
        $(".role-btn").click(function(){
            $("#signup1").css({"display":"none"});
            $("#signup2").css({"display":"block"});
            suppage++;
            if(this.id == "stu"){
                role = 1;
                $("#job-column").hide();
                $("#code-title").show();
                $("#code-input").show();
                $(".role-title").text("Sign up as a Student");
            }
            else if(this.id == "edu"){
                role = 2;
                $("#job-column").hide();
                $("#code-title").show();
                $("#code-input").show();
                $(".role-title").text("Sign up as an Educator");
            } else{
                role = 3;
                $("#code-title").hide();
                $("#code-input").hide();
                $("#job-column").show();
                $(".role-title").text("Sign up as an Administrator");
            }
        })
        $("#stu").click(function(){
            role = 1;
        })
        $("#edu").click(function(){
            role = 2;
        })
        $("#ins").click(function(){
            role = 3;
        })
        $(".back").click(function(){
            $("#loading").hide();
            suppage--;
            signUp();
        })
        $(".next").click(function(){
            if(!$("#firstname").val() || (!$.trim($("#firstname").val()).length) || !$("#lastname").val() || (!$.trim($("#lastname").val()).length) || !$(".birthday").val()){
                showWarning('Please fill in the required fields', false);
                return false;
            }
            $("#loading").hide();
            $("#signup2").css({"display":"none"});
            $("#signup3").css({"display":"block"});
            suppage++;
        })

        function showLoading(message){
            $("#loading").hide();
            $("#error").hide();
            $("#check").hide();
            $(".lds-ring").show();
            $(".loading-msg").text(message);
            $("#loading").fadeIn();
        }
        function showWarning(message,check){
            $("#loading").hide();
            $(".lds-ring").hide();
            $("#error").hide();
            $("#check").hide();
            if(check == true){
                $("#check").show();
            } else $("#error").show();
            $("#loading").fadeIn();
            $(".loading-msg").text(message);
        }
        $("#in-button").click(function(){
            if(!$("#email").val() || (!$.trim($("#email").val()).length) || !$("#pass").val() || (!$.trim($("#pass").val()).length)){
                showWarning('Please enter your email and password', false);
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'https://ecato.my.id/api/user/login',
                async: true,
                beforeSend: function(){
                    showLoading('Logging in');
                },
                data: {
                    email: $("#email").val(),
                    password: $("#pass").val()
                  },
                success: function(response) {
                    showWarning('Successfully logged in!', true);
                    if(response.user.instance_code == null && response.user.role == 3){
                        setTimeout(function(){window.location.href = "https://ecato.my.id/setup"}, 1000);
                    } else
                    setTimeout(function(){window.location.href = "https://ecato.my.id/" + response.user.instance_code}, 1000);
                },
                statusCode: {
                    401: function(data){
                        showWarning(data.responseJSON.message, false);
                    }
                }
            }); 
        })
        
        $(".signup-btn").click(function(){
            var requestData = {
                email: $(".sup-email").val(),
                password: $("#repeat-pass").val(),
                instance_code: $(".instance-code").val(),
                role: role,
                firstname: $("#firstname").val(),
                lastname: $("#lastname").val(),
                birthdate: $(".birthday").val(),
                gender: $(".gender").val(),
                personalid: $(".cardid").val(),
                occupation: $(".occupation-type").val(),
                title: $(".job").val(),
                country: $(".country").val(),
                phone: $(".phone").val(),
                profile: 'default.jpg'
            }

            if(role == 1 || role == 2){
                if(!$(".instance-code").val() || (!$.trim($(".instance-code").val()).length)
                || !$(".sup-email").val() || (!$.trim($(".sup-email").val()).length)
                || !$("#main-pass").val() || (!$.trim($("#main-pass").val()).length)
                || !$("#repeat-pass").val() || (!$.trim($("#repeat-pass").val()).length)
                || !$("#job-title").val() || (!$.trim($("#job-title").val()).length)
                || $(".occupation-type").val() == 0){
                    showWarning('Please fill in the required fields', false);
                } else {
                    if($("#main-pass").val() != $("#repeat-pass").val()){
                        showWarning('Passwords do not match', false);
                    } else {
                        $.ajax({
                            url:"https://ecato.my.id/api/instance/" + $(".instance-code").val(),
                            type:"GET",
                            async:true,
                            beforeSend: function(){
                                showLoading('Searching institution');
                            },
                            success: function(){
                                $.ajax({
                                    type: 'POST',
                                    url: 'https://ecato.my.id/api/user/register',
                                    dataType: 'json',
                                    async: true,
                                    beforeSend: function(){
                                        showLoading('Signing up');
                                    },
                                    data: requestData,
                                    success: function() {
                                        suppage++;
                                        $("#emailverify").text($(".sup-email").val());
                                        $("#loading").hide();
                                        $("#signup3").hide();
                                        $("#signup4").show();
                                    },
                                    error: function(){
                                        showWarning('The given data was invalid', false);
                                    }
                                }); 
                                
                            },
                            error: function(){
                                showWarning('Internal server error', false);
                            },
                            statusCode: {
                                404: function(data){
                                    showWarning('Institution not found', false);
                                }
                            }
                          });
                    }
                }
            } else if(role == 3){
                requestData.instance_code = null;
                
                if($(".occupation-type").val() == 0
                    || !$("#job-title").val() || (!$.trim($("#job-title").val()).length)
                    || !$(".sup-email").val() || (!$.trim($(".sup-email").val()).length)
                    || !$("#main-pass").val() || (!$.trim($("#main-pass").val()).length)
                    || !$("#repeat-pass").val() || (!$.trim($("#repeat-pass").val()).length)){
                    showWarning('Please fill in the required fields', false);
                } else {
                    if($("#main-pass").val() != $("#repeat-pass").val()){
                        showWarning('Passwords do not match', false);
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: 'https://ecato.my.id/api/user/register',
                            dataType: 'json',
                            async: true,
                            beforeSend: function(){
                                showLoading('Signing up');
                            },
                            data: requestData,
                            success: function() {
                                suppage++;
                                $("#emailverify").text($(".sup-email").val());
                                $("#loading").hide();
                                $("#signup3").hide();
                                $("#signup4").show();
                            },
                            error: function(){
                                showWarning('The given data was invalid', false);
                            }
                        }); 
                    }
                }
            }
        })
    }
}