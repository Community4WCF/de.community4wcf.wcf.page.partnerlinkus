<?php
namespace wcf\page;
use wcf\system\WCF;
use wcf\system\bbcode\MessageParser;

/**
 * Shows the partner apply page.
 * 
 * @author		Tobias H.
 * @copyright	2008-2013 Community4WCF (C4W)
 * @license		CC by-sa <http://creativecommons.org/licenses/by-sa/3.0/>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 * @subpackage	page
 * @category	Community Framework
 */
class PartnerApplyPage extends AbstractPage {
	const AVAILABLE_DURING_OFFLINE_MODE = false;
	
	/**
	 * @see	wcf\page\AbstractPage::$activeMenuItem
	 */
	public $activeMenuItem = 'wcf.partnerlinkus.partnerapply.menu';
	
	/**
	 * @see	wcf\page\AbstractPage::$neededPermissions
	 */
	public $neededPermissions = array('user.profile.canViewPartnerApply');
	
	/**
	 * @see	wcf\page\AbstractPage::$neededModules
	 */
	public $neededModules = array('MODULE_PARTNERLINKUS');
	
	/**
	 * @see wcf\page\IPage::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
			
		WCF::getTPL()->assign(array(
			'partnerapply' => MessageParser::getInstance()->parse(WCF::getLanguage()->getDynamicVariable(PARTNERLINKUS_PARTNERAPPLY_CONTENT), PARTNERLINKUS_PARTNERAPPLY_ENABLE_SMILEY, PARTNERLINKUS_PARTNERAPPLY_ENABLE_HTML, PARTNERLINKUS_PARTNERAPPLY_ENABLE_BBCODES),
			'allowSpidersToIndexThisPage' => false
		));
	}
}
