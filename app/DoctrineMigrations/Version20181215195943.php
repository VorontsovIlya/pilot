<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181215195943 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pilot_artist_slides02');
        $this->addSql('ALTER TABLE pilot_artist DROP FOREIGN KEY FK_76B7718B5E1D17B5');
        $this->addSql('ALTER TABLE pilot_artist DROP FOREIGN KEY FK_76B7718B75304476');
        $this->addSql('DROP INDEX IDX_76B7718B5E1D17B5 ON pilot_artist');
        $this->addSql('DROP INDEX IDX_76B7718B75304476 ON pilot_artist');
        $this->addSql('ALTER TABLE pilot_artist ADD `social_fb` VARCHAR(255) DEFAULT NULL, ADD `social_vk` VARCHAR(255) DEFAULT NULL, ADD `social_tw` VARCHAR(255) DEFAULT NULL, ADD `social_ytube` VARCHAR(255) DEFAULT NULL, ADD `social_inst` VARCHAR(255) DEFAULT NULL, ADD `image` INT DEFAULT NULL, DROP custmediattr01, DROP custmediattr02, DROP descr, DROP videodescr01, DROP videodescr02');
        $this->addSql('ALTER TABLE pilot_artist ADD CONSTRAINT FK_76B7718BC3B9CD8C FOREIGN KEY (`image`) REFERENCES `pilot_media__media` (`id`)');
        $this->addSql('CREATE INDEX IDX_76B7718BC3B9CD8C ON pilot_artist (`image`)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pilot_artist_slides02 (artist_id INT NOT NULL, slide_id INT NOT NULL, INDEX IDX_1F2ABD4FF4B82C55 (artist_id), INDEX IDX_1F2ABD4F38D5BA05 (slide_id), PRIMARY KEY(artist_id, slide_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pilot_artist_slides02 ADD CONSTRAINT FK_1F2ABD4F38D5BA05 FOREIGN KEY (slide_id) REFERENCES pilot_slide (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_artist_slides02 ADD CONSTRAINT FK_1F2ABD4FF4B82C55 FOREIGN KEY (artist_id) REFERENCES pilot_artist (id)');
        $this->addSql('ALTER TABLE `pilot_Artist` DROP FOREIGN KEY FK_76B7718BC3B9CD8C');
        $this->addSql('DROP INDEX IDX_76B7718BC3B9CD8C ON `pilot_Artist`');
        $this->addSql('ALTER TABLE `pilot_Artist` ADD custmediattr02 INT DEFAULT NULL, ADD descr LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, ADD videodescr01 VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, ADD videodescr02 VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, DROP `social_fb`, DROP `social_vk`, DROP `social_tw`, DROP `social_ytube`, DROP `social_inst`, CHANGE image custmediattr01 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `pilot_Artist` ADD CONSTRAINT FK_76B7718B5E1D17B5 FOREIGN KEY (custmediattr02) REFERENCES pilot_media__media (id)');
        $this->addSql('ALTER TABLE `pilot_Artist` ADD CONSTRAINT FK_76B7718B75304476 FOREIGN KEY (custmediattr01) REFERENCES pilot_media__media (id)');
        $this->addSql('CREATE INDEX IDX_76B7718B5E1D17B5 ON `pilot_Artist` (custmediattr02)');
        $this->addSql('CREATE INDEX IDX_76B7718B75304476 ON `pilot_Artist` (custmediattr01)');
    }
}
