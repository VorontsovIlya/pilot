<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180604172351 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_Slide` (`id` INT AUTO_INCREMENT NOT NULL, `title` VARCHAR(255) NOT NULL, `link` VARCHAR(255) DEFAULT NULL, `image` INT DEFAULT NULL, INDEX IDX_9B387463C3B9CD8C (`image`), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_Slide` ADD CONSTRAINT FK_9B387463C3B9CD8C FOREIGN KEY (`image`) REFERENCES `pilot_media__media` (`id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_Slide`');
    }
}
