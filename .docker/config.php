<?php

return [
    'MAGENTO_CLOUD_RELATIONSHIPS' => base64_encode(json_encode([
        'database' => [
            [
                'host' => 'db',
                'path' => 'magento2',
                'password' => 'magento2',
                'username' => 'magento2',
                'port' => '3306',
                'type' => 'mysql:10.6'
            ]
        ],
        'redis' => [
            [
                'host' => 'redis',
                'port' => '6379',
                'type' => 'redis:7.0'
            ]
        ],
        'opensearch' => [
            [
                'host' => 'opensearch',
                'port' => '9200',
                'type' => 'opensearch:2.4'
            ]
        ]
    ])),
    'MAGENTO_CLOUD_ROUTES' => base64_encode(json_encode([
        'http://magento2.docker/' => [
            'type' => 'upstream',
            'original_url' => 'http://{default}'
        ],
        'https://magento2.docker/' => [
            'type' => 'upstream',
            'original_url' => 'https://{default}'
        ]
    ])),
    'MAGENTO_CLOUD_VARIABLES' => base64_encode(json_encode([
        'ADMIN_EMAIL' => 'admin@example.com',
        'ADMIN_PASSWORD' => '123123q',
        'ADMIN_URL' => 'admin'
    ])),
    'MAGENTO_CLOUD_APPLICATION' => base64_encode(json_encode([
        'hooks' => [
            'build' => 'set -e
php ./vendor/bin/ece-tools run scenario/build/generate.xml
php ./vendor/bin/ece-tools run scenario/build/transfer.xml
',
            'deploy' => 'php ./vendor/bin/ece-tools run scenario/deploy.xml',
            'post_deploy' => 'php ./vendor/bin/ece-tools run scenario/post-deploy.xml'
        ],
        'mounts' => [
            'var' => [
                'path' => 'var'
            ],
            'app-etc' => [
                'path' => 'app/etc'
            ],
            'pub-media' => [
                'path' => 'pub/media'
            ],
            'pub-static' => [
                'path' => 'pub/static'
            ]
        ]
    ])),
];
