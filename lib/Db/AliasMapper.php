<?php
declare(strict_types=1);

/**
 * Mail
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Tahaa Karim <tahaalibra@gmail.com>
 * @copyright Tahaa Karim 2016
 */

namespace OCA\Mail\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class AliasMapper extends QBMapper {

	/**
	 * @param IDBConnection $db
	 */
	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'mail_aliases');
	}

	/**
	 * @param int $aliasId
	 * @param string $currentUserId
	 * @return Alias
	 */
	public function find(int $aliasId, string $currentUserId): Alias {
		$qb = $this->db->getQueryBuilder();
		$qb->select('aliases.*')
			->from($this->getTableName(), 'aliases')
			->join('aliases', 'mail_accounts', 'accounts', $qb->expr()->eq('aliases.account_id', 'accounts.id'))
			->where(
				$qb->expr()->andX(
					$qb->expr()->eq('accounts.user_id', $qb->createNamedParameter($currentUserId)),
					$qb->expr()->eq('aliases.id', $qb->createNamedParameter($aliasId))
				)
			);

		return $this->findEntity($qb);
	}

	/**
	 * @param int $accountId
	 * @param string $currentUserId
	 * @return Alias[]
	 */
	public function findAll(int $accountId, string $currentUserId): array {
		$qb = $this->db->getQueryBuilder();
		$qb->select('aliases.*')
			->from($this->getTableName(), 'aliases')
			->join('aliases', 'mail_accounts', 'accounts', $qb->expr()->eq('aliases.account_id', 'accounts.id'))
			->where(
				$qb->expr()->andX(
					$qb->expr()->eq('accounts.user_id', $qb->createNamedParameter($currentUserId)),
					$qb->expr()->eq('aliases.account_id', $qb->createNamedParameter($accountId))
				)
			);

		return $this->findEntities($qb);
	}
}
