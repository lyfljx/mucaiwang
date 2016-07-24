<?php
/*
 * 这里是Rbac权限管理控制器
 * */
namespace Admin\Controller;

use Think\Controller;

Class RbacController extends CommonController
{

    //这里是添加角色方法
    public function addRole()
    {
        $this->display();
    }


    //这里是添加角色表单处理方法
    public function addRoleHandle()
    {
        //把接收过来的数据存进数据库
        if (M('role')->add($_POST)) {
            $this->success('添加角色成功', U('Admin/Rbac/role'));
        } else {
            $this->error('添加角色失败');
        }

    }


    //这里是角色列表方法
    public function role()
    {
        $this->role = M('role')->select();
        $this->display();
    }


    //这里是添加节点方法
    public function addNode()
    {

        //这里分配节点列表点击添加时的pid、level
        $this->pid = I('pid', '0', intval);
        $this->level = I('level', '1', intval);

        //这里方便显示添加节点页面的应用和控制器、方法
        switch ($this->level) {
            case 1 :
                $this->type = '应用';
                break;
            case 2 :
                $this->type = '控制器';
                break;
            case 3 :
                $this->type = '方法';
                break;
        }

        $this->display();
    }

    //这里是添加节点表单提交方法
    public function addNodeHandle()
    {

        //插入数据库
        if (M('node')->add($_POST)) {
            $this->success('添加节点成功', U('Admin/Rbac/node'));
        } else {
            $this->error('添加节点失败');
        }
    }

    //这里是节点列表方法
    public function node()
    {

        //把节点从数据库提取出来，再递归重组，再分配
        $node = M('node')->order('sort')->select();
        $this->node = node_merge($node);

        $this->display();
    }

    //这里是配置权限方法
    Public function access()
    {
        $rid = I('rid', 0, 'intval');

        $field = array('id', 'name', 'title', 'pid');
        $node = M('node')->order('sort')->field($field)->select();

        //原有权限
        $access = M('access')->where(array('role_id' => $rid))->getField('node_id', true);

        $node = node_merge($node, $access);
        $this->node = $node;
        $this->rid = $rid;
        $this->display();
    }

    //这里是配置权限表单提交方法
    public function setAccess()
    {
        $rid = I('rid', 0, 'intval');

        //删除原权限
        M('access')->where(array('role_id' => $rid))->delete();

        //组合新权限
        $data = array();
        foreach ($_POST['access'] as $v) {
            $tmp = explode('_', $v);
            $data[] = array(
                'role_id' => $rid,
                'node_id' => $tmp[0],
                'level' => $tmp[1]
            );
        }

        //插入新权限
        if (M('access')->addAll($data)) {
            $this->success('修改权限成功', U('Admin/Rbac/role'));
        } else {
            $this->error('修改失败');
        }
    }

    //添加用户
    public function addUser()
    {
        $this->role = M('role')->select();
        $this->display();
    }

    //添加用户提交表单
    public function addUserHandle()
    {
        $user = array(
            'username' => I('username'),
            'password' => I('password', '', 'md5'),
            'logintime' => time(),
            'loginip' => get_client_ip()
        );

        $role = array();//申明$role是一个数组
        if ($uid = M('user')->add($user)) {
            foreach ($_POST['role_id'] as $v) {
                $role[] = array(
                    'role_id' => $v,
                    'user_id' => $uid
                );
            }
            M('role_user')->addAll($role);
            $this->success('添加用户成功', U('Admin/Rbac/user'));
        }
    }

    //用户列表
    public function user()
    {
        $info = new \Model\UserModel();
        $this->user = $info->field('password', true)->relation(true)->select();
        $this->display();
    }
    //锁定用户
    public  function lock(){
        $uid = I('uid');
        $lock = M('user')->where(array('id'=>$uid))->save(array('lock'=>1));
        if($lock){
            $this->success('锁定成功',U('Admin/Rbac/user'));
        }else {
            $this->error('锁定失败');
        }
    }

    //解除锁定用户
    public  function outlock(){
        $uid = I('uid');
        $lock = M('user')->where(array('id'=>$uid))->save(array('lock'=>0));
        if($lock){
            $this->success('解除锁定成功',U('Admin/Rbac/user'));
        }else {
            $this->error('解除锁定失败');
        }
    }

    //删除节点
    public function delNode(){
        $nid=I('nid','',intval);

        if(D('node')->where(array('id'=>$nid))->delete()){
            $this->success('删除节点成功',U('Admin/Rbac/node'));
        }else{
            $this->error('删除节点失败',U('Admin/Rbac/node'));
        }
    }

    //修改节点
    public function altNode(){
        //这里分配节点列表点击添加时的pid、level
        $this->pid = I('pid','0',intval);
        $this->level = I('level','1',intval);

        //这里方便显示添加节点页面的应用和控制器、方法
        switch ($this->level){
            case 1 :$this->type='应用';
                break;
            case 2 :$this->type = '控制器';
                break;
            case 3 :$this->type = '方法';
                break;
        }

        $nid = I('nid','',intval);
        $node = D('node')->where(array('id'=>$nid))->find();
        $this->node = $node;
        $this->display();
    }

    //修改节点表单提交方法
    public function altNodeHandle(){
        //插入数据库
        if(M('node')->where(array('id'=>$_POST['id']))->save($_POST)){
            $this->success('修改节点成功',U('Admin/Rbac/node'));
        }else{
            $this->error('修改节点失败');
        }

    }

    //锁定角色
    public function lockRole(){
        $rid = I('rid','',intval);
        $role = D('role')->where(array('id'=>$rid))->find();
        $role['status']=0;

        $lock = M('role')->where(array('id'=>$rid))->save($role);
        if($lock){
            $this->success('锁定成功',U('Admin/Rbac/role'));
        }else {
            $this->error('锁定失败');
        }
    }

    //解除锁定角色
    public function outLockRole(){
        $rid = I('rid','',intval);
        $role = D('role')->where(array('id'=>$rid))->find();
        $role['status']=1;
        $lock = M('role')->where(array('id'=>$rid))->save($role);
        if($lock){
            $this->success('解除锁定成功',U('Admin/Rbac/role'));
        }else {
            $this->error('解除锁定失败');
        }
    }

    //企业列表
    public function company()
    {

    }
}


?>