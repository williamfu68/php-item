<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src = "/js/jquery-3.4.1.js"></script>
    <style>
        body{
            margin:0;
            padding:0 10px;
            box-sizing: border-box;
        }
        #hint{
            position: absolute;
            top:25px;
        }
    </style>
    <script>
        $(function() {
            $("#checkAll").on('click',function() {
                if($(this).text() == '全选') {
                    $('#hint').fadeIn();
                    $('tbody>tr #checkOne').prop('checked',true); 
                    $(this).text('取消全选');
                } else {
                    $('#hint').fadeOut();
                    $('tbody>tr #checkOne').prop('checked',false); 
                    $(this).text('全选');
                }           
            })
            $('tbody>tr #checkOne').on('click',function() {
                // console.log($(this).prop('checked'));
                if($(this).prop('checked') == false) {
                    $('#checkAll').text('全选');
                    $('#hint').fadeOut();
                } else if($(this).prop('checked') == true && $(this).parents('tr').siblings().children().eq(0).children('input').prop('checked') == true){
                    $('#checkAll').text('取消全选');
                    $('#hint').fadeIn();
                    console.log(3);
                } else {
                   
                }
            })
        })
    </script>
</head>
<body> 
        <br>
        <h3 style = "text-align: center;color:#515a6e">前台信息管理</h3>
        <p></p>
        <div id = "hint" style = "display: none">
            <p style = "display: inline-block;margin-left:7px;">已选择 {{$reasult->count()}} 条数据</p>
            <a href="{{url('/deleteAllUserInfo')}}">
                <button id = "deleteBtn" style = "display: inline-block;margin-left:15px;" class = "btn btn-danger btn-sm">删除</button>
            </a>
        </div>
        <table class='table table-bordered table-hover table-md text-center'>
            <thead class='thead-dark'>
                <tr>
                    <th class = "bg-dark text-light"><button id = "checkAll" class = "btn btn-info btn-sm">全选</button></th>
                    <th>序号</th>
                    <th>用户名</th>
                    <th>密码</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>电子邮件</th>
                    <th>注册时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reasult as $res)
                <tr>
                    <td>
                        <input id = "checkOne" type="checkbox" class="form-check-input">
                    </td>
                    <td>{{$res->id}}</td>
                    <td>{{$res->userName}}</td>
                    <td>{{decrypt($res->pwd)}}</td>
                    <td>{{$res->sex}}</td>
                    <td>{{$res->age}}</td>
                    <td>{{$res->email}}</td>
                    <td>{{$res->registrationTime}}</td>
                    <td><a href='{{url("/deleteUserInfo?id=$res->id")}}'><button class = "btn btn-outline-danger btn-sm">删除信息</button></a></td>
                @endforeach
            </tbody>
        </table>
        {{ $reasult->links() }}
        <p>当前是第 {{$reasult->currentPage()}} 页，共 {{$reasult->count()}} 条数据。</p>
</body>
</html>