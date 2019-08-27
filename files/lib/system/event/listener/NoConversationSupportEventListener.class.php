<?php

namespace wcf\system\event\listener;

use wcf\system\exception\UserInputException;
use wcf\system\WCF;

/**
 * This class hooks the conversation add form and requires accepting a checkbox before the conversation get's created.
 *
 * @author      Florian Gail
 * @copyright   2014-2019 Florian Gail <https://www.mysterycode.de/>
 * @license     Kostenlose Produkte <https://www.mysterycode.de/licenses/kostenlose-plugins/>
 * @package     de.mysterycode.wcf.conversation.nosupport
 * @category    wcf\system\event\listener
 */
class NoConversationSupportEventListener implements IParameterizedEventListener {
	/**
	 * status whether the checkbox has beed accepted
	 * @var boolean
	 */
	protected $noSupportAccepted = false;
	
	/**
	 * @inheritDoc
	 */
	public function execute($eventObj, $className, $eventName, array &$parameters) {
		if ($eventName == 'readFormParameters') {
			if (isset($_POST['noSupportViaConversation'])) $this->noSupportAccepted = true;
		}
		else if ($eventName == 'validate') {
			if (!$this->noSupportAccepted) throw new UserInputException('noSupportViaConversation');
		}
		else if ($eventName == 'assignVariables') {
			WCF::getTPL()->assign('noSupportViaConversation', $this->noSupportAccepted);
		}
	}
}
