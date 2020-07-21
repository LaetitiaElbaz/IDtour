<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721161355 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE days_period (days_id INT NOT NULL, period_id INT NOT NULL, INDEX IDX_6A97FED63575FA99 (days_id), INDEX IDX_6A97FED6EC8B7ADE (period_id), PRIMARY KEY(days_id, period_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE days_period ADD CONSTRAINT FK_6A97FED63575FA99 FOREIGN KEY (days_id) REFERENCES days (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE days_period ADD CONSTRAINT FK_6A97FED6EC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE days_period');
    }
}
