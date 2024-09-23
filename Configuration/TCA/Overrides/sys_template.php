<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

call_user_func(
    static function($extKey)
    {
        ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'SLUB DNB Entity Facts');
    },
    'slub_entityfacts'
);
