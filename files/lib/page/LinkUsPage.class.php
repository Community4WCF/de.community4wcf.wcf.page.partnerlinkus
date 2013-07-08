<?php
namespace wcf\page;
use wcf\system\WCF;

/**
 * Shows the linkus page.
 * 
 * @author		Tobias H.
 * @copyright	2008-2013 Community4WCF (C4W)
 * @license		CC by-sa <http://creativecommons.org/licenses/by-sa/3.0/>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 * @subpackage	page
 * @category	Community Framework
 */
class LinkUsPage extends AbstractPage {
	const AVAILABLE_DURING_OFFLINE_MODE = false;
	
	/**
	 * @see	wcf\page\AbstractPage::$activeMenuItem
	 */
	public $activeMenuItem = 'wcf.partnerlinkus.linkus.menu';
	
	/**
	 * @see	wcf\page\AbstractPage::$neededPermissions
	 */
	public $neededPermissions = array('user.profile.canViewLinkUs');
	
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
			'allowSpidersToIndexThisPage' => false
		));
	}
}
