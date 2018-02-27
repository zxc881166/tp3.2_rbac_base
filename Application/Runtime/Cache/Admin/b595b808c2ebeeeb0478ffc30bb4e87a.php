<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo C('SITENAME');?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">  
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet">	
    <link href="/Public/Admin/css/uploadfile.css" rel="stylesheet">
   	<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
   
</head>
	
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/Uploads/<?php echo ($admin['userimg']); ?>" width="70px" height="70px"/></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong><?php echo ($admin['username']); ?></strong></span>
                                <span class="text-muted text-xs block">
                                	<?php if($admin["role"] == 0 ): ?>超级管理员
                                		<?php else: ?>
	                                	<?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($admin["role"] == $vo2["id"] ): echo ($vo2["name"]); endif; ?>
											<?php if($admin["role"] == 0 ): ?>超级管理员<?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                                	<b class="caret"></b>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo U('Index/pwd');?>">修改密码</a>
                                </li>
                                <li><a href="<?php echo U('Index/del');?>">清除缓存</a>
                                </li>
                                <li><a href="<?php echo U('Site/index');?>">设置</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="javascript:;"  id="logout">退出系统</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                               
													
					  <li> 
					    <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['pid'] == 1): if($vo['single'] == 1): ?><li            
					                <?php if((strtolower($nownav['m']) == strtolower($vo['m']))): ?>class="active"<?php endif; ?>
					                ><a href="<?php echo U($vo['m'].'/'.$vo['a']);?>"><i class="icon <?php echo ($vo["ico"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span>
					                	<span class="label label-danger pull-right"></span></a>
					               </li>
					        <?php else: ?>
					            <li class="submenu 
					                <?php if((strtolower($nownav['m']) == strtolower($vo['m']))): ?>active<?php endif; ?>
					                "
					             > <a href="#"><i class="icon <?php echo ($vo["ico"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span><span class="fa arrow"></a>
					              <ul class="nav nav-second-level">
					                  <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subnode): $mod = ($i % 2 );++$i; if($subnode['pid'] == $vo['id']): ?><li  
			                                   <?php if((strtolower($nownav['m']) == strtolower($subnode['m']) ) && (strtolower($nownav['a']) == strtolower($subnode['a']) )): ?>class="active"<?php endif; ?>
			                                ><a href="<?php echo U($subnode['m'].'/'.$subnode['a']);?>"><?php echo ($subnode['title']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					              </ul><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
					  </li>									
					
                </ul>
            </div>
        </nav>


	<script type="text/javascript">
	$(document).ready(function(){
		$("#logout").click(function(){
			layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
		    layer.close(index);
		    window.location.href="<?php echo U('Login/loginout');?>";
		});
		});
	});
	</script>
    <div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
	<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
			<!-- <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
				<div class="form-group">
					<input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
				</div>
			</form> -->
		</div>
		<ul class="nav navbar-top-links navbar-right">
			<li>
				<span class="m-r-sm text-muted welcome-message">
					<a href="<?php echo U('Index/index');?>" title="返回首页"><i class="fa fa-home"></i></a>欢迎使用<?php echo C('SITENAME');?>
					<span class="label label-danger pull-right"><?php echo ($Os); ?></span>
				</span>
			</li>
			<li>
				<a href="javascript:;"  id="loginout">
					<i class="fa fa-sign-out"></i> 退出
				</a>
			</li>
		</ul>
	</nav>
</div>

<script src="/Public/Admin/layer/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#loginout").click(function(){
		layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="<?php echo U('Login/loginout');?>";
	});
	});
});
</script>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>消息</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-envelope-o"></i> 新消息</h3>
                        <small><i class="fa fa-tim"></i> 您有22条未读消息</small>
                    </div>
                    <div class="ibox-content">
                        <div class="feed-activity-list">

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right text-navy">1月前</small>
                                    <strong>井幽幽</strong>
                                    <div>有人说：“一辈子很长，要跟一个有趣的人在一起”。我想关注我的人，应该是那种喜欢找乐子也乐意分享乐趣的人，你们一定挺优秀的。所以单身的应该在这条留言，互相勾搭一下。特别有钱人又帅可以直接私信我！</div>
                                    <small class="text-muted">4月11日 00:00</small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right">2月前</small>
                                    <strong>马伯庸 </strong>
                                    <div>又方便，又防水，手感又好，还可以用手机遥控。简直是拍戏利器，由其是跟老师们搭戏的时候…想想还有点小激动啊，嘿嘿。</div>
                                    <small class="text-muted">11月8日 20:08 </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right">5月前</small>
                                    <strong>芒果宓 </strong>
                                    <div>一个完整的梦。</div>
                                    <small class="text-muted">11月8日 20:08 </small>
                                </div>
                            </div>

                            <div class="feed-element">
                                <div>
                                    <small class="pull-right">5月前</small>
                                    <strong>刺猬尼克索</strong>
                                    <div>哈哈哈哈 你卖什么萌啊! 蠢死了</div>
                                    <small class="text-muted">11月8日 20:08 </small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>用户项目列表</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                        <tr>
                                            <th>状态</th>
                                            <th>日期</th>
                                            <th>用户</th>
                                            <th>值</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><small>进行中...</small>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 11:20</td>
                                            <td>青衣5858</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 24%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="label label-warning">已取消</span>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 10:40</td>
                                            <td>徐子崴</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 66%</td>
                                        </tr>
                                        <tr>
                                            <td><small>进行中...</small>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 01:30</td>
                                            <td>姜岚昕</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 54%</td>
                                        </tr>
                                        <tr>
                                            <td><small>进行中...</small>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 02:20</td>
                                            <td>武汉大兵哥</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 12%</td>
                                        </tr>
                                        <tr>
                                            <td><small>进行中...</small>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 09:40</td>
                                            <td>荆莹儿</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 22%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="label label-primary">已完成</span>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 04:10</td>
                                            <td>栾某某</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 66%</td>
                                        </tr>
                                        <tr>
                                            <td><small>进行中...</small>
                                            </td>
                                            <td><i class="fa fa-clock-o"></i> 12:08</td>
                                            <td>范范范二妮</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 23%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>任务列表</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <ul class="todo-list m-t small-list ui-sortable">
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                        <span class="m-l-xs todo-completed">开会</span>

                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                        <span class="m-l-xs  todo-completed">项目开发</span>

                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">修改bug</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">修改bug</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">修改bug</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">修改bug</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">修改bug</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
		<div class="footer" style="position: fixed;z-index: 999;bottom: 0;width: 89%;">
	<div class="pull-right"><?php echo C('address');?></div>
</div>
</div>
</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script type="text/javascript" src="/Public/Admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="/Public/Admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/plugins/layer/layer.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/hplus.min.js?v=4.0.0"></script>
<script type="text/javascript" src="/Public/Admin/js/contabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/plugins/pace/pace.min.js"></script>    
<script type="text/javascript" src="/Public/Admin/js/plugins/chosen/chosen.jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>


</body>

</html>