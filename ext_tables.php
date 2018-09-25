<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Slub.SlubEntityfacts',
            'Entityfactslisting',
            'Entity Facts listing'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'slubentityfacts');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_slubentityfacts_domain_model_entityfact', 'EXT:slub_entityfacts/Resources/Private/Language/locallang_csh_tx_slubentityfacts_domain_model_entityfact.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_slubentityfacts_domain_model_entityfact');

    },
    $_EXTKEY
);
