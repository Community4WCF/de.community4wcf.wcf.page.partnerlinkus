<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Show the NewsPage.
 * 
 * @svn			$Id: PartnerPage.class.php 1134 2010-04-04 22:44:46Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class PartnerPage extends AbstractPage {
	/**
	 * list of partneritem
	 * 
	 * @var	array<integer>
	 */
	public $partneritem = array();
		
	/**
	 * Read Partner cache.
	 * 
	 * @param 	array		$partneritem
	 */
	public function readParameters() {
		parent::readParameters();
		// Loads cache resources
		WCF::getCache()->addResource('partneritem', WCF_DIR.'cache/cache.partneritem.php', WCF_DIR.'lib/system/cache/CacheBuilderPartner.class.php');
		// get partneritem from cache
		$this->partneritem = WCF::getCache()->get('partneritem');
		
		if(count($this->partneritem)) {
		foreach ($this->partneritem as &$items) {
			$items['description']  = self::getFormattedMessage($items['description']);
			}
		}
	}

	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();

		WCF::getTPL()->assign(array(
			'partneritem' => $this->partneritem
		));
	}
	
	/**
	 * @see Page::getFormattedMessage($message)
	 */
	public function getFormattedMessage($message) {
		// parse message
		$enableSmilies = 1;
		$enableHtml = 0;
		$enableBBCodes = 1;
		
		$parser = MessageParser::getInstance();
		$parser->setOutputType('text/html');
		return $parser->parse($message, $enableSmilies, $enableHtml, $enableBBCodes);
	}
	
	/**
	 * @see Page::show()
	 */
	public function show() {
		// set active menu item
		require_once(WCF_DIR.'lib/page/util/menu/PageMenu.class.php');
		PageMenu::setActiveMenuItem('wcf.header.menu.partner');
		
		// check permission
		WCF::getUser()->checkPermission('user.managepages.canViewPartner');
		
		// check module options
		if (!MODULE_PARTNER) {
			throw new IllegalLinkException();
		}
		
		// show page
		parent::show();
		
		// send content
		WCF::getTPL()->display('partnerPage');
	}
}
?>