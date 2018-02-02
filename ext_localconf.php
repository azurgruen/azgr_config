<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['header'] = 'EXT:azgr_config/Configuration/RTE/Header.yaml';
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bodytext'] = 'EXT:azgr_config/Configuration/RTE/Bodytext.yaml';

// Add new fields to the list of fields which should be overlaid on page records:
// Use e.g. if you extended pages table via TCA Override
//$TYPO3_CONF_VARS['FE']['pageOverlayFields'] .= ',tx_gapconfig_projectyear';