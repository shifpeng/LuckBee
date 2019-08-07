<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%t_lmf_api_product_info_contact}}".
 *
 * @property int $id ID
 * @property int $product_id 产品ID
 * @property string $company_name 公司名称
 * @property string $product_name 产品名称
 * @property string $processor 对接流程的执行类 默认 "default"
 * @property string $rsa_pri_key 私钥
 * @property string $rsa_pub_key 公钥
 * @property string $product_pub_key 机构公钥
 * @property string $product_des_key key
 * @property string $remark 备注
 * @property int $del_flag 删除标识
 * @property string $add_time 创建时间(风控使用)
 * @property string $update_time 修改时间
 * @property string $verify_url 撞库/复贷接口地址
 * @property string $push_base_url 推送基础信息接口地址
 * @property string $push_supplement_url 补充信息推送接口
 * @property string $get_card_list_url 银行卡列表接口
 * @property string $bind_card_sms_url 绑卡验证码反馈接口地址
 * @property string $bind_card_url 绑卡接口地址
 * @property string $get_approve_result_url 获取审批结果接口地址
 * @property string $approve_ensure_url 审批确认接口地址
 * @property string $approve_ensure_sms_url 审批确认短信验证码接口地址
 * @property string $get_order_info_url 获取订单信息接口地址
 * @property string $get_agreement_info_url 获取合同信息接口地址
 * @property string $get_repay_plan_url 还款计划接口地址
 * @property string $repay_url 执行还款接口地址
 * @property string $repay_sms_url 还款验证码接口地址
 * @property string $repay_detail_info_url 还款详情接口地址
 * @property string $calc_url 试算接口地址
 * @property string $extend_stage_detail_url 展期详情接口地址
 * @property string $do_extend_stage_url 执行展期接口地址
 * @property string $app_id appID
 * @property int $bump_type 撞库方式
 * @property int $can_repay_change_card 0不支持 1支持 默认为0
 * @property string $support_banks 支持的银行卡列表
 * @property int $term_to_time_num 一期的数值
 * @property int $term_to_time_unit 一期的数值单位
 * @property string $take_money_url 提现执行接口地址
 * @property string $open_account_url 开户执行接口
 * @property int $carrier_bill_type 运营商数据类型
 * @property int $carrier_report_type 运营商报告类型
 * @property string $push_info_confirm_url 推送信息确认接口
 * @property string $approve_ensure_extension_url 展期确认验证码url
 * @property string $loan_amount_period_url 复贷获取金额期限接口
 * @property string $loan_calc_url 复贷获取试算结果接口
 * @property string $loan_card_list_url 复贷获取银行卡列表接口
 * @property string $loan_band_card_url 复贷添加银行卡接口
 * @property string $loan_card_verification_url 复贷添加银行卡验证码接口
 * @property string db
 */
class TLmfApiProductInfoContact extends ActiveRecord
{

    public static $env = '';

    public static function getDb()
    {

        if (self::$env == 'pro') {
            return Yii::$app->get('db2_pro');
        }
        return Yii::$app->get('db2');
    }

    public function setEnv($env)
    {
        self::$env = $env;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%t_lmf_api_product_info_contact}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'del_flag', 'bump_type', 'can_repay_change_card', 'term_to_time_num', 'term_to_time_unit', 'carrier_bill_type', 'carrier_report_type'], 'integer'],
            [['add_time', 'update_time'], 'safe'],
            [['calc_url'], 'required'],
            [['company_name', 'product_name', 'processor'], 'string', 'max' => 32],
            [['rsa_pri_key', 'rsa_pub_key', 'product_pub_key', 'product_des_key', 'verify_url', 'push_base_url', 'push_supplement_url', 'get_card_list_url', 'bind_card_sms_url', 'bind_card_url', 'get_approve_result_url', 'approve_ensure_url', 'approve_ensure_sms_url', 'get_order_info_url', 'get_agreement_info_url', 'get_repay_plan_url', 'repay_url', 'repay_sms_url', 'repay_detail_info_url', 'calc_url', 'extend_stage_detail_url', 'do_extend_stage_url', 'support_banks', 'take_money_url', 'open_account_url', 'push_info_confirm_url', 'approve_ensure_extension_url', 'loan_amount_period_url', 'loan_calc_url', 'loan_card_list_url', 'loan_band_card_url', 'loan_card_verification_url'], 'string', 'max' => 512],
            [['remark'], 'string', 'max' => 256],
            [['app_id'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => '产品ID',
            'company_name' => '公司名称',
            'product_name' => '产品名称',
            'processor' => '对接流程的执行类 默认 \"default\"',
            'rsa_pri_key' => '私钥',
            'rsa_pub_key' => '公钥',
            'product_pub_key' => '机构公钥',
            'product_des_key' => 'key',
            'remark' => '备注',
            'del_flag' => '删除标识',
            'add_time' => '创建时间(风控使用)',
            'update_time' => '修改时间',
            'verify_url' => '撞库/复贷接口地址',
            'push_base_url' => '推送基础信息接口地址',
            'push_supplement_url' => '补充信息推送接口',
            'get_card_list_url' => '银行卡列表接口',
            'bind_card_sms_url' => '绑卡验证码反馈接口地址	',
            'bind_card_url' => '绑卡接口地址',
            'get_approve_result_url' => '获取审批结果接口地址',
            'approve_ensure_url' => '审批确认接口地址',
            'approve_ensure_sms_url' => '审批确认短信验证码接口地址',
            'get_order_info_url' => '获取订单信息接口地址',
            'get_agreement_info_url' => '获取合同信息接口地址',
            'get_repay_plan_url' => '还款计划接口地址',
            'repay_url' => '执行还款接口地址',
            'repay_sms_url' => '还款验证码接口地址',
            'repay_detail_info_url' => '还款详情接口地址',
            'calc_url' => '试算接口地址',
            'extend_stage_detail_url' => '展期详情接口地址',
            'do_extend_stage_url' => '执行展期接口地址',
            'app_id' => 'appID',
            'bump_type' => '撞库方式',
            'can_repay_change_card' => '0不支持 1支持 默认为0',
            'support_banks' => '支持的银行卡列表',
            'term_to_time_num' => '一期的数值',
            'term_to_time_unit' => '一期的数值单位',
            'take_money_url' => '提现执行接口地址',
            'open_account_url' => '开户执行接口',
            'carrier_bill_type' => '运营商数据类型 ',
            'carrier_report_type' => '运营商报告类型',
            'push_info_confirm_url' => '推送信息确认接口',
            'approve_ensure_extension_url' => '展期确认验证码url',
            'loan_amount_period_url' => '复贷获取金额期限接口',
            'loan_calc_url' => '复贷获取试算结果接口',
            'loan_card_list_url' => '复贷获取银行卡列表接口',
            'loan_band_card_url' => '复贷添加银行卡接口',
            'loan_card_verification_url' => '复贷添加银行卡验证码接口',
        ];
    }


    public function getAppName($productIdList)
    {
        if ($productIdList == "") {
            return null;
        }
        $result = self::find()->select(['product_id', 'product_name'])->where(['in', 'product_id', explode(',', $productIdList)])->asArray()->all();
        return $result;
    }
}
