<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>酒店信息管理系统 - 管理员</title>
    <link rel="shortcut icon" href=" /storage/img/favicon.ico" />
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <script src="/js/jquery-3.4.1.js"></script>
    <script src = "/js/bootstrap.js"></script>
    <style>
        html,body{
            width:100%;
            height:100%;
            margin:0;
            padding:0;
            scroll-behavior: smooth;
        }
        /* ::-webkit-scrollbar{
            height:20px;
        }
        ::-webkit-scrollbar-track{
            background-color: #f0f0f0;
        }
        ::-webkit-scrollbar-thumb{
            background-color: #2a333d;
        } */
        .banner {
            position:sticky;
            top:0;
            width: 100%;
            height: 70px;
            line-height: 68px;
            text-align: center;
            color: whitesmoke;
            user-select: none;
            background-color:#17233d;
            z-index: 999;
            transition: all .3s;
        }

        .banner #logo {
            position: absolute;
            left: 29px;
            letter-spacing: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .banner button {
            position: absolute;
            right: 25px;
            bottom: 16.5px;
            letter-spacing: 2px;
            border-color: rgb(108, 117, 125);
        }

        .banner #title{
            text-align: center;
            font-size:35px;
            letter-spacing:15px;
        }
        .banner #hint{
            position: absolute;
            left:19%;
            top:0;
            letter-spacing: 3px;
            transition: all .6s;
        }
        .banner #time{
            position: absolute;
            right:15%;
            top:0;
            letter-spacing: 3px;
        }
        .banner #link{
            position: absolute;
            right:8%;
            top:0;
            letter-spacing: 3px;
            color:#ddd;
        }
        .left {
            position: absolute;
            left: 0;
            width: 180px;
            height:100%;
            padding:30px 0 0 0;
            box-sizing: border-box;
            background-color:#2a333d;
            color:whitesmoke;
            text-align: center;
            user-select: none;
            cursor: pointer;
            border-top: 15px solid #f0f0f0;
            border-bottom: 15px solid #f0f0f0;
        }
        
        .left li {
            list-style-type: none;
            min-height: 60px;
            line-height: 60px;
            width:100%;
            color:#adbcdb;
        }

        .left ul{
            margin:0 15px;
            padding:0;
        }
        .left ul li{
            width:100%;
            line-height: 45px;
            min-height: 45px;
            border-bottom:2px solid #2a333d;
            cursor: default;
        }
        
        .left li .fa{
            margin-left:-5px;
        }
        
        .left .fa {
            margin-left: 10px;
        }
        
        .left span {
            margin-left: 10px;
        }
               
        .submenu {
            display: none;
        }
        
        .bg {
            background-color:#404e5c;
        }
        
        .main {
            position:relative;
            background-color: #fff;
            height: 100%;
            border: 15px solid #f0f0f0;
            margin-left:180px;
            color: #515a6e;
            padding:0 15px;
            box-sizing: border-box;
        }
        .main ul{
            list-style: none;
            margin:0;
            padding:0;
        }
        .main div{
            display: none;
        }
        .main>.seventh svg{    
            position: absolute;
            right: 55px;
            top: 107px;
            font-size:15px;
        }
        .backTop {
            position: fixed;
            display: none;
            right: 30px;
            bottom: 14px;
            width: 52px;
            height: 52px;
            padding: 2px;
            box-sizing: border-box;
            z-index: 999;
        }
        #footer {
            position: relative;
            width: 100%;
            left:0;
            bottom: 0;
            height: 80px;
            line-height: 80px;
            background-color: #f0f0f0
        }
        #footer>p{
            margin:0;
        }
    </style>
    <script>
        $(function() {
            $('.left>li').on('click',function() {
                    $index = $(this).index();
                    $(this).children('ul').addClass('bg').slideDown().parent().siblings().children('ul').slideUp();
                    $('.main ul').eq($index).show().siblings().hide();
                })
                
                $('.left ul>li').on('click',function() {
                    $(this).css('backgroundColor',function() {
                        return '#17233d';
                    }).siblings().css('backgroundColor','transparent');
                    var $index = $(this).index();
                    $('.main .first>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                    $('.main .second>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                    $('.main .third>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                    $('.main .fourth>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                    $('.main .fifth>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                    $('.main .sixth>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                    $('.main .seventh>li').eq($index).children('div').show().parent().siblings('li').children('div').hide();
                })
                $('.left li>#closeBtn').on('click',function() {
                    $(this).parent().siblings('li').children('ul').slideUp();
                    $('.left ul>li').css('backgroundColor','transparent');
                    $('.main div').hide();
                    window.scrollTo(0,0);
                })

                $(document).on('scroll',function() {
                    if($(document).scrollTop() >= 70) {
                        $('.backTop').fadeIn();
                    } else {
                        $('.backTop').fadeOut();
                    }
                })
                $('.backTop').on('click',function() {
                    window.scrollTo(0,0);
                })
                var flag = true;
                $('.main>.seventh svg').on('click',function() {
                        if(flag == true) {
                            $(this).hide().siblings('svg').show();
                            $('#pwd').attr('type','text');
                            flag = false;
                        } else {
                            $(this).hide().siblings('svg').show();
                            $('#pwd').attr('type','password');
                            flag = true;
                        }     
                })
            })
    </script>
</head>
<body>

    <div class="banner">
        <p id = "logo">
            <a style = "text-decoration:none;color:#f0f0f0" href = "javascript:void(0);">Brand Logo</a>
        </p>
        <p class = "font-weight-normal text-monospace" id = "title">酒店信息管理系统</p>
        <p class = "font-weight-normal text-monospace" id = "hint">欢迎您，管理员{{session('currentUser')}}</p>
        <p class = "font-weight-normal text-monospace" id = "time"></p>
        <p class = "font-weight-normal text-monospace"><a href="/adminForgetPassword" id = "link">修改密码</a></p>
        <button type = "button" class = "btn btn-outline-danger"><a href = "{{url('/forget')}}" id = "forget" style = "text-decoration: none;color:white">注销</a></button>
    </div>
    
    <ul class="left">
        <li><i class="fa fa-user-circle-o"></i>
            <span>客户信息管理</span>
            <ul class="submenu">
                <li><a href = "/allCustomerInfo" style = "text-decoration: none;color:#adbcdb">所有客户信息</a></li>
                <li>修改客户信息</li>
            </ul>
        </li>
        <li><i class="fa fa-id-card-o"></i>
            <span>会员信息管理</span>
            <ul class="submenu">
                <li><a href='{{url("/allMemberInfo")}}' style = "text-decoration: none;color:#adbcdb">所有会员信息</a></li>
                <li>修改会员信息</li>
            </ul>
        </li>
        <li><i class="fa fa-bed"></i>
            <span>客房信息管理</span>
            <ul class="submenu">
                <li><a href="/allRoomInfo" style = "text-decoration:none;color:#adbcdb">所有客房信息</a></li>
                <li><a href="/queryHousingRoomInfo" style = "text-decoration:none;color:#adbcdb">所有住房信息</a></li>
                <li><a href="/queryEmptyRoomInfo" style = "text-decoration:none;color:#adbcdb">所有空房信息</a></li>
                <li>添加客房信息</li>
                <li>修改客房信息</li>
            </ul>
        </li>
       
        <li><i class="fa fa-file-text-o"></i>
            <span>预订信息管理</span>
            <ul class="submenu">
                <li><a href="/allCustomerBookInfo" style = "text-decoration:none;color:#adbcdb">普通预订信息</a></li>
                <li><a href="/allMemberBookInfo" style = "text-decoration:none;color:#adbcdb">会员预订信息</a></li>
            </ul>
        </li>
        
        <li><i class="fa fa-file-text-o"></i>
            <span>业务记录管理</span>
            <ul class="submenu">
                <li><a href="{{url('/manageBusinessRecord')}}" style = "text-decoration:none;color:#adbcdb;">业务记录管理</a></li>
            </ul>
        </li>

        <li><i class="fa fa-file-text-o"></i>
            <span>前台信息管理</span>
            <ul class="submenu">
                <li><a href='{{url("/queryUserInfo")}}' style = "text-decoration:none;color:#adbcdb;">前台信息管理</a></li>
            </ul>
        </li>

        <li><i class="fa fa-file-text-o"></i>
            <span>账户信息管理</span>
            <ul class="submenu">
                <li><a href='{{url("/queryAdminPersonalInfo")}}' style = "text-decoration:none;color:#adbcdb;">我的账户信息</a></li>
                <li>修改账户信息</li>
            </ul>
        </li>
        

        <li>
            <button id = "closeBtn" class = "btn btn-sm btn-outline-primary">关闭所有</button>
        </li>
    </ul>
    <div class="main">
        <ul class = "first"> 
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">正 在 查 询 . . .</h3>
                    <br>
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">修改客户信息</h3>
                    <form action="{{url('/alterCustomerInfo')}}" autocomplete="off" style = "margin:0 10px;">
                            <label for="name">姓名：</label>
                            <input type="text" class = "form-control form-control-sm" name = "name" id = "name" required>

                            <label for="sex">性别：</label>
                            <input type="text" class = "form-control form-control-sm " name = "sex" id = "sex" required>

                            <label for="age">年龄：</label>
                            <input type="number" class = "form-control form-control-sm " name = "age" id = "age" required>
                            
                            <label for="address">住址：</label>
                            <input type="text" class = "form-control form-control-sm " name = "address" id = "address" required>

                            <label for="tel">电话号码：</label>
                            <input type="number" class = "form-control form-control-sm " name = "tel" id = "tel" required>

                            <label for="IDNumber">身份证号码：</label>
                            <input type="number" class = "form-control form-control-sm" name = "IDNumber" id = "IDNumber" required>

                            <label for="checkInTime">入住时间：</label>
                            <input type="datetime-local" class = "form-control form-control-sm" name = "checkInTime" id = "checkInTime" required>

                            <label for="checkOutTime">退房时间：</label>
                            <input type="datetime-local" class = "form-control form-control-sm" name = "checkOutTime" id = "checkOutTime">
                            <br>
                            <p class = "text-muted" style = "font-size: 13.5px">Tips：添加客户信息时“退房时间”可以为空，后续可通过“更新退房时间”选项修改。</p>
                       <button type = "reset" class = "btn btn-sm btn-outline-danger" style = "position:absolute;left:30%;width:150px;">重置</button>
                       <button type = "submit" class = "btn btn-sm btn-outline-primary" style = "position:absolute;right:30%;width:150px;">修改</button>
                    </form>
                </div>
            </li>
        </ul>
        <ul class = "second">
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">正 在 查 询 . . .</h3>
                    <br>
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">修改会员信息</h3>
                    <form action="{{url('/alterMemberInfo')}}" autocomplete="off" style = "margin:0 10px;">
                            <label for="name">姓名：</label>
                            <input type="text" class = "form-control form-control-sm" name = "name" id = "name" required>

                            <label for="sex">性别：</label>
                            <input type="text" class = "form-control form-control-sm " name = "sex" id = "sex" required>

                            <label for="age">年龄：</label>
                            <input type="number" class = "form-control form-control-sm " name = "age" id = "age" required>
                            
                            <label for="address">住址：</label>
                            <input type="text" class = "form-control form-control-sm " name = "address" id = "address" required>

                            <label for="email">电子邮件：</label>
                            <input type="email" class = "form-control form-control-sm " name = "email" id = "email" required>
                            
                            <label for="tel">电话号码：</label>
                            <input type="number" class = "form-control form-control-sm " name = "tel" id = "tel" required>

                            <label for="IDNumber">身份证号码：</label>
                            <input type="number" class = "form-control form-control-sm" name = "IDNumber" id = "IDNumber" required>

                            <label for="registrationTime">注册时间：</label>
                            <input type="datetime-local" class = "form-control form-control-sm" name = "registrationTime" id = "registrationTime" required>

                            <label for="deadline">截止时间：</label>
                            <input type="datetime-local" class = "form-control form-control-sm" name = "deadline" id = "deadline" required>
                            <br>
                       <button type = "reset" class = "btn btn-sm btn-outline-danger" style = "position:absolute;left:30%;width:150px;">重置</button>
                       <button type = "submit" class = "btn btn-sm btn-outline-primary" style = "position:absolute;right:30%;width:150px;">修改</button>
                    </form>
                </div>
            </li>
        </ul>
        <ul class = "third">
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">正 在 查 询 . . .</h3>
                    <br>
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">正 在 查 询 . . .</h3>
                    <br> 
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">正 在 查 询 . . .</h3>
                    <br> 
                </div>
            </li>
            <li>
                <div>
                <br>
                    <h3 style = "text-align: center">添加客房信息</h3>
                    <form action="{{url('/addRoomInfo')}}" autocomplete="off" style = "margin:0 10px;">

                            <label for="roomType">房间类型：</label>
                            <select class = "form-control" name = "roomType" id = "roomType">
                                <option value="单人间">单人间</option>
                                <option value="标准间">标准间</option>
                                <option value="大床间">大床间</option>
                                <option value="三人间">三人间</option>
                                <option value="套间">套间</option>
                                <option value="豪华间">豪华间</option>
                            </select>

                            <label for="price">价格：</label>
                            <input type="text" class = "form-control form-control-sm " name = "price" id = "price" required>

                            <label for="roomID">房间号：</label>
                            <input type="number" class = "form-control form-control-sm " name = "roomID" id = "roomID" required>

                            <label for="status">状态：</label>
                            <select class = "form-control" name = "status" id = "status">
                                <option value="空房">空房</option>
                            </select>
    
                            <label for="description">描述：</label>
                            <input type="text" class = "form-control form-control-sm " name = "description" id = "description">
                        <br>
                       <button type = "reset" class = "btn btn-sm btn-outline-danger" style = "position:absolute;left:30%;width:150px;">重置</button>
                       <button type = "submit" class = "btn btn-sm btn-outline-primary" style = "position:absolute;right:30%;width:150px;">添加</button>
                    </form>
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">修改客房信息</h3>
                    <br>
                    <form action="{{url('/alterRoomInfo')}}" autocomplete="off" style = "margin:0 10px;">

                        <label for="roomType">房间类型：</label>
                        <select class = "form-control" name = "roomType" id = "roomType">
                            <option value="单人间">单人间</option>
                            <option value="标准间">标准间</option>
                            <option value="大床间">大床间</option>
                            <option value="三人间">三人间</option>
                            <option value="套间">套间</option>
                            <option value="豪华间">豪华间</option>
                        </select>

                        <label for="price">价格：</label>
                        <input type="text" class = "form-control form-control-sm " name = "price" id = "price" required>
                        
                        <label for="roomID">房间号：</label>
                        <input type="number" class = "form-control form-control-sm " name = "roomID" id = "roomID" required>
                        
                        <label for="status">状态：</label>
                        <input type="text" class = "form-control form-control-sm " name = "status" id = "status" required>
                        
                        <label for="description">描述：</label>
                        <input type="text" class = "form-control form-control-sm " name = "description" id = "description" required>
                        <br>
                       <button type = "reset" class = "btn btn-sm btn-outline-danger" style = "position:absolute;left:30%;width:150px;">重置</button>
                       <button type = "submit" class = "btn btn-sm btn-outline-primary" style = "position:absolute;right:30%;width:150px;">修改</button>
                    </form>
                </div>
            </li>
        </ul>
        <ul class = "fourth">
            <li>
                <div>
                    <br>
                    <h4 style = "text-align: center">正 在 查 询 . . .</h4>
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h4 style = "text-align: center">正 在 查 询 . . .</h4>
                </div>
            </li>
            
        </ul>
        <ul class="fifth">
            <li>
                <div>
                    <br>
                    <h4 style = "text-align: center">正 在 查 询 . . .</h4>
                </div>
            </li>
        </ul>
        <ul class="sixth">
            <li>
                <div>
                    <br>
                    <h4 style = "text-align: center">正 在 查 询 . . .</h4>
                </div>
            </li>
        </ul>
        <ul class="seventh">
            <li>
                <div>
                    <br>
                    <h4 style = "text-align: center">正 在 查 询 . . .</h4>
                </div>
            </li>
            <li>
                <div>
                    <br>
                    <h3 style = "text-align: center">修改账户信息</h3>
                    <form action="{{url('/alterAdminPersonalInfo')}}" autocomplete="off" style = "margin:0 10px;">

                        <label for="pwd">新密码：</label>
                        <small class = "text-muted">密码长度6-16位，可以包含大小写字母、数字和英文下划线</small>
                        <input type="password" class = "form-control form-control-sm " name = "pwd" id = "pwd" required pattern="^[\w_-]{6,16}$">

                        <label for="email">电子邮件：</label>
                        <small class = "text-muted">username@domain.com</small>
                        <input type="email" class = "form-control form-control-sm " name = "email" id = "email" required>
                        
                        <svg class="bi bi-eye-slash" width="1em" height=".9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                            <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/>
                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                            </svg>
                            <svg class="bi bi-eye" width="1em" height=".9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style = "display: none">
                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        <br>
                       <button type = "reset" class = "btn btn-sm btn-outline-danger" style = "position:absolute;left:30%;width:150px;">重置</button>
                       <button type = "submit" class = "btn btn-sm btn-outline-primary" style = "position:absolute;right:30%;width:150px;">修改</button>
                    </form>
                </div>
            </li>
        </ul>
        
        
    </div>
    <div class="backTop">
        <svg width="48" height="48">
            <circle fill = "#17233d" opacity = ".5" cx = "24" cy = "24" r = "24"></circle>
            <path d="M25 34.837v-17.81l6.663 6.762 1.424-1.403L24 13.163l-9.087 9.223 1.424 1.403L23 17.028v17.81z" fill="#FFF" fill-rule="nonzero"></path>
        </svg>
    </div>
    <div class="container_fluid bg-light" id = "footer">
        <p class = "text-center text-dark">Copyright &copy; 2020 ABC.Co.Ltd. All Rights Reserved.</p>
    </div>

    <script>

        getTime();
        function getTime() {
            var date = new Date();
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            var d = date.getDate();
            var h = date.getHours();
            var mi = date.getMinutes();
            var s = date.getSeconds();
            var weekdays = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
            // var day = date.getDay(); // 5
            var w = weekdays[date.getDay()];
            // console.log(w);
            m = m < 10 ? '0' + m : m;
            d = d < 10 ? '0' + d : d;
            // h = h < 10 ? '0' + h : h;
            // mi = mi < 10 ? '0' + mi : mi;
            // s = s < 10 ? '0' + s : s;
            document.querySelector('#time').innerHTML = y + '年' + m + '月' + d + '日' + '&nbsp;' + w;
        }
        setInterval(getTime,3600);
        
        function fadeOut() {
            let hint = document.querySelector('#hint');
            hint.style.opacity = '0';
        }
        setTimeout(fadeOut,5000);
        
        var a = document.querySelector('#forget');
        a.addEventListener('click',function(e) {
            var reasult = confirm('确认注销账户?');
            if(reasult == true) {
                
            } else {
                e.preventDefault();
            }
        })
    </script>
</body>
</html>