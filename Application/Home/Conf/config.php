<?php
/* 前台配置 */
    return array(
        //腾讯QQ登录配置
        'THINK_SDK_QQ' => array(
            
            'APP_KEY'               => '101250624', //应用注册成功后分配的 APP ID           
            'APP_SECRET'            => '01b7075cda3210d8c6a44f23eacafb57', //应用注册成功后分配的KEY              
            'CALLBACK'              => 'http://tianjianlong.com.cn',//回调地址        
            // 修改后，请记得的修改 View/header.html中的 qqadmin 值
        ),

        'URL_ROUTER_ON'             => true,   //开启路由
        //路由规则
        'URL_ROUTE_RULES' => array(
        '/^index$/'   =>    'Index/index',
        '/^about$/'   =>    'About/index', 
        '/^said$/'    =>  'Said/index',
        '/^said\/p\/(\d{1,})$/'  =>  'Said/index?p=:1',
        '/^feel-(\d{1,})$/'    	=>  'Feel/index?id=:1',
        '/^gustbook$/'      	=>  'Gustbook/index',
        '/^gustbook\/(\d{1,})$/'  =>	'Gustbook/index?page=:1',
        '/^album-(\d{1,5})$/'     =>  'Album/look?id=:1',
        '/^album$/'      =>  'Album/index',
        '/^class-(\d{1,})\/page\/(\d{1,})$/'  =>  'Class/index?id=:1&page=:2',
        '/^class-(\d)$/'    =>  'Class/index?id=:1',
       
    ),
);