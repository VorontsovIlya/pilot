<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181209164018 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_Music` (`id` INT AUTO_INCREMENT NOT NULL, `link` VARCHAR(255) DEFAULT NULL, `title` VARCHAR(255) DEFAULT NULL, `code` LONGTEXT DEFAULT NULL, `active` TINYINT(1) DEFAULT NULL, `starred` TINYINT(1) DEFAULT NULL, `releasedate` DATE DEFAULT NULL, `link_itunes` VARCHAR(255) DEFAULT NULL, `link_apple` VARCHAR(255) DEFAULT NULL, `link_gplay` VARCHAR(255) DEFAULT NULL, `link_vk` VARCHAR(255) DEFAULT NULL, `link_spotify` VARCHAR(255) DEFAULT NULL, `link_deezer` VARCHAR(255) DEFAULT NULL, `link_yam` VARCHAR(255) DEFAULT NULL, `social_fb` VARCHAR(255) DEFAULT NULL, `social_vk` VARCHAR(255) DEFAULT NULL, `social_tw` VARCHAR(255) DEFAULT NULL, `social_ytube` VARCHAR(255) DEFAULT NULL, `social_inst` VARCHAR(255) DEFAULT NULL, `artist` INT DEFAULT NULL, `video` INT DEFAULT NULL, `image` INT DEFAULT NULL, INDEX IDX_2485B84BC4C8616C (`artist`), INDEX IDX_2485B84BA0C17D4 (`video`), INDEX IDX_2485B84BC3B9CD8C (`image`), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_Music` ADD CONSTRAINT FK_2485B84BC4C8616C FOREIGN KEY (`artist`) REFERENCES `pilot_Artist` (`id`)');
        $this->addSql('ALTER TABLE `pilot_Music` ADD CONSTRAINT FK_2485B84BA0C17D4 FOREIGN KEY (`video`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('ALTER TABLE `pilot_Music` ADD CONSTRAINT FK_2485B84BC3B9CD8C FOREIGN KEY (`image`) REFERENCES `pilot_media__media` (`id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_Music`');
    }
}
