var version = "0.4.2";
var schoolName, fullclass = 0;
var schoolType = {};
schoolType['1'] = 'Primary/Elementary School';
schoolType['2'] = 'Middle/Junior High School';
schoolType['3'] = 'Secondary/High School';
schoolType['4'] = 'College/University';
schoolType['5'] = 'Vocational/Trade School';
schoolType['6'] = 'Graduate/Professional School';
var roleType = {};
roleType['1'] = 'Student';
roleType['2'] = 'Educator';
roleType['3'] = 'Administrator';
var profileImgUrl;
var myUserID;
var onRequest = 0;
var classPostChannel;
var fullClassId;

function formatJSONDatetime(jsonDatetime) {
    const date = new Date(jsonDatetime);
    const options = {
      year: '2-digit',
      month: 'short',
      day: '2-digit',
      hour: 'numeric',
      minute: 'numeric',
      hourCycle: 'h23',
    };
    const formattedDatetime = date.toLocaleDateString('en-US', options)
    return formattedDatetime;
  }

$("#class-join-container").on('click', '.class-items-join', function() {
    var classId = $(this).attr("id");
    var num = parseInt(classId.match(/\d+/)[0]);
    $.ajax({
        url: "https://ecato.my.id/api/class/" + num + "/join",
        type: "POST",
        async: true,
        headers: {
            "Authorization": "Bearer " + $.cookie("token")
        },
        success: function(){
            $.ajax({
                url: "https://ecato.my.id/api/class/" + num + "/profile",
                type: "GET",
                async: true,
                headers: {"Authorization": "Bearer " + $.cookie("token")},
                success: function(class_data){
                    $.ajax({
                        url: "https://ecato.my.id/api/user/" +class_data.owner_id,
                        type: "GET",
                        async: true,
                        headers: {"Authorization": "Bearer " + $.cookie("token")},
                        success: function(class_owner){
                            var postHtml = '<div class="classes" id="class' + class_data.id + '" style="background-image: url(' + '/storage/img/class/thumb/' + class_data.avatar + ');">';
                            postHtml += '<div class="class-title">' + class_data.name + '</div>';
                            postHtml += localStorage.getItem('darkMode') === 'true' ? '<div class="class-owner cato-box dark">' : '<div class="class-owner cato-box">';
                            postHtml += '<div class="class-owner-img-container"><img src="/storage/img/profile/' + class_owner.profile + '" class="class-owner-img"></div>';
                            postHtml += '<p class="class-owner-name">'  + class_owner.firstname + ' '+ class_owner.lastname +'</p>';
                            postHtml += '<p class="class-members">' + class_data.members + ' member(s)</p>';
                            postHtml += '</div>';
                            postHtml += '</div>';
                            if (localStorage.getItem('darkMode') === 'true') {
                                $(".classes").addClass('dark');
                            }
                            $("#noclass").hide();
                            $("#class-container").append(postHtml);
                        }
                    });
                }
            });
            $("#overlay-menu").fadeOut(200);
            $("#classitem" + num).remove();
        }
    });
})

 document.onreadystatechange = function () {
    if (document.readyState == "complete") {

        $("#loading-top").hide();
        $("#profile-confirm").hide();
        $("#overlay-menu").hide();
        $("#addclass-join").addClass('active');
        $("#class-create").hide();
        if (sessionStorage.getItem('page') == null){
            sessionStorage.setItem('page', 1);
        } else { 
            sessionStorage.setItem('page', sessionStorage.getItem('page'));
        }
        
        const timeNow = new Date();
        let hours = timeNow.getHours();
        var morningGreetings = [
            "Good morning",
            "Have a great day",
            "Rise and shine",
            "Good day ahead",
            "Hello there",
            "Greetings",
            "Bonjour",
            "Welcome",
            "What's up",
            "Howdy"
        ];
        
        var afternoonGreetings = [
            "Good afternoon",
            "Hello again",
            "Stay positive",
            "How's your day going"
        ]

        var eveningGreetings = [
            "Good evening",
            "Good night soon",
            "Relax and unwind",
            "Serene evening",
            "The stars are out"
        ]

        if (hours >= 0 && hours < 12) {
            greetings = morningGreetings;
          } else if (hours >= 12 && hours < 17) {
            greetings = afternoonGreetings;
          } else if (hours >= 17 && hours < 21) {
            greetings = eveningGreetings;
          } else {
            greetings = eveningGreetings;
          }
        
        var randomIndex = Math.floor(Math.random() * greetings.length);

        var instanceCode = window.location.pathname.split('/')[1];
        var dots = 0;
        var loadingText = $("#load-msg");
    
        var loadText = setInterval(function() {
        if (dots < 3) {
            loadingText.text("Loading " + ". ".repeat(++dots));
        } else {
            loadingText.text("Loading");
            dots = 0;
        }
        }, 500);
        $(".logo").click(function(){
            window.location = "https://ecato.my.id/";
        })

        $.ajax({
            url: "https://ecato.my.id/api/user/me",
            type: "GET",
            async: true,
            headers: {
                "Authorization": "Bearer " + $.cookie("token")
            },
            success: function(data) {
                $("#version").text("v" + version + " • " + roleType[data.role]);
                if(data.role != 3){
                    $("#admin-panel-container, .admin-panel-menu").remove();
                }
                if(data.role == 1){
                    $("#addclass-option").remove();
                    $("#class-create").remove();
                }
                $.ajax({
                    url: "https://ecato.my.id/api/instance/" + instanceCode,
                    type: "GET",
                    async: true,
                    success: function(response){
                        if(data.instance_code != instanceCode){
                            clearInterval(loadText);
                            $("#load-logo").css("visibility","visible");
                            $(".lds-ring").hide();
                            $("#error").show();
                            $("#load-msg").text("You are not a member of this instance");
                            return false;
                        };
                        startWebsocket();
                        myUserID = data.id;
                        profileImgUrl = data.profile;
                        $("#profile-img").attr("src","/storage/img/profile/"+data.profile);
                        $("#profile-name").text(data.firstname + ' ' + data.lastname);
                        $("#profile-role").text(roleType[data.role])
                        $("#profile-email").text(data.email);
                        if(data.profession == null || data.title == null)
                            $("#contact-job").remove();
                        else $("#profile-profession").text(data.profession + ' - ' + data.title);
                        if(data.phone == null)
                            $("#contact-phone").remove();
                        else $("#profile-phone").text(data.phone);
                        $.ajax({
                            url: "https://ecato.my.id/api/instance/" + instanceCode + "/posts",
                            type: "GET",
                            async: false,
                            success: function(posts){
                                if(posts.length > 0) $("#nopost").hide();
                                posts.sort(function(a, b) {
                                    return new Date(b.created_at) - new Date(a.created_at);
                                  });
                                $.each(posts, function(index,post){
                                    $.ajax({
                                        url: "https://ecato.my.id/api/user/" + post.poster_id,
                                        type: "GET",
                                        async: true,
                                        headers: {
                                            "Authorization": "Bearer " + $.cookie("token")
                                        },
                                        success: function(postOwner){
                                            const formattedDatetime = formatJSONDatetime(post.created_at);
                                            var htmlPosts = localStorage.getItem('darkMode') === 'true' ? '<div class="posts"> <div class="poster cato-box dark"> <div class="user">' : '<div class="posts"> <div class="poster cato-box"> <div class="user">';
                                            htmlPosts += '<div class="poster-av-container"><img src="/storage/img/profile/' + postOwner.profile + '" class="pfp"></div>';
                                            htmlPosts += '<p class="name user'+post.poster_id+'">'+post.poster_name+'</p> </div>';
                                            htmlPosts += ' <p class="post-time">'+formattedDatetime+'</p> </div>';
                                            htmlPosts += '<div class="post-content">';
                                            htmlPosts += localStorage.getItem('darkMode') === 'true' ? '<div class="caption cato-box dark">' : '<div class="caption cato-box">';
                                            htmlPosts += post.caption + '</div>';
                                            if(post.media != null){
                                                htmlPosts += '<div class="media-container">';
                                                htmlPosts += '<img src="/storage/img/posts/' + post.media +'" class="media"> </div>';
                                            }
                                            htmlPosts += localStorage.getItem('darkMode') === 'true' ? 
                                            ' <div class="reaction cato-box dark"> <div class="react-btn"> <img src="/img/main/like.svg" class="react-icon dark"> <p>Like</p> </div> <div class="react-btn"> <img src="/img/main/comment.svg" class="react-icon dark"> <p>Comment</p> </div> <div class="react-btn"> <img src="/img/main/share.svg" class="react-icon dark"> <p>Share</p> </div> </div> </div> </div>'
                                            :
                                            ' <div class="reaction cato-box"> <div class="react-btn"> <img src="/img/main/like.svg" class="react-icon"> <p>Like</p> </div> <div class="react-btn"> <img src="/img/main/comment.svg" class="react-icon"> <p>Comment</p> </div> <div class="react-btn"> <img src="/img/main/share.svg" class="react-icon"> <p>Share</p> </div> </div> </div> </div>';
                                            $("#post-bottom").append(htmlPosts);
                                        },
                                        complete: function(){
                                            updateView();
                                        }
                                    });
                                    
                                });
                            }
                        });
                        function updateView(){
                            $(".name").click(function(){
                                if(data.id == $(this).attr('class').split('user')[1])
                                    overlayMenu(4);
                                else {
                                    if(onRequest == 0){
                                        $.ajax({
                                            url: "https://ecato.my.id/api/user/" + $(this).attr('class').split('user')[1],
                                            type: "GET",
                                            async: true,
                                            cache: true,
                                            headers: {
                                                "Authorization": "Bearer " + $.cookie("token")
                                            },
                                            beforeSend: function(){
                                                onRequest = 1;
                                                $("#loading-top").show();
                                                $("#loading-top").css("width","25%");
                                            },
                                            success: function(peopleData){
                                                $("#people-img").attr("src","/storage/img/profile/"+peopleData.profile);
                                                $("#people-name").text(peopleData.firstname+' '+peopleData.lastname);
                                                $("#people-role").text(roleType[peopleData.role]);
                                                $("#people-email").text(peopleData.email);
                                                if(peopleData.profession == null || peopleData.title == null)
                                                    $("#people-contact-job").hide();
                                                else $("#people-contact-job").show();$("#people-job").text(peopleData.profession + ' - ' + peopleData.title);
                                                if(peopleData.phone == null)
                                                    $("#people-contact-phone").hide();
                                                else $("#people-contact-phone").show();$("#people-phone").text(peopleData.phone);
                                                $("#loading-top").css("width","50%");
                                            },
                                            complete: function(){
                                                $("#loading-top").delay(1000).css("width","75%");
                                                overlayMenu(5);
                                                $("#loading-top").css("width","100%");
                                                setTimeout(function(){
                                                    $("#loading-top").css("width","0%");
                                                    $("#loading-top").hide();
                                                },300);
                                                onRequest = 0;
                                            }
                                        });
                
                                    }
                                }
                            });
                        }
                        $.ajax({
                            url: "https://ecato.my.id/api/instance/" + instanceCode + "/activities",
                            type: "GET",
                            async: true,
                            success: function(activities){
                                if(activities.length > 0) $("#noactivity").hide();
                                activities.sort(function(a, b) {
                                    return new Date(b.created_at) - new Date(a.created_at);
                                  });
                                $.each(activities,function(index,activity){
                                    const formattedTime = formatJSONDatetime(activity.created_at);
                                    var loadActivity = localStorage.getItem('darkMode') === 'true' ? '<div class="acts dark ' : '<div class="acts '
                                    loadActivity += activity.user_id == data.id ? 'acts-'+activity.type+' acts-me">' : 'acts-'+activity.type+' acts-others">';
                                    loadActivity += '<div class="acts-info">';
                                    loadActivity += '<img src="/img/main/act_'+activity.type+'.png">';
                                    loadActivity += activity.user_id == data.id ? '<p><b>You</b> posted : "' : '<p><b>'+activity.user_name+'</b> posted : "';
                                    loadActivity += activity.description+'"</p>';
                                    loadActivity += '</div>';
                                    loadActivity += '<div class="acts-time"><p>'+ formattedTime +'</p></div></div>';
                                    $("#activity-bottom").append(loadActivity);
                                });
                            }
                        });

                        $.ajax({
                            url: 'https://ecato.my.id/api/user/' + data.id + '/classes',
                            type: 'GET',
                            headers: {
                                "Authorization": "Bearer " + $.cookie("token")
                            },
                            success: function(myClasses){
                                if(myClasses.length > 0) $("#noclass").hide();
                                var myClass = myClasses.sort(function(a, b) {
                                    return a.name.localeCompare(b.name);
                                  });
                                $.each(myClass, function(index, item){
                                    console.log(item.owner.name);
                                    var classesHtml = '<div class="classes" id="class' + item.id + '" style="background-image: url(' + '/storage/img/class/thumb/' + item.avatar + ');">';
                                    classesHtml += '<div class="class-title">' + item.name + '</div>';
                                    classesHtml += '<div class="class-owner cato-box">';
                                    classesHtml += '<div class="class-owner-img-container"><img src="/storage/img/profile/'+item.owner.profile+'" class="class-owner-img"></div>';
                                    classesHtml += '<p class="class-owner-name">'+item.owner.name+'</p>';
                                    classesHtml += '<p class="class-members">'+item.members+' member(s)</p>';
                                    classesHtml += '</div>';
                                    classesHtml += '</div>';
                                    $("#class-container").append(classesHtml);
                                    if (localStorage.getItem('darkMode') === 'true') $(".classes,.class-owner").addClass('dark');
                                });
                            }
                        });

                        $.ajax({
                            url: "https://ecato.my.id/api/user/"+myUserID+"/classes/notjoined",
                            type: "GET",
                            async: false,
                            headers: {
                                "Authorization": "Bearer " + $.cookie("token")
                            },
                            complete: function(jqXHR){
                                const response = jqXHR.responseJSON;
                                if (response.length > 0){
                                    $("#noclassjoin").hide();
                                }
                                $.each(response, function(index, classes) {
                                    $.ajax({
                                        url: "https://ecato.my.id/api/user/" + classes.owner_id,
                                        type: "GET",
                                        async: false,
                                        headers: {
                                            "Authorization": "Bearer " + $.cookie("token")
                                        },
                                        success: function(classOwner){
                                            var postLists = '<div class="class-items cato-box" id="classitem' + classes.id + '">';
                                            postLists += '<div class="class-items-info">';
                                            postLists += '<p class="class-items-title">' + classes.name + '</p>';
                                            postLists += 'By : ' + classOwner.firstname + ' ' + classOwner.lastname + '<br>';
                                            postLists += classes.members + ' member(s)</div>';
                                            postLists += '<div id="classjoin' + classes.id + '" class="class-items-join">Join</div></div>';
                                            $("#class-join-container").append(postLists);
                                            $("#classitem" + classes.id).css("background-image","url('/storage/img/class/thumb/"+classes.avatar+"')");
                                        }
                                    });
                                });
                            }
                        });

                        $.ajax({
                            url: "https://ecato.my.id/api/instance/" + instanceCode + "/members",
                            type: "GET",
                            async: false,
                            success: function(members){
                                members.sort(function(a, b) {
                                    return b.role - a.role;
                                  });
                                var verifiedMembers = members.filter(function(item) {
                                    if(item.email_verified_at != null)
                                        return true;
                                    else   
                                        return false;
                                });
                                $("#member-total").text("("+verifiedMembers.length+" in total)");
                                $.each(members, function(index, member) {
                                    if(member.email_verified_at != null){
                                        var memberList = '<div class="people">';
                                        memberList += '<div class="people-profile"><img class="people-img-small"src="/storage/img/profile/'+member.profile+'"></div>';
                                        memberList += '<p class="people-name name user'+member.id+'">'+member.firstname+' '+member.lastname+'</p>';
                                        memberList += '<p class="people-role">'+roleType[member.role]+'</p></div>';
                                        $("#instance-menu-bottom").append(memberList);
                                    }
                                });
                            }
                        });
                        
                        $('#profileimg').attr('src','storage/img/profile/' + data.profile);
                        $('#profileimg').attr('alt',data.firstname + " " + data.lastname);
                        $("#greet").text(greetings[randomIndex] + ", " + data.firstname + " " + data.lastname);
                        schoolName = response.name;
                        let page = sessionStorage.getItem('page');
                        setPage(page);
                        $(".instance-name").text(response.name);
                        clearInterval(loadText);
                        $(".lds-ring").hide();
                        $("#check").fadeIn();
                        $("#load-msg").text("Welcome");
                        $("#load").delay(500).fadeOut();
                        $("#app").delay(1000).fadeIn().delay(1000);



                        $("#instance-avatar").attr("src","/storage/img/avatar/"+response.avatar);
                        $("#instance-info-name").text(response.name);
                        $("#instance-info-type").text(schoolType[response.type]);
                        $("#instance-country").text(response.country);
                        $("#instance-location").text(response.address);
                        $("#instance-email").text(response.email);
                        $("#instance-website").text(response.website);
                        $("#instance-website").attr("href","https://" + response.website);
                        $("#instance-menu-code").text(instanceCode);


                        $("#fs").click(function(){
                            if($("#fs").prop('checked') == true){
                                $(".cato-box, .react-icon, .acts, .classes").removeClass('dark');
                                $("#admin-member").attr("src","/img/main/member_panel.png");
                                $("#admin-post").attr("src","/img/main/post_panel.png");   
                                $("#admin-institute").attr("src","/img/main/institute_panel.png");                               
                            } else {
                                $(".cato-box, .react-icon, .acts, .classes").addClass('dark');
                                $("#admin-member").attr("src","/img/main/member_panel_dark.png"); 
                                $("#admin-post").attr("src","/img/main/post_panel_dark.png");   
                                $("#admin-institute").attr("src","/img/main/institute_panel_dark.png");      
                              }
                        });
                        if (localStorage.getItem('darkMode') === 'true') {
                            $(".cato-box").addClass('dark');
                            $("#admin-member").attr("src","/img/main/member_panel_dark.png"); 
                            $("#admin-post").attr("src","/img/main/post_panel_dark.png");   
                            $("#admin-institute").attr("src","/img/main/institute_panel_dark.png");
                          } else {
                            $(".cato-box").removeClass('dark');
                            $("#admin-member").attr("src","/img/main/member_panel.png");
                            $("#admin-post").attr("src","/img/main/post_panel.png");   
                            $("#admin-institute").attr("src","/img/main/institute_panel.png");  
                          }
                        $(".name").click(function(){
                            if(data.id == $(this).attr('class').split('user')[1])
                                overlayMenu(4);
                            else {
                                if(onRequest == 0){
                                    $.ajax({
                                        url: "https://ecato.my.id/api/user/" + $(this).attr('class').split('user')[1],
                                        type: "GET",
                                        async: true,
                                        cache: true,
                                        headers: {
                                            "Authorization": "Bearer " + $.cookie("token")
                                        },
                                        beforeSend: function(){
                                            onRequest = 1;
                                            $("#loading-top").show();
                                            $("#loading-top").css("width","25%");
                                        },
                                        success: function(peopleData){
                                            $("#people-img").attr("src","/storage/img/profile/"+peopleData.profile);
                                            $("#people-name").text(peopleData.firstname+' '+peopleData.lastname);
                                            $("#people-role").text(roleType[peopleData.role]);
                                            $("#people-email").text(peopleData.email);
                                            if(peopleData.profession == null || peopleData.title == null)
                                                $("#people-contact-job").hide();
                                            else $("#people-contact-job").show();$("#people-job").text(peopleData.profession + ' - ' + peopleData.title);
                                            if(peopleData.phone == null)
                                                $("#people-contact-phone").hide();
                                            else $("#people-contact-phone").show();$("#people-phone").text(peopleData.phone);
                                            $("#loading-top").css("width","50%");
                                        },
                                        complete: function(){
                                            $("#loading-top").delay(1000).css("width","75%");
                                            overlayMenu(5);
                                            $("#loading-top").css("width","100%");
                                            setTimeout(function(){
                                                $("#loading-top").css("width","0%");
                                                $("#loading-top").hide();
                                            },300);
                                            onRequest = 0;
                                        }
                                    });

                                }
                            }
                        });
                        var elements = $('.admin-panels,#class-post-type,#announcement-body,.class-poster,.class-poster-caption,#class-nav,#people-menu,#add-new-class,#profile-menu,#post-caption,#post-menu,#instance-website,.infos-icons,#instance-menu,.close-btn,.closebtn,#addclass-menu,.cato-box,.flipswitch-switch, body, #load, #top-container, .logo, #search, #sidebar, #community, #pluspost, #pt-1, #pt-2, .poster, .post-content, .react-icon, #activity, .acts, #act-img,.menus');
                        $("#fs").click(function(){
                            if($("#fs").prop('checked') == true){
                                elements.removeClass('dark');
                            } else {
                                elements.addClass('dark');
                            }
                            var darkMode = $('body').hasClass('dark');
                            localStorage.setItem('darkMode', darkMode);
                        })

                        if (localStorage.getItem('darkMode') === 'true') {
                            elements.addClass('dark');
                            $("#fs").prop('checked',false);
                        } else {
                            elements.removeClass('dark');
                            $("#fs").prop('checked',true);
                        }
                    },
                    statusCode: {
                        404: function(){
                            clearInterval(loadText);
                            $("#load-logo").css("visibility","visible");
                            $(".lds-ring").hide();
                            $("#error").show();
                            $("#load-msg").html("Instance not found <br>(Code : " + instanceCode + ")");
                        }
                    }
                })
            },
            statusCode: {
                401: function(){
                    clearInterval(loadText);
                    $("#load-logo").css("visibility","visible");
                    $(".lds-ring").hide();
                    $("#error").show();
                    $("#load-msg").html("You are not logged in! <br> <a href='https://ecato.my.id/auth'> Log in now.</a>");
                }
            }
        });

        function updateTime(){
            let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
            let today = weekDay[timeNow.getDay()];
            let currentDate = timeNow.getDate();
            let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let currentMonth = months[timeNow.getMonth()];
            let year = timeNow.getFullYear();
            $("#date").text(today + ", " + currentDate + " " + currentMonth + " " + year);
        }

        updateTime();
        setInterval(updateTime, 1000);

        function docTitle(page){
            document.title = page + " - " + schoolName;
        }

        function setPage(page){
            const menus = $("#feed,#clas,#task,#chat,#report,#more");
            if(page == 1){
                docTitle("Feed");
                menus.removeClass('active');
                $("#feed").addClass('active');
                $(".pages").hide();
                $("#content").show();
            } else if(page == 2){
                docTitle("Class");
                menus.removeClass('active');
                $("#clas").addClass('active');
                $(".pages").hide();
                if(fullclass == 1){
                    $("#full-class").show();
                } else {
                    $("#class-page").show();
                }
            } else if(page == 3){
                docTitle("Task");
                menus.removeClass('active');
                $("#task").addClass('active');
                $(".pages").hide();
                $("#task-page").show();
            } else if(page == 4){
                docTitle("Chat");
                menus.removeClass('active');
                $("#chat").addClass('active');
                $(".pages").hide();
                $("#chat-page").show();
            } else if(page == 5){
                docTitle("Report");
                menus.removeClass('active');
                $("#report").addClass('active');
                $(".pages").hide();
                $("#report-page").show();
            }
        }

        $("#act-select").change(function(){
            const value = $(this).val();
            const divs = $('#activity-bottom > div');

            if(value === 'all'){
                divs.show();
            } else {
                divs.hide();
                $(`.${value}`).show();
            }
        });

        $("#feed").click(function(){
            sessionStorage.setItem('page', 1);
            setPage(1);
        });
        $("#clas").click(function(){
            sessionStorage.setItem('page', 2);
            setPage(2);
        });
        $("#task").click(function(){
            sessionStorage.setItem('page', 3);
            setPage(3);
        });
        $("#chat").click(function(){
            sessionStorage.setItem('page', 4);
            setPage(4);
        });
        $("#report").click(function(){
            sessionStorage.setItem('page', 5);
            setPage(5);
        });

        function startWebsocket(){
            console.log("Ready to receieve websockets");
            Echo.channel(`instance.${instanceCode}`)
            .listen('Post', (e) => {
                console.log(e);
                const formattedDatetime = formatJSONDatetime(e.createdAt);
                var htmlPosts = localStorage.getItem('darkMode') === 'true' ? '<div class="posts"> <div class="poster cato-box dark"> <div class="user">' : '<div class="posts"> <div class="poster cato-box"> <div class="user">';
                htmlPosts += '<div class="poster-av-container"><img src="/storage/img/profile/' + e.posterProfile + '" class="pfp"></div>';
                htmlPosts += '<p class="name user'+e.posterId+'">'+e.posterName+'</p> </div>';
                htmlPosts += ' <p class="post-time">'+formattedDatetime+'</p> </div>';
                htmlPosts += '<div class="post-content">';
                htmlPosts += localStorage.getItem('darkMode') === 'true' ? '<div class="caption cato-box dark">' + e.caption + '</div>' : '<div class="caption cato-box">' + e.caption + '</div>';
                if(e.media != null){
                    htmlPosts += '<div class="media-container">';
                    htmlPosts += '<img src="/storage/img/posts/' + e.media +'" class="media"> </div>';
                }
                htmlPosts += localStorage.getItem('darkMode') === 'true' ? 
                '<div class="reaction cato-box dark"> <div class="react-btn"> <img src="/img/main/like.svg" class="react-icon dark"> <p>Like</p> </div> <div class="react-btn"> <img src="/img/main/comment.svg" class="react-icon dark"> <p>Comment</p> </div> <div class="react-btn"> <img src="/img/main/share.svg" class="react-icon dark"> <p>Share</p> </div> </div> </div> </div>'
                :
                '<div class="reaction cato-box"> <div class="react-btn"> <img src="/img/main/like.svg" class="react-icon"> <p>Like</p> </div> <div class="react-btn"> <img src="/img/main/comment.svg" class="react-icon"> <p>Comment</p> </div> <div class="react-btn"> <img src="/img/main/share.svg" class="react-icon"> <p>Share</p> </div> </div> </div> </div>';
                $("#nopost").hide();
                $("#post-bottom").prepend(htmlPosts);
                var elements = $(".react-icon");
                $("#fs").click(function(){
                    if($("#fs").prop('checked') == true){
                        elements.removeClass('dark');
                    } else {
                        elements.addClass('dark');
                    }
                });
                $(".name").click(function(){
                    if(myUserID == $(this).attr('class').split('user')[1])
                        overlayMenu(4);
                    else {
                        $.ajax({
                            url: "https://ecato.my.id/api/user/" + $(this).attr('class').split('user')[1],
                            type: "GET",
                            async: true,
                            headers: {
                                "Authorization": "Bearer " + $.cookie("token")
                            },
                            success: function(peopleData){
                                $("#people-img").attr("src","/storage/img/profile/"+peopleData.profile);
                                $("#people-name").text(peopleData.firstname+' '+peopleData.lastname);
                                $("#people-role").text(roleType[peopleData.role]);
                                $("#people-email").text(peopleData.email);
                                if(peopleData.profession == null || peopleData.title == null)
                                    $("#people-contact-job").hide();
                                else $("#people-contact-job").show();$("#people-job").text(peopleData.profession + ' - ' + peopleData.title);
                                if(peopleData.phone == null)
                                    $("#people-contact-phone").hide();
                                else $("#people-contact-phone").show();$("#people-phone").text(peopleData.phone);
                                overlayMenu(5);
                            }
                        });
                        
                    }
                });
            })
            .listen('Activity',(e) => {
                const formattedTime = formatJSONDatetime(e.time);
                if(e.user_id == myUserID){
                    if(localStorage.getItem('darkMode') === 'true')
                        var loadActivity = '<div class="acts acts-'+e.type+' acts-me dark">';
                    else
                    var loadActivity = '<div class="acts acts-'+e.type+' acts-me">';
                } else {
                    if(localStorage.getItem('darkMode') === 'true')
                        var loadActivity = '<div class="acts acts-'+e.type+' acts-others dark">';
                    else
                        var loadActivity = '<div class="acts acts-'+e.type+' acts-others">';
                }
                loadActivity += '<div class="acts-info">';
                loadActivity += '<img src="/img/main/act_'+e.type+'.png">';
                if(e.user_id == myUserID){
                    loadActivity += '<p><b>You</b> posted : "'+e.description+'"</p>';
                } else {
                    loadActivity += '<p><b>'+e.name+'</b> posted : "'+e.description+'"</p>';
                }
                loadActivity += '</div>';
                loadActivity += '<div class="acts-time"><p>'+ formattedTime +'</p></div></div>';
                $("#noactivity").hide();
                $("#activity-bottom").prepend(loadActivity);
                var elements = $(".acts");
                $("#fs").click(function(){
                    if($("#fs").prop('checked') == true){
                        elements.removeClass('dark');
                    } else {
                        elements.addClass('dark');
                    }
                });
            })
            .listen('DeletePosts',(e) => {
                $(".posts").remove();
                $(".acts").remove();
                $("#nopost").show();
                $("#noactivity").show();
                console.log(e);
            })
        }

        function overlayMenu(menu){
            $(".overlays").hide();
            $("#overlay-menu").fadeIn(200);
            switch(menu){
                case 1:
                    $("#addclass-menu").show();
                    break;
                case 2:
                    $("#instance-menu").show();
                    break;
                case 3:
                    $("#post-menu").show();
                    break;
                case 4:
                    $("#profile-menu").show();
                    break;
                case 5:
                    $("#people-menu").show();
                    break;
                case 6:
                    $("#register-rfid-menu").show();
                    break;
                case 7:
                    $("#managemember-menu").show();
                    break;
                case 8:
                    $("#managepost-menu").show();
                    break;
                case 9:
                    $("#manageinstitute-menu").show();
                    break;
            }
        }

        $(".instance-name").click(function(){
            overlayMenu(2);
        });
        $("#pt-2").click(function(){
            overlayMenu(3);
        });
        $("#add-new-class").click(function(){
            overlayMenu(1);
        });
        $("#profileimg").click(function(){
            overlayMenu(4);
        });
        $("#add-class").click(function(){
            overlayMenu(6);
        });
        $("#member-panel").click(function(){
            overlayMenu(7);
        });
        $("#post-panel").click(function(){
            overlayMenu(8);
        });
        $("#institute-panel").click(function(){
            overlayMenu(9);
        });
        $(".close-btn").click(function(){
            $("#overlay-menu").fadeOut(200);
        });
        $("#close-profile").click(function(){
            $("#profile-img").attr("src","/storage/img/profile/"+profileImgUrl);
            $("#profile-avatar").val(null);
            $("#profile-confirm").hide();
        })
        $("#addclass-join").click(function(){
            $("#addclass-join").addClass('active');
            $("#addclass-create ").removeClass('active');
            $("#class-create").hide();
            $("#class-join").show();
        });
        $("#addclass-create").click(function(){
            $("#addclass-create").addClass('active');
            $("#addclass-join").removeClass('active');
            $("#class-join").hide();
            $("#class-create").show();
        });
        $("#full-class-back").click(function(){
            fullclass = 0;
            $(".pages").hide();
            $("#class-page").show();
            if(classPostChannel !== undefined){
                classPostChannel.unsubscribe();
            }
        });

        $("#delete-posts").click(function(){
           if(window.confirm("Are you sure you want to delete all posts? This act cannot be undone.")){
            $.ajax({
                url: 'https://ecato.my.id/api/instance/'+instanceCode+'/delete/posts',
                type: 'DELETE',
                headers: {
                    "Authorization": "Bearer " + $.cookie("token")
                },
                success: function() {
                    $("#overlay-menu").fadeOut(200);
                }
              });
           }
        })

        $('#image').on('change', function() {
            var input = this;
            var reader = new FileReader();
            if(input.files[0].size > 10485760){
              alert("Image size is too big! (Max. 10 MB)");
              input.value = "";
              return false;
           };
        
            reader.onload = function() {
              var dataURL = reader.result;
              $('#post-attachment-preview').html('<img class="preview-img" src="' + dataURL + '" style="max-width: 100%;max-height: 500px;">');
            };
        
            reader.readAsDataURL(input.files[0]);
          });

        $("#post-button").click(function(){
            if(!$("#post-caption").val() || (!$.trim($("#post-caption").val()).length)){
                alert("Please insert some caption!");
            } else {
                var formData = new FormData(); 
                formData.append('caption', $('#post-caption').val());
                formData.append('image', $('#image')[0].files[0]);
                $.ajax({
                    url: 'https://ecato.my.id/api/post',
                    type: 'POST',
                    headers: {
                        "Authorization": "Bearer " + $.cookie("token")
                    },
                    data: formData,
                    processData: false,
                    contentType: false, 
                    success: function(response) {
                      $("#post-caption").val('');
                      $("#image").val(null);
                      $(".preview-img").remove();
                      $("#overlay-menu").hide();
                    },
                    error: function(xhr, status, error) {
                      console.log(error);
                    }
                  });
            }
        });

        $('#profile-avatar').on('change', function() {
                var input = this;
                var reader = new FileReader();
                if(input.files[0].size > 10485760){
                  alert("Image size is too big! (Max. 10 MB)");
                  input.value = "";
                  return false;
               };
            
                reader.onload = function() {
                  var dataURL = reader.result;
                  $("#profile-img").attr("src",dataURL);
                };
            
                reader.readAsDataURL(input.files[0]);
                $("#profile-confirm").show();
        });

        $("#profile-confirm").click(function(){
            var image = $('#profile-avatar')[0].files[0];
            var formData = new FormData();
            formData.append('image', image);
            $.ajax({
                type:'POST',
                url:'https://ecato.my.id/api/user/me/update/avatar',
                headers: {
                    "Authorization": "Bearer " + $.cookie("token")
                },
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(){
                    window.location.href = 'https://ecato.my.id/'+instanceCode;
                }
            });
        });

        $("#profile-logout").click(function(){
            $.ajax({
                url: 'https://ecato.my.id/api/user/logout',
                type: 'POST',
                headers: {
                    "Authorization": "Bearer " + $.cookie("token")
                },
                success: function(){
                    window.location.href = 'https://ecato.my.id/auth';
                },
                error: function(){
                    console.log("Something's wrong");
                }
            });
        });

        $("#class-general").click(function(){
            $(".class-menu-page").hide();
            $("#class-menu-general").show();
            $(".class-nav-btn").removeClass('active');
            $(this).addClass('active');
        });
        $("#class-tasks").click(function(){
            $(".class-menu-page").hide();
            $("#class-menu-tasks").show();
            $(".class-nav-btn").removeClass('active');
            $(this).addClass('active');
        });
        $("#class-members").click(function(){
            $(".class-menu-page").hide();
            $("#class-menu-members").show();
            $(".class-nav-btn").removeClass('active');
            $(this).addClass('active');
        });

        $("#full-class").on('click', '#class-post-send', function(){
            if($("#class-post-input").val() || ($.trim($("#class-post-input").val()).length)){
                $.ajax({
                    url: 'https://ecato.my.id/api/class/' + fullClassId +'/post' ,
                    type: 'POST',
                    headers: {
                        "Authorization": "Bearer " + $.cookie("token")
                    },
                    data: {caption: $("#class-post-input").val()},
                    success: function(){
                        $("#class-post-input").val('');
                    }
                });
            }
        });
        $("#task-assigned").click(function(){
            $("#tasks-completed").hide();
            $("#task-completed").removeClass('active');
            $("#task-assigned").addClass('active');
            $("#tasks-assigned").show();
        });
        $("#task-completed").click(function(){
            $("#tasks-assigned").hide();
            $("#task-assigned").removeClass('active');
            $("#task-completed").addClass('active');
            $("#tasks-completed").show();
        });
        $("#class-container").on('click', '.classes', function() {
            $(".class-menu-page").hide();
            $("#class-menu-general").show();
            $(".class-nav-btn").removeClass('active');
            $("#class-general").addClass('active');
            if(classPostChannel !== undefined){
                classPostChannel.unsubscribe();
            }
            fullclass = 1;
            var classId = $(this).attr("id");
            var num = parseInt(classId.match(/\d+/)[0]);
            fullClassId = num;
            $.ajax({
                url: "https://ecato.my.id/api/class/" + num + "/profile",
                type: "GET",
                async: true,
                headers: {
                    "Authorization": "Bearer " + $.cookie("token")
                },
                beforeSend: function(){
                    onRequest = 1;
                    $("#loading-top").show();
                    $("#loading-top").css("width","25%");
                },
                success: function(full_class){
                    $.ajax({
                        url: "https://ecato.my.id/api/user/" + full_class.owner_id,
                        type: "GET",
                        async: true,
                        headers: {
                            "Authorization": "Bearer " + $.cookie("token")
                        },
                        success: function(classOwner){
                            $("#full-class-owner").text(classOwner.firstname + ' ' + classOwner.lastname);
                        }
                    });
                    $("#full-class-name").text(full_class.name);
                    $("#class-banner").css("background-image","url(/storage/img/class/thumb/" + full_class.avatar + ")");
                    $.ajax({
                        url: "https://ecato.my.id/api/class/" + full_class.id + "/posts",
                        type: "GET",
                        async: false,
                        headers: {
                            "Authorization": "Bearer " + $.cookie("token")
                        },
                        success: function(classPosts){
                            $(".class-post").remove();
                            classPosts.sort(function(a, b) {
                                return new Date(b.created_at) - new Date(a.created_at);
                            });
                            if(classPosts.length > 0){
                                $("#noclasspost").hide();
                            } else {
                                $("#noclasspost").show();
                            }
                            $.each(classPosts, function(index, post) {
                                $.ajax({
                                    url: "https://ecato.my.id/api/user/" + post.poster_id,
                                    type: "GET",
                                    async: false,
                                    headers: {
                                        "Authorization": "Bearer " + $.cookie("token")
                                    },
                                    success: function(classPostOwner){
                                        const formatDt = formatJSONDatetime(post.created_at);
                                        var postHtml = '<div class="class-post"><div class="class-poster"><div class="class-poster-img">';
                                        postHtml += '<img src="/storage/img/profile/'+classPostOwner.profile+'" style="width: 50px; height: auto;"></div>';
                                        postHtml += '<p class="class-poster-name">'+classPostOwner.firstname+' '+classPostOwner.lastname+'</p>';
                                        postHtml += '<p class="class-poster-time">'+formatDt+'</p></div>';
                                        postHtml += '<div class="class-poster-caption"><img src="/img/main/more-v.svg" style="position:relative;left:815px;" class="infos-icons"><br>';
                                        postHtml += '<p style="margin-top: -23px;margin-right:20px;">'+post.caption+'</p></div></div>';
                                        $("#class-posts").append(postHtml);
                                    }
                                });
                            });
                        }
                    });
                    $(".pages").hide();
                    $("#full-class").show();
                    $("#loading-top").css("width","50%");
                },
                complete: function(){
                    $("#loading-top").delay(1000).css("width","75%");
                    $("#loading-top").css("width","100%");
                    setTimeout(function(){
                        $("#loading-top").css("width","0%");
                        $("#loading-top").hide();
                    },300);
                    onRequest = 0;
                }
                });
            classPostChannel = Echo.channel(`instance.${instanceCode}.class.${num}`)
            classPostChannel.listen('ClassPosts', (e) => {
                const formatDt = formatJSONDatetime(e.createdAt);
                var postHtml = '<div class="class-post"><div class="class-poster"><div class="class-poster-img">';
                postHtml += '<img src="/storage/img/profile/'+e.posterProfile+'" style="width: 50px; height: auto;"></div>';
                postHtml += '<p class="class-poster-name">'+e.posterName+'</p>';
                postHtml += '<p class="class-poster-time">'+formatDt+'</p></div>';
                postHtml += '<div class="class-poster-caption"><img src="/img/main/more-v.svg" style="position:relative;left:815px;" class="infos-icons"><br>';
                postHtml += '<p style="margin-top: -23px;margin-right:20px;">'+e.caption+'</p></div></div>';
                $("#noclasspost").hide();
                $("#class-posts").prepend(postHtml);
            })
          });
    }
};

