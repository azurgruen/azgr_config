<?php
/*
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Configure new fields:
$fields = array(
	'tx_azgrconfig_year' => array(
		'label' => 'LLL:EXT:azgr_config/Resources/Private/Language/locallang_db.xlf:pages.tx_azgrconfig_year',
		'exclude' => 1,
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'max' => 4
		),
	)
);

// Add new fields to pages:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $fields);

// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'pages', // Table name
	'--div--;LLL:EXT:azgr_config/Resources/Private/Language/locallang_db.xlf:pages.tab_title,--palette--;LLL:EXT:azgr_config/Resources/Private/Language/locallang_db.xlf:pages.palette_title;tx_azgrconfig', // Field list to add
	'1' // List of specific types to add the field list to. (If empty, all type entries are affected)
	//'after:nav_title' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['pages']['palettes']['tx_azgrconfig'] = array(
	'showitem' => 'tx_azgrconfig_year'
);
*/