<?php
declare(strict_types=1);

namespace OCA\TodoBoilerplate\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;

class Version010000Date20251223 extends SimpleMigrationStep {

    public function changeSchema(IOutput $output, Closure $schemaClosure, array $options): ?ISchemaWrapper {
        /** @var ISchemaWrapper $schema */
        $schema = $schemaClosure();

        if (!$schema->hasTable('todo_boilerplate_tasks')) {
            $table = $schema->createTable('todo_boilerplate_tasks');

            $table->addColumn('id', 'integer', [
                'autoincrement' => true,
                'notnull' => true,
            ]);

            $table->addColumn('title', 'string', [
                'notnull' => true,
                'length' => 200,
            ]);

            $table->addColumn('done', 'boolean', [
                'notnull' => true,
                'default' => false,
            ]);

            $table->addColumn('user_id', 'string', [
                'notnull' => true,
                'length' => 64,
            ]);

            $table->setPrimaryKey(['id']);
            $table->addIndex(['user_id'], 'todo_user_id_idx');
        }

        return $schema;
    }
}
