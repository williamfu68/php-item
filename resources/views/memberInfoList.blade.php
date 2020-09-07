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
        <p></p>
        <h3 style = "text-align: center;color:#515a6e">所有会员信息</h3>
        <p></p>
        <table class='table table-bordered table-hover table-md text-center'>
            <thead class='thead-dark'>
                <tr>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>住址</th>
                    <th>电子邮件</th>
                    <th>电话号码</th>
                    <th>身份证号码</th>
                    <th>注册时间</th>
                    <th>截止时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reasult as $res)
                <tr>
                    <td>{{$res->name}}</td>
                    <td>{{$res->sex}}</td>
                    <td>{{$res->age}}</td>
                    <td>{{$res->address}}</td>
                    <td>{{$res->email}}</td>
                    <td>{{$res->tel}}</td>
                    <td>{{$res->IDNumber}}</td>
                    <td>{{$res->registrationTime}}</td>
                    <td>{{$res->deadline}}</td>
                    <td><a href='{{url("/deleteMemberInfo?id=$res->id")}}'><button class = "btn btn-outline-danger btn-sm">删除会员</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reasult->links() }}
        <p>当前是第 {{$reasult->currentPage()}} 页，共 {{$reasult->count()}} 条数据。</p>
</body>
</html>