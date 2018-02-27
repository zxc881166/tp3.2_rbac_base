/*$(document).ready(function(){
		$(".liOneBg").mouseover(function(){
			$(this).children(".list").addClass('list2');
		});
		$(".liOneBg").mouseout(function(){
			$(this).children(".list").removeClass('list2');
		});
		
		$(".select").click(function(){
		$(this).parent().find(".selectList").toggle(100);
		});
		
		$(".navIndx .navA").click(function(){
		$(".navIndx").parent().find(".indxLi").toggle(100);
		});
		
		
		
		$(".liOneBg").mouseover(function(){
			$(this).children(".a").addClass('cur');
		});
		$(".liOneBg").mouseout(function(){
			$(this).children(".a").removeClass('cur');
		});
		
		
		
	});	
	
	

	



$(function(){
	
	$(".hotPm li.wz").each(function(i) {
	$(this).mousemove(function() {
		$(this).parent().find("li.wz").removeClass("over");
		$(this).addClass("over");
		$(".hotPm li.img").each(function(j) {
			if (i == j) {
				$(this).parent().find("li.img").hide();
				$(this).show();
			}
			;
		});
	});
	});
	
	
	$('#hs_r').gogoImg({
		ctrlId:'hs_r_b',			// 控制栏	
		ifAuto:true,				// 是否自动滚屏
		path:true,					// 滚动方向
		onClass:'over',				// 控制 当前的特殊样式
		st:250,						// 滚屏时间
		autoTime:3000				// 自动滚屏间隔
	});
	
	$('#hs_r2').gogoImg({
		ctrlId:'hs_r_b2',			// 控制栏	
		ifAuto:true,				// 是否自动滚屏
		path:true,					// 滚动方向
		onClass:'over',				// 控制 当前的特殊样式
		st:250,						// 滚屏时间
		autoTime:3000				// 自动滚屏间隔
	});
	
	$('#hs_r3').gogoImg({
		ctrlId:'hs_r_b3',			// 控制栏	
		ifAuto:true,				// 是否自动滚屏
		path:true,					// 滚动方向
		onClass:'over',				// 控制 当前的特殊样式
		st:250,						// 滚屏时间
		autoTime:3000				// 自动滚屏间隔
	});
	
	$('#hs_r4').gogoImg({
		ctrlId:'hs_r_b4',			// 控制栏	
		ifAuto:true,				// 是否自动滚屏
		path:true,					// 滚动方向
		onClass:'over',				// 控制 当前的特殊样式
		st:250,						// 滚屏时间
		autoTime:3000				// 自动滚屏间隔
	});
	
});

*/

/****************************************幻灯部分轮播**********************************/
/**
 * jQuery jslides 1.1.0
 *
 * http://www.cactussoft.cn
 *
 * Copyright (c) 2009 - 2013 Jerry
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
 /*
$(function(){
	var numpic = $('#slides li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination = $('#pagination li');
	var paginationwidth = $('#pagination').width();
	$('#pagination').css('margin-left','')
	$('#pagination').css('margin-left','')
	
	pagination.eq(0).addClass('current')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="javascript:void(0);">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides').after(ulstart + ulcontent + ulend);	
	}

	pagination.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides li').eq(nownow).css('z-index','900');
		$('#slides li').eq(changenow).css({'z-index':'800'}).show();
		pagination.eq(changenow).addClass('current').siblings('li').removeClass('current');
		$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination.mouseenter(function(){
		inout = 1;
	})
	
	pagination.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides li').eq(nownow).css('z-index','900');
			$('#slides li').eq(NN).css({'z-index':'800'}).show();
			pagination.eq(NN).addClass('current').siblings('li').removeClass('current');
			$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides li').eq(nownow).css('z-index','900');
			$('#slides li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides li').eq(nownow).fadeOut(400,function(){$('#slides li').eq(0).fadeIn(500);});
			pagination.eq(NN).addClass('current').siblings('li').removeClass('current');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

}) */
/****************************************幻灯部分轮播结束**********************************/



/****************************************幻灯部分轮播**********************************/
/**
 * jQuery jslides 1.1.0
 *
 * http://www.cactussoft.cn
 *
 * Copyright (c) 2009 - 2013 Jerry
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
 /*
$(function(){
	var numpic = $('#slides2 li').size()-1;
	var nownow = 0;
	var inout = 0;
	var TT = 0;
	var SPEED = 5000;


	$('#slides2 li').eq(0).siblings('li').css({'display':'none'});


	var ulstart = '<ul id="pagination2">',
		ulcontent = '',
		ulend = '</ul>';
	ADDLI();
	var pagination = $('#pagination2 li');
	var paginationwidth = $('#pagination2').width();
	$('#pagination2').css('margin-left','')
	$('#pagination2').css('margin-left','')
	
	pagination.eq(0).addClass('current2')
		
	function ADDLI(){
		//var lilicount = numpic + 1;
		for(var i = 0; i <= numpic; i++){
			ulcontent += '<li>' + '<a href="0">' + (i+1) + '</a>' + '</li>';
		}
		
		$('#slides2').after(ulstart + ulcontent + ulend);	
	}

	pagination.on('click',DOTCHANGE)
	
	function DOTCHANGE(){
		
		var changenow = $(this).index();
		
		$('#slides2 li').eq(nownow).css('z-index','900');
		$('#slides2 li').eq(changenow).css({'z-index':'800'}).show();
		pagination.eq(changenow).addClass('current2').siblings('li').removeClass('current2');
		$('#slides2 li').eq(nownow).fadeOut(400,function(){$('#slides2 li').eq(changenow).fadeIn(500);});
		nownow = changenow;
	}
	
	pagination.mouseenter(function(){
		inout = 1;
	})
	
	pagination.mouseleave(function(){
		inout = 0;
	})
	
	function GOGO(){
		
		var NN = nownow+1;
		
		if( inout == 1 ){
			} else {
			if(nownow < numpic){
			$('#slides2 li').eq(nownow).css('z-index','900');
			$('#slides2 li').eq(NN).css({'z-index':'800'}).show();
			pagination.eq(NN).addClass('current2').siblings('li').removeClass('current2');
			$('#slides2 li').eq(nownow).fadeOut(400,function(){$('#slides2 li').eq(NN).fadeIn(500);});
			nownow += 1;

		}else{
			NN = 0;
			$('#slides2 li').eq(nownow).css('z-index','900');
			$('#slides2 li').eq(NN).stop(true,true).css({'z-index':'800'}).show();
			$('#slides2 li').eq(nownow).fadeOut(400,function(){$('#slides2 li').eq(0).fadeIn(500);});
			pagination.eq(NN).addClass('current2').siblings('li').removeClass('current2');

			nownow=0;

			}
		}
		TT = setTimeout(GOGO, SPEED);
	}
	
	TT = setTimeout(GOGO, SPEED); 

})
/****************************************幻灯部分轮播结束**********************************/