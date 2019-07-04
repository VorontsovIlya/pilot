<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190704170429 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_Artist ADD `page_keywords` VARCHAR(255) NOT NULL, ADD `page_description` VARCHAR(255) NOT NULL, ADD `page_title` VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pilot_Page ADD `keywords` VARCHAR(255) NOT NULL, ADD `description` VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Artist` DROP `page_keywords`, DROP `page_description`, DROP `page_title`');
        $this->addSql('ALTER TABLE `pilot_Page` DROP `keywords`, DROP `description`');
    }
}
