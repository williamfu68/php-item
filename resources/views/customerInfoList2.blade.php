<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        body{
            margin:0;
            padding:0 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
        <br>
        <h3 style = "text-align: center;color:#515a6e">客户信息查询结果</h3>
        <p></p>
        <table class='table table-bordered table-hover table-md text-center'>
            <thead class='thead-dark'>
                <tr>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>住址</th>
                    <th>电话号码</th>
                    <th>身份证号码</th>
                    <th>入住时间</th>
                    <th>退房时间</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reasult as $res)
                <tr>
                    <td>{{$res->name}}</td>
                    <td>{{$res->sex}}</td>
                    <td>{{$res->age}}</td>
                    <td>{{$res->address}}</td>
                    <td>{{$res->tel}}</td>
                    <td>{{$res->IDNumber}}</td>
                    <td>{{$res->checkInTime}}</td>
                    <td>{{$res->checkOutTime}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>