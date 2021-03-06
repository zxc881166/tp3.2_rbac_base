<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php echo C('SITENAME');?></title>
    <meta name="keywords" content="<?php echo C('SITENAME');?>">
    <meta name="description" content="<?php echo C('SITENAME');?>">
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/login.min.css" rel="stylesheet">      
    <link rel="stylesheet" href="/Public/Admin/login/supersized.css">
	<script type="text/javascript">
        var url='/Public';       
    </script>
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin" style="font-size: 14px;">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <div class="logopanel m-b">
                        <h1>[ <?php echo C('SITENAME');?> ]</h1>
                    </div>
                    <div class="m-b"></div>
                    <h4>欢迎使用 <strong><?php echo C('SITENAME');?></strong></h4>
                    <ul class="m-b">
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> <?php echo C('SITENAME');?></li>
                        <!-- <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势二</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势三</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势四</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势五</li> -->
                    </ul>
                    <!-- <strong>还没有账号？ <a href="#">立即注册&raquo;</a></strong> -->
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post" action="<?php echo U('index/dologin');?>">
                    <!-- <h4 class="no-margins">登录：</h4> -->
                    <p class="m-t-md">登录后台管理系统</p>
                    <input type="text" class="form-control uname" id="username" name="user" placeholder="用户名" />
                    <input type="password" class="form-control pword m-b" id="password" name="password" placeholder="密码" />
                    <!-- <a href="">忘记密码了？</a> -->
                    <a type="submit" id="btn_login" class="btn btn-success btn-block">登&nbsp;&nbsp;&nbsp;录</a>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                <!-- <?php echo C('address');?>&nbsp;&nbsp;&nbsp;<?php echo C('copyright');?> -->
            </div>
        </div>
    </div>
         
    <script src="/Public/Admin/login/jquery-1.8.2.min.js" ></script>
    <script src="/Public/Admin/login/supersized.3.2.7.min.js" ></script>
    <script src="/Public/Admin/login/supersized-init.js" ></script>      
    <script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
	<script src="/Public/Admin/layer/layer.js"></script>
    <script>
            
            document.onkeydown=function(event){
               e = event ? event :(window.event ? window.event : null);
               if(e.keyCode==13){

                     $('#btn_login').click();
               }
            }
            $(function () {
               $('#btn_login').click(function(){

                   var u=$('#username').val();
                   var p=$('#password').val();
                   if (u == "") {

                           layer.msg('请输入用户名',function(){})
                           return false;
                   }
                   if (p == "") {

                          layer.msg('请输入密码',function(){})
                           return false;
                   }
                   $.ajax({
                       url: '/Admin/Login/dologin',
                       type: "post",
                       data:{
                               'user':u,
                               'password':p
                               },
                       dataType:'json',
                       error:function(){
                       	
	                        layer.msg('无法访问数据库，请检查你的数据库配置',function(){})
	                       
	                    },
                       success:function(data){
                                        
                            if(data.error==0){
                               
                                location.href=data.url;

                            }else{                            
                                layer.msg(data.msg)
                            }
                       }
                   });
               });
           });

        </script>
</body>

</html>