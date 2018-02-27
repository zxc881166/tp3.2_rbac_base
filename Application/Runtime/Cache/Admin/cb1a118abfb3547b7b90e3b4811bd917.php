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

    <style>
.pages a,.pages span {
    display:inline-block;
    padding:4px 7px;
    margin:0 2px;
    border:1px solid #D5D4D4;
    -webkit-border-radius:1px;
    -moz-border-radius:1px;
    border-radius:1px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#077ee3;
}

.pages a:hover{
    border-color:#077ee3;
}
.pages span.current{
    background:#077ee3;
    color:#FFF;
    font-weight:700;
    border-color:#077ee3;
}

.long-tr th{
	text-align: center
}
.long-td td{
	text-align: center
}

</style>


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


        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content no-padding">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <p class="text-success"><a href="<?php echo U('Index/index');?>" title="返回首页" class="tip-bottom"><i class="fa fa-home"></i> 首页</a> /
                                    <a href="#" class="tip-bottom"> 系统管理</a> / <a href="#" class="tip-bottom">菜单管理</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="addChild(this)">添加菜单</button>
        <br />
        <br />
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><i class="fa fa-tasks"></i> 菜单列表</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="long-tr">
                                    <th style="width: 5%">排序</th>
                                    <th style="width: 15%">菜单名称</th>
                                    <th style="width: 5%">图标</th>
                                    <th style="width:15%">链接</th>
                                    <th style="width: 25%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list)): $val = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($val % 2 );++$val;?><tr class="long-td">
                                        <td style="text-align: center"><?php echo ($vo["sort"]); ?></td>
                                        <td style="text-align: left"><b><?php echo ($vo["title"]); ?></b></td>
                                        <td style="text-align: center"><i class="icon <?php echo ($vo["ico"]); ?>"></i></td>
                                        <td style="text-align: center"><?php echo ($vo["g"]); ?>/<?php echo ($vo["m"]); ?>/<?php echo ($vo["a"]); ?></td>
                                        <td style="text-align: center">
                                            <a href="javascript:;" data-toggle="modal" data-target="#myModal" data-id="<?php echo ($vo["id"]); ?>" onclick="addChild(this)">添加子菜单</a> | 
                                            <a href="javascript:;" data-toggle="modal" data-target="#myModal" data-id="<?php echo ($vo["id"]); ?>" data-pid="<?php echo ($vo["pid"]); ?>" data-title="<?php echo ($vo["title"]); ?>" data-sort="<?php echo ($vo["sort"]); ?>" data-ico="<?php echo substr($vo['ico'],6);?>" data-gma="<?php echo ($vo["g"]); ?>/<?php echo ($vo["m"]); ?>/<?php echo ($vo["a"]); ?>" onclick="edit(this)">修改</a> | 
                                            <a href="javascript:;" onclick="return del(<?php echo ($vo["id"]); ?>);">删除</a>
                                        </td>
                                    </tr>
                                    <?php if(is_array($vo["sublist"])): $k = 0; $__LIST__ = $vo["sublist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr class="long-td">
                                            <td style="text-align: center"><?php echo ($v["sort"]); ?></td>
                                            <td style="text-align: left">　└───<?php echo ($v["title"]); ?></td>
                                            <td style="text-align: center"><i class="icon <?php echo ($v["ico"]); ?>"></i></td>
                                            <td style="text-align: center"><?php echo ($v["g"]); ?>/<?php echo ($v["m"]); ?>/<?php echo ($v["a"]); ?></td>
                                            <td style="text-align: center">
                                                <a href="javascript:;" data-toggle="modal" data-target="#myModal" data-id="<?php echo ($v["id"]); ?>" data-pid="<?php echo ($v["pid"]); ?>" data-title="<?php echo ($v["title"]); ?>" data-sort="<?php echo ($v["sort"]); ?>" data-ico="<?php echo substr($v['ico'],6);?>" data-gma="<?php echo ($v["g"]); ?>/<?php echo ($v["m"]); ?>/<?php echo ($v["a"]); ?>" onclick="edit(this)">修改</a> | 
                                                <a href="javascript:;" onclick="return del(<?php echo ($v["id"]); ?>);">删除</a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <div class="pages" style=" text-align: right;">
                            <?php echo ($page); ?>
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
        <div class="modal  fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title">添加菜单</h3>                  
                    </div>
                    <form class="form-horizontal" name="add" id="add" method="post" action="/Admin/System/addnav">
                        <div class="ibox-content">
                                <input type="hidden" name="id" value="" />
                                <input type="hidden" name="pid" value="" />
                                <input type="hidden" name="single" value="" />
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">菜单名称</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="title" id="title" placeholder="输入菜单名称" class="form-control"/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">链接</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="gma" id="gma" placeholder="输入模块/控制器/方法即可 例如 Admin/Nav/index" class="form-control"/>
                                    </div>
                                </div>                 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">图标</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ico" placeholder="font-awesome图标 输入fa fa- 后边的即可" class="form-control"/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">排序</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="sort" placeholder="输入排序号" class="form-control"/>
                                    </div>
                                </div>   
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">保存内容</button>
                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    $(function(){
        $('#add').ajaxForm({
            beforeSubmit: checkForm,
            success: complete, 
            dataType: 'json'
        });

        function checkForm(){
            if( '' == $.trim($('#title').val())){
                layer.alert('标题不能为空', {icon: 5}, function(index){
                    layer.close(index);
                    $('#title').focus(); 
                });
                return false;
            }
        
            if( '' == $.trim($('#gma').val())){
                layer.alert('链接不能为空', {icon: 5}, function(index){
                    layer.close(index);
                    $('#gma').focus(); 
                });
                return false;
            }
        }

        function complete(data){
            if(data.status==1){
                layer.alert(data.info, {icon: 6}, function(index){
                    layer.close(index);
                    window.location.href=data.url;
                });
            }else{
                layer.alert(data.info, {icon: 5}, function(index){
                    layer.close(index);
                    window.location.href=data.url;
                });
                return false;   
            }
        }

    });

    //添加子菜单
    function addChild(obj){
        var id = $(obj).data('id');
        $('input[name="pid"]').val(id);
        $('input[name="title"]').val('');
        $('input[name="ico"]').val('');
        $('input[name="gma"]').val('');
        $('input[name="sort"]').val('');
    }

    function edit(obj){
        $('input[name="id"]').val($(obj).data('id'));
        $('input[name="pid"]').val($(obj).data('pid'));
        $('input[name="title"]').val($(obj).data('title'));
        $('input[name="ico"]').val($(obj).data('ico'));
        $('input[name="gma"]').val($(obj).data('gma'));
        $('input[name="sort"]').val($(obj).data('sort'));
    }

    function del(id,p){
        layer.confirm('你确定要删除吗？', {icon: 3}, function(index){
            layer.close(index);
            $.get('/Admin/System/del_nav',{id:id},function(msg){
                if(msg.status){
                    window.location.reload();
                }else{
                    layer.msg(msg.info,{icon:-1});
                }
            },'json');
        });
    }
</script>