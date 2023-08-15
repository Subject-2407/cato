document.onreadystatechange = function () {
    if (document.readyState == "complete") {
      $("#btnhome").click(function(){
        $('body').scrollTo(500);
      })
      let body = [{"height":"auto","transition-property":"all","transition-duration": "1s", "max-height": "200px", "overflow":"visible", "margin": "20px 5px 0px 5px"},{"height":"auto","transition-property":"all","transition-duration": "1s","max-height": "0px","overflow":"hidden","margin":"0"}];
      let btn = [{"transform": "rotate(45deg)"},{"transform": "rotate(0deg)"}]
      $("#what-btn").val("hide");
      $("#what-btn").click(function(){
        if($("#what-btn").val() == "hide"){
          $("#what-btn").val("expand");
          $("#what-btn").css(btn[0]);
          $("#what").css(body[0]);
        } else {
          $("#what-btn").val("hide");
          $("#what-btn").css(btn[1]);
          $("#what").css(body[1]);
        }
      });
      $("#who-btn").val("hide");
      $("#who-btn").click(function(){
        if($("#who-btn").val() == "hide"){
          $("#who-btn").val("expand");
          $("#who-btn").css(btn[0]);
          $("#who").css(body[0]);
        } else {
          $("#who-btn").val("hide");
          $("#who-btn").css(btn[1]);
          $("#who").css(body[1]);
        }
      });
      $("#how-btn").val("hide");
      $("#how-btn").click(function(){
        if($("#how-btn").val() == "hide"){
          $("#how-btn").val("expand");
          $("#how-btn").css(btn[0]);
          $("#how").css(body[0]);
        } else {
          $("#how-btn").val("hide");
          $("#how-btn").css(btn[1]);
          $("#how").css(body[1]);
        }
      });
      $("#how2-btn").val("hide");
      $("#how2-btn").click(function(){
        if($("#how2-btn").val() == "hide"){
          $("#how2-btn").val("expand");
          $("#how2-btn").css(btn[0]);
          $("#how2").css(body[0]);
        } else {
          $("#how2-btn").val("hide");
          $("#how2-btn").css(btn[1]);
          $("#how2").css(body[1]);
        }
      });
      $("#what2-btn").val("hide");
      $("#what2-btn").click(function(){
        if($("#what2-btn").val() == "hide"){
          $("#what2-btn").val("expand");
          $("#what2-btn").css(btn[0]);
          $("#what2").css(body[0]);
        } else {
          $("#what2-btn").val("hide");
          $("#what2-btn").css(btn[1]);
          $("#what2").css(body[1]);
        }
      });
    }
  }
  
  