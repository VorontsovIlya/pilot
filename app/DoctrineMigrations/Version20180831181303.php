<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180831181303 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_MenuType` (`id` INT AUTO_INCREMENT NOT NULL, `title` VARCHAR(100) NOT NULL, PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `pilot_Menu` (`id` INT AUTO_INCREMENT NOT NULL, `title` VARCHAR(100) NOT NULL, `route` VARCHAR(100) NOT NULL, `alias` VARCHAR(255) DEFAULT NULL, `static` TINYINT(1) NOT NULL, `menuTypeId` INT DEFAULT NULL, INDEX IDX_C93A0E95B2ED7449 (`menuTypeId`), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_Menu` ADD CONSTRAINT FK_C93A0E95B2ED7449 FOREIGN KEY (`menuTypeId`) REFERENCES `pilot_MenuType` (`id`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `pilot_Menu` DROP FOREIGN KEY FK_C93A0E95B2ED7449');
        $this->addSql('DROP TABLE `pilot_MenuType`');
        $this->addSql('DROP TABLE `pilot_Menu`');
    }
}
