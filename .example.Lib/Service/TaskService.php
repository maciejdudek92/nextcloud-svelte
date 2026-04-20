<?php
declare(strict_types=1);

namespace OCA\TodoBoilerplate\Service;

use OCA\TodoBoilerplate\Db\Task;
use OCA\TodoBoilerplate\Db\TaskMapper;
use OCP\AppFramework\Db\DoesNotExistException;

class TaskService {

    public function __construct(
        private TaskMapper $mapper
    ) {}

    public function findAll(string $userId): array {
        return $this->mapper->findAllByUser($userId);
    }

    public function create(string $title, string $userId): Task {
        $task = new Task();
        $task->setTitle($title);
        $task->setUserId($userId);
        $task->setDone(false);

        return $this->mapper->insert($task);
    }
}
