<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/style2.css">
    <title>Cato | Incubator Monitor</title>
</head>
<body> 
    <div id="loader" class="center"></div>
    <div class="loading">
    </div>
    <div class="page1">
        <div class="login">
            <h1>Login</h1>
            <hr>
            <p class="login-text-atas">Cato Incubator Monitor</p>
            <p class="login-text-bawah">SMK N 2 Klaten</p>
            <div class="form-input">
                <label class="ipt-txt">Username</label>
                <input class="ipt" type="text" id="user-ipt">
                <label class="ipt-txt">Password</label>
                <input class="ipt" type="password" id="pass-ipt">  
            </div><br>
            <button class="login-button" onclick="loginButton()" id="signin" type="button">Login</button>
            <p class="login-info">&nbsp;</p>
            <p class="copyright">Copyright © 2023 Cato.</p>
        </div>
    </div>
    <div class="monitor-wrapper">
        <div class="title-box">
            <div class="title-section">
                <h1>Cato Incubator Monitor</h1>
                <h2>SMK N 2 Klaten</h2>
            </div>
            <div class="loading-section">
                <div id="data-load"></div>
                <div id="load-text">Updating data ...</div>
            </div>
        </div>
        <div class="monitoring-container">
            <div class="component-box" id="monitor-box">
                <div id="monitor-menu">
                    <div class="monitor-box" id="top-monitor">
                        <div class="power-time" id="time">
                            <div id="clock">00:00</div>
                            <div id="date">Weekday, 32 Decembruary 2000</div>
                        </div>
                        <div class="power-time" id="power">
                            <img src="/img/power.svg" alt="power" style="width: 55px; height: auto;">
                        </div>
                    </div>
                    <br>
                    <div class="monitor-card">
                        <div class="monitor-detail" id="timeleft">
                            Estimated <br> Hatching Time
                            <div id="sisawaktu">0</div>
                            Day(s)
                        </div>
                        <div class="monitor-detail" id="temperature">
                            Incubator <br>Temperature
                            <div id="suhu">24°</div>
                            Celcius
                        </div>
                        <div class="monitor-detail" id="daystotal">
                            Incubator <br>Humidty
                            <div id="totalwaktu">5</div>
                            Percent
                        </div>
                    </div>
                    <br>
                    <button id="start-incubator">Start</button>
                </div>
            </div>
            <div class="component-box" id="control-box">
                <div id="control-menu">
                    <h2>Control Menu</h2>
                    <br>
                    <div id="manual-control">
                        <div class="controls" id="comp-kipas">
                            <div class="components">
                                <img src="/img/kipas.svg" alt="kipas">
                                <h2 class="component-name">Fan</h2>
                            </div>
                            <div class="toggle">
                                <button class="comp-toggle" id="kipas-on">On</button>
                                <button class="comp-toggle" id="kipas-off">Off</button>
                            </div>
                        </div>
                        <br>
                        <div class="controls" id="comp-motor">
                            <div class="components">
                                <img src="/img/motor.svg" alt="motor" style="height: 40px">
                                <h2 class="component-name">Motor</h2>
                            </div>
                            <div class="toggle">
                                <button class="comp-toggle" id="motor-on">On</button>
                                <button class="comp-toggle" id="motor-off">Off</button>
                            </div>
                        </div>
                        <br>
                        <div class="controls" id="comp-lampu">
                            <div class="components">
                                <img src="/img/lampu.svg" alt="lampu">
                                <h2 class="component-name">Lamp</h2>
                            </div>
                            <div class="toggle">
                                <button class="comp-toggle" id="lampu-on">On</button>
                                <button class="comp-toggle" id="lampu-off">Off</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="toggle-mode">
                        <h2>Mode</h2>
                        <br>
                        <div class="toggle">
                            <button class="mode-toggle" id="auto-mode">Auto</button>
                            <button class="mode-toggle" id="manual-mode">Manual</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p id="copyright-text">Copyright © 2023 Cato.</p>
        </div>
    </div>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="https://ecato.my.id/js/app.js"></script>
    <script src="/js/incubator.js"></script>
</body>
</html>