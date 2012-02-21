<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/action/AbstractPartnerAction.class.php');

/**
 * Disable Partner Item.
 * 
 * @svn			$Id: PartnerDisableAction.class.php 1131 2010-04-04 21:23:04Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class PartnerDisableAction extends AbstractPartnerAction {
	/**
	 * @see Action::execute()
	 */
	public function execute() {
		parent::execute();
				
		// check permission
		WCF::getUser()->checkPermission('admin.content.partner.partneredit');
		
		// disable item
		$this->item->disable();
		$this->executed();
	}
}
?>