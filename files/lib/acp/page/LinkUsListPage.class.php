<?php
// wcf imports
require_once(WCF_DIR.'lib/page/SortablePage.class.php');
require_once(WCF_DIR.'lib/data/partnerlinkus/LinkUs.class.php');

/**
 * Shows a list of feeds from LinkUs.
 * 
 * @svn			$Id: LinkUsListPage.class.php 1180 2010-04-06 02:45:08Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class LinkUsListPage extends SortablePage {
	// system
	public $templateName = 'linkusList';
	public $neededPermissions = 'admin.content.linkus.linkusshow';
	public $defaultSortField = 'showOrder';
	public $defaultSortOrder = 'ASC';
	public $itemsPerPage = 30;
	public $deletedlinkusID = 0;
	
	/**
	 * list of linkusitem
	 * 
	 * @var	array
	 */
	public $linkusitem = array();
	
	/**
	 * @see Page::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		if (isset($_REQUEST['deletedlinkusID'])) $this->deletedlinkusID = intval($_REQUEST['deletedlinkusID']);
	}
	
	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'linkusitem' => $this->linkusitem,
			'deletedlinkusID' => $this->deletedlinkusID
		));
	}
	
	/**
	 * @see SortablePage::validateSortField()
	 */
	public function validateSortField() {
		parent::validateSortField();
		
		switch ($this->sortField) {
			case 'linkusID':
			case 'showOrder':
			case 'name':
			case 'pubDate': break;
			default: $this->sortField = $this->defaultSortField;
		}
	}
	
	/**
	 * @see Page::show()
	 */
	public function show() {
		// set active acpmenu item
		WCFACP::getMenu()->setActiveMenuItem('wcf.acp.menu.link.content.linkus.show');
		
		// check module options
		if (!MODULE_LINKUS) {
			throw new IllegalLinkException();
		}
		
		parent::show();
	}
	
	/**
	 * @see Page::readData()
	 */
	public function readData() {
		parent::readData();
		
		$this->readLinkUs();
	}
	
	/**
	 * @see MultipleLinkPage::countItems()
	 */
	public function countItems() {
		parent::countItems();
		
		$sql = "SELECT	COUNT(*) AS count
			FROM	wcf".WCF_N."_linkus";
		$row = WCF::getDB()->getFirstRow($sql);
		return $row['count'];
	}
	
	/**
	 * Gets a list of LinkUs.
	 */
	protected function readLinkUs() {
		if ($this->items) {
			$sql = "SELECT		*
					FROM		wcf".WCF_N."_linkus
					ORDER BY	".$this->sortField." ".$this->sortOrder;
			$result = WCF::getDB()->sendQuery($sql, $this->itemsPerPage, ($this->pageNo - 1) * $this->itemsPerPage);
			while ($row = WCF::getDB()->fetchArray($result)) {
				$this->linkusitem[] = $row;
			}
		}
	}
}
?>