<?php
return [
    'admin_locales_for_deploy' => [
        'en_US'
    ],
    'backend' => [
        'frontName' => 'admin'
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
	'queue' => [
		'consumers_wait_for_messages' => 1,
		'amqp' => [
			'host' => 'rabbitmq',
			'port' => '5672',
			'user' => 'magento',
			'password' => 'magento',
			'virtualhost' => '/'
		]
	],
	'cron_consumers_runner' => [
		'cron_run' => true,
		'max_messages' => 0,
		'consumers' => [
			'async.operations.all',
			'codegeneratorProcessor'
		]
	],
    'crypt' => [
        'key' => '78ff8b42cf65f36f94835a3b18ba4caa'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'db',
                'dbname' => 'magento',
                'username' => 'magento',
                'password' => 'magento',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8mb4;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
	'cache' => [
		'graphql' => [
			'id_salt' => 'vKFnOGRVJ7o23FoAwGSxqG0q1bv4qLDA'
		],
		'frontend' => [
			'default' => [
				'id_prefix' => '69d_',
				'backend' => 'Magento\\Framework\\Cache\\Backend\\Redis',
				'backend_options' => [
					'server' => 'redis',
					'database' => '0',
					'port' => '6379',
					'password' => '',
					'compress_data' => '1',
					'compression_lib' => ''
				]
			],
			'page_cache' => [
				'id_prefix' => '69d_',
				'backend' => 'Magento\\Framework\\Cache\\Backend\\Redis',
				'backend_options' => [
					'server' => 'redis',
					'database' => '1',
					'port' => '6379',
					'password' => '',
					'compress_data' => '0',
					'compression_lib' => ''
				]
			]
		],
		'allow_parallel_generation' => false
	],
    'lock' => [
        'provider' => 'db',
        'config' => [
            'prefix' => ''
        ]
    ],
	'session' => [
		'save' => 'redis',
		'redis' => [
			'host' => 'redis',
			'port' => '6379',
			'password' => '',
			'timeout' => '2.5',
			'persistent_identifier' => '',
			'database' => '2',
			'compression_threshold' => '2048',
			'compression_library' => 'gzip',
			'log_level' => '4',
			'max_concurrency' => '6',
			'break_after_frontend' => '5',
			'break_after_adminhtml' => '30',
			'first_lifetime' => '600',
			'bot_first_lifetime' => '60',
			'bot_lifetime' => '7200',
			'disable_locking' => '0',
			'min_lifetime' => '60',
			'max_lifetime' => '2592000',
			'sentinel_master' => '',
			'sentinel_servers' => '',
			'sentinel_connect_retries' => '5',
			'sentinel_verify_master' => '0'
		]
	],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1
    ],
    'downloadable_domains' => [
        'hongkong.test'
    ],
    'install' => [
        'date' => 'Fri, 31 Dec 2021 08:41:13 +0000'
    ],
    'system' => [
        'default' => [
            'admin' => [
                'url' => [
                    'custom' => 'admin',
                    'custom_path' => 1
                ]
            ],
            'web' => [
                'unsecure' => [
                    'base_url' => 'https://hongkong.test/',
                    'base_link_url' => 'https://hongkong.test/',
                    'base_static_url' => 'https://hongkong.test/static/',
                    'base_media_url' => 'https://hongkong.test/media/'
                ],
                'secure' => [
                    'base_url' => 'https://hongkong.test/',
                    'base_link_url' => 'https://hongkong.test/',
                    'base_static_url' => 'https://hongkong.test/static/',
                    'base_media_url' => 'https://hongkong.test/media/'
                ],
                'default' => [
                    'front' => 'cms'
                ],
                'cookie' => [
                    'cookie_path' => null,
                    'cookie_domain' => null
                ]
            ],
            'catalog' => [
                'productalert_cron' => [
                    'error_email' => null
                ],
                'product_video' => [
                    'youtube_api_key' => 'AIzaSyA66luhlcsvUi5JBSyAmT_o-fxiPxkTJlA'
                ],
                'search' => [
                    'engine' => 'opensearch',
                    'elasticsearch7_server_hostname' => 'opensearch',
                    'elasticsearch7_server_port' => '9200',
                    'elasticsearch7_index_prefix' => 'magento2',
                    'elasticsearch7_enable_auth' => '0',
                    'elasticsearch7_username' => null,
                    'elasticsearch7_password' => null,
                    'elasticsearch7_server_timeout' => '15'
                ]
            ],
            'cataloginventory' => [
                'source_selection_distance_based_google' => [
                    'api_key' => null
                ]
            ],
            'currency' => [
                'import' => [
                    'error_email' => null
                ]
            ],
            'sitemap' => [
                'generate' => [
                    'error_email' => null
                ]
            ],
            'trans_email' => [
                'ident_general' => [
                    'name' => 'damda',
                    'email' => 'info@damda.com'
                ],
                'ident_sales' => [
                    'name' => 'damda sales team',
                    'email' => 'sales@damda.com'
                ],
                'ident_support' => [
                    'name' => 'damda cs team',
                    'email' => 'cs@damda.com'
                ],
                'ident_custom1' => [
                    'name' => 'damda',
                    'email' => 'noreply@damda.com'
                ],
                'ident_custom2' => [
                    'name' => 'damda',
                    'email' => 'noreply@damda.com'
                ]
            ],
            'contact' => [
                'email' => [
                    'recipient_email' => 'info@damda.com'
                ]
            ],
            'sales_email' => [
                'order' => [
                    'copy_to' => null
                ],
                'order_comment' => [
                    'copy_to' => 'operation@damda.com'
                ],
                'invoice' => [
                    'copy_to' => 'operation@damda.com'
                ],
                'invoice_comment' => [
                    'copy_to' => 'operation@damda.com'
                ],
                'shipment' => [
                    'copy_to' => 'operation@damda.com'
                ],
                'shipment_comment' => [
                    'copy_to' => 'operation@damda.com'
                ],
                'creditmemo' => [
                    'copy_to' => 'operation@damda.com'
                ],
                'creditmemo_comment' => [
                    'copy_to' => 'operation@damda.com'
                ]
            ],
            'checkout' => [
                'payment_failed' => [
                    'copy_to' => null
                ]
            ],
            'google' => [
                'analytics' => [
                    'account' => ''
                ],
                'gtag' => [
                    'analytics4' => [
                        'measurement_id' => null
                    ],
                    'adwords' => [
                        'conversion_id' => null
                    ]
                ]
            ],
            'recaptcha_backend' => [
                'type_recaptcha' => [
                    'public_key' => null,
                    'private_key' => null
                ],
                'type_invisible' => [
                    'public_key' => null,
                    'private_key' => null
                ],
                'type_recaptcha_v3' => [
                    'public_key' => '6LdapvYbAAAAAHXWhz8MeqQs1ePT3VmqYhhJYUtj',
                    'private_key' => '6LdapvYbAAAAAAYY01VXRFrdOaLI5gQ0Y2Elxmem'
                ]
            ],
            'recaptcha_frontend' => [
                'type_recaptcha' => [
                    'public_key' => null,
                    'private_key' => null
                ],
                'type_invisible' => [
                    'public_key' => null,
                    'private_key' => null
                ],
                'type_recaptcha_v3' => [
                    'public_key' => null,
                    'private_key' => null
                ]
            ],
			'smtp' => [
				'configuration_option' => [
					'host' => 'mailhog',
					'port' => '1025',
					'protocol' => '',
					'authentication' => '',
					'username' => '',
					'password' => '',
					'return_path_email' => '',
					'test_email' => [
						'to' => 'test@gmail.com'
					]
				]
			],
            'dev' => [
                'restrict' => [
                    'allow_ips' => null
                ],
                'js' => [
                    'session_storage_key' => 'collected_errors'
                ]
            ],
            'shipment_settings' => [
                'country_settings' => [
                    'allow_countries' => 'KR,CN,CA,US,JP'
                ]
            ]
        ],
        'stores' => [
            'jp' => [
                'general' => [
                    'locale' => [
                        'code' => 'ja_JP'
                    ]
                ]
            ]
        ]
    ]
];
