
$.ajaxSetup ({ 
    cache: false
});
var  lock  = 0;
function loading(){
    var boxHtml = '<div class="baomsgbox"></div>';
   
    if($(".msgbox").length  ==  0){
        $("body").append(boxHtml);
    }
    $(".msgbox").html('<img src="'+Yzx_PUBLIC+'/images/loading.gif" /><span  style=" color: blue;">正在加载中...</span>');
    $(".msgbox").show();
    lock = 1;
}

function LoginSuccess(){
    $(".msgbox").show();
    $(".baodialog").remove();
    success('登录成功',3000,"loginCallback()");
}

function loginCallback(){
    $.get(Yzx_ROOT+"/index.php?m=passport&a=check&mt="+Math.random(),function(data){
        $(".topOne").find('.left').html(data); 
    },'html');
    return true;
}

function ajaxLogin(){
    hidde();
    var boxHtml = '<div class="baodialog"></div>';
    if($(".baodialog").length  ==  0){
        $("body").append(boxHtml);
        $(".baodialog").css('height',document.body.scrollHeight + 'px');
    }
    var url = Yzx_ROOT+'/index.php?g=home&m=passport&a=ajaxloging&t='+Math.random();    
    var width = document.body.clientWidth
    $.get(url,function(data){
       
        $(".baodialog").html('<div class="baodialog_bg"></div>'+data);
        var left =  (width - 616)/2;
        var top = $(window).scrollTop() + 200;
        $(".loginPop").css({
            'left':left+'px',
            'top':top+'px'
            });
        
        $(".baodialog").show();
    },'html');    

}

function success(msg,timeout,callback){
    var boxHtml = '<div class="baomsgbox"></div>';
    if($(".msgbox").length  ==  0){
        $("body").append(boxHtml);
    }
    
    $(".msgbox").html('<img src="'+Yzx_PUBLIC+'/images/right.gif" /><span  style=" color: green;">'+msg+'</span>');
    $(".msgbox").show();
    setTimeout(function(){
        lock = 0;
        $(".msgbox").hide();
        eval(callback);
    },timeout ? timeout : 3000);
}
function error(msg,timeout,callback){
    var boxHtml = '<div class="baomsgbox"></div>';
    if($(".msgbox").length  ==  0){
        $("body").append(boxHtml);
    }
    $(".msgbox").html('<img src="'+Yzx_PUBLIC+'/images/wrong.gif" /><span  style=" color: red;">'+msg+'</span>');
    $(".msgbox").show();
    setTimeout(function(){
        lock = 0;
        $(".msgbox").hide();
        eval(callback);           
    },timeout ? timeout : 3000);
}

function hidde(){
    $(".msgbox").hide();
    lock = 0;
}

function jumpUrl(url){
    if(url){
        location.href=url;
    }else{
        history.back(-1);
    }
}
    
function yzmCode(){ //更换验证码
    $(".yzm_code").click();
}  



$(document).ready(function(e){
  
    $(document ).on("click","input[type='submit']",function(e){
        e.preventDefault();
        if(!lock){
            loading();
            if($(this).attr('rel')){
                $("#"+$(this).attr('rel')).submit();
            }else{
                $(this).parents('form').submit();    
            }
        }         
    }); 
    $(document).on('click','.yzm_code',function(){
        $("#"+$(this).attr('rel')).attr('src',Yzx_ROOT+'/index.php?m=public&a=verify&mt='+Math.random());
    });
    
    $(document).on("click","a[mini='act']",function(e){
        e.preventDefault();
        if(!lock){
            loading();
            
            $("#baocms_frm").attr('src',$(this).attr('href'));      
        }  
    });
    
     $(document).on("click","a[mini='buy']",function(e){ //购买的算法
        e.preventDefault();
        if(!lock){
            loading();
            var url = $(this).attr('href');
            if(url.indexOf('?') >0){
                url+='&num='+$('#'+$(this).attr('rel')).val();
            }else{
                url+='?num='+$('#'+$(this).attr('rel')).val();
            }
            $("#baocms_frm").attr('src',url);      
        }  
    });
    $(document).on("click","a[mini='tuan']",function(e){ //购买的算法
        e.preventDefault();
        if(!lock){
            lock=1;
            var url = $(this).attr('href');
            if(url.indexOf('?') >0){
                url+='&num='+$('#'+$(this).attr('rel')).val();
            }else{
                url+='?num='+$('#'+$(this).attr('rel')).val();
            }
           location.href= url;    
        }  
    });
    
    
    $(document).on("click","a[mini='load']",function(e){ //前台的MINILOAD 重构了
        e.preventDefault();
        var boxHtml = '<div class="baodialog"></div>';
        if($(".baodialog").length  ==  0){
            $("body").append(boxHtml);
            $(".baodialog").css('height',document.body.scrollHeight + 'px');
        }
        if(!lock){
            loading();
            var href = $(this).attr('href');
            if(href.indexOf('?') >0){
                href+='&mini=load';
            }else{
                href+='?mini=load'; //ajax 的判断
            }
             
            $.get(href,function(data){
               
                hidde();
                if(data == 0){
                    ajaxLogin();
                }else{
                    $(".baodialog").html('<div class="baodialog_bg"></div>'+data);
                    $(".baodialog").show();
                }                
            },'html');
        }
    });
    $(document).on("click",".bao_closed",function(e){
        e.preventDefault();
        hidde();
        $('.baodialog').hide();
    });
    
    //全选
    $(document).on("click",".checkAll",function(e){
        var child = $(this).attr('rel');
        $(".child_"+child).prop('checked',$(this).prop("checked"));
    });
    


   
    
    $('.jq_star_show').each(function(){
        var val = $(this).attr('rel');
        var str = '';
        var num = parseInt(val/10);
        var num2 = 5-num;
        for(i=0;i<num;i++){
            str+= '<img src="'+Yzx_PUBLIC+'/images/star1.jpg"/>';
        }
        for(i=0;i<num2;i++){
            str+= '<img src="'+Yzx_PUBLIC+'/images/star2.jpg"/>';
        }
        $(this).html(str);
    });
    
    $(".jq_opacity_img img").mouseover(function(){
        $(this).stop().animate({
            opacity:'0.5'
        },300);
    }).mouseout(function(){
        $(this).stop().animate({
            opacity:'1'
        },300);
    });
    
    
    $(".jq_back_top").click(function(e){
        var rel = $(this).attr('rel');
        rel = rel ==undefined ? 200:rel;
        $("html,body").animate({
            scrollTop:0
        },rel);
    });
   
});