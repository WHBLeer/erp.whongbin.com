<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order',
        'label' => 'amazon_order_id',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'amazon_order_id,sales_channel,shipper_name,shipper_address_line1,shipper_city,shipper_state_or_region,shipper_country_code,shipper_phone,shipper_address_type,currency_code,amount,payment_method,payment_method_details,marketplace_id,buyer_email,buyer_name,shipment_service_level_category,order_type',
        'iconfile' => 'EXT:erp_management_order/Resources/Public/Icons/tx_erpmanagementorder_domain_model_order.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, amazon_order_id, purchase_date, last_update_date, order_status, fulfillment_channel, ship_service_level, sales_channel, shipper_name, shipper_address_line1, shipper_address_line2, shipper_address_line3, shipper_city, shipper_state_or_region, shipper_country_code, shipper_phone, shipper_address_type, shipper_is_address_sharing_confidential, currency_code, amount, number_of_items_shipped, number_of_items_unshipped, payment_method, payment_method_details, marketplace_id, buyer_email, buyer_name, shipment_service_level_category, shipped_by_amazon_t_f_m, order_type, earliest_ship_date, latest_ship_date, earliest_delivery_date, latest_delivery_date, business_order, prime, global_express_enabled, premium_order, replacement_order, sold_by_a_b, goods, erpuser',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, amazon_order_id, purchase_date, last_update_date, order_status, fulfillment_channel, ship_service_level, sales_channel, shipper_name, shipper_address_line1, shipper_address_line2, shipper_address_line3, shipper_city, shipper_state_or_region, shipper_country_code, shipper_phone, shipper_address_type, shipper_is_address_sharing_confidential, currency_code, amount, number_of_items_shipped, number_of_items_unshipped, payment_method, payment_method_details, marketplace_id, buyer_email, buyer_name, shipment_service_level_category, shipped_by_amazon_t_f_m, order_type, earliest_ship_date, latest_ship_date, earliest_delivery_date, latest_delivery_date, business_order, prime, global_express_enabled, premium_order, replacement_order, sold_by_a_b, goods, erpuser, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_erpmanagementorder_domain_model_order',
                'foreign_table_where' => 'AND {#tx_erpmanagementorder_domain_model_order}.{#pid}=###CURRENT_PID### AND {#tx_erpmanagementorder_domain_model_order}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'amazon_order_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.amazon_order_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'purchase_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.purchase_date',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'last_update_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.last_update_date',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'order_status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.order_status',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'fulfillment_channel' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.fulfillment_channel',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'ship_service_level' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.ship_service_level',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'sales_channel' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.sales_channel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_address_line1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_address_line1',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'shipper_address_line2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_address_line2',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'shipper_address_line3' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_address_line3',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'shipper_city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_state_or_region' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_state_or_region',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_country_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_country_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_address_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_address_type',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipper_is_address_sharing_confidential' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipper_is_address_sharing_confidential',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'currency_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.currency_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'amount' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.amount',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'number_of_items_shipped' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.number_of_items_shipped',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'number_of_items_unshipped' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.number_of_items_unshipped',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'payment_method' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.payment_method',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'payment_method_details' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.payment_method_details',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'marketplace_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.marketplace_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'buyer_email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.buyer_email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'buyer_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.buyer_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipment_service_level_category' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipment_service_level_category',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'shipped_by_amazon_t_f_m' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.shipped_by_amazon_t_f_m',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'order_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.order_type',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'earliest_ship_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.earliest_ship_date',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'latest_ship_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.latest_ship_date',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'earliest_delivery_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.earliest_delivery_date',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'latest_delivery_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.latest_delivery_date',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'business_order' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.business_order',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'prime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.prime',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'global_express_enabled' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.global_express_enabled',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'premium_order' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.premium_order',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'replacement_order' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.replacement_order',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'sold_by_a_b' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.sold_by_a_b',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'goods' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.goods',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_erpmanagementproduct_domain_model_product',
                'minitems' => 0,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],
        'erpuser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_order/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementorder_domain_model_order.erpuser',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'fe_users',
                'minitems' => 0,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],
    
    ],
];
