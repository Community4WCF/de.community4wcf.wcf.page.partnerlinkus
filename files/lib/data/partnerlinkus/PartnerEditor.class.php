<?php
// wcf imports
require_once(WCF_DIR.'lib/data/partnerlinkus/Partner.class.php');

/**
 * Provides functions to edit Partner.
 * 
 * @svn			$Id: PartnerEditor.class.php 1182 2010-04-07 18:23:26Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class PartnerEditor extends Partner {
	
	/**
	 * Resets the Partner cache after changes.
	 */
	public static function resetCache() {
		// reset Partner cache		
		WCF::getCache()->clear(WCF_DIR . 'cache', 'cache.partneritem.php', true);
	}
	
	/**
	 * Creates a new Partner item.
	 * 
	 * @return	PartnerEditor
	 */
	 public static function create($name, $image, $link, $description, $showOrder = 0, $pubDate) {
		 // save data
		 $partnerID = self::insert($name, $image, $link, $description, $showOrder, $pubDate);
		 
		 // get item
		$item = new PartnerEditor($partnerID);
		
		// showOrder
		$item->addPosition($showOrder);
		
		// return new item
		return $item;
	 }
	 
	 /**
	 * Creates the Partner item in database table.
	 *
	 * @param 	string		$name
	 * @param 	string		$image
	 * @param 	string		$link
	 * @param 	string		$description
	 * @param 	string		$showOrder
	 * @param 	intval		$pubDate
	 * @param	integer		$partnerID
	 *
	 * @return	PartnerEditor
	 */
	public static function insert($name, $image, $link, $description, $showOrder = 0, $pubDate) { 
		$sql = "INSERT INTO	wcf".WCF_N."_partner
					(name, image, link, description, showOrder, pubDate)
			VALUES	(	
				'".escapeString($name)."',
				'".escapeString($image)."',
				'".escapeString($link)."',
				'".escapeString($description)."',
				'".$showOrder."',
				'".$pubDate."'
				)";
		WCF::getDB()->sendQuery($sql);
		return WCF::getDB()->getInsertID();
	}
	
	/**
	 * Updates the data of a Partner item.
	 */
	public function update($name = null, $image = null, $link = null, $description = null, $showOrder = 0) {
		$fields = array();
		if ($name !== null) $fields['name'] = $name;
		if ($image !== null) $fields['image'] = $image;
		if ($link !== null) $fields['link'] = $link;
		if ($description !== null) $fields['description'] = $description;
		$fields['showOrder'] = $showOrder;
		
		$this->updateData($fields);
	}
	
	/**
	 * showOrder add and edit
	 */
	public function addPosition($showOrder = null) {
		if ($showOrder !== null) {
			$sql = "UPDATE	wcf".WCF_N."_partner
				SET	showOrder = showOrder + 1
				WHERE 	showOrder >= ".$showOrder;
			WCF::getDB()->sendQuery($sql);
		}
		
		$sql = "SELECT 	IFNULL(MAX(showOrder), 0) + 1 AS showOrder
			FROM	wcf".WCF_N."_partner
			".($showOrder ? "WHERE showOrder <= ".$showOrder : '');
		$row = WCF::getDB()->getFirstRow($sql);
		$showOrder = $row['showOrder'];
		
		$sql = "UPDATE	wcf".WCF_N."_partner
			SET	showOrder = " . $showOrder . "
			WHERE	partnerID = ".$this->partnerID;
		WCF::getDB()->sendQuery($sql);
	}
	
	/**
	 * showOrder del
	 */
	public function removePositions() {
		$sql = "UPDATE	wcf".WCF_N."_partner
			SET	showOrder = showOrder - 1
			WHERE	showOrder >= ".$this->showOrder."";
		WCF::getDB()->sendQuery($sql);
	}
	
	/**
	 * Updates the data of a Partner item.
	 *
	 * @param 	array		$fields
	 */
	public function updateData($fields = array()) { 
		$updates = '';
		foreach ($fields as $key => $value) {
			if (!empty($updates)) $updates .= ',';
			$updates .= $key.'=';
			if (is_int($value)) $updates .= $value;
			else $updates .= "'".escapeString($value)."'";
		}
		
		if (!empty($updates)) {
			$sql = "UPDATE	wcf".WCF_N."_partner
				SET	".$updates."
				WHERE	partnerID = ".$this->partnerID;
			WCF::getDB()->sendQuery($sql);
		}
	}
	
	/**
	 * Enables this Partner item.
	 */
	public function enable() {
		$sql = "UPDATE	wcf".WCF_N."_partner
			SET	disabled = 0			
			WHERE	partnerID = ".$this->partnerID;
		WCF::getDB()->sendQuery($sql);
		
		// reset cache
		self::resetCache();
	}
	
	/**
	 * Disables this Partner item.
	 */
	public function disable() {
		$sql = "UPDATE	wcf".WCF_N."_partner
			SET	disabled = 1			
			WHERE	partnerID = ".$this->partnerID;
		WCF::getDB()->sendQuery($sql);
		
		// reset cache
		self::resetCache();
	}
	
	/**
	 * Deletes this Partner item.
	 */
	public function delete() {
		// showOrdner
		$this->removePositions();
		
		// delete Partner item
		$sql = "DELETE FROM wcf".WCF_N."_partner
			WHERE	partnerID = ".$this->partnerID;
		WCF::getDB()->sendQuery($sql);
		
		// reset cache
		self::resetCache();
	}	
}
?>