<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/action/AbstractPartnerAction.class.php');

/**
 * Delete Partner Item.
 * 
 * @svn			$Id: PartnerDeleteAction.class.php 1131 2010-04-04 21:23:04Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class PartnerDeleteAction extends AbstractPartnerAction {
	/**
	 * @see Action::execute()
	 */
	public function execute() {
		parent::execute();
				
		// check permission
		WCF::getUser()->checkPermission('admin.content.partner.partnerdelete');
		
		// enable item from partner
		$this->item->delete();
		$this->executed();
	}
	
	/**
	 * @see AbstractAction::executed()
	 */
	protected function executed() {
		AbstractAction::executed();
		
		// forward to list page
		HeaderUtil::redirect('index.php?page=PartnerList&deletedpartnerID='.$this->partnerID.'&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
		exit;
	}
}
?>