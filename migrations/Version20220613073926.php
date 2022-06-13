<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD:migrations/Version20220613121338.php
final class Version20220613121338 extends AbstractMigration
=======
final class Version20220613073926 extends AbstractMigration
>>>>>>> master:migrations/Version20220613073926.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD:migrations/Version20220613121338.php
        $this->addSql('ALTER TABLE establishment ADD status INT DEFAULT 0 NOT NULL');
=======
        $this->addSql('ALTER TABLE establishment ADD district VARCHAR(50) DEFAULT NULL');
>>>>>>> master:migrations/Version20220613073926.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD:migrations/Version20220613121338.php
        $this->addSql('ALTER TABLE establishment DROP status');
=======
        $this->addSql('ALTER TABLE establishment DROP district');
>>>>>>> master:migrations/Version20220613073926.php
    }
}
