<?php

namespace Azurgruen\GapConfig\ViewHelpers;

use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class CategoriesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

	 /**
     * @var \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository;

	/**
     * @param int $uid 
     * @return array
     */
    public function getCategoriesFromPage($uid)
    {
        $query = $this->categoryRepository->createQuery();
        $sql = "SELECT sys_category.* FROM sys_category
            INNER JOIN sys_category_record_mm ON sys_category_record_mm.uid_local = sys_category.uid AND sys_category_record_mm.fieldname = 'categories' AND sys_category_record_mm.tablenames = 'pages'
            INNER JOIN pages ON  sys_category_record_mm.uid_foreign = pages.uid
            WHERE pages.uid = '" . (int)$uid . "'
            AND sys_category.deleted = 0
            ORDER BY sys_category_record_mm.sorting_foreign ASC";
        $result = $query->statement($sql)->execute()->toArray();
        return $result;
    }

    /**
     * Parse content element
     *
     * @param int uid of the content element
     * @return array Either \TYPO3\CMS\Core\Resource\FileReference or null
     */
    public function render($pageUid)
    {
	    if (!$pageUid) {
		    $categories = $this->categoryRepository->findAll();
	    } else {
	    	$categories = $this->getCategoriesFromPage($pageUid);
	        if (empty($categories)) $categories = null;
        }
        //DebuggerUtility::var_dump($results);
        return $categories;
    }

}
