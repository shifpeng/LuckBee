<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%t_lm_api_order_info}}".
 *
 * @property int $id ID
 * @property string $lm_member_id 贷超用户ID
 * @property string $user_name 贷超用户名(申请时记录)
 * @property string $user_phone_no 用户手机号
 * @property int $distributor_id 渠道ID
 * @property int $tenant_company_id 商户ID
 * @property int $tenant_product_id 产品ID
 * @property int $source 来源
 * @property int $reloan 是否是复贷
 * @property string $order_no 订单号
 * @property string $base_data_id 订单基本信息数据ID
 * @property string $base_data_hash 订单基本信息数据Hash
 * @property string $supplement_data_id 订单补充信息数据ID
 * @property string $supplement_data_hash 订单补充信息数据Hash
 * @property string $amount 贷款额度(元)
 * @property int $term 贷款期限
 * @property int $term_unit 贷款期限单位
 * @property string $total_repayment_amount 还款总金额(元)
 * @property string $total_arrival_amount 到账金额(元)
 * @property string $interest_and_cost_amount 利息和费用(元)
 * @property int $activated 是否激活: 0.未激活 1.已激活
 * @property int $finished 是否完件: 0.未完件 1.已完件
 * @property int $distributor_statistics_valid 是否在渠道统计时生效，0->不生效，1->生效
 * @property int $status 状态: 
 * @property int $get_approval_result_times 拉取审批结果次数
 * @property int $repush_base_times 重推基本信息次数
 * @property int $repush_supplement_times 重推补充信息次数
 * @property int $del_flag 删除标志
 * @property string $pre_apply_time 预订单申请时间
 * @property string $apply_time 订单申请时间
 * @property string $add_time 创建时间
 * @property string $update_time 修改时间
 * @property string $p_value p值
 * @property string $tag 渠道tag值
 * @property string $channel_tag 渠道标签（用户注册来源）
// * @property int $repay_partial 部分还款标志 0.未部分还款 1.已提前还款
 * @property int $settle_status 结清状态 1:正常结清 2: 逾期结清
 * @property int $user_is_new 是否是新用户
 * @property int $user_is_all_channel_new 是否是全渠道新用户：0-未知 1-新用户 2-老用户
 * @property int $is_extend_stage 是否展期
 * @property int $filter_flag 二推是否过滤字段 0 否 1 是
 * @property string $taobao_token 淘宝task的token值
 */
class TLmApiOrderInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%t_lm_api_order_info}}';
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
            [['distributor_id', 'tenant_company_id', 'tenant_product_id', 'source', 'reloan', 'term', 'term_unit', 'activated', 'finished', 'distributor_statistics_valid', 'status', 'get_approval_result_times', 'repush_base_times', 'repush_supplement_times', 'del_flag', 'settle_status', 'user_is_all_channel_new', 'is_extend_stage', 'filter_flag'], 'integer'],
            [['amount', 'total_repayment_amount', 'total_arrival_amount', 'interest_and_cost_amount'], 'number'],
            [['pre_apply_time', 'apply_time', 'add_time', 'update_time'], 'safe'],
            [['lm_member_id', 'user_name', 'user_phone_no', 'p_value', 'channel_tag'], 'string', 'max' => 32],
            [['order_no', 'tag'], 'string', 'max' => 64],
            [['base_data_id', 'base_data_hash', 'supplement_data_id', 'supplement_data_hash', 'taobao_token'], 'string', 'max' => 128],
            [['order_no', 'tenant_product_id'], 'unique', 'targetAttribute' => ['order_no', 'tenant_product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lm_member_id' => '贷超用户ID',
            'user_name' => '贷超用户名(申请时记录)',
            'user_phone_no' => '用户手机号',
            'distributor_id' => '渠道ID',
            'tenant_company_id' => '商户ID',
            'tenant_product_id' => '产品ID',
            'source' => '来源',
            'reloan' => '是否是复贷',
            'order_no' => '订单号',
            'base_data_id' => '订单基本信息数据ID',
            'base_data_hash' => '订单基本信息数据Hash',
            'supplement_data_id' => '订单补充信息数据ID',
            'supplement_data_hash' => '订单补充信息数据Hash',
            'amount' => '贷款额度(元)',
            'term' => '贷款期限',
            'term_unit' => '贷款期限单位',
            'total_repayment_amount' => '还款总金额(元)',
            'total_arrival_amount' => '到账金额(元)',
            'interest_and_cost_amount' => '利息和费用(元)',
            'activated' => '是否激活: 0.未激活 1.已激活',
            'finished' => '是否完件: 0.未完件 1.已完件',
            'distributor_statistics_valid' => '是否在渠道统计时生效，0->不生效，1->生效',
            'status' => '状态: ',
            'get_approval_result_times' => '拉取审批结果次数',
            'repush_base_times' => '重推基本信息次数',
            'repush_supplement_times' => '重推补充信息次数',
            'del_flag' => '删除标志',
            'pre_apply_time' => '预订单申请时间',
            'apply_time' => '订单申请时间',
            'add_time' => '创建时间',
            'update_time' => '修改时间',
            'p_value' => 'p值',
            'tag' => '渠道tag值',
            'channel_tag' => '渠道标签（用户注册来源）',
//            'repay_partial' => '部分还款标志 0.未部分还款 1.已提前还款',
            'settle_status' => '结清状态 1:正常结清 2: 逾期结清',
            'user_is_new' => '是否是新用户',
            'user_is_all_channel_new' => '是否是全渠道新用户：0-未知 1-新用户 2-老用户',
            'is_extend_stage' => '是否展期',
            'filter_flag' => '二推是否过滤字段 0 否 1 是',
            'taobao_token' => '淘宝task的token值',
        ];
    }
}
