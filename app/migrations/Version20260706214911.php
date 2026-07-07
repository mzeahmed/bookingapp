<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260706214911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename equipment_room.rooms_id to room_id to match the fixed Equipment<->Room ManyToMany mapping.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_room DROP FOREIGN KEY `FK_95F83B728E2368AB`');
        $this->addSql('DROP INDEX IDX_95F83B728E2368AB ON equipment_room');
        $this->addSql('ALTER TABLE equipment_room CHANGE rooms_id room_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (equipment_id, room_id)');
        $this->addSql('ALTER TABLE equipment_room ADD CONSTRAINT FK_481B809D54177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_481B809D54177093 ON equipment_room (room_id)');
        $this->addSql('ALTER TABLE equipment_room RENAME INDEX idx_95f83b72517fe9fe TO IDX_481B809D517FE9FE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_room DROP FOREIGN KEY FK_481B809D54177093');
        $this->addSql('DROP INDEX IDX_481B809D54177093 ON equipment_room');
        $this->addSql('ALTER TABLE equipment_room CHANGE room_id rooms_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (equipment_id, rooms_id)');
        $this->addSql('ALTER TABLE equipment_room ADD CONSTRAINT `FK_95F83B728E2368AB` FOREIGN KEY (rooms_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_95F83B728E2368AB ON equipment_room (rooms_id)');
        $this->addSql('ALTER TABLE equipment_room RENAME INDEX idx_481b809d517fe9fe TO IDX_95F83B72517FE9FE');
    }
}
