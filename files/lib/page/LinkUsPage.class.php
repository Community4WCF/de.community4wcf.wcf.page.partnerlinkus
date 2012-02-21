<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Show the NewsPage.
 * 
 * @svn			$Id: LinkUsPage.class.php 1134 2010-04-04 22:44:46Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class LinkUsPage extends AbstractPage {
	/**
	 * list of linkusitem
	 * 
	 * @var	array<integer>
	 */
	public $linkusitem = array();
		
	/**
	 * Read LinkUs cache.
	 * 
	 * @param 	array		$linkusitem
	 */
	public function readParameters() {
		parent::readParameters();
		// Loads cache resources
		WCF::getCache()->addResource('linkusitem', WCF_DIR.'cache/cache.linkusitem.php', WCF_DIR.'lib/system/cache/CacheBuilderLinkUs.class.php');
		// get linkusitem from cache
		$this->linkusitem = WCF::getCache()->get('linkusitem');
		
		if(count($this->linkusitem)) {
		foreach ($this->linkusitem as &$items) {
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
			'linkusitem' => $this->linkusitem
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
		PageMenu::setActiveMenuItem('wcf.header.menu.linkus');
		
		// check permission
		WCF::getUser()->checkPermission('user.managepages.canViewLinkUs');
		
		// check module options
		if (!MODULE_LINKUS) {
			throw new IllegalLinkException();
		}
		
		// show page
		parent::show();
		
		// send content
		WCF::getTPL()->display('linkusPage');
	}
}
?>