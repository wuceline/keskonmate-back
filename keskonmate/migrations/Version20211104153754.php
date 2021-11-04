<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104153754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE series_user_list');
        $this->addSql('DROP INDEX home_order ON series');
        $this->addSql('ALTER TABLE series ADD userlist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012DA1CFEA35 FOREIGN KEY (userlist_id) REFERENCES user_list (id)');
        $this->addSql('CREATE INDEX IDX_3A10012DA1CFEA35 ON series (userlist_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE series_user_list (series_id INT NOT NULL, user_list_id INT NOT NULL, INDEX IDX_AEA542D865A30881 (user_list_id), INDEX IDX_AEA542D85278319C (series_id), PRIMARY KEY(series_id, user_list_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE series_user_list ADD CONSTRAINT FK_AEA542D85278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_user_list ADD CONSTRAINT FK_AEA542D865A30881 FOREIGN KEY (user_list_id) REFERENCES user_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series DROP FOREIGN KEY FK_3A10012DA1CFEA35');
        $this->addSql('DROP INDEX IDX_3A10012DA1CFEA35 ON series');
        $this->addSql('ALTER TABLE series DROP userlist_id');
        $this->addSql('CREATE UNIQUE INDEX home_order ON series (home_order)');
    }
}
