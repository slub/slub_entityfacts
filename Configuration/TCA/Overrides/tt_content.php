<?php

//Einbindung Flexform für Plugin Entityfactslisting der Extension SlubEntityfacts
$pluginSignature = 'slubentityfacts_entityfactslisting';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:slub_entityfacts/Configuration/FlexForms/FF_SlubEntityfacts_Entityfactslisting.xml'
);
?>
 
