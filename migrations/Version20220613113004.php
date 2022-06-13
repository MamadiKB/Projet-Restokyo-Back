<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613113004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tag_establishment (tag_id INT NOT NULL, establishment_id INT NOT NULL, INDEX IDX_3541C6E9BAD26311 (tag_id), INDEX IDX_3541C6E98565851 (establishment_id), PRIMARY KEY(tag_id, establishment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tag_establishment ADD CONSTRAINT FK_3541C6E9BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_establishment ADD CONSTRAINT FK_3541C6E98565851 FOREIGN KEY (establishment_id) REFERENCES establishment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY establishment_ibfk_1');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT FK_DBEFB1EEB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tag_establishment');
        $this->addSql('ALTER TABLE establishment DROP FOREIGN KEY FK_DBEFB1EEB08FA272');
        $this->addSql('ALTER TABLE establishment ADD CONSTRAINT establishment_ibfk_1 FOREIGN KEY (district_id) REFERENCES district (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
