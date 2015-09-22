<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
            -webkit-transform: skew(-20deg);
            -moz-transform: skew(-20deg);
            -o-transform: skew(-20deg);
        }

        .title {
            font-size: 30px;
        }
        .bigCharecter{
            font-size: 25px;
        }
        .turnAround{
            display: inline-block;
            background: #ffffff;
            border-radius: 8px;

        }
        .turnAround:hover{
            animation: anim 2s linear;
            -webkit-animation: anim 2s linear;
            -moz-animation: anim 2s linear;
            -o-animation: anim 2s linear;
            background: #ffffff;
        }
        .circle {
            width: 20vh;
            height: 20vh;
            background: #ffffff;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 100vh;
        }
        .parallelogram {
            width: 150px;
            height: 100px;
            background: rgba(149, 190, 255, 0.95);
            -webkit-transform: skew(20deg);
            -moz-transform: skew(20deg);
            -o-transform: skew(20deg);
        }

        @keyframes anim{
            0%{
                -webkit-transform: rotate(0deg) ;
                -moz-transform: rotate(0deg) ;
                -o-transform: rotate(0deg) ;
            }
            100%{
                -webkit-transform: rotate(360deg) ;
                -moz-transform: rotate(360deg) ;
                -o-transform: rotate(360deg) ;
            }
        }
        @-webkit-keyframes anim{
            0%{
                -webkit-transform: rotate(0deg) ;
                -moz-transform: rotate(0deg) ;
                -o-transform: rotate(0deg) ;
            }
            100%{
                -webkit-transform: rotate(360deg) ;
                -moz-transform: rotate(360deg) ;
                -o-transform: rotate(360deg) ;
            }
        }
        @-moz-keyframes anim{
            0%{
                -webkit-transform: rotate(0deg) ;
                -moz-transform: rotate(0deg) ;
                -o-transform: rotate(0deg) ;
            }
            100%{
                -webkit-transform: rotate(360deg) ;
                -moz-transform: rotate(360deg) ;
                -o-transform: rotate(360deg) ;
            }
        }
        @-o-keyframes anim{
            0%{
                -webkit-transform: rotate(0deg) ;
                -moz-transform: rotate(0deg) ;
                -o-transform: rotate(0deg) ;
            }
            100%{
                -webkit-transform: rotate(360deg) ;
                -moz-transform: rotate(360deg) ;
                -o-transform: rotate(360deg) ;
            }
        }
        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -100px;
        }
        .under{
            position:fixed;
            top:65%;
        }
        .top{
            position:fixed;
            top:40%;
            left:43%;
        }
    </style>
</head>
<body bgcolor="#ffcf8b">

<div class="container">
    <div class="circle centered"  id="screen_circle">
        <div class="parallelogram centered" id="square_pig">

        </div>
        <div class="top">
            @yield('Content')
        </div>
        <div class="centered under">
            @yield('under_square')
        </div>
    </div>
</div>
<script>
    var w = window.screen.availWidth;
    var h = window.screen.availHeight;
    if(w > h) {
        document.getElementById("screen_circle").style.width = 100 +"vh";
        document.getElementById("screen_circle").style.height = 100 +"vh";
        document.getElementById("screen_circle").style.marginLeft = -50 + "vh";
        document.getElementById("screen_circle").style.marginTop = -50 + "vh";
        document.getElementById("square_pig").style.width = 45 + "vh";
        document.getElementById("square_pig").style.height = 23 + "vh";
        document.getElementById("square_pig").style.marginLeft = -20 + "vh";
        document.getElementById("square_pig").style.marginTop = -15 + "vh";
    }
    else{
        document.getElementById("screen_circle").style.width = 100 +"vw";
        document.getElementById("screen_circle").style.height = 100 +"vw";
        document.getElementById("screen_circle").style.marginLeft = -50 + "vw";
        document.getElementById("screen_circle").style.marginTop = -50 + "vw";
        document.getElementById("square_pig").style.width = 45 + "vw";
        document.getElementById("square_pig").style.height = 23 + "vw";
        document.getElementById("square_pig").style.marginLeft = -20 + "vw";
        document.getElementById("square_pig").style.marginTop = -15 + "vw";
    }

</script>
</body>
</html>