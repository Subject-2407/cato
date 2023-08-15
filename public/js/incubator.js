var suhu;
var motor;
var kipas;
var lampu;
var mode;
var sistem;
var kelembapan;
var sisa_hari;
var lastEstimation = 0;
var penetasan;
var request = 0;
var dayctd;
var loggedIn = 0;

var dateInterval = 1000;
var requestInterval = 2000;
var startDate;

function everySec(){
  const timeNow = new Date();

  let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
  let today = weekDay[timeNow.getDay()];
  let currentDate = timeNow.getDate();
  let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  let currentMonth = months[timeNow.getMonth()];
  let year = timeNow.getFullYear();
  let hoursOfDay = timeNow.getHours();
  let minutes = timeNow.getMinutes();

  hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
  minutes = minutes < 10 ? "0" + minutes : minutes;

  let time = hoursOfDay + ":" + minutes;

  $("#clock").text(time);
  $("#date").text(today + ", " + currentDate + " " + currentMonth + " " + year);

}

function getData(){
  console.log("[HTTP] Fetching data...");
  $.ajax({
    url:"https://ecato.my.id/api/incubator/komponen",
    type:"GET",
    async:true,
    dataType:"json",
    contentType:"application/json; charset=utf-8",
    success: function(data){
        $("#loader").delay(1000).fadeOut(400);
        $(".loading").delay(1000).fadeOut(400);
        suhu = data.suhu;
        kelembapan = data.kelembapan;
        motor = data.motor;
        kipas = data.kipas;
        lampu = data.lampu;
        mode = data.mode;
        sistem = data.sistem;
        penetasan = data.penetasan;
        sisa_hari = data.sisa_hari;
        console.log("[HTTP] Fetching data success.");
        console.log(data[0]);
        $("#suhu").text(suhu + "°");
        $("#totalwaktu").text(kelembapan);
        if(sistem == 1){
          updateButton("sistem",1);
        } else if(sistem == 2){
          if(sisa_hari > 0){
            startDate = new Date(penetasan);
            lastEstimation = sisa_hari;
            dayCountdown("enable");
            console.log("DAY ESTIMATION SUCCESS!");
          }
          updateButton("sistem",2);
          $("#sisawaktu").text(sisa_hari);
          if(motor > 0){
            if(motor == 1){
              updateButton("motor",1);
            } else if(motor == 2){
              updateButton("motor",2);
            }
          }
          if(kipas > 0){
            if(kipas == 1){
              updateButton("kipas",1);
            } else if(kipas == 2){
              updateButton("kipas",2);
            }
          }
          if(lampu > 0){
            if(lampu == 1){
              updateButton("lampu",1);
            } else if(lampu == 2){
              updateButton("lampu",2);
            }
          }
          if(mode > 0){
            if(mode == 1){
              updateButton("mode",1);
            } else if(mode == 2){
              updateButton("mode",2);
            }
          }  
        }
    },
    error: function(){
      console.log("[HTTP] Fetching data failed.");
    }
  });
}

function updateButton($button,$value){
  switch($button){
    case "sistem":
      switch($value){
        case 1:
            $("#start-incubator").css("background-color","#D92332");
            $("#start-incubator").hover(
              function(){
              $(this).css("cursor", "pointer");},);
            $("#power").hover(
              function(){
              $(this).css("cursor", "default");},);
            $("#power").css("filter","grayscale(100%)");
            $(".comp-toggle").css("background-color","#C7C4B3");
            $(".mode-toggle").css("background-color","#C7C4B3");
            $(".comp-toggle").hover(
             function(){
              $(this).css("cursor", "default");});
            $(".mode-toggle").hover(
            function(){
              $(this).css("cursor", "default");});
          break;
        case 2:
            $("#start-incubator").css("background-color","#C7C4B3");
            $("#power").css("filter","grayscale(0%)");
            $("#start-incubator").hover(
              function(){
              $(this).css("cursor", "default");},);
            $("#power").hover(
              function(){
              $(this).css("cursor", "pointer");},);
            $(".comp-toggle").hover(
              function(){
              $(this).css("cursor", "pointer");});
            $(".mode-toggle").hover(
              function(){
              $(this).css("cursor", "pointer");});
          break;
      }
      break;
    case "kipas":
      switch($value){
        case 1:
          $("#kipas-on").css("background-color","#D92332");
          $("#kipas-off").css("background-color","#C7C4B3");
          break;
        case 2:
          $("#kipas-off").css("background-color","#D92332");
          $("#kipas-on").css("background-color","#C7C4B3");
          break;
      }
      break;
    case "motor":
      switch($value){
        case 1:
          $("#motor-on").css("background-color","#D92332");
          $("#motor-off").css("background-color","#C7C4B3");
          break;
        case 2:
          $("#motor-off").css("background-color","#D92332");
          $("#motor-on").css("background-color","#C7C4B3");
          break;
      }
      break;
    case "lampu":
      switch($value){
        case 1:
          $("#lampu-on").css("background-color","#D92332");
          $("#lampu-off").css("background-color","#C7C4B3");
          break;
        case 2:
          $("#lampu-off").css("background-color","#D92332");
          $("#lampu-on").css("background-color","#C7C4B3");
          break;
      }
      break;
    case "mode":
      switch($value){
        case 1:
          $("#auto-mode").css("background-color","#D92332");
          $("#manual-mode").css("background-color","#C7C4B3");
          $(".comp-toggle").hover(
            function(){
             $(this).css("cursor", "default");});
          break;
        case 2:
          $("#manual-mode").css("background-color","#D92332");
          $("#auto-mode").css("background-color","#C7C4B3");
          $(".comp-toggle").hover(
            function(){
             $(this).css("cursor", "pointer");});
          break;
      }
      break;
  }
}

function updateData($fields){
  let $obj = $fields;

  $.ajax({
    type: 'PUT',
    async:true,
    url: 'https://ecato.my.id/api/incubator/komponen',
    contentType: 'application/json',
    data: JSON.stringify($obj),
    beforeSend: function(){
      request = 1;
      $(".loading-section").fadeIn(400);
    },
    success: function(){
      request = 0;
      $(".loading-section").fadeOut(400);
    },
    error: function(){
      console.log("[HTTP] PUT request failed.");
    }
    });
}

function dayCountdown($value){
  switch($value){
    case "enable":
      dayctd = setInterval(function() {
        var now = new Date().getTime();
        var distance = startDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));

        if(lastEstimation != days){
          lastEstimation = days;
          updateData({sisa_hari:lastEstimation});
        }

        if (distance <= 0) {
          clearInterval(dayctd);
          updateData({sisa_hari:-1});
        }
        }, 1000);
      break;
    case "disable":
      clearInterval(dayctd);
      break;
  }
}

document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        $(document).keypress(function(event){
          if(event.keyCode == 13 && loggedIn == 0){
            $(".login-button").click();
          }
        })
        $(".monitor-wrapper").hide();
        $(".loading-section").fadeOut();
        $("#loader").delay(1000).fadeOut(400);
        $(".loading").delay(1000).fadeOut(400);
        $(".page1").delay(1000).fadeIn(400).show();
        $("#start-incubator").click(function(){
          if(request == 0 && sistem == 1){
            var countDown = new Date();
            countDown.setDate(countDown.getDate() + 22);
            startDate = countDown;
            updateData({sistem:2,penetasan:countDown,mode:mode,motor:motor,kipas:kipas,lampu:lampu});
            dayCountdown("enable");
          }
        });
        $("#power").click(function(){
          if(request == 0 && sistem == 2){
            dayCountdown("disable");
            updateData({sistem:1,sisa_hari:-1,penetasan:"0000-00-00 00:00:00"});
            lastEstimation = 24;
          }
        });
        $("#auto-mode").click(function(){
          if(request == 0 && sistem == 2 && mode != 1){
            updateData({mode:1});
          }
        });
        $("#manual-mode").click(function(){
          if(request == 0 && sistem == 2 && mode != 2){
            updateData({mode:2});
          }
        });
        $("#kipas-on").click(function(){
          if(request == 0 && sistem == 2 && mode == 2 && kipas != 1){
            updateData({kipas:1});
          }
        });
        $("#kipas-off").click(function(){
          if(request == 0 && sistem == 2 && mode == 2 && kipas != 2){
            updateData({kipas:2});
          }
        });
        $("#motor-on").click(function(){
          if(request == 0 && sistem == 2 && mode == 2 && motor != 1){
            updateData({motor:1});
          }
        });
        $("#motor-off").click(function(){
          if(request == 0 && sistem == 2 && mode == 2 && motor != 2){
            updateData({motor:2});
          }
        });
        $("#lampu-on").click(function(){
          if(request == 0 && sistem == 2 && mode == 2 && lampu != 1){
            updateData({lampu:1});
          }
        });
        $("#lampu-off").click(function(){
          if(request == 0 && sistem == 2 && mode == 2 && lampu != 2){
            updateData({lampu:2});
          }
        });

        $("#start-incubator").hover(function(){
            if(request == 0 && sistem == 1){
              $("#start-incubator").css("background-color","#db5863");
            } else return false;
        },function(){
          if(request == 0 && sistem == 1){
            $("#start-incubator").css("background-color","#D92332");
          } else return false;
        })

        $("#power").hover(function(){
          if(request == 0 && sistem != 1){
            $("#power").css("filter","grayscale(100%)");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem != 1){
            $("#power").css("filter","grayscale(0%)");
          } else {
            return false;
          }
        });


        $("#kipas-on").hover(function(){
          if(request == 0 && sistem == 2 && mode == 2 && kipas != 1){
            $("#kipas-on").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode == 2 && kipas != 1){
            $("#kipas-on").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });
        $("#kipas-off").hover(function(){
          if(request == 0 && sistem == 2 && mode == 2 && kipas != 2){
            $("#kipas-off").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode == 2 && kipas != 2){
            $("#kipas-off").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });
        
        $("#motor-on").hover(function(){
          if(request == 0 && sistem == 2 && mode == 2 && motor != 1){
            $("#motor-on").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode == 2 && motor != 1){
            $("#motor-on").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });
        $("#motor-off").hover(function(){
          if(request == 0 && sistem == 2 && mode == 2 && motor != 2){
            $("#motor-off").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode == 2 && motor != 2){
            $("#motor-off").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });

        $("#lampu-on").hover(function(){
          if(request == 0 && sistem == 2 && mode == 2 && lampu != 1){
            $("#lampu-on").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode == 2 && lampu != 1){
            $("#lampu-on").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });
        $("#lampu-off").hover(function(){
          if(request == 0 && sistem == 2 && mode == 2 && lampu != 2){
            $("#lampu-off").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode == 2 && lampu != 2){
            $("#lampu-off").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });

        $("#auto-mode").hover(function(){
          if(request == 0 && sistem == 2 && mode != 1){
            $("#auto-mode").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode != 1){
            $("#auto-mode").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });
        $("#manual-mode").hover(function(){
          if(request == 0 && sistem == 2 && mode != 2){
            $("#manual-mode").css("background-color","#db5863");
          } else {
            return false;
          }
        },function(){
          if(request == 0 && sistem == 2 && mode != 2){
            $("#manual-mode").css("background-color","#C7C4B3");
          } else {
            return false;
          }
        });
    };
};

function startWebsocket(){
  console.log("[WEBSOCKETS] Ready to receive WebSocket events.");
  Echo.channel('Component')
            .listen('Suhu', (e) => {
                  console.log("[WEBSOCKETS] {#Component} Suhu Event: " + e.suhu);
                  $("#suhu").text(e.suhu + "°");
                  suhu = e.suhu;
            })
            .listen('Kelembapan', (e) => {
                  console.log("[WEBSOCKETS] {#Component} Kelembapan Event: " + e.kelembapan);
                  $("#totalwaktu").text(e.kelembapan);
                  kelembapan = e.kelembapan;
            })
            .listen('SisaHari', (e) => {
                console.log("[WEBSOCKETS] {#Component} SisaHari Event: " + e.sisa_hari);
                $("#sisawaktu").text(e.sisa_hari);
                sisa_hari = e.sisa_hari;
            })
            .listen('Penetasan', (e) => {
              console.log("[WEBSOCKETS] {#Component} Penetasan Event: " + e.penetasan);
              penetasan = e.penetasan;
          })
            .listen('Motor', (e) => {
              console.log("[WEBSOCKETS] {#Component} Motor Event: " + e.motor);
              motor = e.motor;
              if(sistem == 2){
                if(motor == 1){
                  updateButton("motor",1);
                } else if(motor == 2){
                  updateButton("motor",2);
                }
              }
            })
            .listen('Kipas', (e) => {
              console.log("[WEBSOCKETS] {#Component} Kipas Event: " + e.kipas);
              kipas = e.kipas;
              if(sistem == 2){
                if(kipas == 1){
                  updateButton("kipas",1);
                } else if(kipas == 2){
                  updateButton("kipas",2);
                }
              }
            })
            .listen('Lampu', (e) => {
              console.log("[WEBSOCKETS] {#Component} Lampu Event: " + e.lampu);
              lampu = e.lampu;
              if(sistem == 2){
                if(lampu == 1){
                  updateButton("lampu",1);
                } else if(lampu == 2){
                  updateButton("lampu",2);
                }
              }
            })
            .listen('Mode', (e) => {
              console.log("[WEBSOCKETS] {#Component} Mode Event: " + e.mode);
              mode = e.mode;
              if(sistem == 2){
                if(mode == 1){
                  updateButton("mode",1);
                } else if(mode == 2){
                  updateButton("mode",2);
                }
              }
            })
            .listen('Sistem', (e) => {
              console.log("[WEBSOCKETS] {#Component} Sistem Event: " + e.sistem);
              sistem = e.sistem;
              if(sistem == 1){
                updateButton("sistem",1);
              } else if(sistem == 2){
                updateButton("sistem",2);
              }
            })

}

function loginButton(){
  let userInput = document.querySelector("#user-ipt");
  let passInput = document.querySelector("#pass-ipt");
  let userValue = userInput.value.trim();
  let passValue = passInput.value.trim();

  if(userValue.length == 0 || passValue.length == 0){
    document.querySelector(".login-info").innerHTML = "Please insert username and password!";
    return false;
  } else if(userInput.value == "Bintang" && passInput.value == "12345") {
    loggedIn = 1;
    document.querySelector(".login-info").style.color = "#56C08D"
    document.querySelector(".login-info").innerHTML = "Successfully logged in!";
    getData();
    $("#loader").delay(500).fadeIn(400);
    $(".loading").delay(500).fadeIn(400);
    setTimeout(function() {
      $(".page1").hide();
      $(".monitor-wrapper").show();
      setInterval(everySec, dateInterval);
      everySec();
      startWebsocket();
    }, 1000);
    

    return true;    
  } else {
    document.querySelector(".login-info").innerHTML = "Incorrect username or password!";
    return false;
  }
  
}
