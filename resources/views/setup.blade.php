<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cato.ico">
    <link rel="stylesheet" href="/css/setup.css?v=1.1">
    <title>Cato</title>
</head>
<body>
    <div id="wrapper" style="display: none;">
        <img src="/img/cato.svg" id="logo">
        <img src="/img/setup-illus.svg">
        <p id="userverify" style="font-weight:bold;font-size:30px;"></p>
    </div>
    <div id="wrapper2" style="display: none;">
        <div id="container">
            <div id="box">
                <p style="font-weight: bold; font-size: 28px; width: 160px; line-height:40px;">Set up Your Institution</p>
                <p style="width: 160px; font-size: 18px;">Please enter the details about your institution and upload the logo</p>
            </div>
            <div id="box2">
                <div id="card-container">
                    <div id="card">
                        <div id="avatar-placeholder">
                            INSTITUTION LOGO
                        </div>
                        <label for="image"></label>
                     <input type="file" id="image" name="image" accept="image/*">
                    </div>
                    <button type="button" id="confirm">Confirm</button>
                </div>
                <div id="card2">
                    <label for="ins-name" style="display:block;">Institution Name</label>
                    <input type="text" name="ins-name" id="ins-name">
                    <label for="ins-type" style="display:block;">Institution Type</label>
                    <select id="ins-type">
                        <option value="1">Primary/Elementary School</option>
                        <option value="2">Middle/Junior High School</option>
                        <option value="3">Secondary/High School</option>
                        <option value="4">College/University</option>
                        <option value="5">Vocational/Trade School</option>
                        <option value="6">Graduate/Professional School</option>
                    </select>
                    <label for="country" style="display:block;">Country</label>
                    <select id="country">
                        <option value="Indonesia">Indonesia</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Singapore">Singapore</option>
                        <option value="United States">United States</option>
                        <option value="Other">Other</option>
                    </select>
                    <label for="address" style="display:block;">Address</label>
                    <input type="text" name="address" id="address">
                    <label for="email" style="display:block;">Email Address</label>
                    <input type="text" name="email" id="email">
                    <label for="website" style="display:block;">Website (optional)</label>
                    <input type="text" name="website" id="website">
                </div>
            </div>
            
        </div>
    </div>
</body>
<script src="/js/jquery-3.6.1.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/setup.js"></script>
</html>