<?php
//命名空间，类似于控制器
namespace Model;
use Think\Model;
use Think\Model\RelationModel;
//为数据表offer_buy_order表创建一个model模型
//父类Model:ThinkPHP/Library/Think/Model.class.php
//这是关联offer表的模型
class Offer_buy_orderModel extends RelationModel
{
    protected $_link = array(
//多对多的关联关系，当时只有一个匹配信息时，是不会显示出来的，只有多条信息才会显示
        'Offer' => array(
            'mapping_type'=> self::MANY_TO_MANY,
            'relation_table'=>'mucai_offer_buy',
            'foreign_key'=>'offer_buyer_id',//关联表的外键，是“offer_buy_order表”的外键
            'relation_foreign_key'=>'offer_id',//是“offer_buy表”的外键，名字在对应的表中要存在而且要相同，
            //不然无法识别，因为此时关联表中只靠名字进行识别，所以设置外键也没用
            'mapping_name'=>'offer'

        ),

    );

}