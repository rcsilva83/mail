<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2023 Johannes Merkel <mail@johannesgge.de>
 *
 * @author Johannes Merkel <mail@johannesgge.de>
 *
 * @license AGPL-3.0-or-later
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Mail\Db;

use OCP\AppFramework\Db\Entity;

/**
 * @method void setMessageId(string $messageId)
 * @method string getMessageId()
 * @method void setSnoozedUntil(int $snoozeUntil)
 * @method int getSnoozedUntil()
 * @method void setSrcMailboxId(int $srcMailboxId)
 * @method int getSrcMailboxId()
 */
class MessageSnooze extends Entity {

	/** @var string */
	protected $messageId;

	/** @var int */
	protected $snoozedUntil;

	/** @var int */
	protected $srcMailboxId;

	public function __construct() {
		$this->addType('messageId', 'string');
		$this->addType('snoozedUntil', 'integer');
		$this->addType('srcMailboxId', 'integer');
	}
}
