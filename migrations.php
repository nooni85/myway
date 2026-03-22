<?php
// migrations.php
return [
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
    ],
    'migrations_paths' => [
        'EdenProject\MyWay\Migrations' => './db/migrations', // 네임스페이스 => 경로
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true,
];
