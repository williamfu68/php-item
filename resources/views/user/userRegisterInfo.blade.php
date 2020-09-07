<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>酒店信息管理系统 - 注册成功</title>
    <link rel="shortcut icon" href=" /storage/img/favicon.ico" />
    <style>
        body{
            background-color: #f0f0f0;
        }
    </style>
</head>
</head>
<body>
    <h4>恭喜您，前台身份注册成功！</h4>
    <label>用户名：{{session('user')}}</label>
    <p>密码：{{session('pwd')}}</p>
    <h4>请牢记！</h4>
    <p id = "hint"></p>
    <script>
        var time = 5;
        var hint = document.querySelector('#hint');
        countDown();
        setInterval(countDown,1000);
        function countDown() {
            if(time == 0) {
                window.location.href = '/login';
            } else {
                hint.innerHTML = '页面将在 <strong>' + time + '</strong> 秒后自动跳转！';
                time--;
            }
        }
    </script>
</body>
</html>