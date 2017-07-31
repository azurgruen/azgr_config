<?php

namespace Azurgruen\AzgrConfig\ViewHelpers;

use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ViewHelper for getting grandchild content from tx_mask elements
 *
 */
class ImagesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Parse content element
     *
     * @param int uid of the content element
     * @return array Either \TYPO3\CMS\Core\Resource\FileReference or null
     */
    public function render($uid)
    {
        $fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
    	$image = $fileRepository->findByRelation('tt_content', 'image', $uid);
        if (empty($image)) $image = null;
        
        //DebuggerUtility::var_dump($results);
        return $image;
    }

}
