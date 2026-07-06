<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260706183013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rooms RENAME TO room');
        $this->addSql('ALTER TABLE equipment_rooms RENAME TO equipment_room');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE room RENAME TO rooms');
        $this->addSql('ALTER TABLE equipment_room RENAME TO equipment_rooms');
    }
}
