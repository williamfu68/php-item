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
        <h3 style = "text-align: center;color:#515a6e">所有空房信息</h3>
        <p></p>
        <table class='table table-bordered table-hover table-md text-center'>
            <thead class='thead-dark'>
                <tr>
                    <th>序号</th>
                    <th>房间类型</th>
                    <th>价格</th>
                    <th>房间号</th>
                    <th>状态</th>
                    <th>描述</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reasult as $res)
                <tr>
                    <td>{{$res->id}}</td>
                    <td>{{$res->roomType}}</td>
                    <td>{{$res->price}}</td>
                    <td>{{$res->roomID}}</td>
                    <td>{{$res->status}}</td>
                    <td>{{$res->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table> 
        
        {{ $reasult->links() }}
        <p>当前是第 {{$reasult->currentPage()}} 页，共 {{$reasult->count()}} 条数据。</p>
        <script>
            
        </script>
</body>
</html>