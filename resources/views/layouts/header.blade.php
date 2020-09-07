<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>酒店信息管理系统 - @yield('subTitle')</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Cousine:ital,wght@0,400;0,700;1,400;1,700&display=swap" 
    rel="stylesheet">
    <script src="/js/jquery-3.4.1.js"></script>
    <script src = "/js/bootstrap.js"></script>
    <style>
        html,body{
            width:100%;
            height:100%;
            margin:0;
            padding:0;
        }
        .banner {
            position: absolute;
            top:0;
            width: 100%;
            height: 70px;
            line-height: 70px;
            text-align: center;
            color: whitesmoke;
            background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
        }

        .banner span {
            letter-spacing: 10px;
        }

        .banner h2 {
            letter-spacing: 20px;
        }

        .banner span {
            position: absolute;
            left: 29px;
            font-family: 'Cousine', monospace;
        }

        .banner button {
            position: absolute;
            right: 25px;
            bottom: 16px;
        }

        .banner span {
            position: absolute;
            left: 29px;
            font-family: 'Cousine', monospace;
        }

        p{
            text-align: center;
            position: absolute;
            transform: translateX(-50%);
            top:0;
            left:50%;
    </style>
</head>
<body>
    <div class="banner">
        <span>Brand Logo</span>
        <p><h2>小型酒店信息管理系统</h2></p>
        <button type = "button" class = "btn btn-outline-secondary"><a href = "{{url('/forget')}}" style = "text-decoration: none;color:white">注销</a></button>
    </div>
    @section('main')

    @show

    <script>
        var hint1 = document.querySelector('#hint1');
        setInterval(function() {
            span.style.display = 'none';
        },5000);

    </script>
</body>
</html>