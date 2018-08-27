<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180618165228 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_News` (`id` INT AUTO_INCREMENT NOT NULL, `title` VARCHAR(255) DEFAULT NULL, `tag` VARCHAR(255) DEFAULT NULL, `link` VARCHAR(255) DEFAULT NULL, `newsdate` DATE DEFAULT NULL, `descr` VARCHAR(255) DEFAULT NULL, `content` LONGTEXT DEFAULT NULL, `picture` INT DEFAULT NULL, INDEX IDX_A9ECAD56D48A247D (`picture`), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_News` ADD CONSTRAINT FK_A9ECAD56D48A247D FOREIGN KEY (`picture`) REFERENCES `pilot_media__media` (`id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_News`');
    }
}
