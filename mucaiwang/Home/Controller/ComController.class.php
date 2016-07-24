<?php
namespace Home\Controller;
use Think\Controller;
class ComController extends Controller {

	//̨ 首页
         function com(){


		  $com = new  \Model\ComModel();

		  $z= $com->relation(true)->select();

		  dump($z);






	  }

}