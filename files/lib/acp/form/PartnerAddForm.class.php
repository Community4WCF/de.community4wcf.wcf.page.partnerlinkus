<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/form/ACPForm.class.php');
require_once(WCF_DIR.'lib/data/partnerlinkus/PartnerEditor.class.php');

/**
 * Add a item to Partner.
 * 
 * @svn			$Id: PartnerAddForm.class.php 1182 2010-04-07 18:23:26Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class PartnerAddForm extends ACPForm {
	// system
	public $templateName = 'partnerAdd';
	public $activeMenuItem = 'wcf.acp.menu.link.content.partner.add';
	public $neededPermissions = 'admin.content.partner.partneradd';

	/**
	 * item editor object
	 * 
	 * @var	PartnerEditor
	 */
	public $item;
	
	// parameters
	public $partnerID = 0;
	public $name = '';
	public $image = 'http://';
	public $link = 'http://';
	public $description = '';
	public $showOrder = 100;
	public $pubDate = '';
	
	/**
	 * @see Form::readFormParameters()
	 */
	public function readFormParameters() {
		parent::readFormParameters();
		
		if (isset($_REQUEST['name'])) $this->name = StringUtil::trim($_REQUEST['name']);
		if (isset($_REQUEST['image'])) $this->image = StringUtil::trim($_REQUEST['image']);
		if (isset($_REQUEST['link'])) $this->link = StringUtil::trim($_REQUEST['link']);
		if (isset($_REQUEST['description'])) $this->description = StringUtil::trim($_REQUEST['description']);
		if (isset($_REQUEST['showOrder'])) $this->showOrder = intval($_REQUEST['showOrder']);
		if (isset($_REQUEST['pubDate'])) $this->pubDate = intval($_REQUEST['pubDate']);
	}
	
	/**
	 * @see Form::validate()
	 */
	public function validate() {
		parent::validate();
		
		// name
		if (empty($this->name)) {
			throw new UserInputException('name');
		}
		
		// image
		if (empty($this->image)) {
			throw new UserInputException('image');
		}

		// link
		if (empty($this->link) || $this->link == "http://") {
			throw new UserInputException('link', 'empty');
		}

		// description
		/**
		if (!$this->description) {
			throw new UserInputException('description');
		}
		*/
		// showOrder
		if (!$this->showOrder) {
			throw new UserInputException('showOrder');
		}
	}
	
	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'action' => 'add',
			'name' => $this->name,
			'image' => $this->image,
			'link' => $this->link,
			'description' => $this->description,
			'showOrder' => $this->showOrder,
		));
	}
	
	/**
	 * @see Form::save()
	 */
	public function save() {
		parent::save();
		
		// save
		if (WCF::getUser()->getPermission('admin.content.partner.partneradd')) {
			$this->item = PartnerEditor::create($this->name, $this->image, $this->link, $this->description, ($this->showOrder ? $this->showOrder : null), TIME_NOW);
		}
		
		// reset values
		$this->name = $this->image = $this->link = $this->description = $this->showOrder = '';
		
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