<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613155004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EE6A8073BB');
        $this->addSql('DROP TABLE opening_time');
        $this->addSql('DROP INDEX IDX_DBEFB1EE6A8073BB ON establishment');
        $this->addSql('ALTER TABLE establishment DROP opening_time_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opening_time (id INT AUTO_INCREMENT NOT NULL, monday_open_noon NUMERIC(4, 2) DEFAULT NULL, monday_close_noon NUMERIC(4, 2) DEFAULT NULL, monday_open_evening NUMERIC(4, 2) DEFAULT NULL, monday_close_evening NUMERIC(4, 2) DEFAULT NULL, tuesday_open_noon NUMERIC(4, 2) DEFAULT NULL, tuesday_close_noon NUMERIC(4, 2) DEFAULT NULL, tuesday_open_evening NUMERIC(4, 2) DEFAULT NULL, tuesday_close_evening NUMERIC(4, 2) DEFAULT NULL, wednesday_open_noon NUMERIC(4, 2) DEFAULT NULL, wednesday_close_noon NUMERIC(4, 2) DEFAULT NULL, wednesday_open_evening NUMERIC(4, 2) DEFAULT NULL, wednesday_close_evening NUMERIC(4, 2) DEFAULT NULL, thursday_open_noon NUMERIC(4, 2) DEFAULT NULL, thursday_close_noon NUMERIC(4, 2) DEFAULT NULL, thursday_open_evening NUMERIC(4, 2) DEFAULT NULL, thursday_close_evening NUMERIC(4, 2) DEFAULT NULL, friday_open_noon NUMERIC(4, 2) DEFAULT NULL, friday_close_noon NUMERIC(4, 2) DEFAULT NULL, friday_open_evening NUMERIC(4, 2) DEFAULT NULL, friday_close_evening NUMERIC(4, 2) DEFAULT NULL, saturday_open_noon NUMERIC(4, 2) DEFAULT NULL, saturday_close_noon NUMERIC(4, 2) DEFAULT NULL, saturday_open_evening NUMERIC(4, 2) DEFAULT NULL, saturday_close_evening NUMERIC(4, 2) DEFAULT NULL, sunday_open_noon NUMERIC(4, 2) DEFAULT NULL, sunday_close_noon NUMERIC(4, 2) DEFAULT NULL, sunday_open_evening NUMERIC(4, 2) DEFAULT NULL, sunday_close_evening NUMERIC(4, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE establishment ADD opening_time_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EE6A8073BB FOREIGN KEY (opening_time_id) REFERENCES opening_time (id)');
        $this->addSql('CREATE INDEX IDX_DBEFB1EE6A8073BB ON establishment (opening_time_id)');
    }
}
