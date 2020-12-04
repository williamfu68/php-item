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
        <h3 style = "text-align: center;color:#515a6e">所有客户信息</h3>
        <div id = "hint" style = "display: none">
            <p style = "display: inline-block;margin-left:7px;">已选择 {{$reasult->count()}} 条数据</p>
            <a href="{{url('/deleteAllCustomerInfo')}}">
                <button id = "deleteBtn" style = "display: inline-block;margin-left:15px;" class = "btn btn-danger btn-sm">删除</button>
            </a>
        </div>
        <p></p>
        <table class='table table-bordered table-hover table-md text-center' style = "position:relative">
            <thead class='thead-dark'>
                <tr>
                    <th class = "bg-dark text-light"><button id = "checkAll" class = "btn btn-info btn-sm">全选</button></th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>住址</th>
                    <th>电话号码</th>
                    <th>身份证号码</th>
                    <th>入住时间</th>
                    <th>退房时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reasult as $res)
                <tr>
                    <td>
                        <input id = "checkOne" type="checkbox" class="form-check-input">
                    </td>
                    <td>{{$res->name}}</td>
                    <td>{{$res->sex}}</td>
                    <td>{{$res->age}}</td>
                    <td>{{$res->address}}</td>
                    <td>{{$res->tel}}</td>
                    <td>{{$res->IDNumber}}</td>
                    <td>{{$res->checkInTime}}</td>
                    <td>{{$res->checkOutTime}}</td>
                    <td><a href='{{url("/deleteCustomerInfo?id=$res->id")}}'><button class = "btn btn-outline-danger btn-sm">删除</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reasult->links() }}
        <p>当前是第 {{$reasult->currentPage()}} 页，共 {{$reasult->count()}} 条数据。</p>
</body>
</html>