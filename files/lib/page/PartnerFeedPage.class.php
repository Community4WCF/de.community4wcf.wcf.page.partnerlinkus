<?php
// wcf imports
require_once(WCF_DIR.'lib/page/AbstractFeedPage.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Show the Partnerfeed.
 * 
 * @svn			$Id: PartnerFeedPage.class.php 1203 2010-04-08 18:31:33Z TobiasH87 $
 * @copyright	2010 Community4WCF <http://www.community4wcf.de>
 * @package		de.community4wcf.wcf.page.partnerlinkus.feed
 */

class PartnerFeedPage extends AbstractFeedPage {
	/**
	 * list of partneritem
	 * 
	 * @var	array<integer>
	 */
	public $partneritem = array();
		
	/**
	 * @see Page::readData()
	 */
	public function readData() {
		parent::readData();
		// get partneritem
			$sql = "SELECT 	*
					FROM 	wcf".WCF_N."_partner
					WHERE 	pubDate > ".($this->hours ? (TIME_NOW - $this->hours * 3600) : (TIME_NOW - 30 * 86400))."
					AND		disabled = 0
					ORDER 	BY partnerID DESC";
			$result = WCF::getDB()->sendQuery($sql);
			while ($row = WCF::getDB()->fetchArray($result)) {
			$this->partneritem[] = $row;
			}
		if(count($this->partneritem)) {
		foreach ($this->partneritem as &$feeds) {
			$feeds['description']  = self::getFormattedMessage($feeds['description']);
			}
		}
	}

	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();

		WCF::getTPL()->assign(array(
			'partneritem' => $this->partneritem
		));
	}
	
	/**
	 * @see Page::getFormattedMessage($message)
	 */
	public function getFormattedMessage($message) {
		// parse message
		$enableSmilies = 1;
		$enableHtml = 0;
		$enableBBCodes = 1;
		
		$parser = MessageParser::getInstance();
		$parser->setOutputType('text/html');
		return $parser->parse($message, $enableSmilies, $enableHtml, $enableBBCodes);
	}
	
	/**
	 * @see Page::show()
	 */
	public function show() {	
		// check permission
		WCF::getUser()->checkPermission('user.managepages.canViewPartner');
		
		// check module options
		if (!MODULE_PARTNER) {
			throw new IllegalLinkException();
		}
		
		// show page
		parent::show();
		
		// send content
		WCF::getTPL()->display(($this->format == 'atom' ? 'partnerfeedAtom' : 'partnerfeedRSS2'), false);
	}
}
?>