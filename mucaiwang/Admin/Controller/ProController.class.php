<?php
namespace Admin\Controller;

use Think\Controller;

class ProController extends Controller
{

    //添加产品分类
    function addcate()
    {
        $pro_pclass = new \Model\Pro_pclassModel();
        $pclass = M('Pro_pclass')->select();
        $pro_class = M('Pro_class');
        $this->assign('pclass', $pclass);
        if (!empty($_POST)) {
//            dump($_POST);
//            exit;
            //从表单那边提交一个隐藏后台管理员id'
            if ($_POST['uid']) {

                //这里是添加父分类的的逻辑,如果存在home_id,就执行以下逻辑

                $pro_pclass->create();
                $data = array(
                    'pro_pclass' => I('Post.pro_pclass'),
                );
                if ($pro_pclass->add($data)) {

                    $this->success('添加分类成功', U('addcate'));

                }
            } else {


                $data = array(

                    'pro_pclass_id' => I('post.pro_pclass_id'),
                    'pro_class' => I('post.pro_class'),

                );
//                dump($data);
//                exit;
                $info = $pro_class->add($data);

                if ($info) {

                    $this->success('添加分类成功', U('addcate'));
                }
            }
        } else {
            $this->display();
        }

    }

    //分类列表
    function listcate()
    {

        $list = new \Model\Pro_pclassModel();
//		$info=$list->select();

        $pro = $list->relation(true)->select();

        $this->assign('pro', $pro);

        $this->display();


    }

    //删除分类
    function delcate($pro_pclass_id, $pro_class_id = 1)
    {
        if ($pro_class_id) {
//         $Pro_pclass= new  \Model\Pro_pclassModel();
//     $c= $Pro_pclass->relation(true)->find("$pro_pclass_id");

            $c = M('Pro_class')->find("$pro_class_id");

            //遍历成一维数组
            $v = $c['pro_class_id'];
            $z = D('Pro_class')->where("pro_class_id=$v")->delete();
            if ($z === FALSE) {
                $this->error('删除失败！');
                return;
            } elseif ($z === 0) {
                $this->error('你要删除的信息不存在!');
                return;
            } else {
                $this->success('删除成功！');
            }
        }else{$this->display();}



    }

}
