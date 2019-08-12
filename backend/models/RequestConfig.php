<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "request_config".
 *
 * @property int $id
 * @property string $request_fun
 * @property string $request_url
 */
class RequestConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_fun'], 'string', 'max' => 64],
            [['request_url'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_fun' => 'Request Fun',
            'request_url' => 'Request Url',
        ];
    }
}
