<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    static function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'slub_entityfacts',
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
            '@import "EXT:slub_entityfacts/Configuration/TsConfig/ContentElementWizard.tsconfig"'
        );
    }
);
