<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%t_lm_user_base_info}}".
 *
 * @property int $id ID
 * @property string $lm_member_id 贷超会员ID
 * @property string $user_name 姓名
 * @property string $id_card_no 身份证号
 * @property string $max_monthly_repayment 可接受月最高还款额(元)
 * @property int $education_level 教育程度: 0初中及以下 1高中中专 2大专 3本科 4硕士及以上
 * @property int $social_security 现单位是否缴纳社保: 0未缴纳 1缴纳
 * @property int $vehicle_ownership 车辆情况: 0无车 1有车无贷款 2有车有按揭贷款 3有车有抵押贷款
 * @property int $work_type 职业类别: 0企业主 1个体工商户 2上班人群 3学生
 * @property string $operating_income 流水额(万元)
 * @property int $operating_years 经营期限
 * @property string $monthly_income 月工资(元)
 * @property int $work_years 现单位工作年限
 * @property string $ip IP地址
 * @property string $location 经纬度
 * @property int $del_flag 删除标志
 * @property int $source 客户端source
 * @property int $status 状态
 * @property string $add_time 创建时间
 * @property string $update_time 修改时间
 */
class TLmUserBaseInfo extends \yii\db\ActiveRecord
{

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
    public static function tableName()
    {
        return '{{%t_lm_user_base_info}}';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['max_monthly_repayment', 'operating_income', 'monthly_income'], 'number'],
            [['education_level', 'social_security', 'vehicle_ownership', 'work_type', 'operating_years', 'work_years', 'del_flag', 'source', 'status'], 'integer'],
            [['add_time', 'update_time'], 'safe'],
            [['lm_member_id', 'user_name', 'ip'], 'string', 'max' => 32],
            [['id_card_no'], 'string', 'max' => 64],
            [['location'], 'string', 'max' => 255],
            [['lm_member_id', 'id_card_no', 'source'], 'unique', 'targetAttribute' => ['lm_member_id', 'id_card_no', 'source']],
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
            'user_name' => '姓名',
            'id_card_no' => '身份证号',
            'max_monthly_repayment' => '可接受月最高还款额(元)',
            'education_level' => '教育程度: 0初中及以下 1高中中专 2大专 3本科 4硕士及以上',
            'social_security' => '现单位是否缴纳社保: 0未缴纳 1缴纳',
            'vehicle_ownership' => '车辆情况: 0无车 1有车无贷款 2有车有按揭贷款 3有车有抵押贷款',
            'work_type' => '职业类别: 0企业主 1个体工商户 2上班人群 3学生',
            'operating_income' => '流水额(万元)',
            'operating_years' => '经营期限',
            'monthly_income' => '月工资(元)',
            'work_years' => '现单位工作年限',
            'ip' => 'IP地址',
            'location' => '经纬度',
            'del_flag' => '删除标志',
            'source' => '客户端source',
            'status' => '状态',
            'add_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
}
