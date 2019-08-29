<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=manage',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=master.db.sit.blackfi.sh;dbname=lmf;port=3308;',
            'username' => 'lmf_rw',
            'password' => 'xhy520',
            'charset' => 'utf8',
        ],
        'db2_pro' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=lb-prd001-slave1.mysql.rds.aliyuncs.com;dbname=iwu_lmf;port=3306;',
            'username' => 'dbsearch',
            'password' => 'BbEr16j6',
            'charset' => 'utf8',
        ],
        'db3' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=master.db.sit.blackfi.sh;dbname=iwu_lmuser;port=5721;',
            'username' => 'iwu_lmuser_rw',
            'password' => 'xhy520',
            'charset' => 'utf8',
        ],
        'db3_pro' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=lb-prd001-slave1.mysql.rds.aliyuncs.com;dbname=iwu_lmuser;port=3306;',
            'username' => 'dbsearch',
            'password' => 'BbEr16j6',
            'charset' => 'utf8',
        ],
        'db4' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=master.db.sit.blackfi.sh;dbname=iwu_lmorder;port=5721;',
            'username' => 'iwu_lmorder_rw',
            'password' => 'xhy520',
            'charset' => 'utf8',
        ],
        'db4_pro' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=lb-prd001-slave1.mysql.rds.aliyuncs.com;dbname=iwu_lmorder;port=3306;',
            'username' => 'dbsearch',
            'password' => 'BbEr16j6',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
