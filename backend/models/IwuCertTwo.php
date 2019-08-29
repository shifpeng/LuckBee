<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iwu_cert_two".
 *
 * @property int $id id主键
 * @property string $lm_member_id 贷超用户id
 * @property string $name 待检测姓名
 * @property string $identity 待检测身份证号
 * @property string $add_time 添加时间
 * @property string $update_time 更新时间
 * @property int $check_result 1.身份证号和姓名匹配 2.身份证号和姓名不匹配 3.身份证号不存在 4.查询结果为空
 * @property int $status 0 未认证 1认证成功 2认证失败 
 * @property int $del_flag 逻辑删除标志
 */
class IwuCertTwo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iwu_cert_two';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db5');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['add_time', 'update_time'], 'safe'],
            [['check_result', 'status', 'del_flag'], 'integer'],
            [['lm_member_id'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 50],
            [['identity'], 'string', 'max' => 18],
            [['lm_member_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id主键',
            'lm_member_id' => '贷超用户id',
            'name' => '待检测姓名',
            'identity' => '待检测身份证号',
            'add_time' => '添加时间',
            'update_time' => '更新时间',
            'check_result' => '1.身份证号和姓名匹配 2.身份证号和姓名不匹配 3.身份证号不存在 4.查询结果为空',
            'status' => '0 未认证 1认证成功 2认证失败 ',
            'del_flag' => '逻辑删除标志',
        ];
    }
}
