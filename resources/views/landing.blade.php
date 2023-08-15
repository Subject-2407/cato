<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cato.ico">
    <link rel="stylesheet" href="/css/landing.css">
    <title>Cato | E-Learning App</title>
</head>
<body>
    <div class="landing" id="navbar">
        <div class="nav-container">
            <div class="nav-item"><img src="/img/cato.svg"></div>
            <div class="nav-item">
                <button class="nav" id="btnhome">Home</button>
                <button class="nav" id="btnfeatures">Features</button>
                <button class="nav" id="btnfaq">FAQ</button>
            </div>
            <div class="nav-item">
                <button class="nav-auth" id="nav-login" onclick="location.href='https://ecato.my.id/auth/?type=signin'" type="button">Log in</button>
                <button class="nav-auth" id="nav-signup" onclick="location.href='https://ecato.my.id/auth/?type=signup'" type="button">Sign up now!</button>
            </div>
        </div>
    </div>
    <div class="landing" id="main">
        <div class="main-item">
            <p id="main-a">EDUCATION AND COLLABORATION</p>
            <br>
            <p class="main-b">Connect all school component</p>
            <p class="main-b">with Cato.</p>
            <br><br><br>
            <button class="main-auth" id="main-signup" type="button">Mobile App</button>
            <button class="main-auth" id="main-login" onclick="location.href='https://ecato.my.id/auth/?type=signin'" type="button">Login</button>
        </div>
        <img src="/img/landing/main.svg">
    </div>
    <div class="landing" id="description">
        <div class="desc-container">
            <div class="desc">
                <div class="desc-content">
                    <p class="desc-title">All About Good Connection</p><br><br>
                    <p class="desc-text">Make connections and start your journey to learn, collaborate, plan, and innovate together.</p>
                </div>
                <img src="/img/landing/desc1.svg" class="desc-img">
            </div><br><br>
            <div class="desc">
            <img src="/img/landing/desc2.svg" class="desc-img">
                <div class="desc-content">
                    <p class="desc-title">Walkie Talkie Is In Your Pocket</p><br><br>
                    <p class="desc-text">Access calls, chats and assignments in one place and anywhere for easy communication.</p>
                </div>
            </div><br><br>
            <div class="desc">
                <div class="desc-content">
                    <p class="desc-title">Reach The Goals Together</p><br><br>
                    <p class="desc-text">With classes and assignments, you can create, share, and exchange opinions and ideas with others to achieve goals and move forward together.</p>
                </div>
                <img src="/img/landing/desc3.svg" class="desc-img">
            </div><br><br>
            <div class="desc">
                <img src="/img/landing/desc4.svg" class="desc-img">
                <div class="desc-content">
                    <p class="desc-title">Check Your Journey Map</p><br><br>
                    <p class="desc-text">You need to keep moving forward. But before that, you need to know where you are and what to do next with schedules and reports.</p>
                </div>
            </div>
        </div>
        <img src="/img/landing/mainend.svg" id="desc-end">
    </div>
    <div class="landing" id="faq">
        <p id="faq-title">FREQUENTLY ASKED QUESTION</p>
        <div class="faqs">
            <p class="faq-head">What is Cato?</p>
            <img src="/img/landing/faq.svg" class="faq-img" id="what-btn">
            <p class="faq-body" id="what">Cato is a multiplatform collaboration app used for e-learning purposes in educational insitutions where its main idea is to reduce the amount of time and costs of conventional learning system in expectation to make it more effective and efficient.</p>
        </div>
        <div class="faqs">
            <p class="faq-head">Who can use Cato?</p>
            <img src="/img/landing/faq.svg" class="faq-img" id="who-btn">
            <p class="faq-body" id="who">Cato is for anyone and any educational institution who are willing to share and learn knowledge together in effective and efficient way.</p>
        </div>
        <div class="faqs">
            <p class="faq-head">How do I start signing up in Cato?</p>
            <img src="/img/landing/faq.svg" class="faq-img" id="how-btn">
            <p class="faq-body" id="how">Simply click the "Sign up now!" button at top right corner. After that, you will be redirected to the Sign Up page. We provide three Roles (Student, Educator, and Administrator) for you to sign up as. Choose a role that fits your current need.</p>
        </div>
        <div class="faqs">
            <p class="faq-head">How do I access Cato?</p>
            <img src="/img/landing/faq.svg" class="faq-img" id="how2-btn">
            <p class="faq-body" id="how2">Cato can be accessed anywhere and anytime through web and mobile app.<br> You can download the mobile app <a href="https://www.google.com" id="mobile-dl">here</a>. (Coming soon)</p>
        </div>
        <div class="faqs">
            <p class="faq-head">What can I do as Administrator?</p>
            <img src="/img/landing/faq.svg" class="faq-img" id="what2-btn">
            <p class="faq-body" id="what2">As Administrator, you are able to create coordinate your instance's timetables, setting subjects, managing the members of your instance, and there are other features you can use for administration purposes.</p>
        </div>
    </div>
    <div class="landing" id="copyright">
        <div class="cr-div">
            <img src="/img/cato.svg">
            <p id="cr-short">A multi-platform collaboration app used for e-learning purposes.</p>
        </div>
        <div class="cr-div" id="about">
            <a href="https://www.google.com/">About us</a><br>
            <a href="https://www.google.com/">Privacy</a><br>
            <a href="https://www.google.com/">Terms of use</a><br>
            <a href="https://www.google.com/">Contact us</a><br>
        </div>
        <div class="cr-div">
        <p id="prod">Our products</p>
        <hr id="prod-hr">
            <a href="https://ecato.my.id/">Cato E-Learning App</a><br>
            <a href="https://ecato.my.id/incubator">Incubator Monitor</a><br>
        </div>
        <div class="cr-div">
            <select id="lang">
                <option value="en">English</option>
                <option value="id">Indonesia</option>
            </select>
            <p>Copyright © 2023 Cato. All rights reserved.</p>
        </div>
    </div>
    
</body>
<script src="/js/jquery-3.6.1.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/landing.js"></script>
</html>