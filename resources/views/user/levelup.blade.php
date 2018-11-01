<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://lib.baomitu.com/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://lib.baomitu.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link href="https://fonts.loli.net/css?family=Spicy+Rice" rel="stylesheet">
      
      <style>

          .modal-body{
              padding-top:55px;
              padding-left:35px;
              padding-right:35px;
          }
          .progress{
              height:40px;
          }
          .progress-bar{
              padding: 10px;
              text-align:left;
              font-family: 'Spicy Rice', cursive
          }
          .progress-bar span{
              font-size:2em;
              font-weight:200;
       
          }
          .inc-img{
              height:24px;
              margin-top:-5px;
              margin-right:2px;
          }
          #myModal{
              background-color:#3F3F3F;
          }          
          .level-title{             
              
              font-family: 'Spicy Rice', cursive
              font-size:7em;
              text-align:center;
              font-weight:500;
              text-transform: uppercase;
              background: linear-gradient(to top, #5cb85c 0%, #FFFF00 100%);
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;
               -webkit-text-stroke-width: 3px;
               -webkit-text-stroke-color: #4ba74b;
              animation-delay: 2.7s;
              
          }
          
          .level-change{
            
              color:#777;
              font-size:3em;
              text-align:center;
              font-weight:500;  
              font-family: 'Spicy Rice', cursive
              
          }
          .added{
              font-size:1.5em;
              width:32%;
              display: inline-block;
              text-align: center;
              color:#777;
          }
          #coin-inc{
              animation-delay: 0.5s;
          }
          #vote-inc{
              animation-delay: 1s;
          }
          #exp-inc{
              animation-delay: 1.5s;
          }
          .levelup1 {
              width: 0;
              animation: pre-up 3s ease-in-out forwards;
            } 
            @keyframes pre-up {
              0% {
                width: {{$preRatio}}%;
              }
              30% {
                width: 100%;
                  background-color: #5cb85c;
              }
              50% {
                width: 100%;
                  background-color: #FFFF66;
                 
              }
              50.1% {
                width: 0%;
              }
              53% {
                background-color: #FFFF00;
              }
                
              to {
                width: {{$postRatio}}%;
              }
            } 


          
.bg-change {
  -webkit-animation: neon1 1.5s ease-in-out infinite alternate;
  -moz-animation: neon1 1.5s ease-in-out infinite alternate;
  animation: bg-color 1s ease-in-out alternate;
}
@keyframes bg-color {
  from {
    background-color: #5cb85c;
  }
    
  50% {
    background-color: #FFD700;
  }
  to {
    background-color: #5cb85c;
  }
}

      </style>
  </head>

  <body>


    <div class="container">
        
        

      <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
          <canvas id="c"></canvas>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              

            <div class="modal-body">
               
                
                <div id="level-title" class="level-title bounceIn animated delay-3s">LEVEL UP!</div>
                <div class="level-change">Level {{$preLevel}}</div>
                <br>
                <div id="coin-inc" class="added fadeIn animated"><img class="inc-img" src="{{ \Clockos\Test::cdn('/img/coin.svg')}}">&nbsp;{{trans('app.stock')}}   {{$stockInc}}&nbsp;<img class="inc-img" src="{{ \Clockos\Test::cdn('/img/up.svg')}}"></div>
                <div id="vote-inc" class="added fadeIn animated"><img class="inc-img" src="{{ \Clockos\Test::cdn('/img/ticket.svg')}}">&nbsp;{{trans('app.vote')}}   {{$voteInc}}&nbsp;<img class="inc-img" src="{{ \Clockos\Test::cdn('/img/up.svg')}}"></div>
                <div id="exp-inc" class="added fadeIn animated"><img class="inc-img" src="{{ \Clockos\Test::cdn('/img/book.svg')}}">&nbsp;{{trans('app.exp')}}   {{$expInc}}&nbsp;<img class="inc-img" src="{{ \Clockos\Test::cdn('/img/up.svg')}}"></div>
                <br><br>
              <div class="progress" id="exp-full-bar">
                  <div class="progress-bar progress-bar-success" id="exp-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$preRatio}}%">
                                    <span id="exp-value">{{$currentExp}}</span><span id="min-exp">/{{$preLevelExp}}</span>
                  </div>
                </div>



            </div>
          </div>
        </div>
      </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://lib.baomitu.com/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="https://lib.baomitu.com/countup.js/1.9.3/countUp.min.js"></script>
      <script>
        $(document).ready(function(){
            
            $('#myModal').modal('show')
    
            
            setTimeout(function(){ 
                $('#exp-bar').addClass('levelup1');
                
                var options = {
                    useEasing : false,
                    useGrouping : false,
                    separator : "'",
                    decimal : '.',
                    prefix : '',
                    suffix : ''
                };
                var demo = new CountUp("exp-value", {{$currentExp}}, {{$preLevelExp}}, 0, 1, options);
                demo.start(function() {
                    
                });
                
            }, 1700);
            

            
            setTimeout(function(){    

                $("#min-exp").text("/{{$postLevelExp}}");



                var options = {
                    useEasing : false,
                    useGrouping : false,
                    separator : "'",
                    decimal : '.',
                    prefix : '',
                    suffix : ''
                };
                
                var demo = new CountUp("exp-value", 0, {{$finishExp}}, 0, 1.5, options);

                demo.start(function() {

                    $(".level-change").addClass("animated flipOutY");

                    $(".level-change").on('animationend webkitAnimationEnd', function(){
                        
                         $(".level-change").hide();

                         $(".level-title").after('<div class="level-change animated flipInY">Level {{$postLevel}}</div>');

                    });

                });
                
            }, 3200);


        
        });
          
          
          

      </script>

  </body>
</html>
