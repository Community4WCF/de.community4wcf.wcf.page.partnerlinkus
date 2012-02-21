<?php
// wcf imports
require_once(WCF_DIR.'lib/action/AbstractAction.class.php');
require_once(WCF_DIR.'lib/data/partnerlinkus/PartnerEditor.class.php');

/**
 * Partner Action.
 * 
 * @svn			$Id: AbstractPartnerAction.class.php 1131 2010-04-04 21:23:04Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class AbstractPartnerAction extends AbstractAction {
	/**
	 * partner id
	 * 
	 * @var	integer
	 */
	public $partnerID = 0;
	
	/**
	 * item editor object
	 * 
	 * @var	FeedPageEditor
	 */
	public $item = null;
	
	/**
	 * @see Action::readParameters()
	 */
	public function readParameters() {
		parent::readParameters();
		
		if (isset($_REQUEST['partnerID'])) $this->partnerID = intval($_REQUEST['partnerID']);
		$this->item = new PartnerEditor($this->partnerID);	
		if (!$this->item->partnerID) {
			throw new IllegalLinkException();
		}
	}
	
	/**
	 * @see AbstractAction::executed()
	 */
	protected function executed() {
		parent::executed();
		
		// forward to list page
		HeaderUtil::redirect('index.php?page=PartnerList&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
		exit;
	}
}
?>