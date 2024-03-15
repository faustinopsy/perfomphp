<?php
return [
    'database' => [
        'driver' => 'mysql', // 'pgsql', 'mysql', 'sqlite', 'sqlsrv' , 
        'mysql' => [
            'host' => 'localhost',
            'db_name' => 'a01_teste',
            'username' => 'root',
            'password' => 'root123',
            'charset' => 'utf8'
        ],
        'sqlite' => [
            'path' => 'C:/Users/DELL/Downloads/OneDrive/Documentos/GitHub/perfomphp/App/Database/database.sqlite',
        ],
        'sqlsrv' => [
            'host' => 'localhost',
            'db_name' => 'a01_teste',
            'username' => 'root',
            'password' => 'root123',
            'charset' => 'utf8'
        ],
        'pgsql' => [
            'host' => 'localhost',
            'db_name' => 'postgres',
            'username' => 'root',
            'password' => 'root123',
            'port' => '5432', 
            'charset' => 'utf8'
        ],
        'mongodb' => [
            'host' => 'localhost',
            'db_name' => 'a01_teste_mongo',
            'username' => 'mongo_user',
            'password' => 'mongo_password',
            'port' => '27017', 
        ]
    ]

];
