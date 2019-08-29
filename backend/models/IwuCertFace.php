<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iwu_cert_face".
 *
 * @property int $id id主键
 * @property string $lm_member_id 贷超用户id
 * @property string $living_image 活体图片
 * @property string $face_value 人脸检测得分
 * @property string $id_card_front 身份证正面
 * @property string $id_card_back 身份证反面
 * @property string $request_id 活体检测请求id
 * @property string $delta face++delta值
 * @property string $thread_shold 活体分数线
 * @property string $add_time 添加时间
 * @property string $update_time 更新时间
 * @property string $image1 全景图
 * @property string $image2 动作1
 * @property string $image3 动作2
 * @property string $image4 动作3
 * @property int $status 0 未认证 1认证成功 2认证失败 
 * @property int $del_flag 逻辑删除标志
 */
class IwuCertFace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iwu_cert_face';
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
            [['face_value'], 'number'],
            [['add_time', 'update_time'], 'safe'],
            [['status', 'del_flag'], 'integer'],
            [['lm_member_id'], 'string', 'max' => 32],
            [['living_image', 'id_card_front', 'id_card_back', 'thread_shold'], 'string', 'max' => 255],
            [['request_id'], 'string', 'max' => 128],
            [['delta', 'image1', 'image2', 'image3', 'image4'], 'string', 'max' => 512],
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
            'living_image' => '活体图片',
            'face_value' => '人脸检测得分',
            'id_card_front' => '身份证正面',
            'id_card_back' => '身份证反面',
            'request_id' => '活体检测请求id',
            'delta' => 'face++delta值',
            'thread_shold' => '活体分数线',
            'add_time' => '添加时间',
            'update_time' => '更新时间',
            'image1' => '全景图',
            'image2' => '动作1',
            'image3' => '动作2',
            'image4' => '动作3',
            'status' => '0 未认证 1认证成功 2认证失败 ',
            'del_flag' => '逻辑删除标志',
        ];
    }
}
