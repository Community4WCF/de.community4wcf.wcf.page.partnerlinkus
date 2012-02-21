<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/form/PartnerAddForm.class.php');

/**
 * Edit a feed from FeedPage.
 * 
 * @svn			$Id: PartnerEditForm.class.php 1182 2010-04-07 18:23:26Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class PartnerEditForm extends PartnerAddForm {
	// system
	public $neededPermissions = 'admin.content.partner.partneredit';
	
	/**
	 * partner id
	 * 
	 * @var	integer
	 */
	public $partnerID = 0;
	
	/**
	 * @see Page::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		// get item id
		if (isset($_REQUEST['partnerID'])) $this->partnerID = intval($_REQUEST['partnerID']);
		
		// get item
		$this->item = new PartnerEditor($this->partnerID);
	}
	
	/**
	 * @see Page::readData()
	 */
	public function readData() {
		parent::readData();
		
		if (!count($_POST)) {
			// get values
			$this->name = $this->item->name;
			$this->image = $this->item->image;
			$this->link = $this->item->link;
			$this->description = $this->item->description;
			$this->showOrder = $this->item->showOrder;
		}
	}
	
	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'partnerID' => $this->partnerID,
			'item' => $this->item,
			'action' => 'edit'
		));
	}
	
	/**
	 * @see Form::save()
	 */
	public function save() {
		AbstractForm::save();
		
		// save
		if (WCF::getUser()->getPermission('admin.content.partner.partneredit')) {
			$this->item->update($this->name, $this->image, $this->link, $this->description, ($this->showOrder ? $this->showOrder : null));
		}
		
		// showOrder
		$this->item->removePositions();
		$this->item->addPosition(($this->showOrder ? $this->showOrder : null));
		
		// reset cache
		PartnerEditor::resetCache();
		$this->saved();
		
		// show success message
		WCF::getTPL()->assign('success', true);
	}
	
	/**
	 * @see Page::show()
	 */			
	public function show() {		
		// check module options
		if (!MODULE_PARTNER) {
			throw new IllegalLinkException();
		}
		
		// show page
		parent::show();
	}
}
?>