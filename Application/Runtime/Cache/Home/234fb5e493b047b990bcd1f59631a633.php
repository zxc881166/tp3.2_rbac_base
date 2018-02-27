<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>		
	<title>轮回博客</title>
	<meta property="qc:admins" content="020436547764116211647676375636" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="/Public/Home/css/lunbo.css" />
	<link rel="stylesheet" href="/Public/Home/css/pintuer.css">
	<link rel="stylesheet" href="/Public/Home/css/my.css">
	<link rel="stylesheet" href="/Public/Home/css/page_css.css">	
	<link rel="stylesheet" href="/Public/Home/css/gotop.css" />
	<script src="/Public/Home/js/jquery.js"></script>
	<script src="/Public/Home/js/pintuer.js"></script>
	<script src="/Public/Home/js/respond.js"></script>
	<script src="/Public/Home/layer/layer.js"></script>
	<script src="/Public/Home/js/gotop.js" ></script>
	<script src="/Public/Home/js/jquery.touchSlider.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".main_image").touchSlider({
		flexible : true,
		speed : 600,//轮播播放速度，单位是毫秒
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e){
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".main_image a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 4000); //轮播间隔时间，单位是毫秒
	
	$(".main_visual").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},4000);
	});
	
	$(".main_image").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 4000);
	});
	
});
</script>

</head>

	<body>
		<div style="display: none;" id="rocket-to-top">
    <div style="opacity:0;display: block;" class="level-2"></div>
    <div class="level-3"></div>
</div>
<div class="demo-nav padding-big-top fixed">
	<div class="container padding-top padding-bottom">
		<div class="line">
			<div class="xl12 xs3 xm3 xb2">
				<button class="button icon-navicon float-right" data-target="#header-demo"></button>
				<a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" class="ring-hover"/></a>
			</div>
			<div class=" xl12 xs9 xm9 xb10 nav-navicon" id="header-demo">
				<div class="xs8 xm6 xb8 padding-small">
					<ul class="nav nav-menu nav-inline nav-big">
						<li <?php if(strtolower($nownav['m']) == 'index'): ?>class="l_active"<?php endif; ?>><a href="<?php echo U('/index');?>">首页</a></li>
						<li <?php if(strtolower($nownav['m']) == 'class'): ?>class="l_active"<?php endif; ?>>
							<a href="#">分类<span class="arrow"></span></a>
							<ul class="drop-menu">
								<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Class/index',array('id'=>$vo['cate_id']));?>"><?php echo ($vo["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</li>
						<li <?php if(strtolower($nownav['m']) == 'said'): ?>class="l_active"<?php endif; ?>><a href="<?php echo U('/said');?>">说说</a></li>
						<li <?php if(strtolower($nownav['m']) == 'liuyan'): ?>class="l_active"<?php endif; ?>><a href="<?php echo U('/liuyan');?>">留言板</a></li>
						<li <?php if(strtolower($nownav['m']) == 'friend'): ?>class="l_active"<?php endif; ?>><a href="<?php echo U('/friend');?>">访客</a></li>
						<li <?php if(strtolower($nownav['m']) == 'about'): ?>class="l_active"<?php endif; ?>><a href="<?php echo U('/about');?>">关于我</a></li>
					</ul>
				</div>
				<div class="xs4 xm3 xb4">
					<form>
						<div class="input-group padding-little-top">
							<input type="text" class="input border-main" name="keywords" size="30" placeholder="请输入关键词" />
							<span class="addbtn"><button type="button" class="button bg-main icon-search"></button></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main_visual">
	<div class="flicking_con">
	<?php if(is_array($adv)): $i = 0; $__LIST__ = $adv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="#"><?php echo ($key); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>	
	</div>
	<div class="main_image">
		<ul>
		<?php if(is_array($adv)): $i = 0; $__LIST__ = $adv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="img"><img src="/Uploads/<?php echo ($vo["img"]); ?>"  width="100%" height="400px"/></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<a href="javascript:;" id="btn_prev"></a>
		<a href="javascript:;" id="btn_next"></a>
	</div>
</div>







		
		<br />
		<div class="container">
			<div class="">
				<ul class="bread">
					<h4>
					<li><a href="#" class="icon-home"> 首页</a> </li>					
					<li><a href="#">访客</a></li>
					</h4>
				</ul>
			</div>
			<div class="line-big">
				<div class="xl12 xm8">
					<div class="line-small">
						<div class="xs12">
							<h4>最近QQ访客</h4>
							此处为通过QQ登陆本网站<span style="color:red">(已有<?php echo ($count); ?>人登录本站)</span><hr>
				            <div class="friends">
				                <div class="QQfriends">			                    
			                        <?php if(is_array($QQ)): $i = 0; $__LIST__ = $QQ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="<?php echo ($v["qqimg"]); ?>" title="<?php echo ($v["qqname"]); ?>.最近登陆<?php echo ($v["qqnum"]); ?>次" class="radius-circle" width="60px" height="60px"><?php endforeach; endif; else: echo "" ;endif; ?>				                    
				                </div>
				            </div>							
							<br />							
						</div>						
						<hr />
						<div class="pages" style=" text-align: right;">
							<?php echo ($page); ?>
						</div>
					</div>
					<br />
					<br />
					<br />
				</div>				
				<div class="xl12 xm4">
	<div>
		<h3><span class="icon-user"></span> 用户登录</h3>
		<br />
		<form method="post" class="form-x form-auto">
	<div class="form-group">
		<div class="label">
			<label for="username">
				用户名</label>
		</div>
		<div class="field">
			<input type="text" class="input input-auto" id="username" name="username" size="30" data-validate="required:必填" placeholder="手机/邮箱/账号" />
		</div>
	</div>
	<div class="form-group">
		<div class="label">
			<label for="detail">
				密&nbsp;&nbsp;码</label>
		</div>
		<div class="field">
			<input type="text" class="input input-auto" id="username" name="username" size="30" data-validate="required:必填" placeholder="密码" />
		</div>
	</div>
	<div class="form-button">
		<button class="button bg-blue shake-hover" type="submit">
			登录</button>&nbsp;&nbsp;&nbsp;&nbsp;
			
			<?php if($qqname == '' ): ?><a class="button bg shake-hover" href="<?php echo U('Base/loginQq');?>"><img height="20px" src="/Public/Home/images/qq.png" /> QQ登录</a>
			<?php else: ?>	
				<div class="button-group">
					<button type="button" class="button">
						<img height="20px" src="/Public/Home/images/qq.png" />  <?php echo ($qqname); ?> </button>
					<button type="button" class="button dropdown-toggle">
						<span class="downward"></span>
					</button>
					<ul class="drop-menu">
						<li><a href="<?php echo U('Base/out');?>">退出登录</a> </li>					
					</ul>
				</div><?php endif; ?>

	</div>
</form>
	</div>
	<br /><hr />
	<div>
		<h3><span class="icon-cloud-download"></span> 程序下载</h3>
		<br />
		<div class="tool">
			<h4><span>站点版本：Lunhui v1.51 beta3</span></h4>
			<h4><span>开源版本：Lunhui v1.51.20160125</span>
				<a href="http://pan.baidu.com/s/1i4hcdXb"><button id="download" class="button button-little bg-red shake-hover"> &nbsp;&nbsp;下&nbsp;载 &nbsp;&nbsp;</button></a>
			</h4>
			<h4><span>提取密码：0eqw</span></h4><br/>
			<h4><span>本次更新（20160125）</span></h4>
			<h4><span>1.修复文章详情页找不到getIp方法的问题。<br/>
2.修复添加角色成功后找不到getRoleName方法的问题。<br/>
3.修复后台主页点击右上角退出没反应的问题。<br/>
4.更改留言板功能必须使用QQ登录后才能留言。<br/>
5.减少程序中多余的代码。<br/>
6.增加轮播上传功能。<br/>
7.后台友情链接采用AJAX异步提交方式，将在后续的版本中全部采用AJAX提交。</span></h4>
		</div>
	</div>
	<br />
	<hr />
	<div>
		<h3><span class="icon-wrench"></span> 我的标签</h3>
		
		<h4>
			<div class="tag-ul">
                <?php if(is_array($tag)): $i = 0; $__LIST__ = $tag;if( count($__LIST__)==0 ) : echo "暂时没有标签" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['a_id'] % 6 ==1): ?><a class="button button-little bg-main shake-hover" href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><?php echo ($v["a_keyword"]); ?></a><?php endif; ?>
                    <?php if($v['a_id'] % 6 ==2): ?><a class="button button-little bg-sub shake-hover" href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><?php echo ($v["a_keyword"]); ?></a><?php endif; ?>
                    <?php if($v['a_id'] % 6 ==3): ?><a class="button button-little bg-red shake-hover" href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><?php echo ($v["a_keyword"]); ?></a><?php endif; ?>
                    <?php if($v['a_id'] % 6 ==4): ?><a class="button button-little bg-yellow shake-hover" href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><?php echo ($v["a_keyword"]); ?></a><?php endif; ?>
                    <?php if($v['a_id'] % 6 ==5): ?><a class="button button-little bg-blue shake-hover" href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><?php echo ($v["a_keyword"]); ?></a><?php endif; ?>
                    <?php if($v['a_id'] % 6 ==0): ?><a class="button button-little bg-green shake-hover" href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><?php echo ($v["a_keyword"]); ?></a><?php endif; endforeach; endif; else: echo "暂时没有标签" ;endif; ?>
            </div>			
		</h4>
	</div>
	<hr />
	<h2 class="bg-main text-white padding">随机文章</h2>
	<div class="padding-big bg">
		<ul class="list-media list-underline">
			<?php if(is_array($s_article)): $i = 0; $__LIST__ = $s_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>					
					<div class="media media-x img-small">						
						<a class="float-left" href="<?php echo U('Article/index',array('a_id'=>$vo['a_id']));?>"><img src="/Uploads/<?php echo ($vo["photo"]); ?>" onerror="this.src='/Public/Home/images/default.jpg'" class="radius"></a>						
						<div class="media-body">
							<strong><?php echo (mb_substr(strip_tags($vo["a_title"]),0,16,'utf-8')); ?>...</strong><?php echo (mb_substr(strip_tags($vo["a_remark"]),0,35,'utf-8')); ?>...
							<a class="button button-little border-red swing-hover" href="<?php echo U('Article/index',array('a_id'=>$vo['a_id']));?>">查看详情</a>
						</div>
					</div>						
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<br />
	<div class="tab border-main" data-toggle="hover" style="height: 470px;">
		<div class="tab-head">

			<ul class="tab-nav">
				<li class="active"><a href="#tab-start2">最新留言</a> </li>
				<li><a href="#tab-css2">最多点击</a> </li>
				<li><a href="#tab-units2">申请友链</a> </li>
			</ul>
		</div>
		<div class="tab-body ">
			<div class="tab-panel active" id="tab-start2">				
				<?php if(is_array($Liuyan)): $i = 0; $__LIST__ = $Liuyan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel-group" style="border-top: solid 0px #ddd;">
						<div class="media media-x">
							<a class="float-left" href="<?php echo U('Liuyan/index');?>">
								<img src="<?php echo ($vo["photo"]); ?>" class="radius-circle" width="60px" height="60px">
							</a>
							<div class="media-body">
								<strong><span class="icon-paper-plane"></span>  <?php echo ($vo["username"]); ?></strong>
								<span class="tag bg-dot"><?php echo ($vo["from"]); ?></span> <?php echo ($vo["content"]); ?>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>								
			</div>
			<div class="tab-panel" id="tab-css2" >
				<?php if(is_array($hits)): $i = 0; $__LIST__ = $hits;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li style="margin-bottom:8px"><h4>
					<a href="<?php echo U('Article/index',array('a_id'=>$v['a_id']));?>"><span class="icon-leaf"></span> <?php echo ($v["a_title"]); ?>(<?php echo ($v["a_views"]); ?>)</a>
					</h4></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="tab-panel" id="tab-units2">												
				<div class="panel-body">
					正在开发中，敬请期待。。。。
				</div>									
			</div>
		</div>
	</div>
	<div>
		<h3><span class="icon-retweet"></span> 友情链接</h3>
		<br />
		<div class="links">
			<?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>" target="_blank" class="button border-blue ring-hover" role="button"><?php echo ($vo["name"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	<br />
	<hr />
	<br />
	
</div>

	<script>
	
		$(function(){
		    $('#download').click(function(){
		    	var node ="<?php echo ($qqname); ?>";

		    	if( node =='' || node == null){ 
					layer.alert("请您使用QQ登录后下载!",{icon: 2,}); 
					return false;
				}

				 return true;
		    });		    
		})

	</script>
			</div>
		</div>	
		<div class="container-layout bg-black">
    <div class="border-top padding-top foot">
        <div class="text-center">
            <ul class="nav nav-inline">
            	
                <li><a href="<?php echo U('/index');?>">网站首页</a> </li>
                <li><a href="#">技术反馈</a> </li>
                <li><a href="<?php echo U('/liuyan');?>">留言反馈</a> </li>
                <li><a href="#">联系方式</a> </li>
                
            </ul>
        </div>
        <div class="text-center height-big">
            <?php echo C('address');?>&nbsp;&nbsp;&nbsp;<?php echo C('copyright');?>
        |<a href="<?php echo U('Admin/login/index');?>" target="_blank"> 博客管理  </a>
        |<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256135378'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256135378' type='text/javascript'%3E%3C/script%3E"));</script>
        </div>
    </div>
</div>

	</body>
</html>