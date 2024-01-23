<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    static function()
    {

      \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
          'Slub.SlubEntityfacts',
          'Entityfactslisting',
          'SLUB: DNB Entity Facts'
      );

      $pluginSignature = 'slubentityfacts_entityfactslisting';
      $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignature,
        'FILE:EXT:slub_entityfacts/Configuration/FlexForms/FF_SlubEntityfacts_Entityfactslisting.xml'
      );

    }
);
