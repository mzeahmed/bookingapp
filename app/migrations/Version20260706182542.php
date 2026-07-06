<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260706182542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE equipment_rooms (equipment_id INT NOT NULL, rooms_id INT NOT NULL, INDEX IDX_95F83B72517FE9FE (equipment_id), INDEX IDX_95F83B728E2368AB (rooms_id), PRIMARY KEY (equipment_id, rooms_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE equipment_rooms ADD CONSTRAINT FK_95F83B72517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_rooms ADD CONSTRAINT FK_95F83B728E2368AB FOREIGN KEY (rooms_id) REFERENCES rooms (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_rooms DROP FOREIGN KEY FK_95F83B72517FE9FE');
        $this->addSql('ALTER TABLE equipment_rooms DROP FOREIGN KEY FK_95F83B728E2368AB');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_rooms');
    }
}
