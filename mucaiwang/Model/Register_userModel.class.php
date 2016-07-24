<?php
//命名空间，类似于控制器
namespace Model;
use Think\Model;
use Think\Verify;
use Think\Model\RelationModel;
//为数据表register_user创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php

class Register_userModel extends RelationModel
{

    //批处理验证
//    protected $patchValidate = true;
    //定义自动验证方法
    //是一个二维数组
    protected $_validate = array(

        //array( ‘验证字段1’,‘验证规则’,‘错误提示’,[验证条件,附加规则,验证时间]),必须要按照顺序来写（每一个条件）
        //并且验证错误是一条一条输出的，不会全部给，只有纠正一个之后才可以改下一个错误
        //用户名验证，不能为空，而且要唯一，用到附加规则
//        array('user_name', 'require', '用户名不能为空'),
        array('user_name', '', '用户名已经存在', 0, 'unique'),

    );

    //     登录验证时验证密码和同户名
    function checkNamepwd($nam, $pwd)
    {
        //验证用户名是否正确
        $info = $this->where("user_name='$nam'")->find();
        //			    dump($info);//有结果集的话就会返回结果，不然就会返回null
        if ($info) {
            if ($info['user_password'] === md5($pwd)) {
                return $info;
            } else {
                return null;
            }
        }
    }


        protected $_link=array(

            'Com'=>array(


         'mapping_type' => self::BELONGS_TO,
       'foreign_key' => 'com_id',
          'as_fields'=>'com_id,com_name,com_attribute,com_trade,com_address,com_main_pro,com_owned_market,com_url,com_create_time,com_city,com_prov'

),

            'Com_attribute'=>array(

                'mapping_type' => self::BELONGS_TO,
                'foreign_key' => 'com_attribute',
                'as_fields'=>'com_attribute:attribute'

            ),

            'Com_trade'=>array(

                'mapping_type' => self::BELONGS_TO,
                'foreign_key' => 'com_trade',
                'as_fields'=>'com_trade:trade'

            ),

            'Com_market'=>array(

                'mapping_type' => self::BELONGS_TO,
                'foreign_key' => 'com_owned_market',
                'as_fields'=>'com_owned_market:market'

            ),
            'Prov'=>array(

                'mapping_type' => self::BELONGS_TO,
                'foreign_key' => 'com_prov',
                'as_fields'=>'prov_name'

            ),
            'City'=>array(

                'mapping_type' => self::BELONGS_TO,
                'foreign_key' => 'com_city',
                'as_fields'=>'city_name'

            ),

        );



}