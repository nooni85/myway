<?php

declare(strict_types=1);

namespace EdenProject\MyWay\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260322064100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add login_name and nick_name to users table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->getTable('users');
        $table->addColumn('login_name', 'string', ['length' => 100, 'notnull' => true]);
        $table->addColumn('nick_name', 'string', ['length' => 100, 'notnull' => false]);
        $table->addUniqueIndex(['login_name']);
    }

    public function down(Schema $schema): void
    {
        $table = $schema->getTable('users');
        $table->dropIndex('UNIQ_1483A5E9665B17B0'); // Index name might vary, but Doctrine usually generates it. For SQLite, dropping columns is tricky, but DBAL handles it.
        $table->dropColumn('login_name');
        $table->dropColumn('nick_name');
    }
}
