<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/cato.ico">
    <title>Cato | Error</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Nacelle;
            font-size: 18px;
        }

        html, body{
            height: 100%;
        }
        @font-face {
            font-family: Nacelle;
            src: url("/fonts/Nacelle-Regular.ttf");
        }
        @font-face {
            font-family: Nacelle;
            src: url("/fonts/Nacelle-Bold.ttf");
            font-weight: bold;
        }
        #wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        #container{
            display: flex;
            gap: 20px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 1280px;
            height: 720px;
        }
        #title{
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="container">
            <img src="/img/cato.svg">
            <div id="message" style="text-align: center;">
                <p id="title">503.</p>
                <p id="desc">Kosek tak benakke delit</p>
            </div>
        </div>
    </div>
</body>
</html>