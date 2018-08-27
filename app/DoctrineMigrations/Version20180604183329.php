<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180604183329 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_Contact` (`id` INT AUTO_INCREMENT NOT NULL, `name` VARCHAR(255) DEFAULT NULL, `descr` VARCHAR(255) DEFAULT NULL, `phone` VARCHAR(255) DEFAULT NULL, `mail` VARCHAR(255) DEFAULT NULL, PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `pilot_block_contact` (`block_id` INT NOT NULL, `contact_id` INT NOT NULL, INDEX IDX_28D2F9E6428B57D4 (`block_id`), INDEX IDX_28D2F9E6315E9CF5 (`contact_id`), PRIMARY KEY(`block_id`, `contact_id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_block_contact` ADD CONSTRAINT FK_28D2F9E6428B57D4 FOREIGN KEY (`block_id`) REFERENCES `pilot_Block` (`id`)');
        $this->addSql('ALTER TABLE `pilot_block_contact` ADD CONSTRAINT FK_28D2F9E6315E9CF5 FOREIGN KEY (`contact_id`) REFERENCES `pilot_Contact` (`id`) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_block_contact` DROP FOREIGN KEY FK_28D2F9E6315E9CF5');
        $this->addSql('DROP TABLE `pilot_Contact`');
        $this->addSql('DROP TABLE `pilot_block_contact`');
    }
}
