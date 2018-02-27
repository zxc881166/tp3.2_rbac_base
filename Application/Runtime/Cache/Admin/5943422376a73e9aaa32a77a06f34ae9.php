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

		<div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <h2>轮播管理</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html"><i class="fa fa-home"></i> 主页</a>
                    </li>
                    <li>
                        <a>系统管理</a>
                    </li>
                    <li>
                        <strong>轮播管理</strong>
                    </li>
                </ol>
            </div>              
        </div>
        <br />	
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">添加轮播</button>
		<br />
		<br />
		<div class="row">
			<div class="col-sm-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5><i class="fa fa-tasks"></i> 用户列表</h5>
					</div>
					<div class="ibox-content">
						<table class="table table-bordered">
							<thead>
								<tr class="long-tr">
									<th>编号</th>
									<th>标题</th>									
									<th>图片</th>									
									<th>状态</th>
									<th>排序</th>
									<th>添加时间</th>									
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="long-td">
										<td><?php echo ($vo["id"]); ?></td>
										<td><?php echo ($vo["title"]); ?></td>							
										<td><img src="/Uploads/<?php echo ($vo["img"]); ?>" style="width: 180px;height: 70px" /></td>
										<td>
											<?php if($vo["state"] == 1): ?><span class="label label-primary">显示</span>
                                        		<?php else: ?>
                                        			<span class="label label-danger">不显示</span><?php endif; ?>
										</td>
										<td><?php echo ($vo["orderby"]); ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
										<td>
											<a href="<?php echo U('editcarousel',array('id'=>$vo['id']));?>" class="btn btn-primary btn-mini">
												<i class="fa fa-pencil"></i> 编辑</a>&nbsp;&nbsp;
											<a href="javascript:;" onclick="return del(<?php echo ($vo["id"]); ?>);" class="btn btn-danger">
												<i class="fa fa-trash-o"></i> 删除</a>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
		            <h3 class="modal-title">添加轮播</h3>		           
		        </div>
		        <form class="form-horizontal" name="add" id="add" method="post" action="/Admin/System/runadd">
		        	<div class="ibox-content">
						
							<div class="form-group">
								<label class="col-sm-2 control-label">轮播名称</label>
								<div class="col-sm-8">
									<input type="text" name="title" id="title" placeholder="输入轮播名称" class="form-control"/>
								</div>
							</div>						
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="form-field-1"> 轮播图片</label>
								<div class="col-sm-10">
								<a href="javascript:;" class="file">
									<input type="file" name="file0" id="file0" multiple="multiple"/>
									上传图片
								</a>								
								<div><img src="/Public/Admin/img/no_img.jpg" height="70" id="img0" ></div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">排序</label>
								<div class="col-sm-8">
									<input type="text" name="orderby" id="orderby" placeholder="输入排序" class="form-control"/>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">备注</label>
								<div class="col-sm-8">
									<input type="text" name="note" id="note" placeholder="输入备注信息" class="form-control"/>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">状态</label>
								<div class="col-sm-6">
									<div class="radio ">	                        			
	                        			<input type="checkbox" name='state' value="1" class="js-switch" checked />&nbsp;&nbsp;默认显示	                        			
	                        		</div>
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
<script src="/Public/Admin/js/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script>
function del(id,p){
	layer.confirm('你确定要删除吗？', {icon: 3}, function(index){
	layer.close(index);
	window.location.href="/Admin/System/del/id/"+id+"";
	});
}


$(document).ready(function(){
	$("#myModaledit").hide();	

});



//添加操作
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
			$('.title').focus(); 
			});
			return false;
		}
	
		if( '' == $.trim($('#orderby').val())){
			layer.alert('排序不能为空', {icon: 5}, function(index){
 			layer.close(index);
			$('#orderby').focus(); 
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



$("#file0").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl) ;
	}
}) ;


function getObjectURL(file) {

	var url = null ; 
	if (window.createObjectURL!=undefined) {
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { 
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) {
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}


function backpic(picurl){
	$("#img0").attr("src",picurl);
	$("input[name='file0']").val("");
}


var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, {
        color: '#1AB394'
    });
var config = {
    '.chosen-select': {},                    
}
for (var selector in config) {
    $(selector).chosen(config[selector]);
}


</script>


	</body>

</html>