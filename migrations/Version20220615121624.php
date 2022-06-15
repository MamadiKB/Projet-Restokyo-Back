<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615121624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EE6A8073BB');
        $this->addSql('DROP INDEX IDX_DBEFB1EE6A8073BB ON establishment');
        $this->addSql('ALTER TABLE establishment ADD business_time VARCHAR(255) DEFAULT NULL, DROP opening_time_id, DROP opening_days, DROP noon_opening_time, DROP evening_opening_time');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment ADD opening_time_id INT DEFAULT NULL, ADD opening_days LONGTEXT DEFAULT NULL, ADD noon_opening_time LONGTEXT DEFAULT NULL, ADD evening_opening_time LONGTEXT DEFAULT NULL, DROP business_time');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EE6A8073BB FOREIGN KEY (opening_time_id) REFERENCES opening_time (id)');
        $this->addSql('CREATE INDEX IDX_DBEFB1EE6A8073BB ON establishment (opening_time_id)');
    }
}
