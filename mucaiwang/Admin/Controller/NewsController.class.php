<?php
namespace Admin\Controller;

use Think\Controller;

//这里是新闻管理控制器
Class  NewsController extends CommonController
{

    //发布新闻方法
    public function release()
    {
        $this->display();
    }

    //发布新闻表单处理
    public function releaseHandle()
    {

        /**/


        //从新定义数组，来添加新闻
        $new = array(
            'title' => $_POST['title'],
            'textarea' => $_POST['textarea'],
            'time' => time(),
        );
        //格式化储存新闻正文
        $new['textarea'] = nl2br($new['textarea']);
        //将新闻插入并返回id值
        $add = M('new')->add($new);

        //上传图片
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Admin/Public/img/new/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        $upload->saveExt = 'jpg';
        // 开启子目录保存 并以日期（格式为Ymd）为子目录
        $upload->autoSub = true;
        $upload->subName = array('date', 'Ymd');
        //更改名称
        $upload->saveName = $add;
        // 上传文件
        $info = $upload->upload();
        if ($add) {
            $this->success('发布新闻成功');
        } else {
            $this->error('发布新闻失败');
        }
    }

    //这里是新闻列表方法
    public function newList()
    {
        $offer = new \Model\OfferModel();
        //1.获得总记录数
        //$total = $offer->count();
        $total = M('new')->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 13;
        //每页显示的条树
        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);
        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_new  order by time desc " . $pag_obj->limit;
        //调用魔术方法
        $new = $offer->query($sql);
        $this->new = $new;
        $this->display();
    }

    //这里是删除新闻方法
    public function delNew()
    {
        $nid = I('nid', '', intval);
        $new = M('new')->where(array('id' => $nid))->delete();
        if ($new) {
            $this->success('删除新闻成功');
        } else {
            $this->error('删除失败');
        }

    }

    //这里是修改新闻
    public function altNew()
    {
        $nid = I('nid', '', intval);
        $new = M('new')->where(array('id' => $nid))->find();
        $this->new = $new;
        $this->display();
    }

    //这里是修改新闻表单提价
    public function altNewHandle()
    {
        $new = array(
            'title' => $_POST['title'],
            'textarea' => $_POST['textarea'],
            'time' => time(),
        );
        $nid = I('nid', '', intval);
        if (M('new')->where(array('id' => $nid))->save($new)) {
            $this->success('修改新闻成功', U('Admin/News/newList'));
        } else {
            $this->error('修改新闻失败');
        }
    }

    //发布快讯方法
    public function addAlert()
    {
        $this->display();
    }

    //发布快讯表单处理
    public function addAlertHandle()
    {

        /**/


        //从新定义数组，来添加新闻
        $alert = array(
            'title' => $_POST['title'],
            'textarea' => $_POST['textarea'],
            'time' => time(),
        );
        //格式化储存新闻正文
        $alert['textarea'] = nl2br($alert['textarea']);
        //将新闻插入并返回id值
        $add = M('alert')->add($alert);

        //上传图片
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Admin/Public/img/alert/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        $upload->saveExt = 'jpg';
        // 开启子目录保存 并以日期（格式为Ymd）为子目录
        $upload->autoSub = true;
        $upload->subName = array('date', 'Ymd');
        //更改名称
        $upload->saveName = $add;
        // 上传文件
        $info = $upload->upload();
        /* echo '$add'.$add.'$info'.$info;
         die;*/
        if ($add) {
            $this->success('发布快讯成功');
        } else {
            $this->error('发布快讯失败');
        }
    }


    //这里是快讯列表方法
    public function alertList()
    {
        $offer = new \Model\OfferModel();
        //1.获得总记录数
        //$total = $offer->count();
        $total = M('alert')->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 13;
        //每页显示的条树
        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);
        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_alert  order by time desc " . $pag_obj->limit;
        //调用魔术方法
        $alert = $offer->query($sql);
        $this->alert = $alert;
        $this->display();
    }

    //这里是快讯新闻
    public function altAlert()
    {
        $nid = I('nid', '', intval);
        $alert = M('alert')->where(array('id' => $nid))->find();
        $this->alert = $alert;
        $this->display();
    }

    //这里是修改新闻表单提价
    public function altAlertHandle()
    {
        $alert = array(
            'title' => $_POST['title'],
            'textarea' => $_POST['textarea'],
            'time' => time(),
        );
        $nid = I('nid', '', intval);
        if (M('alert')->where(array('id' => $nid))->save($alert)) {
            $this->success('修改快讯成功', U('Admin/News/alertList'));
        } else {
            $this->error('修改快讯失败');
        }
    }

    //这里是删除快讯方法
    public function delAlert()
    {
        $nid = I('nid', '', intval);
        $alert = M('alert')->where(array('id' => $nid))->delete();
        if ($alert) {
            $this->success('删除快讯成功');
        } else {
            $this->error('删除快讯失败');
        }

    }


} 