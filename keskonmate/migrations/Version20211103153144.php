<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103153144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY season_ibfk_3');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA95278319C FOREIGN KEY (series_id) REFERENCES series (id)');
        $this->addSql('ALTER TABLE series ADD home_order INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_list DROP FOREIGN KEY user_list_ibfk_1');
        $this->addSql('ALTER TABLE user_list ADD CONSTRAINT FK_3E49B4D167B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA95278319C');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT season_ibfk_3 FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series DROP home_order');
        $this->addSql('ALTER TABLE user_list DROP FOREIGN KEY FK_3E49B4D167B3B43D');
        $this->addSql('ALTER TABLE user_list ADD CONSTRAINT user_list_ibfk_1 FOREIGN KEY (users_id) REFERENCES user (id) ON DELETE CASCADE');
    }
}
