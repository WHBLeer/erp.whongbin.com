<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver',
        'label' => 'country_code',
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
        'searchFields' => 'country_code,first_name,last_name,company,street,street_address1,street_address2,city,state,zip,phone,house_number,email',
        'iconfile' => 'EXT:erp_management_logistics/Resources/Public/Icons/tx_erpmanagementlogistics_domain_model_receiver.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, country_code, first_name, last_name, company, street, street_address1, street_address2, city, state, zip, phone, house_number, email',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, country_code, first_name, last_name, company, street, street_address1, street_address2, city, state, zip, phone, house_number, email, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_erpmanagementlogistics_domain_model_receiver',
                'foreign_table_where' => 'AND {#tx_erpmanagementlogistics_domain_model_receiver}.{#pid}=###CURRENT_PID### AND {#tx_erpmanagementlogistics_domain_model_receiver}.{#sys_language_uid} IN (-1,0)',
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

        'country_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.country_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'first_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.first_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'last_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.last_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'company' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.company',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'street_address1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.street_address1',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'street_address2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.street_address2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'state' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.state',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'house_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.house_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:erp_management_logistics/Resources/Private/Language/locallang_db.xlf:tx_erpmanagementlogistics_domain_model_receiver.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    
    ],
];
