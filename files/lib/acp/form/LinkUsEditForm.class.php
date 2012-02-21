<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/form/LinkUsAddForm.class.php');

/**
 * Edit a feed from LinkUs.
 * 
 * @svn			$Id: LinkUsEditForm.class.php 1182 2010-04-07 18:23:26Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class LinkUsEditForm extends LinkUsAddForm {
	// system
	public $neededPermissions = 'admin.content.linkus.linkusedit';
	
	/**
	 * linkus id
	 * 
	 * @var	integer
	 */
	public $linkusID = 0;
	
	/**
	 * @see Page::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		// get item id
		if (isset($_REQUEST['linkusID'])) $this->linkusID = intval($_REQUEST['linkusID']);
		
		// get item
		$this->item = new LinkUsEditor($this->linkusID);
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
			'linkusID' => $this->linkusID,
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
		if (WCF::getUser()->getPermission('admin.content.linkus.linkusedit')) {
			$this->item->update($this->name, $this->image, $this->link, $this->description, ($this->showOrder ? $this->showOrder : null));
		}
		
		// showOrder
		$this->item->removePositions();
		$this->item->addPosition(($this->showOrder ? $this->showOrder : null));
		
		// reset cache
		LinkUsEditor::resetCache();
		$this->saved();
		
		// show success message
		WCF::getTPL()->assign('success', true);
	}
	
	/**
	 * @see Page::show()
	 */			
	public function show() {		
		// check module options
		if (!MODULE_LINKUS) {
			throw new IllegalLinkException();
		}
		
		// show page
		parent::show();
	}
}
?>