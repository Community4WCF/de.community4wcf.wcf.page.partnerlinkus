<?php
// wcf imports
require_once(WCF_DIR.'lib/system/cache/CacheBuilder.class.php');

/**
 * Caches the Partner.
 * 
 * @svn			$Id: CacheBuilderPartner.class.php 1124 2010-04-04 18:33:16Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class CacheBuilderPartner implements CacheBuilder {
	/**
	 * @see CacheBuilder::getData()
	 */
	public function getData($cacheResource) {
		$data = array();
		
		// get Partner
		$sql = "SELECT		*
				FROM		wcf".WCF_N."_partner
				WHERE		disabled = '0'
				ORDER 		BY showOrder ASC";
			$result = WCF::getDB()->sendQuery($sql);
			while ($row = WCF::getDB()->fetchArray($result)) {
				$data[] = $row;
			}
		
		return $data;
	}
}
?>