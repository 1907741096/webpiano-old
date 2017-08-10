<?php

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',false);
$_GET['m']=(isset($_GET['m'])&&$_GET['m']!='') ? $_GET['m'] : 'admin';
$_GET['c']=(isset($_GET['c'])&&$_GET['c']!='') ? $_GET['c'] : 'index';
$_GET['a']=(isset($_GET['a'])&&$_GET['a']!='') ? $_GET['a'] : 'index';
// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
