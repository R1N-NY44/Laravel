<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>

    <style>
        body {
        background-color:#000;
        }
        #demo {
        width: 692px;
        height: 70px;
        background-color: #333;
        padding: 8px;
        }
        #logo {
        position: relative;
        width: 150px;
        height: 60px;
        background: #90E500 url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/logo_transparent_1.png) no-repeat;
        background-position: 0px 4px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;
        border-bottom: solid #000 10px;
        }
        #logo p {
        font-size:17px;
        margin-top: 0px;
        margin-left: 60px;
        line-height: 58px;
        }

    </style>

</head>
<body>
    <p>tes</p>

    <div id="demo">
        <div id="logo">
            <p>GreenSock</p>
        </div>
    </div>

    <script>
        window.onload = function() {
        var logo = document.getElementById("logo");
        TweenLite.to(logo, 2, {left:"542px", backgroundColor:"black", borderBottomColor:"#90e500", color:"white"});
        }
    </script>
</body>
</html>
