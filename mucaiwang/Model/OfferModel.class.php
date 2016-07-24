<?php
//命名空间，类似于控制器
namespace Model;

use Think\Model;
use Think\Model\RelationModel;

//为数据表register_user创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php

class OfferModel extends RelationModel
{
    protected $_link = array(

        'Register_user' => array(
            'mapping_type' => self::MANY_TO_MANY,
            'relation_table' => 'mucai_offer_buyer',
            'foreign_key' => 'offer_id',
            'relation_foreign_key' => 'buyer_id',
            'mapping_name' => 'buyer'

        ),

     
    		
    		'Pro_pclass' => array(
    					
    				'mapping_type' => self::BELONGS_TO,
    				'foreign_key' => 'pclass',
    				'as_fields' => 'pro_pclass'
		
    		),
    		'Pro_class' => array(
    					
    				'mapping_type' => self::BELONGS_TO,
    				'foreign_key' => 'class',
    				'as_fields' => 'pro_class'
		
    		),
    		'Com' => array(
    					
    				'mapping_type' => self::BELONGS_TO,
    				'foreign_key' => 'offer_com_id',
    				'as_fields' => 'com_name'
		
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