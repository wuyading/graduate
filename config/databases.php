<?php

/**
 * 数据库的配置信息
 */

return array(
    'default'=>array(
        'dsn' => 'mysql:host=39.108.87.10;dbname=kexie',
        'username' => 'root',
        'password' => 'Soup@1023',
        'charset' => 'utf8',

        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3600*24*365,
        'schemaCache' => 'cache',
        // Name of the cache component used to store schema information
        /* 读写分离
         * 'slaveConfig' => [
            'username' => 'root',
            'password' => '123456',
            'attributes' => [
                PDO::ATTR_TIMEOUT => 10,
            ],
            'charset' => 'utf8',
        ],

        // 配置从服务器组
        'slaves' => [
            ['dsn' => 'mysql:host=localhost;dbname=sys'],
        ],*/
    ),

    'user' => [  //用户信息表
        'dsn' => 'mysql:host=localhost;dbname=kexie_user',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'attributes' => [PDO::ATTR_PERSISTENT => true],

        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3600*24*365,
        'schemaCache' => 'cache',
    ],

    'category' => [
        'dsn' => 'mysql:host=localhost;dbname=kexie_category',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'attributes' => [PDO::ATTR_PERSISTENT => true],

        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3600*24*365,
        'schemaCache' => 'cache',
    ]
);