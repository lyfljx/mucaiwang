<?php
//命名空间，类似于控制器
namespace Model;

use Think\Model;
use Think\Model\RelationModel;
//为数据表register_user创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php

 class ComModel extends RelationModel{


     //关联register_user表
     protected $_link= array(

         'Register_user'=> array(
//
                  'mapping_type' => self::HAS_ONE,
                  'mapping_name'=>'user',
//                'class_name' =>'Register_user',
                  'foreign_key' => 'com_id',
//               'mapping_name' => 'user_name,user_email,user_job,user_phone,user_fixed_phone,portraiture,user_qq',
                  'as_fields' =>'com_id,user_id,user_name,user_true_name,user_email,user_job,user_phone,user_fixed_phone,portraiture,user_qq',
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


