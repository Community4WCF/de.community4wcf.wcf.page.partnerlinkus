<?php
// wcf imports
require_once(WCF_DIR.'lib/action/AbstractAction.class.php');
require_once(WCF_DIR.'lib/data/partnerlinkus/LinkUsEditor.class.php');

/**
 * LinkUs Action.
 * 
 * @svn			$Id: AbstractLinkUsAction.class.php 1159 2010-04-05 17:52:19Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus
 */

class AbstractLinkUsAction extends AbstractAction {
	/**
	 * linkus id
	 * 
	 * @var	integer
	 */
	public $linkusID = 0;
	
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
		
		if (isset($_REQUEST['linkusID'])) $this->linkusID = intval($_REQUEST['linkusID']);
		$this->item = new LinkUsEditor($this->linkusID);	
		if (!$this->item->linkusID) {
			throw new IllegalLinkException();
		}
	}
	
	/**
	 * @see AbstractAction::executed()
	 */
	protected function executed() {
		parent::executed();
		
		// forward to list page
		HeaderUtil::redirect('index.php?page=LinkUsList&packageID='.PACKAGE_ID.SID_ARG_2ND_NOT_ENCODED);
		exit;
	}
}
?>