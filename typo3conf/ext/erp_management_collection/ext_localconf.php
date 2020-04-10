<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ERP.ErpManagementCollection',
            'Pi1',
            [
                'Collection' => 'list, show, new, create, edit, update, delete, api'
            ],
            // non-cacheable actions
            [
                'Collection' => 'list, show, new, create, edit, update, delete, api'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        iconIdentifier = erp_management_collection-plugin-pi1
                        title = LLL:EXT:erp_management_collection/Resources/Private/Language/locallang_db.xlf:tx_erp_management_collection_pi1.name
                        description = LLL:EXT:erp_management_collection/Resources/Private/Language/locallang_db.xlf:tx_erp_management_collection_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = erpmanagementcollection_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'erp_management_collection-plugin-pi1',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:erp_management_collection/Resources/Public/Icons/user_plugin_pi1.svg']
			);
		
    }
);
