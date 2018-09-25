<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Slub.SlubEntityfacts',
            'Entityfactslisting',
            [
                'EntityFact' => 'list'
            ],
            // non-cacheable actions
            [
                'EntityFact' => 'list'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					entityfactslisting {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_entityfactslisting.svg
						title = LLL:EXT:slub_entityfacts/Resources/Private/Language/locallang_db.xlf:tx_slub_entityfacts_domain_model_entityfactslisting
						description = LLL:EXT:slub_entityfacts/Resources/Private/Language/locallang_db.xlf:tx_slub_entityfacts_domain_model_entityfactslisting.description
						tt_content_defValues {
							CType = list
							list_type = slubentityfacts_entityfactslisting
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
