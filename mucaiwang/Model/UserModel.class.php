<?php

namespace Model;

use Think\Model\RelationModel;

//Ϊuser����һ��ģ����
class UserModel extends RelationModel
{
    /*
     * �û����ɫ����ģ��
    * */
    //������������Ĭ���ǳ�Model�������
    //Protected $tableName = 'user';
    //���������ϵ
    Protected $_link = array(
        //�����ı�
        'role' => array(
            /*'mapping_type'=>MANY_TO_MANY,//������ϵ=>��Զ��ϵ
            'foreign_key'=>'user_id',//ָ�������������
            'relation_key'=>'role_id',//ָ���������������
            'relation_table'=>'mucai_role_user',//ָ���м������
            'mapping_fields'=>'id,name,remark'//ָ��ֻ��ȡ���ֶ�����*/

            'mapping_type' => self::MANY_TO_MANY,
            'class_name' => 'role',
            'mapping_name' => 'role',
            'foreign_key' => 'user_id',
            'relation_foreign_key' => 'role_id',
            'relation_table' => 'mucai_role_user',
        )
    );
}

?>