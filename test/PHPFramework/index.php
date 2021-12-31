<?php

/**
* 默认入口
* 作者：alpha
* 联系：QQ：319224740
* 声明：本源码遵循开源协议，版权为作者所有，请勿用于商业用途
*/




require_once('./library/start.php');
alpha::$app_list[] = 'common'; //模块注册范例，必须注册common模块，因为这个模块处理默认请求
alpha::$app_list[] = 'home';//必须给先给数组赋值再start，注意顺序
alpha::$app_list[] = 'manager';
alpha::start();

?>