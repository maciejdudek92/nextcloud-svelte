<?php
declare(strict_types=1);

namespace OCA\TodoBoilerplate\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class TaskMapper extends QBMapper {

    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'todo_boilerplate_tasks', Task::class);
    }

    /**
     * @return Task[]
     */
    public function findAllByUser(string $userId): array {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from($this->getTableName())
           ->where($qb->expr()->eq('user_id', $qb->createNamedParameter($userId)));

        return $this->findEntities($qb);
    }
}
