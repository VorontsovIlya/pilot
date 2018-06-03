<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180530194608 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        // $this->addSql('DROP INDEX idx_158a6af04e7af8f ON pilot_media__gallery_media');
        $this->addSql('CREATE INDEX IDX_158A6AF0DAB3EC40 ON pilot_media__gallery_media (`gallery_id`)');
        // $this->addSql('DROP INDEX idx_158a6af0ea9fdd75 ON pilot_media__gallery_media');
        $this->addSql('CREATE INDEX IDX_158A6AF06B51EC13 ON pilot_media__gallery_media (`media_id`)');
        // $this->addSql('DROP INDEX uniq_dbf33c4192fc23a8 ON pilot_fos_user_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41BDF6FBD3 ON pilot_fos_user_user (`username_canonical`)');
        // $this->addSql('DROP INDEX uniq_dbf33c41a0d96fbf ON pilot_fos_user_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41927F1441 ON pilot_fos_user_user (`email_canonical`)');
        // $this->addSql('DROP INDEX uniq_dbf33c41c05fb297 ON pilot_fos_user_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41BC2757F ON pilot_fos_user_user (`confirmation_token`)');
        // $this->addSql('DROP INDEX idx_b3c77447a76ed395 ON fos_user_user_group');
        $this->addSql('CREATE INDEX IDX_B3C77447C03ACDAE ON fos_user_user_group (`user_id`)');
        // $this->addSql('DROP INDEX idx_b3c77447fe54d947 ON fos_user_user_group');
        $this->addSql('CREATE INDEX IDX_B3C77447A3927697 ON fos_user_user_group (`group_id`)');
        // $this->addSql('DROP INDEX uniq_634dac1d5e237e06 ON pilot_fos_user_group');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_634DAC1D999517A ON pilot_fos_user_group (`name`)');
        $this->addSql('ALTER TABLE pilot_Block ADD `comment` VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `fos_user_user_group` DROP FOREIGN KEY FK_B3C77447C03ACDAE');
        $this->addSql('ALTER TABLE `fos_user_user_group` DROP FOREIGN KEY FK_B3C77447A3927697');
        $this->addSql('DROP INDEX idx_b3c77447c03acdae ON `fos_user_user_group`');
        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON `fos_user_user_group` (user_id)');
        $this->addSql('DROP INDEX idx_b3c77447a3927697 ON `fos_user_user_group`');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON `fos_user_user_group` (group_id)');
        $this->addSql('ALTER TABLE `fos_user_user_group` ADD CONSTRAINT FK_B3C77447C03ACDAE FOREIGN KEY (`user_id`) REFERENCES `pilot_fos_user_user` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `fos_user_user_group` ADD CONSTRAINT FK_B3C77447A3927697 FOREIGN KEY (`group_id`) REFERENCES `pilot_fos_user_group` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `pilot_Block` DROP `comment`');
        $this->addSql('DROP INDEX uniq_634dac1d999517a ON `pilot_fos_user_group`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_634DAC1D5E237E06 ON `pilot_fos_user_group` (name)');
        $this->addSql('DROP INDEX uniq_dbf33c41bdf6fbd3 ON `pilot_fos_user_user`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C4192FC23A8 ON `pilot_fos_user_user` (username_canonical)');
        $this->addSql('DROP INDEX uniq_dbf33c41927f1441 ON `pilot_fos_user_user`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41A0D96FBF ON `pilot_fos_user_user` (email_canonical)');
        $this->addSql('DROP INDEX uniq_dbf33c41bc2757f ON `pilot_fos_user_user`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41C05FB297 ON `pilot_fos_user_user` (confirmation_token)');
        $this->addSql('ALTER TABLE `pilot_media__gallery_media` DROP FOREIGN KEY FK_158A6AF0DAB3EC40');
        $this->addSql('ALTER TABLE `pilot_media__gallery_media` DROP FOREIGN KEY FK_158A6AF06B51EC13');
        $this->addSql('DROP INDEX idx_158a6af0dab3ec40 ON `pilot_media__gallery_media`');
        $this->addSql('CREATE INDEX IDX_158A6AF04E7AF8F ON `pilot_media__gallery_media` (gallery_id)');
        $this->addSql('DROP INDEX idx_158a6af06b51ec13 ON `pilot_media__gallery_media`');
        $this->addSql('CREATE INDEX IDX_158A6AF0EA9FDD75 ON `pilot_media__gallery_media` (media_id)');
        $this->addSql('ALTER TABLE `pilot_media__gallery_media` ADD CONSTRAINT FK_158A6AF0DAB3EC40 FOREIGN KEY (`gallery_id`) REFERENCES `pilot_media__gallery` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `pilot_media__gallery_media` ADD CONSTRAINT FK_158A6AF06B51EC13 FOREIGN KEY (`media_id`) REFERENCES `pilot_media__media` (`id`) ON DELETE CASCADE');
    }
}
