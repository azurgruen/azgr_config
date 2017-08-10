<?php

namespace Azurgruen\AzgrConfig\ViewHelpers\Be;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
//use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ViewHelper for getting link to edit CEs in Backend
 *
 */
class EditLinkViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
	
	/**
     * @var string
     */
    protected $tagName = 'a';
	
	/**
     * Arguments initialization
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
        //$this->registerTagAttribute('href', 'string', '');
    }
	
    /**
     * Parse content element
     *
     * @param string $row Row of Content Element
     * @return string Link (or just Linktext if not found)
     */
    public function render($row)
    {
        if ('BE' === TYPO3_MODE) {
			$uriParameters = [
                'edit' => [
                    'tt_content' => [
                        $row['uid'] => 'edit'
                    ]
                ],
                'returnUrl' => GeneralUtility::getIndpEnv('REQUEST_URI') . '#element-tt_content-' . $row['uid']
            ];
            $uri = BackendUtility::getModuleUrl('record_edit', $uriParameters);
            $this->tag->addAttribute('href', $uri);
            $this->tag->setContent($this->renderChildren());
            $link = $this->tag->render();
	        //DebuggerUtility::var_dump($link);
	        return $link;
        }
    }

}
