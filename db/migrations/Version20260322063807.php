<?php

declare(strict_types=1);

namespace EdenProject\MyWay\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260322063807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create users table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'integer', ['autoincrement' => true, 'primary' => true]);
        $table->addColumn('name', 'string', ['length' => 255]);
        $table->addColumn('login_name', 'string', ['length' => 100, 'notnull' => true]);
        $table->addColumn('nick_name', 'string', ['length' => 100, 'notnull' => false]);
        $table->addColumn('email', 'string', ['length' => 255]);
        $table->addColumn('phone_number', 'string', ['length' => 20, 'notnull' => false]);
        $table->addColumn('password', 'string', ['length' => 255]);
        $table->addColumn('remember_token', 'string', ['length' => 100, 'notnull' => false]);
        $table->addColumn('enabled', 'boolean', ['default' => true]);
        $table->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP']);
        $table->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP']);

        $table->addUniqueIndex(['email']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('users');
    }
}
