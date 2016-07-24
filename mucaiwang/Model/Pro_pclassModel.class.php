<?php
//命名空间，类似于控制器
namespace Model;
use Think\Model\RelationModel;

//为数据表register_user创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php

class Pro_pclassModel extends RelationModel{
	
	//关联模型相关配置
   protected  $_link=array(

        'Pro_class'=>array(

           'mapping_type'=>self::HAS_MANY,//关联类型，表示当前模型与pro_class是以对多的关系
            'class_name'=>'Pro_class', //被关联的模型类名
          'foreign_key '=>'pro_pclass_id',//被当前（数据表）里面的外键（关联到pro_class表中的主键）
             'mapping_name'=>'pro_class'//想要在被关联表中查询的字段（的数据）
//             'mapping_fields'=>'pro_class'
//           'as_field'=>'pro_class:pro_name',
//              'condition'=> ''
//          关联要返回的记录数目
//                'mapping_order' =>'',
//                'mapping_limit'  =>''


     ),


   );

   }
