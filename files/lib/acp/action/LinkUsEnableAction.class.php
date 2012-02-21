<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/action/AbstractLinkUsAction.class.php');

/**
 * Enable LinkUs Item.
 * 
 * @svn			$Id: LinkUsEnableAction.class.php 1131 2010-04-04 21:23:04Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */
 
class LinkUsEnableAction extends AbstractLinkUsAction {
	/**
	 * @see Action::execute()
	 */
	public function execute() {
		parent::execute();
				
		// check permission
		WCF::getUser()->checkPermission('admin.content.linkus.linkusedit');
		
		// enable item
		$this->item->enable();
		$this->executed();
	}
}
?>