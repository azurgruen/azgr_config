<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Basic Config');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile($_EXTKEY, 'Configuration/PageTs/tsconfig.txt', 'Basic Config');
