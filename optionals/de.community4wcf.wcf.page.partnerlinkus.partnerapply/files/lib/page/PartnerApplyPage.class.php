<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractPage.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * @svn			$Id: PartnerApplyPage.class.php 1251 2010-04-11 20:13:29Z TobiasH87 $
 * @package		de.community4wcf.wcf.page.partnerlinkus.partnerapply
 */

class PartnerApplyPage extends AbstractPage {
	// system
	public $templateName = 'partnerapplyPage';

	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'message' => MessageParser::getInstance()->parse(PARTNERAPPLY_TEXT, PARTNERAPPLY_ENABLE_SMILIES, PARTNERAPPLY_ENABLE_HTML, PARTNERAPPLY_ENABLE_BBCODES)
		));
	}

	/**
	 * @see Page::show()
	 */
	public function show() {
		// set active menu item
		require_once(WCF_DIR.'lib/page/util/menu/PageMenu.class.php');
		PageMenu::setActiveMenuItem('wcf.header.menu.partner');
		
		// check permission
		WCF::getUser()->checkPermission('user.managepages.canViewPartnerApply');

		// check module options
		if (!MODULE_PARTNER) {
			throw new IllegalLinkException();
		}

		parent::show();
	}	
}
?>