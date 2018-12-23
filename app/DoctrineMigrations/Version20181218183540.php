<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181218183540 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_Video` (`id` INT AUTO_INCREMENT NOT NULL, `title` VARCHAR(255) DEFAULT NULL, `artist` INT DEFAULT NULL, `video` INT DEFAULT NULL, INDEX IDX_9510402DC4C8616C (`artist`), INDEX IDX_9510402DA0C17D4 (`video`), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_Video` ADD CONSTRAINT FK_9510402DC4C8616C FOREIGN KEY (`artist`) REFERENCES `pilot_Artist` (`id`)');
        $this->addSql('ALTER TABLE `pilot_Video` ADD CONSTRAINT FK_9510402DA0C17D4 FOREIGN KEY (`video`) REFERENCES `pilot_media__media` (`id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_Video`');
    }
}
