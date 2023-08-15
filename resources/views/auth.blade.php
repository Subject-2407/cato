<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cato.ico">
    <link rel="stylesheet" href="/css/auth.css?v=1.1">
    <title>Cato | Sign in</title>
</head>
<body>
    <div class="auth-div" id="logo">
        <img src="/img/cato.svg" id="cto">
    </div>
    <div class="auth-div" id="ils-input">
        <div class="ilsinput" id="ils">
            <img src="/img/auth/ils.svg" id="imgils">
            <br><br><br>
        </div>
        <div class="ilsinput" id="input">
            <div id="authop">
                <div class="authops" id="signin">Sign in</div>
                <div class="authops" id="signup">Sign up</div>
            </div>
            <br>
            <div id="signup-div" class="ipt-div">
                <div id="signup1">
                    <p id="role">Choose your role</p><br>
                    <button class="role-btn" id="stu">Student</button>
                    <button class="role-btn" id="edu">Educator</button>
                    <button class="role-btn" id="ins">Administrator</button><br>
                    <p id="alr">Already have an account?</p><a id="haveacc">Sign in instead.</a>
                </div>
                <div id="signup2">
                <img src="/img/back.svg" class="back">
                    <p class="role-title">Sign up as a Student</p><br>
                    <div id="sup-container">
                        <div class="sup-column">
                            <input type="text" placeholder="First name" class="sup-name" id="firstname">
                            <input type="text" placeholder="Last name" class="sup-name" id="lastname">
                        </div>
                        <div class="sup-column">
                            <label for="birthday">Date of Birth</label>
                            <input type="date" class="birthday" name="birthday" placeholder="Date of Birth">
                            <select class="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="sup-column">
                            <input type="text" placeholder="Personal ID (Optional)" class="cardid">
                            <select class="country" name="country">
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Singapore">Singapore</option>
                                <option value="United States">United States</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div><br><br><br>
                    <button class="next"><p id="nextsign">Next</p></button>
                </div>
                <div id="signup3">
                    <img src="/img/back.svg" class="back">
                    <p class="role-title">Sign up as a Student</p><br>
                    <div id="code-title"><p class="enter-code">Ask your Administrator for your institution's code, then enter it below.</p></div>
                    <div id="code-input">
                        <input type="text" placeholder="Code" class="instance-code">
                    <hr></div>
                    <div id="sup-sens-container">
                        <div id="sup-sens">
                                <select class="occupation-type" name="occupation-type">
                                    <option value="0">- Occupation Type -</option>
                                    <option value="1">Medical and Healthcare</option>
                                    <option value="2">Political, Law, and Government</option>
                                    <option value="3">Education and Teaching</option>
                                    <option value="4">Social and Community Service</option>
                                    <option value="5">Engineering and Technical</option>
                                    <option value="6">Business, Finance, and Management</option>
                                    <option value="7">Science and Research</option>
                                    <option value="8">Natural Resources and Agriculture</option>
                                    <option value="9">Media and Entertainment</option>
                                    <option value="10">Arts and Culture</option>
                                    <option value="11">Culinary Arts</option>
                                    <option value="12">Sports</option>
                                </select>
                                <input type="text" placeholder="Job Title" class="job" id="job-title">
                            <input type="text" placeholder="Email address" class="sup-email">
                            <div id="pass-column">
                                <input type="password" placeholder="Password (min.10)" class="sup-pass" id="main-pass">
                                <input type="password" placeholder="Confirm password" class="sup-pass" id="repeat-pass">
                            </div>
                            <input type="text" placeholder="Phone number (Optional)" class="phone">
                        </div>
                    </div><br><br>
                    <button class="signup-btn">Sign up</button>
                </div>
                <div id="signup4">
                    <p class="role-title">Sign up as a Student</p><br><br><hr class="verifyhr"><br>
                    <div id="verifyemail">
                        <p style="font-size: 20px;">Just one more step!</p><br><br><br>
                        <div style="width: 500px;">Click the verification link we've sent to :<br><br><div id="emailverify" style="font-weight:bold;">johndoe@address.com</div><br> to verify your email address.</div>
                    </div><br>
                    <hr class="verifyhr">
                </div>
            </div>
            <div id="signin-div" class="ipt-div">
                <p id="glad">Glad to see you again!</p><br>
                <form id="login">
                    <input type="text" class="formbox" id="email" name="email" placeholder="Email address" autocomplete="off"><br>
                    <input type="password" class="formbox" id="pass" name="pass" placeholder="Password" autocomplete="off"><br><br>
                    <input type="checkbox" id="remember" name="remember" value="rem-signin" style="font:small-caption;">
                    <label for="remember">Remember me</label>
                    <a href="https://ecato.my.id/auth/?type=signin" id="forgot">Forgot password?</a><br><br>
                    <input type="button" id="in-button" value="Sign in"><br><br>
                    <p id="new">New on Cato? <a id="newacc">Create a new account.</a></p>
                </form>
            </div>
            <div id="loading">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                <img src="/img/error.svg" id="error">
                <img src="/img/check.svg" id="check">
                <div class="loading-msg">Logging in</div>
            </div>
        </div>
    </div>
</body>
<script src="/js/jquery-3.6.1.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/auth.js"></script>
</html>