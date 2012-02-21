<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/action/AbstractLinkUsAction.class.php');

/**
 * Delete LinkUs Item.
 * 
 * @svn			$Id: LinkUsDeleteAction.class.php 1131 2010-04-04 21:23:04Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class LinkUsDeleteAction extends AbstractLinkUsAction {
	/**
	 * @see Action::execute()
	 */
	public function execute() {
		parent::execute();
				
		// check permission
		WCF::getUser()->checkPermission('admin.content.linkus.linkusdelete');
		
		// enable item from linkus
		$this->item->delete();
		$this->executed();
	}
	
	/**
	 * @see AbstractAction::executed()
	 */
	protected function executed() {
		AbstractAction::executed();
		
		// forward to list page
		HeaderUtil::redirect('index.php?page=LinkUsList&deletedlinkusID='.$this->linkusID.'&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
		exit;
	}
}
?>