<?php

namespace Azurgruen\AzgrConfig\ViewHelpers;

use \TYPO3\CMS\Core\Utility\MathUtility;

/**
 * ViewHelper for getting grandchild content from tx_mask elements
 *
 */
class CalcViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
	 * Returns the calculated number.
	 *
	 * @param string $calculation The string that represents the desired calculation
	 * @return float The result
	 */
	public function render($calculation) {
		$result = MathUtility::calculateWithParentheses($calculation);
		return $result;
	}

}
