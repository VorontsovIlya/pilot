<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181002180627 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Slide ADD `video` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Slide ADD CONSTRAINT FK_9B387463A0C17D4 FOREIGN KEY (`video`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('CREATE INDEX IDX_9B387463A0C17D4 ON pilot_Slide (`video`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Slide` DROP FOREIGN KEY FK_9B387463A0C17D4');
        $this->addSql('DROP INDEX IDX_9B387463A0C17D4 ON `pilot_Slide`');
        $this->addSql('ALTER TABLE `pilot_Slide` DROP `video`');
    }
}
