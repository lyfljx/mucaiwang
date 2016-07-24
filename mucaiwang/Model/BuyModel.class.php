<?php

namespace Model;
use Think\Model\RelationModel;

//为user表创建一个模型类
class BuyModel extends RelationModel{
	/*
	 * 用户与角色关联模型
	* */
	//定义主表名，默认是除Model外的名字
	//Protected $tableName = 'purchase_info';
	//定义关联关系
	Protected $_link = array(
		//关联的表
		'register_user' =>array(
			/*'mapping_type'=>MANY_TO_MANY,//关联关系=>多对多关系
            'foreign_key'=>'user_id',//指定主表外键名称
            'relation_key'=>'role_id',//指定关联表外键名称
            'relation_table'=>'mucai_role_user',//指定中间表名称
            'mapping_fields'=>'id,name,remark'//指定只读取的字段名称*/

			'mapping_type'=>self::MANY_TO_MANY,
			'class_name'=>'register_user',
			'mapping_name'=>'register_user',
			'foreign_key'=>'buy_id',
			'relation_foreign_key'=>'register_id',
			'relation_table'=>'mucai_buy_register_user',
		),
			
			
			'Pro_pclass' => array(
			
					'mapping_type' => self::BELONGS_TO,
					'foreign_key' => 'pclass_id',
					'as_fields' => 'pro_pclass'
			
			),
			'Pro_class' => array(
			
					'mapping_type' => self::BELONGS_TO,
					'foreign_key' => 'class_id',
					'as_fields' => 'pro_class'
			
			),
			'Com' => array(
			
					'mapping_type' => self::BELONGS_TO,
					'foreign_key' => 'offer_com_id',
					'as_fields' => 'com_name'
			
			),
			'Prov' => array(
			
					'mapping_type' => self::BELONGS_TO,
					'foreign_key' => 'pur_province',
					//            获取省份，外键必须是关联模型的外键，他会主动到被关联模型中找相对应id
					'as_fields' => 'prov_name'
			
			),
			'City' => array(
			
					'mapping_type' => self::BELONGS_TO,
					'foreign_key' => 'pur_city',
					'as_fields' => 'city_name'
			
			),
			
			
	);
}
?>