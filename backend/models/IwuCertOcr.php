<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iwu_cert_ocr".
 *
 * @property int $id id
 * @property string $lm_member_id 用户id
 * @property string $ocr_name 身份证姓名
 * @property string $ocr_id 身份证号码
 * @property string $ocr_address 住址
 * @property string $ocr_sex 性别 男/女
 * @property string $ocr_nation 民族
 * @property string $ocr_period 有效期
 * @property string $ocr_gov 签发机构
 * @property string $id_card_front 身份证正面照-人脸
 * @property string $id_card_back 身份证反面照-国徽
 * @property string $font_request_id 身份证正面-认证id
 * @property string $back_request_id 身份证反面-认证id
 * @property int $font_status 身份证正面-认证状态 0未认证 1认证成功  2认证失败
 * @property int $back_status 身份证反面-认证状态 0未认证 1认证成功  2认证失败
 * @property string $add_time 添加时间
 * @property string $update_time 更新时间
 * @property int $del_flag 删除标志 0未删除 1删除
 * @property string $front_value 身份证正面分值
 * @property string $back_value 身份证反面分值
 */
class IwuCertOcr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iwu_cert_ocr';
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
            [['font_status', 'back_status', 'del_flag'], 'integer'],
            [['add_time', 'update_time'], 'safe'],
            [['lm_member_id', 'ocr_name', 'ocr_period', 'ocr_gov'], 'string', 'max' => 32],
            [['ocr_id'], 'string', 'max' => 20],
            [['ocr_address', 'font_request_id', 'back_request_id'], 'string', 'max' => 128],
            [['ocr_sex'], 'string', 'max' => 1],
            [['ocr_nation', 'front_value', 'back_value'], 'string', 'max' => 12],
            [['id_card_front', 'id_card_back'], 'string', 'max' => 512],
            [['lm_member_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'lm_member_id' => '用户id',
            'ocr_name' => '身份证姓名',
            'ocr_id' => '身份证号码',
            'ocr_address' => '住址',
            'ocr_sex' => '性别 男/女',
            'ocr_nation' => '民族',
            'ocr_period' => '有效期',
            'ocr_gov' => '签发机构',
            'id_card_front' => '身份证正面照-人脸',
            'id_card_back' => '身份证反面照-国徽',
            'font_request_id' => '身份证正面-认证id',
            'back_request_id' => '身份证反面-认证id',
            'font_status' => '身份证正面-认证状态 0未认证 1认证成功  2认证失败',
            'back_status' => '身份证反面-认证状态 0未认证 1认证成功  2认证失败',
            'add_time' => '添加时间',
            'update_time' => '更新时间',
            'del_flag' => '删除标志 0未删除 1删除',
            'front_value' => '身份证正面分值',
            'back_value' => '身份证反面分值',
        ];
    }
}
