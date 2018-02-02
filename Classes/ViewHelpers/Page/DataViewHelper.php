<?php

namespace Azurgruen\AzgrConfig\ViewHelpers\Page;

//use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * ViewHelper for getting ext fields from 'pages' table
 *
 */
class DataViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

	/**
     * @var \TYPO3\CMS\Frontend\Page\PageRepository
     * @inject
     */
    protected $pageRepository;

    /**
     * Get custom fields from page
     *
     * @param int Uid of desired page
     * @param string name of ext to filter query
     * @param string table prefix used in translation ids
     * @return array found fields
     */
    public function render($uid = -1, $ext = 'azgr_config', $fieldprefix = 'pages.')
    {
	    $extName = GeneralUtility::underscoredToUpperCamelCase($ext);
	    $extFieldname = str_replace('_', '', $ext);
        $pagedata = $this->pageRepository->getPage($uid);
        $data = [];
        foreach ($pagedata as $key => $value) {
	        if (strpos($key, $extFieldname) !== false) {
		        $label = LocalizationUtility::translate($fieldprefix.$key, $extName);
		        $data[$label] = $value;
	        }
        }
        //DebuggerUtility::var_dump($data);
        if (empty($data)) $data = null;
        return $data;
    
    }

}
