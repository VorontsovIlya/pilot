<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423182200 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_orm_redirects` (`host` VARCHAR(255) NOT NULL, `schemes` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `methods` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `defaults` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `requirements` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `options` LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', `condition_expr` VARCHAR(255) DEFAULT NULL, `variablePattern` VARCHAR(255) DEFAULT NULL, `staticPrefix` VARCHAR(255) DEFAULT NULL, `routeName` VARCHAR(255) NOT NULL, `uri` VARCHAR(255) DEFAULT NULL, `permanent` TINYINT(1) NOT NULL, `id` INT AUTO_INCREMENT NOT NULL, `routeTargetId` INT DEFAULT NULL, UNIQUE INDEX UNIQ_723295239FF519A6 (`routeName`), INDEX IDX_72329523A9ADDEDB (`routeTargetId`), INDEX IDX_72329523A5B5867E (staticPrefix), PRIMARY KEY(`id`)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_orm_redirects` ADD CONSTRAINT FK_72329523A9ADDEDB FOREIGN KEY (`routeTargetId`) REFERENCES `pilot_orm_routes` (`id`)');
        $this->addSql('ALTER TABLE pilot_Music ADD `social_boom` VARCHAR(255) DEFAULT NULL, ADD `social_zvooq` VARCHAR(255) DEFAULT NULL, ADD `social_tiktok` VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX prefix_idx ON pilot_orm_routes');
        $this->addSql('CREATE INDEX IDX_A7EDD34CA5B5867E ON pilot_orm_routes (staticPrefix)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_orm_redirects`');
        $this->addSql('ALTER TABLE `pilot_Music` DROP `social_boom`, DROP `social_zvooq`, DROP `social_tiktok`');
        $this->addSql('DROP INDEX idx_a7edd34ca5b5867e ON `pilot_orm_routes`');
        $this->addSql('CREATE INDEX prefix_idx ON `pilot_orm_routes` (staticPrefix)');
    }
}
