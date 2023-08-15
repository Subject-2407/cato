<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cato.ico">
    <link rel="stylesheet" href="/css/verified.css?v=1.1">
    <title>{{ $title }}</title>
</head>
<body>
    <div id="wrapper">
    <a href="https://ecato.my.id/"><img src="/img/cato.svg" id="logo"></a>
        @if ($title != 'Verification Successful')
        <div id="message" style="font-weight: bold; padding:30px 30px 30px 30px;">
        @else
        <div id="message" style="font-weight: bold;">
        @endif
            @if ($title == 'Verification Successful')
                <p style="color:#FF7A00;">Congratulations !</p>
                <p style="margin-top: 10px; margin-bottom: 10px;">you have completed</p>
                <p style="color:#720E28;">all the steps.</p>
                <img src="/img/verify/verify-illus1.svg" id="illus1">
                <img src="/img/sparkle.svg" id="sparkle1">
            @elseif ($title == 'Already Verified')
                <p style="color:#FF7A00;">Hey there !</p>
                <p style="margin-top: 10px; margin-bottom: 10px;">Your email address is</p>
                <p style="color:#720E28;">already verified.</p>
                <img src="/img/sparkle.svg" id="sparkle1" style="transform: translate(415px,-184px);">
            @elseif ($title == 'Unauthorized')
                <p style="color:#FF7A00;">Are you lost ?</p>
                <p style="margin-top: 10px; margin-bottom: 10px;">You aren't supposed</p>
                <p style="color:#720E28;">to be here..</p>
            @endif            

            
        </div>
        @if ($title == 'Verification Successful')
            <div id="container">
                <div id="message2">
                    <p style="margin-bottom: 5px;">Now it's time</p>
                    <p style="margin-bottom: 5px;">to start your</p>
                    <p style="color:#DA1A3D;">collaboration<p>
                    <img src="/img/verify/verify-illus2.svg" id="illus2">
                    <img src="/img/sparkle.svg" id="sparkle2">
                </div>
                <img src="/img/verify/verify-illus3.svg" id="illus3">
            </div>
        @else
        @endif
        <div id="container2">
            <div id="card">
                <img src="/img/verify/verify-illus4.svg" id="illus4">
            </div>
            @if ($title == 'Already Verified')
            <button type="button" id="started" onclick="window.location.href='https://ecato.my.id/auth'">Open app</button>
            @elseif ($title == 'Unauthorized')
            <button type="button" id="started" onclick="window.location.href='https://ecato.my.id/'">Go back</button>
            @else
            <button type="button" id="started" onclick="window.location.href='https://ecato.my.id/auth'">Get started<img src="/img/sparkle.svg" id="sparkle3"></button>
            @endif
        </div>
        <p style="margin-top: 30px;">© 2023 Cato. All rights reserved.</p>
    </div>
</body>
</html>