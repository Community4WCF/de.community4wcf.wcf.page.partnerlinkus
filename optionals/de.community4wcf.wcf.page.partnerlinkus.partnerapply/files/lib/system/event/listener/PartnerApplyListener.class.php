<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * Add Portal Feeds
 * 
 * @svn			$Id: PartnerApplyListener.class.php 1259 2010-04-12 17:31:35Z TobiasH87 $
 * @package		de.community4wcf.wcf.page.partnerlinkus.partnerapply
 */
class PartnerApplyListener implements EventListener
{
	/**
	 * @see		EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName)
	{
		if (MODULE_PARTNER && WCF::getUser()->getPermission('user.managepages.canViewPartnerApply')) {
		//requirements for PartnerApply
		WCF::getTPL()->append(array(
			'additionalTabs' => WCF::getTPL()->fetch('partnerapplyeventlistener')
		));
		}
	}        
}
?>