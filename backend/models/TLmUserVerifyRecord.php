<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%t_lm_user_verify_record}}".
 *
 * @property int $id ID
 * @property string $lm_member_id 贷超会员ID
 * @property int $product_id 产品ID
 * @property string $operate_time 操作时间
 * @property int $status 状态: 0.不可申请 1.可申请 2.可复贷 3.撞库出错 4.撞库超时 5.FSP超时
 * @property int $status_type 状态类型:1.业务正常 2.业务异常 3.商户异常 4.FSP异常
 * @property string $reason 不可申请原因
 * @property int $del_flag 删除标志
 * @property string $add_time 创建时间
 * @property string $update_time 修改时间
 */
class TLmUserVerifyRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%t_lm_user_verify_record}}';
    }

    public static $env = '';

    public static function getDb()
    {

        if (self::$env == 'pro') {
            return Yii::$app->get('db3_pro');
        }
        return Yii::$app->get('db3');
    }

    public function setEnv($env)
    {
        self::$env = $env;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lm_member_id'], 'required'],
            [['product_id', 'status', 'status_type', 'del_flag'], 'integer'],
            [['operate_time', 'add_time', 'update_time'], 'safe'],
            [['lm_member_id'], 'string', 'max' => 32],
            [['reason'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lm_member_id' => '贷超会员ID',
            'product_id' => '产品ID',
            'operate_time' => '操作时间',
            'status' => '状态: 0.不可申请 1.可申请 2.可复贷 3.撞库出错 4.撞库超时 5.FSP超时',
            'status_type' => '状态类型:1.业务正常 2.业务异常 3.商户异常 4.FSP异常',
            'reason' => '不可申请原因',
            'del_flag' => '删除标志',
            'add_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
}
