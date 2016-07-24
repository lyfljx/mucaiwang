<?php
//命名空间，类似于控制器
namespace Model;
use Think\Model;
use Think\Model\RelationModel;
//为数据表Com_desc表创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php

class ProvModel extends RelationModel
{
    protected $_link = array(
//多对多的关联关系，当时只有一个匹配信息时，是不会显示出来的，只有多条信息才会显示
        'City' => array(
            'mapping_type'=> self::HAS_MANY,
            'foreign_key'=>'prov_id',//关联表的外键，是“offer_buy_order表”的外键
            'mapping_name'=>'city',
//            'mapping_fields'=>'city_name',


        ),

    );

}