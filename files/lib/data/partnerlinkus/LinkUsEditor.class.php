<?php
// wcf imports
require_once(WCF_DIR.'lib/data/partnerlinkus/LinkUs.class.php');

/**
 * Provides functions to edit LinkUs.
 * 
 * @svn			$Id: LinkUsEditor.class.php 1183 2010-04-07 18:26:02Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class LinkUsEditor extends LinkUs {
	
	/**
	 * Resets the LinkUs cache after changes.
	 */
	public static function resetCache() {
		// reset LinkUs cache		
		WCF::getCache()->clear(WCF_DIR . 'cache', 'cache.linkusitem.php', true);
	}
	
	/**
	 * Creates a new LinkUs item.
	 * 
	 * @return	LinkUsEditor
	 */
	 public static function create($name, $image, $link, $description, $showOrder = 0, $pubDate) {
		 // save data
		 $linkusID = self::insert($name, $image, $link, $description, $showOrder, $pubDate);
		 
		 // get item
		$item = new LinkUsEditor($linkusID);
		
		// showOrder
		$item->addPosition($showOrder);
		
		// return new item
		return $item;
	 }
	 
	 /**
	 * Creates the LinkUs item row in database table.
	 *
	 * @param 	string		$name
	 * @param 	string		$image
	 * @param 	string		$link
	 * @param 	string		$description
	 * @param 	string		$showOrder
	 * @param 	intval		$pubDate
	 * @param	integer		$linkusID
	 *
	 * @return	LinkUsEditor
	 */
	public static function insert($name, $image, $link, $description, $showOrder, $pubDate) { 
		$sql = "INSERT INTO	wcf".WCF_N."_linkus
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
	 * Updates the data of a LinkUs item.
	 */
	public function update($name = null, $image = null, $link = null, $description = null, $showOrder = null) {
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
			$sql = "UPDATE	wcf".WCF_N."_linkus
				SET	showOrder = showOrder + 1
				WHERE 	showOrder >= ".$showOrder;
			WCF::getDB()->sendQuery($sql);
		}
		
		$sql = "SELECT 	IFNULL(MAX(showOrder), 0) + 1 AS showOrder
			FROM	wcf".WCF_N."_linkus
			".($showOrder ? "WHERE showOrder <= ".$showOrder : '');
		$row = WCF::getDB()->getFirstRow($sql);
		$showOrder = $row['showOrder'];
		
		$sql = "UPDATE	wcf".WCF_N."_linkus
			SET	showOrder = " . $showOrder . "
			WHERE	linkusID = ".$this->linkusID;
		WCF::getDB()->sendQuery($sql);
	}
	
	/**
	 * showOrder del
	 */
	public function removePositions() {
		$sql = "UPDATE	wcf".WCF_N."_linkus
			SET	showOrder = showOrder - 1
			WHERE	showOrder >= ".$this->showOrder."";
		WCF::getDB()->sendQuery($sql);
	}
	
	/**
	 * Updates the data of a LinkUs item.
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
			$sql = "UPDATE	wcf".WCF_N."_linkus
				SET	".$updates."
				WHERE	linkusID = ".$this->linkusID;
			WCF::getDB()->sendQuery($sql);
		}
	}
	
	/**
	 * Enables this LinkUs item.
	 */
	public function enable() {
		$sql = "UPDATE	wcf".WCF_N."_linkus
			SET	disabled = 0			
			WHERE	linkusID = ".$this->linkusID;
		WCF::getDB()->sendQuery($sql);
		
		// reset cache
		self::resetCache();
	}
	
	/**
	 * Disables this LinkUs item.
	 */
	public function disable() {
		$sql = "UPDATE	wcf".WCF_N."_linkus
			SET	disabled = 1			
			WHERE	linkusID = ".$this->linkusID;
		WCF::getDB()->sendQuery($sql);
		
		// reset cache
		self::resetCache();
	}
	
	/**
	 * Deletes this LinkUs item.
	 */
	public function delete() {
		// showOrdner
		$this->removePositions();
		
		// delete LinkUs item
		$sql = "DELETE FROM wcf".WCF_N."_linkus
			WHERE		linkusID = ".$this->linkusID;
		WCF::getDB()->sendQuery($sql);
		
		// reset cache
		self::resetCache();
	}
}
?>