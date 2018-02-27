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

	<script type="text/javascript" charset="utf-8" src="/Public/Common/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/Common/Ueditor/ueditor.all.min.js"></script>
	<script language="javascript" type="text/javascript" src="/Statics/My97/WdatePicker.js"></script>
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
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
					                	<span class="label label-danger pull-right">NEW</span></a></li>
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
			<h2>添加广告</h2>
			<ol class="breadcrumb">
				<li>
					<a href="index.html"> <i class="fa fa-home"></i>
						主页
					</a>
				</li>
				<li>
					<a>广告管理</a>
				</li>
				<li> <strong>添加广告</strong>
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>添加广告</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<form class="form-horizontal" method="post" action="<?php echo U('Advert/add');?>" name="basic_validate" id="signupForm">
						<div class="form-group">
							<label class="col-sm-2 control-label">标题</label>
							<div class="col-sm-6">
								<input type="text" name="title" id="title" placeholder="输入广告标题" class="form-control"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">子标题</label>
							<div class="col-sm-6">
								<input type="text" name="subtitle" id="subtitle" placeholder="输入广告子标题" class="form-control"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属分类</label>
							<div class="col-sm-6">
								<select name="adverttype"  class="form-control m-b chosen-select">
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>

						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">广告图片</label>
							<div class="col-sm-6">
								<div style="width: 200px; height: 110px; float: left;">
									<input type="hidden" name="imageurl" value="" id="data_photo" />
									<input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
								</div>
								<div style="width: 200px; height: 110px; float: left;">
									<img id="upload_img" src="/Uploads/<?php echo ($detail["imageurl"]); ?>" onerror="this.src='/Public/Admin/img/no_img.jpg'" style="width: 150px;height: 100px" />
								</div>
							</div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">广告内容：</label>
							<div class="col-sm-10">
								<script type="text/plain" id="editor" name="info" style="width:78%;height:300px;"></script>
							</div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">联系人</label>
							<div class="col-sm-6">
								<input type="text" name="linker" id="linker" placeholder="输入联系人" class="form-control"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">手机号码</label>
							<div class="col-sm-6">
								<input type="text" name="phone" id="phone" placeholder="输入手机号码" class="form-control"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">状态</label>
							<div class="col-sm-6">
								<div class="radio i-checks">
									<input type="radio" name='state' value="1" checked="checked" />
									开启
									<input type="radio" name='state' value="0" />
									关闭
								</div>
							</div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">地址</label>
							<div class="col-sm-6">
								<input type="text" name="address" id="address" placeholder="输入地址" class="form-control"></div>
						</div>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<button class="btn btn-primary" type="submit">保存内容</button>
								<a class="btn btn-danger" href="<?php echo U('Advert/index');?>">取消</a>
							</div>
						</div>
					</form>
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

	<script type="text/javascript" src="/Public/Common/js/uploadify/jquery.uploadify.min.js"></script>
	<link rel="stylesheet" href="/Public/Common/js/uploadify/uploadify.css">
	<script src="/Public/Admin/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/Public/Admin/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/Public/Admin/js/form-validate-adduser.js"></script>

	<script type="text/javascript">
		$("#photo_file").uploadify({
			'swf': '/Public/Common/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
			'uploader': '<?php echo U("Upload/upload");?>',
			'cancelImg': '/Public/Common/js/uploadify/uploadify-cancel.png',
			'buttonText': '上传图片',
			'height': 35,
			'fileTypeExts': '*.gif;*.jpg;*.png',
			'queueSizeLimit': 1,
			'onUploadSuccess': function(file, data, response) {
				$("#data_photo").val(data);
				$("#upload_img").attr('src', '/Uploads' + data).show();
			}
		});
			
		var ue = UE.getEditor('editor');
		var editor_a = new baidu.editor.ui.Editor(editorOption);
		editor_a.render('editor');
		
	</script>
	<script>
       
        var config = {
            '.chosen-select': {},                    
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

    </script>
</body>

</html>