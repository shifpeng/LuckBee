<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%t_lm_api_order_operate_config_info}}".
 *
 * @property int $id ID
 * @property string $order_no 订单号
 * @property int $del_flag 删除标志
 * @property string $add_time 创建时间
 * @property string $update_time 修改时间
 * @property string $lm_member_id 贷超用户ID
 * @property int $user_filter_status 用户过滤0-不需要 1-需要 2-审核成功 3-审核失败
 * @property int $user_filter_times 用户过滤查询次数
 * @property int $pre_apply_status 一推0-不需要 1-需要 2-成功 3-失败
 * @property int $pre_apply_times 一推次数
 * @property int $apply_status 二推0-不需要 1-需要 2-成功 3-失败
 * @property int $apply_times 二推次数
 * @property int $source 来源
 * @property int $product_id 产品id
 * @property int $if_batch_push 是否批量推送 0-否 1是
 * @property string $user_filter_reason 用户过滤失败原因
 */
class TLmApiOrderOperateConfigInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%t_lm_api_order_operate_config_info}}';
    }

    public static $env = '';

    public static function getDb()
    {

        if (self::$env == 'pro') {
            return Yii::$app->get('db4_pro');
        }
        return Yii::$app->get('db4');
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
            [['del_flag', 'user_filter_status', 'user_filter_times', 'pre_apply_status', 'pre_apply_times', 'apply_status', 'apply_times', 'source', 'product_id', 'if_batch_push'], 'integer'],
            [['add_time', 'update_time'], 'safe'],
            [['order_no'], 'string', 'max' => 64],
            [['lm_member_id'], 'string', 'max' => 32],
            [['user_filter_reason'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_no' => '订单号',
            'del_flag' => '删除标志',
            'add_time' => '创建时间',
            'update_time' => '修改时间',
            'lm_member_id' => '贷超用户ID',
            'user_filter_status' => '用户过滤0-不需要 1-需要 2-审核成功 3-审核失败',
            'user_filter_times' => '用户过滤查询次数',
            'pre_apply_status' => '一推0-不需要 1-需要 2-成功 3-失败',
            'pre_apply_times' => '一推次数',
            'apply_status' => '二推0-不需要 1-需要 2-成功 3-失败',
            'apply_times' => '二推次数',
            'source' => '来源',
            'product_id' => '产品id',
            'if_batch_push' => '是否批量推送 0-否 1是',
            'user_filter_reason' => '用户过滤失败原因',
        ];
    }
}
