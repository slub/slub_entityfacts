<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

call_user_func(
    static function()
    {

      ExtensionUtility::registerPlugin(
          'SlubEntityfacts',
          'Entityfactslisting',
          'SLUB: DNB Entity Facts'
      );

      $pluginSignature = 'slubentityfacts_entityfactslisting';
      $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
      ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignature,
        'FILE:EXT:slub_entityfacts/Configuration/FlexForms/FF_SlubEntityfacts_Entityfactslisting.xml'
      );

    }
);
