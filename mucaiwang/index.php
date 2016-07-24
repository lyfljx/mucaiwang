<?php
header("content-type:text/html;charset=utf8");
//function show_bug($info) {
//	/*\"有转义的意思*/
//	echo "<pre style=\"color:red;\">";
//
//	var_dump($info);
//
//	echo "</pre>";
//
//}


//这里是打印数组
function p ($array){
    dump($array,1,'<pre>',0);
}


/*
 * 递归重组节点信息为多维数组
* */
function node_merge($node,$access = NULL,$pid = 0){
    $arr = array();

    foreach ($node as $v){

        if(is_array($access)){
            $v['access'] = in_array($v['id'], $access)? 1:0;
        }
        if($v['pid']==$pid){
            $v['child']=node_merge($node,$access,$v['id']);
            $arr[]=$v;
        }
    }
    return $arr;
}

//显示当前时间,以‘年-月-日’形式
function showtime($t){
//对传进来的时间进行判断
    if($t != NOW_TIME){
        $time=date('Y-m-d',$t);

    }else{ $time=date('Y-m-d',$t);}

    echo $time;
}



//框架两种模式：（默认）生产模式（已经发布在线上），开发者模式（调试）
define('APP_DEBUG', true);
//开发模式（错误显示非常具体）
// define('APP_DEBUG',false);//若不设计，就是默认为生产模式

//定义图片引入路径为常量（前台）
//Home分组
define('HOME_CSS_URL', '/mucaiwang/Home/Public/CSS/');
define('HOME_IMG_URL', '/mucaiwang/Home/Public/img/');
define('HOME_JS_URL', '/mucaiwang/Home/Public/JS/');
// define('JS_URL','mucaiwang/Home/Public/js');
//输出为：<?php echo CSS_URL;

//原图片和缩略图在模板中显示路径
define('SILE_URL', 'http://www.php99.com/mucaiwang/');


//define('SILE_URL', '/mucaiwang/Admin/Uploadss/');


//这是Admin分组
define('ADMIN_CSS_URL', '/mucaiwang/Admin/Public/CSS/');
define('ADMIN_IMG_URL', '/mucaiwang/Admin/Public/img/');
define('ADMIN_JS_URL', '/mucaiwang/Admin/Public/JS/');



//引入框架的接口文件
require '../ThinkPHP/ThinkPHP.php';
