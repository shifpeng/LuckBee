<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iwu_cert_task".
 *
 * @property int $id id 自增
 * @property string $task_id 任务id
 * @property string $user_id 用户ID
 * @property string $user_name 登录用户名
 * @property string $mobile 手机号
 * @property string $email 手机号
 * @property string $biz_type 业务类型
 * @property string $process_state 进行的状态
 * @property string $channel 渠道
 * @property string $bill_state 账单获取状态
 * @property string $report_state 报告状态
 * @property int $source 客户端source值
 * @property string $message 接口返回信息
 * @property string $add_time 创建时间
 * @property string $update_time 更新时间
 * @property int $del_flag 逻辑删除标志
 */
class IwuCertTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iwu_cert_task';
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
            [['source', 'del_flag'], 'integer'],
            [['add_time', 'update_time'], 'safe'],
            [['task_id'], 'string', 'max' => 120],
            [['user_id', 'user_name', 'email'], 'string', 'max' => 64],
            [['mobile'], 'string', 'max' => 32],
            [['biz_type', 'process_state', 'channel'], 'string', 'max' => 20],
            [['bill_state', 'report_state'], 'string', 'max' => 11],
            [['message'], 'string', 'max' => 256],
            [['task_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id 自增',
            'task_id' => '任务id',
            'user_id' => '用户ID',
            'user_name' => '登录用户名',
            'mobile' => '手机号',
            'email' => '手机号',
            'biz_type' => '业务类型',
            'process_state' => '进行的状态',
            'channel' => '渠道',
            'bill_state' => '账单获取状态',
            'report_state' => '报告状态',
            'source' => '客户端source值',
            'message' => '接口返回信息',
            'add_time' => '创建时间',
            'update_time' => '更新时间',
            'del_flag' => '逻辑删除标志',
        ];
    }

    public function getIwuCertOcr()
    {
        return $this->hasOne(IwuCertOcr::className(), ['lm_member_id' => 'user_id']);
    }
}
