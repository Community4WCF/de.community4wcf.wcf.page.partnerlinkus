<?php
// wcf imports
require_once(WCF_DIR.'lib/page/SortablePage.class.php');
require_once(WCF_DIR.'lib/data/partnerlinkus/Partner.class.php');

/**
 * Shows a list of feeds from Partner.
 * 
 * @svn			$Id: PartnerListPage.class.php 1180 2010-04-06 02:45:08Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class PartnerListPage extends SortablePage {
	// system
	public $templateName = 'partnerList';
	public $neededPermissions = 'admin.content.partner.partnershow';
	public $defaultSortField = 'showOrder';
	public $defaultSortOrder = 'ASC';
	public $itemsPerPage = 30;
	public $deletedpartnerID = 0;
	
	/**
	 * list of partneritem
	 * 
	 * @var	array
	 */
	public $partneritem = array();
	
	/**
	 * @see Page::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		if (isset($_REQUEST['deletedpartnerID'])) $this->deletedpartnerID = intval($_REQUEST['deletedpartnerID']);
	}
	
	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'partneritem' => $this->partneritem,
			'deletedpartnerID' => $this->deletedpartnerID
		));
	}
	
	/**
	 * @see SortablePage::validateSortField()
	 */
	public function validateSortField() {
		parent::validateSortField();
		
		switch ($this->sortField) {
			case 'partnerID':
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
		WCFACP::getMenu()->setActiveMenuItem('wcf.acp.menu.link.content.partner.show');
		
		// check module options
		if (!MODULE_PARTNER) {
			throw new IllegalLinkException();
		}
		
		parent::show();
	}
	
	/**
	 * @see Page::readData()
	 */
	public function readData() {
		parent::readData();
		
		$this->readPartner();
	}
	
	/**
	 * @see MultipleLinkPage::countItems()
	 */
	public function countItems() {
		parent::countItems();
		
		$sql = "SELECT	COUNT(*) AS count
			FROM	wcf".WCF_N."_partner";
		$row = WCF::getDB()->getFirstRow($sql);
		return $row['count'];
	}
	
	/**
	 * Gets a list of Partner.
	 */
	protected function readPartner() {
		if ($this->items) {
			$sql = "SELECT		*
					FROM		wcf".WCF_N."_partner
					ORDER BY	".$this->sortField." ".$this->sortOrder;
			$result = WCF::getDB()->sendQuery($sql, $this->itemsPerPage, ($this->pageNo - 1) * $this->itemsPerPage);
			while ($row = WCF::getDB()->fetchArray($result)) {
				$this->partneritem[] = $row;
			}
		}
	}
}
?>