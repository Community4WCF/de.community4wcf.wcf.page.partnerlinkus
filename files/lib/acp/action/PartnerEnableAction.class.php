<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/action/AbstractPartnerAction.class.php');

/**
 * Enable Partner Item.
 * 
 * @svn			$Id: PartnerEnableAction.class.php 1131 2010-04-04 21:23:04Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class PartnerEnableAction extends AbstractPartnerAction {
	/**
	 * @see Action::execute()
	 */
	public function execute() {
		parent::execute();
				
		// check permission
		WCF::getUser()->checkPermission('admin.content.partner.partneredit');
		
		// enable item
		$this->item->enable();
		$this->executed();
	}
}
?>