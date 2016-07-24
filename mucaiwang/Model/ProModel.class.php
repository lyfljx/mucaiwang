<?php
//命名空间，类似于控制器
namespace Model;

use Think\Model\RelationModel;

//为数据表register_user创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php

class ProModel extends RelationModel
{


    protected $_auto = array(
        //设置当pro_cut_time数据写入时是以时间戳写入的
        array('pro_cut_time', 'strtotime', 1, 'function'),//function表示strtotime是一个函数名来着
        //  array('pro_create_time','time',2,'function'),
        //表示数据修改时，pro_create_time会把创建时间更新的

    );

    //关联com表
    protected $_link = array(

        'Com' => array(

            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'com_id',

        ),


        'Pro_pclass' => array(

            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'pro_pclass_id',
            'as_fields' => 'pro_pclass'

        ),
        'Pro_class' => array(

            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'pro_class_id',
            'as_fields' => 'pro_class'

        ),


        'Prov' => array(

            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'prov',
//            获取省份，外键必须是关联模型的外键，他会主动到被关联模型中找相对应id
            'as_fields' => 'prov_name'

        ),
        'City' => array(

            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'city',
            'as_fields' => 'city_name'

        ),

    );


}
