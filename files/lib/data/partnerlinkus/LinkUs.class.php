<?php
// wcf imports
require_once(WCF_DIR.'lib/data/DatabaseObject.class.php');

/**
 * Represents the LinkUs.
 * 
 * @svn			$Id: LinkUs.class.php 1124 2010-04-04 18:33:16Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class LinkUs extends DatabaseObject {

	/**
	 * Creates a new LinkUs item.
	 *
	 * If id is set, the function reads the LinkUs data from database.
	 * Otherwise it uses the given resultset.
	 * 
	 * @param 	integer		$linkusID		id of a LinkUs
	 * @param 	array		$row		resultset with LinkUs data form database
	 */
	public function __construct($linkusID, $row = null) {
		if ($linkusID !== null) {
			$sql = "SELECT		*
					FROM		wcf".WCF_N."_linkus
					WHERE		linkusID = ".$linkusID;
			$row = WCF::getDB()->getFirstRow($sql);
		}
		
		parent::__construct($row);
	}
	
	/**
	 * Read LinkUs cache.
	 * 
	 * @param 	array		$linkusitem
	 */
	 public function readCache() {
		// Loads cache resources
		WCF::getCache()->addResource('linkusitem', WCF_DIR.'cache/cache.linkusitem.php', WCF_DIR.'lib/system/cache/CacheBuilderLinkUs.class.php');
		// get linkusitem from cache
		$linkusitem = WCF::getCache()->get('linkusitem'); 
		
		return $linkusitem;
	 }
}
?>