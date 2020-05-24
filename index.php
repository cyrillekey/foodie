<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comming soon</title>
    <style>
        *{
            margin: 0;
        }
        body,html{
            height: 100%;
        }
        .bgimg{
            background-image:url('public/img/product_pic31.jpg');
            height: 100%;
            background-position: center;
            position: relative;
            color: black;
            font-family:'Courier New', Courier, monospace;
            font-size:25px;
        }
        .topleft{
            position: absolute;
            top:0;
            left:16px;
        }
        .bottomleft{
            position:absolute;
            bottom: 0;
            left:16;
        }
        .middle{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
        }
        hr{
            margin: auto;
            width: 40%;
        }
        #demo{
            font-weight: bold;
        }
    </style>
</head>

<body>
<script>
    var countDownDAte=new Date("may 24,2020 22:20:00");
    var x=setInterval(
        function(){
            var now=new Date().getTime();
            var distance=countDownDAte-now;
            var days=Math.floor(distance/(1000*60*60*24));
            var hours=Math.floor((distance%(1000*60*60*24))/(1000*60*60));
            var minutes=Math.floor((distance%(1000*60*60))/(1000*60));
            var seconds=Math.floor((distance%(1000*60))/1000);
            document.getElementById("demo").innerHTML=days+"d"+hours+"h"+minutes+"m"+seconds+"s";
            if(distance<0){
                clearInterval(x);
                window.location.href="public/index.php";
            }
        },1000
    );
</script>
    <div class="bgimg">
        <div class="topleft">
	<p>Foodie</p>
        </div>
        <div class="middle">
        <h1>COMING SOON</h1>
        <hr>
        
        <p id="demo">35 DAYS</p>
        </div>
        <div class="bottomleft">By cyrille</div>
    </div>
</body>
</html>