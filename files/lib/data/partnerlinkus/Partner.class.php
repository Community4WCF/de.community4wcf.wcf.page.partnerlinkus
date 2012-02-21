<?php
// wcf imports
require_once(WCF_DIR.'lib/data/DatabaseObject.class.php');

/**
 * Represents the Partner.
 * 
 * @svn			$Id: Partner.class.php 1124 2010-04-04 18:33:16Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class Partner extends DatabaseObject {

	/**
	 * Creates a new Partner item.
	 *
	 * If id is set, the function reads the Partner data from database.
	 * Otherwise it uses the given resultset.
	 * 
	 * @param 	integer		$partnerID		id of a Partner
	 * @param 	array		$row		resultset with Partner data form database
	 */
	public function __construct($partnerID, $row = null) {
		if ($partnerID !== null) {
			$sql = "SELECT		*
					FROM		wcf".WCF_N."_partner
					WHERE		partnerID = ".$partnerID;
			$row = WCF::getDB()->getFirstRow($sql);
		}
		
		parent::__construct($row);
	}
	
	/**
	 * Read Partner cache.
	 * 
	 * @param 	array		$partneritem
	 */
	 public function readCache() {
		// Loads cache resources
		WCF::getCache()->addResource('partneritem', WCF_DIR.'cache/cache.partneritem.php', WCF_DIR.'lib/system/cache/CacheBuilderPartner.class.php');
		// get partneritem from cache
		$partneritem = WCF::getCache()->get('partneritem'); 
		
		return $partneritem;
	 }
}
?>