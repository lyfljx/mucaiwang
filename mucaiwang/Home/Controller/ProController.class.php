<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;

class ProController extends Controller
{

    //商品展示
    function showlist($pro_user_id)
    {
        //实例化一个对象
        //实现分页效果
        $pro = new \Model\ProModel();

        $pclassInfo = $pro->where("pro_user_id=$pro_user_id")->relation(true)->select();//采用关联模型
        //1.获得总记录数
        $total = $pro->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 10;
        //每页显示的条数

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_pro where pro_status= 1 and pro_user_id= '$pro_user_id' order by pro_create_time desc " . $pag_obj->limit;
        //调用魔术方法
        $info = $pro->query($sql);

        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();
        //判断是否过期，改变字段值


        foreach ($info as $v) {
            //只检验pro_state为0的情况，若为1则不用检验，直接输出就行
            if ($v['pro_state'] == 0) {
                //然后判断时间是否过期
                if ($v['pro_cut_time'] < NOW_TIME) {
                    $v['pro_state'] = 1;
                    $pro->save($v);

                    $info1[] = $v;
                }
            } else {
                $info1[] = $v;
            }
        }

        //获取子父分类名称，省份城市名称
        foreach ($pclassInfo as $z) {
            foreach ($info1 as $zz) {
                if ($z['pro_id'] == $zz['pro_id']) {

                    $zz['pro_class'] = $z['pro_class'];
                    $zz['pro_pclass'] = $z['pro_pclass'];
                    $zz['prov'] = $z['prov_name'];//获取对应的省份
                    $zz['city'] = $z['city_name'];//获取对应的城市
                    $info2[] = $zz;
                }
            }
        }

//    print_r($info2);
//        exit;

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);
        $this->assign('info2', $info2);
        $this->display();
    }

    //过期产品展示
    function lookList($pro_user_id)
    {
        //实例化一个对象
        //实现分页效果
        $pro = new \Model\ProModel();

        $pclassInfo = $pro->where("pro_user_id=$pro_user_id")->relation(true)->select();//采用关联模型
        //1.获得总记录数
        $total = $pro->where("pro_user_id= $pro_user_id")->count();
        //是数据辅助方法，max(),min(),sum()

        $per = 15;
        //每页显示的条树

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_pro where pro_user_id= '$pro_user_id' order by pro_create_time desc " . $pag_obj->limit;
        //调用魔术方法
        $info = $pro->query($sql);

        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();


        foreach ($info as $v) {
            //只检验pro_state为0的情况，若为1则不用检验，直接输出就行
            if ($v['pro_state'] == 0) {
                //然后判断时间是否过期
                if ($v['pro_cut_time'] < NOW_TIME) {
                    $v['pro_state'] = 1;
                    $pro->save($v);
                    $info1[] = $v;
                }

            } else {

                $info1[] = $v;
            }
        }

        //获取子父分类名称，省份城市名称
        foreach ($pclassInfo as $z) {
            foreach ($info1 as $zz) {
                if ($z['pro_id'] == $zz['pro_id']) {
                    $zz['pro_class'] = $z['pro_class'];
                    $zz['pro_pclass'] = $z['pro_pclass'];
                    $zz['prov'] = $z['prov_name'];//获取对应的省份
                    $zz['city'] = $z['city_name'];//获取对应的城市
                    $zz['com_name'] = $z['Com']['com_name'];
                    $info2[] = $zz;
                }
            }
        }
        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);
        $this->assign('info2', $info2);
        $this->display();
    }

    //商品添加
    function tianjia()
    {
        //先实例化对象，方便if和else都可以使用
        $pro = new \Model\ProModel();//操作pro表
        $pClass = new \Model\Pro_pclassModel();//操作pro_class表
        $fclass = new \Model\Pro_classModel();

        //获取公司id，提交表单之后会存入com_class表中
        $user_id = session(home_id);
        $comId = M('Register_user')->where("user_id= $user_id")->field('com_id')->find();
        $com = M('Com')->find($comId['com_id']);//表示id
        $zclass = $fclass->select();
        //调用产品分类列表信息
        $class = $pClass->relation(true)->select();
        //展示已有的信息
        $this->assign('class', $class);
        $this->assign('zclass', $zclass);
        $this->assign('com', $com);
        //两个逻辑：收集表单，展示表单
        if (!empty($_POST)) {
//            dump($_POST);
//            exit;

            //处理上传过来的图片，$files是一个二维数组
            if ($_FILES['pro_album']['error'] < 4) {

                //在tp框架中，php代码中路径(相对路径)是相对于index.php来设定的
                $crg = array(
                    'rootPath' => './Admin/Public/', //保存根路径
                    'savePath' => 'Uploadss/', //保存路径
                    'maxSize ' => 55145728, // 设置附件上传大小
                    'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
                );

                $up = new \Think\Upload($crg);//传入$crg数组，更新配置
                //上传一个文件，$_FILES是一个二维数组
                //upload方法执行成功之后会把附件在（服务器上）名字和路径相关信息给我们返回
                $z = $up->uploadOne($_FILES['pro_album']);//支持多文件保存，直接把由上传上来的附件信息组成的数组扔进去就好
                if ($z) {
                    $bigimg = $up->rootPath . $z['savepath'] . $z['savename'];
                    $smallimg = $up->rootPath . $z['savepath'] . small . $z['savename'];

                    //B.做缩略图
                    $im = new \Think\Image();
                    //这里的路径也是相对于index.php来设定的
                    $im->open($bigimg);//报错时，显示不存在的图像文件
                    $im->thumb(100, 100, 2);
//                    $im->thumb(100, 100,6);
//                    $im->crop(50, 50, \Think\Image::IMAGE_THUMB_CENTER);//生成居中200x200规格的缩略图
//                    $im->crop(300,300);
                    $im->save($smallimg);

                    //dump($up->getError());
                    //把上传到服务器中的图片存入到数据库中，给数组添加一个元素,右边是路径拼接

                    $_POST['pro_albumpath'] = ltrim($bigimg, './');
                    $_POST['pro_salbumpath'] = ltrim($smallimg, './');
                } else {
                    $this->error($up->getErrorMsg());
                }//上传失败，提示错误
            }

            //收集表单,写入数据库
            $pro->create();
            //修改，增加有关字段值
            $pro->pro_cut_time = strtotime(I('post.pro_cut_time'));
            $pro->com_id = I('post.com_id');
            $pro->pro_create_time = I('post.pro_create_time');
            $pro->pro_user_id = session(home_id);
            $pro->pro_class_id = $_POST['class'];
            $pro->pro_pclass_id = $_POST['pclass'];

            $z = $pro->add();
            if ($z) {
                /* $this->redirect('showlist','array('a'=>'a','s'=>'s'地址参数)','2','添加产品成功');*/
                $this->success('添加产品成功', U('showlist', array(pro_user_id => session('home_id'))));
            } else {
                $this->error('添加产品失败', U('showlist', array(pro_user_id => session('home_id'))));
            }
        } else {
            //展示表单
            $this->display();
        }
    }

    //产品信息修改
    function xiugai($pro_id)
    {
        $pro = D('pro');
        /*echo $pro_id;*/
        //两个逻辑：收集，展示记录，添加数据到数据库
        if (!empty($_POST)) {

            $z = $pro->save($_POST);
            if ($z) {

                $this->redirect('showlist', 'array()', '3', '修改产品信息成功');

            } else {
                //修改失败时，必须转到指定的修改页面，所以要传递参数，而且会被形参 $pro_id 接收
                $this->redirect('xiugai', array('pro_id' => $pro_id), 3, '修改产品信息失败');
            }
        } else {

            //根据$pro_id获得被修改的产品的信息，并给模板展示,返回一个二维数组信息
            // 		    $info=$pro->select($pro_id);/*不用整二维数组，要一维数组就好*/
            //find()方法返回一维数组，而且是一条数据，没有参数时，默认打印出第一条数据
            $info = $pro->find($pro_id);

            $this->assign('info', $info);
            $this->display();
        }

    }

    function delete($pro_id)
    {

        $pro = D('Pro');
        //记住单引号中的变量是不被解析的，会被直接当成常量输出
        $info = $pro->where("pro_id='$pro_id'")->find();
//			dump($info);
//			exit;
        if ($info) {

            $update = array(

                'pro_id' => $info['pro_id'],
                'pro_status' => 0

            );
            $z = $pro->save($update);
            if (!empty($z)) {

                $this->success('删除成功！', U('showlist', array(pro_user_id => session('home_id'))));
//                           $this->redirect('showlist' ,"array('pro_user_id '=> session('home_id')", '');
            }

        }
    }

    //添加产品分类
    function addcate()
    {
        $pro_class = D('Pro_class');
        if (!empty($_POST)) {

            $info = $pro_class->add($_POST);

            if ($info) {

                $this->success('添加分类成功', U('addcate'));

            }

        }

        $this->display();


    }

    //分类列表
    function listcate()
    {

        $list = new \Model\Pro_pclassModel();
//		$info=$list->select();

        $pro = $list->relation(true)->select();
//		dump($pro);
//		exit;
        $this->assign('pro', $pro);

        $this->display();


    }

    //删除分类
    function delcate($listcate)
    {


        $this->display();


    }

    //展示商品图片
    function image($pro_id)
    {

        $z = M('Pro')->find($pro_id);
        $this->assign('z', $z);

        $this->display();
    }

    //查看产品描述
    function desc($pro_id)
    {

        $info = M('Pro')->where("pro_id=$pro_id")->find();

        $this->assign('info', $info);
        $this->display();

    }

    //种类
    function kind()
    {

        if (!empty($_POST)) {

            dump($_POST);
            exit;

        }

        $this->display();


    }

    //前台产品展示

    function showPro($pro_id)
    {

        $Pro = new \Model\ProModel();
//         $com_id=$Pro->where("pro_id=$pro_id")->field('com_id')->find();

        $info = $Pro->relation(true)->where("pro_id=$pro_id")->find();
//        dump($info);
//        exit;

        $this->assign('info', $info);


        $this->display();


    }


    //产品评论展示
    function  Prodesc($pro_id){

          $pro= M('Pro')->where("pro_id=$pro_id")->find();

        if(empty($pro)){

            $this->error('暂无评论');
        }else{

            $this->assign('desc',$pro);
            $this->display();

        }



    }

}

