<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cato.ico">
    <link rel="stylesheet" href="/css/main.css">
    <title>Cato</title>
</head>
<body>
    <div id="load">
        <div id="cato-logo">
            <img src="/img/cato.svg" class="logo" id="load-logo">
        </div>
        <div id="loading">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
            <img src="/img/error.svg" id="error">
            <img src="/img/check.svg" id="check">
            <p id="load-msg">Loading</p>
        </div>
        <div id="copyright">
            © 2023 Cato. All rights reserved.
        </div>
    </div>
    <div id="loading-top">

    </div>
    <div id="overlay-menu">
        <div id="managemember-menu" class="overlays admin-panel-menu">
            <div class="overlay-menu-header">
                <p class="overlay-title">Manage Members</p>
                <div class="close-btn">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
        </div>
        <div id="managepost-menu" class="overlays admin-panel-menu">
            <div class="overlay-menu-header">
                <p class="overlay-title">Manage Feed Posts</p>
                <div class="close-btn">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
            <p class="overlay-content-text">Set up rate limiting for user posts</p>
            <input id="post-ratelimit" type="text" style="width: 70px; padding: 5px;"></input><p style="color: rgb(112, 112, 112); display: inline-block; margin-left: 10px;">post(s) per minute <button style="padding: 5px 10px 3px 10px; background-color: #FF7A00; margin-left: 20px;">Save</button><p>
            <br><hr><br>
            <p class="overlay-content-text">Delete all posts including post activities.</p>
            <button id="delete-posts"style="padding: 7px 10px 5px 10px; color: white; background-color: #720E28;">Delete</button>
        </div>
        <div id="manageinstitute-menu" class="overlays admin-panel-menu">
            <div class="overlay-menu-header">
                <p class="overlay-title">Manage Institute</p>
                <div class="close-btn">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
        </div>
        <div id="addclass-menu" class="overlays">
            <div class="overlay-menu-header">
                <p class="overlay-title" style="margin: 15px 0 0 15px;">Add Class</p>
                <div class="close-btn">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
            <div id="addclass-option">
                <div class="addclass-btn" id="addclass-join">
                    <p>Join class</p>
                </div>
                <div class="addclass-btn" id="addclass-create">
                    <p>Create a class</p>
                </div>
            </div>
            <div id="addclass-selection">
                <div id="class-join">
                    Available classes for you : <br>
                    <div id="class-join-container">
                        <p id="noclassjoin" class="empty-list">You have already joined all classes.</p>
                    </div>
                </div>
                <div id="class-create">
                    Create a class
                </div>
            </div>
        </div>
        <div id="register-rfid-menu" class="overlays">
            <div id="rfid-register">
                <p style="font-weight: bold;font-size:24px;align-self:flex-start;">Register RFID</p>
                <p style="text-align: left;">Register for User ID: <p>
                <input type="text">
            </div>
            <div id="rfid-list">
                <p style="font-weight: bold;font-size:24px;align-self:flex-start;">Register RFID</p>
            </div>
            <div id="rfid-attendances">
            <p style="font-weight: bold;font-size:24px;align-self:flex-start;">Register RFID</p>
            </div>
            <div class="close-btn" id="close-profile" style="position: absolute; transform: translate(20px,-22px);">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
        </div>
        <div id="profile-menu" class="overlays">
            <div id="profile-details">
                <div id="profile-image" style="background-color: black;border: 2px solid black;height: 150px;width: 150px;border-radius:50%;overflow:hidden;display:flex;justify-content:center;align-items:center;">
                    <img src="/storage/img/profile/default.jpg" style="width: 100%; height: auto;" id="profile-img">
                </div>
                <div id="profile-short">
                    <div id="profile-nameimg">
                        <p id="profile-name" style="font-weight: bold;font-size:30px;">John Doe</p>
                        <p id="profile-role" style="color: rgb(112, 112, 112);font-size: 18px">Administrator</p>
                    </div>
                    <div>
                        <div class="profile-contacts" id="contact-email">
                            <img src="/img/main/email.svg" style="height: 17px;" class="infos-icons">
                            <p id="profile-email" style="display: inline-block;">johndoe@gmail.com</p>
                        </div>
                        <div class="profile-contacts" id="contact-job">
                            <img src="/img/main/job.svg" style="height: 17px;" class="infos-icons">
                            <p id="profile-profession">Human - Unknown</p>
                        </div>
                        <div class="profile-contacts" id="contact-phone">
                            <img src="/img/main/phone.svg" style="height: 17px;" class="infos-icons">
                            <p id="profile-phone">+62588572182</p>
                        </div>
                    </div>
                </div>
                <div class="close-btn" id="close-profile" style="position: absolute; transform: translate(482px,-132px);">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
            <div id="profile-more">
                <div id="avatar-upload">
                    <label for="profile-avatar"></label>
                    <input type="file" id="profile-avatar" name="profile-avatar" accept="image/*">
                </div>
                <button type="button" style="margin-right: 150px;" id="profile-confirm">Confirm</button>
                <button type="button" id="profile-logout">Log Out</button>
            </div>
        </div>
        <div id="people-menu" class="overlays">
            <div id="people-details">
                <div id="people-image" style="background-color: black;border: 2px solid black;height: 150px;width: 150px;border-radius:50%;overflow:hidden;display:flex;justify-content:center;align-items:center;">
                    <img src="/storage/img/profile/default.jpg" style="width: 150px;height: auto;" id="people-img">
                </div>
                <div id="people-short">
                    <div>
                        <p id="people-name" style="font-weight: bold;font-size:30px;">John Doe</p>
                        <p id="people-role" style="color: rgb(112, 112, 112);font-size: 18px">Administrator</p>
                    </div>
                    <div>
                        <div class="people-contacts">
                            <img src="/img/main/email.svg" style="height: 17px;" class="infos-icons">
                            <p id="people-email" style="display: inline-block;">johndoe@gmail.com</p>
                        </div>
                        <div class="people-contacts" id="people-contact-job">
                            <img src="/img/main/job.svg" style="height: 17px;" class="infos-icons">
                            <p id="people-job">Human - Unknown</p>
                        </div>
                        <div class="people-contacts" id="people-contact-phone">
                            <img src="/img/main/phone.svg" style="height: 17px;" class="infos-icons">
                            <p id="people-phone">+62588572182</p>
                        </div>
                    </div>
                </div>
                <div class="close-btn" style="position: absolute; transform: translate(482px,-132px);">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
            <div id="people-more">
                <button type="button" style="width: 65px;justify-self:flex-end;">Chat</button>
            </div>
        </div>
        <div id="instance-menu" class="overlays">
            <div id="instance-menu-top">
                <img id="instance-avatar" src="/storage/img/avatar/default.jpg" style="height: 150px;border-radius:10px;">
                <div id="instance-menu-info">
                    <p id="instance-info-name" style="font-weight: bold;font-size: 20px;margin-bottom:5px;">Cato Academy</p>
                    <p id="instance-info-type" style="color: rgb(112, 112, 112);">Graduate/Professional School</p><br>
                    <div class="instance-infos">
                        <img src="/img/main/country.svg" style="height: 20px;" class="infos-icons">
                        <p id="instance-country">Jupiter</p>
                    </div>
                    <div class="instance-infos">
                        <img src="/img/main/location.svg" style="height: 20px;" class="infos-icons">
                        <p id="instance-location">Solar System, Milky Way</p>
                    </div>
                    <div class="instance-infos">
                        <img src="/img/main/email.svg" style="height: 20px;" class="infos-icons">
                        <p id="instance-email">cato@gmail.com</p>
                    </div>
                    <div class="instance-infos">
                        <img src="/img/main/web.svg" style="height: 20px;" class="infos-icons">
                        <a id="instance-website" href="https://ecato.my.id/" target="_blank">ecato.my.id</a>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;width: 200px;gap:20px;">
                    <p style="font-size:16px;">Code :</p>
                    <em><p style="font-weight:bold;font-size: 20px;" id="instance-menu-code">catoacad</p></em>
                </div>
                <div class="close-btn" style="position: absolute; transform: translate(680px,-135px);">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
            </div>
            <hr>
            <div id="mem-total" style="display: flex;flex-direction: row; gap: 7px; align-items:center;">
                <p style="font-weight: 500; font-size: 20px;">Members</p>
                <p style="color: rgb(112, 112, 112);" id="member-total">(0 in total)</p>
            </div>
            <div id="instance-menu-bottom">

            </div>
            
        </div>
        <div id="post-menu" class="overlays">
                <p style="font-weight: bold; font-size: 24px;">Create a New Post</p>
                <input type="text" placeholder="Type something interesting!" id="post-caption">
                <div id="post-menu-attachment">
                    <p style="font-weight: 500; font-size: 18px; margin-bottom: 5px;">Image attachment (optional)</p>
                    <label for="image"></label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <div id="post-attachment-preview" style="display: flex;justify-content: center;align-items:center;border-radius:10px;overflow:hidden;">

                    </div>
                </div>
                <button type="button" id="post-button">Post</button>
                <div class="close-btn" style="position: absolute; transform: translate(25px,-23px);">
                    <img src="/img/main/close.png" style="width: 20px;" class="closebtn">
                </div>
        </div>
    </div>
    <div id="app">
        <div id="top-container">
            <div id="top">
                <div id="cato-ver">
                    <img src="/img/cato.svg" class="logo">
                    <p id="version">v0.0.0</p>
                </div>
                <div id="top-right">
                    <div id="instance">
                        <img src="/img/main/more-new.svg" id="instance-more" class="menus" style="width:20px;">
                        <p class="instance-name" style="padding-top:2px;">Educational Institution</p>
                    </div>
                    <input type="text" placeholder="Search something" id="search">
                </div>
            </div>
        </div>

        <div id="bottom-container">
            <div id="side">
                <div id="profileimg-container">
                    <img src="/img/default.png" id="profileimg">
                </div>
                <div id="sidebar">
                    <img src="/img/main/feed.svg" id="feed" class="menus">
                    <img src="/img/main/class.svg" id="clas" class="menus">
                    <img src="/img/main/task.svg" id="task" class="menus">
                    <img src="/img/main/chat.svg" id="chat" class="menus">
                    <img src="/img/main/report.svg" id="report" class="menus">
                </div>
                <div class="flipswitch">
                    <input type="checkbox" name="flipswitch" class="flipswitch-cb" id="fs" checked>
                    <label class="flipswitch-label" for="fs">
                        <div class="flipswitch-inner"></div>
                        <div class="flipswitch-switch"></div>
                    </label>
                </div>
            </div>
            <div id="content" class="pages">
                <div id="content-top">
                    <p id="greet">Hello, Dummy</p>
                    <p id="date">Monday, 1 January 2000</p>
                </div><br>
                <div id="content-bottom">
                    <div id="post">
                        <div id="post-top">
                            <div id="pt-1">
                                <p style="padding-top:4px;">Your Community Posts</p>
                                <img src="/img/main/post.svg" id="community">
                            </div>
                            <div id="pt-2">
                                <img src="/img/main/plus.svg" id="pluspost">
                                <p>Make A Post</p>
                            </div>
                        </div><br>
                        <div id="post-bottom">
                            <p id="nopost" class="empty-list">There are no post to show. <br>Make your first post!</p>
                        </div>
                    </div>
                    <div id="two-panels" style="display:flex; flex-direction: column; gap: 20px; width: 40%">
                        <div id="activity">
                            <div id="activity-top">
                                <div id="act-title">
                                    <p style="margin-top:3px;">Activity</p>
                                    <img src="/img/main/activity.svg" id="act-img">
                                </div>
                                <div id="act-dropdown">
                                    <select id="act-select">
                                        <option value="all">All activities</option>
                                        <option value="acts-me">From me</option>
                                        <option value="acts-others">From others</option>
                                        <option value="acts-1">Feed</option>
                                        <option value="acts-2">Classes</option>
                                        <option value="acts-3">Tasks</option>
                                        <option value="acts-4">Chats</option>
                                    </select>
                                </div>
                            </div>
                            <hr style="width: 90%;">
                            <div id="activity-bottom">
                                <p id="noactivity" style="font-weight: 500;text-align:center;margin-top: 10px;">No activity yet.</p>
                            </div>
                        </div>
                        <div id="admin-panel-container">
                            <p style="font-weight: bold; font-size: 20px; line-height: 50px;">Admin Panel</p>
                            <div id="admin-panel" class="cato-box">
                                <div id="member-panel" class="admin-panels">
                                    <img src="/img/main/member_panel.png" id="admin-member">
                                    <p>Members</p>
                                </div>
                                <div id="post-panel" class="admin-panels">
                                    <img src="/img/main/post_panel.png" id="admin-post">
                                    <p>Posts</p>
                                </div>
                                <div id="institute-panel" class="admin-panels">
                                    <img src="/img/main/institute_panel.png " id="admin-institute">
                                    <p>Institute</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="class-page" class="pages">
                <div id="class-page-title" style="display:flex;flex-direction:row;justify-content:space-between;">
                    <p class="page-title">Your Classes</p>
                    <div id="add-new-class">
                        <img src="/img/main/plus.svg" id="pluspost" style="width: 20px;">
                        <p style="padding-top: 4px;">Add Class</p>
                    </div>
                    
                </div><br>
                <div id="class-container">
                    <p id="noclass" class="empty-list">There are no class to show. Click the 'Add Class' button on the upper-right to add a class.</p>
                </div>
                <div id="add-class">
                </div>

            </div>
            <div id="task-page" class="pages">
                <div id="instance-tasks"></div>
            </div>
            <div id="chat-page" class="pages">
                Your chat
            </div>
            <div id="report-page" class="pages">
                Your report
            </div>
            <div id="full-class" class="pages">
                <div id="full-class-top">
                    <img src="/img/back.png" id="full-class-back">
                    <div id="class-banner">
                        <p id="full-class-name">Cato Class</p>
                        <p id="full-class-owner">John Doe</p>
                    </div>
                </div>
                <div id="class-content">
                        <div id="class-nav" class="cato-box">
                            <br>
                            <div class="class-nav-btn" id="class-general">General</div>
                            <div class="class-nav-btn" id="class-tasks">Tasks</div>
                            <div class="class-nav-btn" id="class-members">Members</div>
                        </div>
                        <div id="class-menu-pages">
                            <div id="class-menu-general" class="class-menu-page">
                                <div id="class-content-container">
                                    <div id="class-posts">
                                        <p id="noclasspost" class="empty-list">There are no class post to show.</p>
                                    </div>
                                </div>
                                <div id="class-content-container2" style="flex-grow: 1;">
                                    <div id="class-announcement">
                                        <div id="announcement-header">Announcement</div>
                                        <div id="announcement-body" style="padding: 30px;">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        </div>
                                    </div>
                                    <div id="class-post-type">
                                        <input id="class-post-input" type="text" placeholder="Type something interesting!" style="border: none;flex-grow:1;">
                                        <img src="/img/main/send.svg" class="infos-icons menus" id="class-post-send">
                                    </div>
                                </div>
                            </div>
                            <div id="class-menu-tasks" class="class-menu-page">
                                <div id="class-task-assignment" class="class-tasks-menu" style="flex-grow: 1;">
                                    <div class="class-tasks-header">
                                        <p style="font-size: 20px;">Tasks<p>
                                        <div id="task-assigned-completed">
                                            <div id="task-assigned" class="task-assign-complete active">Assigned</div>
                                            <div id="task-completed" class="task-assign-complete">Completed</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="class-tasks-body">
                                        <div id="tasks-assigned" class="tasks-container">
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>Due on blaaa</p>
                                            </div>
                                        </div>
                                        <div id="tasks-completed" class="tasks-container" style="display: none;">
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>90/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                            <div class="tasks">
                                                <div class="tasks-title">
                                                    <img src="/img/main/act_3.png">
                                                    <p>Hello world task!</p>
                                                </div>
                                                <p>85/100</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div id="class-task-material" class="class-tasks-menu">
                                    <div class="class-tasks-header">
                                        <p style="font-size: 20px;">Material</p>
                                    </div>
                                    <hr>
                                    <div class="class-tasks-body">
                                        Hello
                                    </div>
                                </div>
                            </div>
                            <div id="class-menu-members" class="class-menu-page">
                                Members
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>

<script src="/js/jquery-3.6.1.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="https://ecato.my.id/js/app.js"></script>
<script src="/js/main.js"></script>
</html>