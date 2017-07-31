<?php

namespace Azurgruen\AzgrConfig\ViewHelpers;

use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ViewHelper for getting grandchild content from tx_mask elements
 *
 */
class ContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Parse content element
     *
     * @param int Uid of desired element
     * @param string DB table to query
     * @param string Comma separated list of db cols
     * @param string Name of identifier for parent
     * @param int Uid of the parent content element
     * @return array found child content
     */
    public function render($uid = -1, $table = 'tt_content', $fields = 'uid,header,bodytext', $parentCol = '', $parentId = -1)
    {
        if ('BE' === TYPO3_MODE) {
	    //if (is_int($uid)) {
	        $fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
	        //$fields = 'uid,header,bodytext';
	        //$table = 'tt_content';
	        if (!empty($parentCol) && $parentId !== -1) {
	        	$where = $parentCol.'='.$parentId.' AND deleted=0';
	        } else if ($uid !== -1) {
		        $where = 'uid='.$uid.' AND deleted=0';
	        }
	        $results = $GLOBALS['TYPO3_DB']->exec_SELECTgetrows($fields, $table, $where, '', 'sorting');
	        if ($table == 'tt_content') {
		        foreach ($results as &$result) {
		        	$image = $fileRepository->findByRelation('tt_content', 'image', $result['uid']);
		        	if (!empty($image)) {
			        	$result['image'] = $image;
			        } else {
				        $result['image'] = null;
			        }
		        }
	        }
	        //DebuggerUtility::var_dump($results);
	        return $results;
        }
    }

}
