<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/form/ACPForm.class.php');
require_once(WCF_DIR.'lib/data/partnerlinkus/LinkUsEditor.class.php');

/**
 * Add a feed to LinkUs.
 * 
 * @svn			$Id: LinkUsAddForm.class.php 1182 2010-04-07 18:23:26Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class LinkUsAddForm extends ACPForm {
	// system
	public $templateName = 'linkusAdd';
	public $activeMenuItem = 'wcf.acp.menu.link.content.linkus.add';
	public $neededPermissions = 'admin.content.linkus.linkusadd';

	/**
	 * feed editor object
	 * 
	 * @var	LinkUsEditor
	 */
	public $item;
	
	// parameters
	public $linkusID = 0;
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
		if (WCF::getUser()->getPermission('admin.content.linkus.linkusadd')) {
			$this->item = LinkUsEditor::create($this->name, $this->image, $this->link, $this->description, ($this->showOrder ? $this->showOrder : null), TIME_NOW);
		}
		
		// reset values
		$this->name = $this->image = $this->link = $this->description = $this->showOrder = '';
		
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