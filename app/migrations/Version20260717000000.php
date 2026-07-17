<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260717000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename column "adress" to "address" in room table (fix typo)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE room CHANGE adress address VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE room CHANGE address adress VARCHAR(255) DEFAULT NULL');
    }
}
