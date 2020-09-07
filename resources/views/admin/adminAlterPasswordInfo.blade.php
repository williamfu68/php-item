<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>修改成功!</p>
    <span></span>
    <script>
        var time = 5;
        var span = document.querySelector('span');
        countDown();
        setInterval(countDown,1000);
        function countDown() {
            if(time == 0) {
                window.location.href = '/login';
            } else {
                span.innerHTML = '页面将在 <strong>' + time + '</strong> 秒后自动跳转！';
                time--;
            }
        }
    </script>
</body>
</html>