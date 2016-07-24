<?php

namespace Model;

use Think\Model\RelationModel;

//为user表创建一个模型类
class UserModel extends RelationModel
{
    /*
     * 用户与角色关联模型
    * */
    //定义主表名，默认是除Model外的名字
    //Protected $tableName = 'user';
    //定义关联关系
    Protected $_link = array(
        //关联的表
        'role' => array(
            /*'mapping_type'=>MANY_TO_MANY,//关联关系=>多对多关系
            'foreign_key'=>'user_id',//指定主表外键名称
            'relation_key'=>'role_id',//指定关联表外键名称
            'relation_table'=>'mucai_role_user',//指定中间表名称
            'mapping_fields'=>'id,name,remark'//指定只读取的字段名称*/

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