<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181112171247 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `pilot_artist_slides01` (`artist_id` INT NOT NULL, `slide_id` INT NOT NULL, INDEX IDX_8623ECF5F4B82C55 (`artist_id`), INDEX IDX_8623ECF538D5BA05 (`slide_id`), PRIMARY KEY(`artist_id`, `slide_id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `pilot_artist_slides02` (`artist_id` INT NOT NULL, `slide_id` INT NOT NULL, INDEX IDX_1F2ABD4FF4B82C55 (`artist_id`), INDEX IDX_1F2ABD4F38D5BA05 (`slide_id`), PRIMARY KEY(`artist_id`, `slide_id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `pilot_artist_slides01` ADD CONSTRAINT FK_8623ECF5F4B82C55 FOREIGN KEY (`artist_id`) REFERENCES `pilot_Artist` (`id`)');
        $this->addSql('ALTER TABLE `pilot_artist_slides01` ADD CONSTRAINT FK_8623ECF538D5BA05 FOREIGN KEY (`slide_id`) REFERENCES `pilot_Slide` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `pilot_artist_slides02` ADD CONSTRAINT FK_1F2ABD4FF4B82C55 FOREIGN KEY (`artist_id`) REFERENCES `pilot_Artist` (`id`)');
        $this->addSql('ALTER TABLE `pilot_artist_slides02` ADD CONSTRAINT FK_1F2ABD4F38D5BA05 FOREIGN KEY (`slide_id`) REFERENCES `pilot_Slide` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_Artist ADD `descr` LONGTEXT DEFAULT NULL, ADD `content` LONGTEXT DEFAULT NULL, ADD `custmediattr01` INT DEFAULT NULL, ADD `custmediattr02` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_Artist ADD CONSTRAINT FK_76B7718B75304476 FOREIGN KEY (`custmediattr01`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('ALTER TABLE pilot_Artist ADD CONSTRAINT FK_76B7718B5E1D17B5 FOREIGN KEY (`custmediattr02`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('CREATE INDEX IDX_76B7718B75304476 ON pilot_Artist (`custmediattr01`)');
        $this->addSql('CREATE INDEX IDX_76B7718B5E1D17B5 ON pilot_Artist (`custmediattr02`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `pilot_artist_slides01`');
        $this->addSql('DROP TABLE `pilot_artist_slides02`');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718B75304476');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718B5E1D17B5');
        $this->addSql('DROP INDEX IDX_76B7718B75304476 ON `pilot_Artist`');
        $this->addSql('DROP INDEX IDX_76B7718B5E1D17B5 ON `pilot_Artist`');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP `descr`, DROP `content`, DROP `custmediattr01`, DROP `custmediattr02`');
    }
}
