const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

var countDown = new Date('Apr 10, 2020 10:00:00').getTime();
    var x = setInterval(function() {

      var now = new Date().getTime();
         var distance = countDown - now;

      if (Math.round(distance / (day)) == 1) {
          document.getElementById('days').innerHTML = "Defending Tomorrow, please wish me luck.";
      }else if(Math.round(distance / (day)) === 0){
          document.getElementById('days').innerHTML = "Defending today. Wish me luck.";   
      }
      else if(Math.round(distance / (day)) < 0 && Math.floor(distance / (day))> -30){
          document.getElementById('days').innerHTML = "Defended my thesis. Ask me how it went";   
      }
      else if(Math.round(distance / (day)) <= -30){
          document.getElementById('days').innerHTML = "Working for NXP Semiconductor (Ex-FMC).";   
      }
      else {
          document.getElementById('days').innerHTML = Math.round(distance / (day))+" "+"days to graduate";      
      }
              
    }, second);
