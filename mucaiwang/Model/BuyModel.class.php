<?php

namespace Model;
use Think\Model\RelationModel;

//Ϊuser����һ��ģ����
class BuyModel extends RelationModel{
	/*
	 * �û����ɫ����ģ��
	* */
	//������������Ĭ���ǳ�Model�������
	//Protected $tableName = 'purchase_info';
	//���������ϵ
	Protected $_link = array(
		//�����ı�
		'register_user' =>array(
			/*'mapping_type'=>MANY_TO_MANY,//������ϵ=>��Զ��ϵ
            'foreign_key'=>'user_id',//ָ�������������
            'relation_key'=>'role_id',//ָ���������������
            'relation_table'=>'mucai_role_user',//ָ���м������
            'mapping_fields'=>'id,name,remark'//ָ��ֻ��ȡ���ֶ�����*/

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
					//            ��ȡʡ�ݣ���������ǹ���ģ�͵����������������������ģ���������Ӧid
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