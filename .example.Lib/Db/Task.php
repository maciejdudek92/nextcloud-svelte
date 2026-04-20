<?php
declare(strict_types=1);

namespace OCA\TodoBoilerplate\Db;

use OCP\AppFramework\Db\Entity;

class Task extends Entity implements \JsonSerializable {

    protected ?string $title = null;
    protected bool $done = false;
    protected ?string $userId = null;

    public function __construct() {
        $this->addType('done', 'boolean');
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'done' => $this->done,
        ];
    }
}
