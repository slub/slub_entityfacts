<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    static function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Slub.SlubEntityfacts',
            'Entityfactslisting',
            [
                \Slub\SlubEntityfacts\Controller\EntityFactController::class => 'show'
            ],
            // non-cacheable actions
            [
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        entityfactslisting {
                            iconIdentifier = user_plugin_entityfactslisting
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

        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

        $iconRegistry->registerIcon(
            'user_plugin_entityfactslisting',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:slub_entityfacts/Resources/Public/Icons/user_plugin_entityfactslisting.svg']
        );
    }
);
