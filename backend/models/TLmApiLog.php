<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%t_lm_api_log}}".
 *
 * @property string $id 主键id
 * @property string $function_code 方法名
 * @property string $key_code 关键信息（订单号，手机号等）
 * @property string $key_value 关键信息值（订单号，手机号等）
 * @property string $request_json 传入参数
 * @property string $response_json 返回参数
 * @property string $result_code 结果
 * @property string $add_day 日期
 * @property string $add_time 创建日期
 */
class TLmApiLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%t_lm_api_log}}';
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
            [['request_json', 'response_json'], 'string'],
            [['add_time'], 'safe'],
            [['function_code', 'key_code', 'key_value'], 'string', 'max' => 100],
            [['result_code'], 'string', 'max' => 50],
            [['add_day'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键id',
            'function_code' => '方法名',
            'key_code' => '关键信息（订单号，手机号等）',
            'key_value' => '关键信息值（订单号，手机号等）',
            'request_json' => '传入参数',
            'response_json' => '返回参数',
            'result_code' => '结果',
            'add_day' => '日期',
            'add_time' => '创建日期',
        ];
    }
}
