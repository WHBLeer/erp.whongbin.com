<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet',
        'label' => 'wallet_number',
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
        'searchFields' => 'wallet_number,name,alipay,wxpay',
        'iconfile' => 'EXT:erp_management_wallet/Resources/Public/Icons/tx_erpmanagementwallet_domain_model_wallet.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, wallet_number, balance, password, name, alipay, wxpay, log, record, erpuser',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, wallet_number, balance, password, name, alipay, wxpay, log, record, erpuser, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_erpmanagementwallet_domain_model_wallet',
                'foreign_table_where' => 'AND {#tx_erpmanagementwallet_domain_model_wallet}.{#pid}=###CURRENT_PID### AND {#tx_erpmanagementwallet_domain_model_wallet}.{#sys_language_uid} IN (-1,0)',
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

        'wallet_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.wallet_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'balance' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.balance',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'password' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.password',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,password'
            ]
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'alipay' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.alipay',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'wxpay' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.wxpay',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'log' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.log',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_erpmanagementwallet_domain_model_log',
                'foreign_field' => 'wallet',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'record' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.record',
            'config' => [
                'type' => 'inline',
                'foreign_table' => '',
                'foreign_field' => 'wallet',
                'maxitems' => 9999,
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
            'label' => 'LLL:EXT:erp_management_wallet/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementwallet_domain_model_wallet.erpuser',
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
