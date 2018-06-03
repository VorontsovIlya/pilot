<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180530194846 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX IDX_158A6AF04E7AF8F ON pilot_media__gallery_media');
        $this->addSql('DROP INDEX IDX_158A6AF0EA9FDD75 ON pilot_media__gallery_media');
        $this->addSql('DROP INDEX UNIQ_DBF33C4192FC23A8 ON pilot_fos_user_user');
        $this->addSql('DROP INDEX UNIQ_DBF33C41A0D96FBF ON pilot_fos_user_user');
        $this->addSql('DROP INDEX UNIQ_DBF33C41C05FB297 ON pilot_fos_user_user');
        $this->addSql('DROP INDEX IDX_B3C77447A76ED395 ON fos_user_user_group');
        $this->addSql('DROP INDEX IDX_B3C77447FE54D947 ON fos_user_user_group');
        $this->addSql('DROP INDEX UNIQ_634DAC1D5E237E06 ON pilot_fos_user_group');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE INDEX IDX_B3C77447A76ED395 ON `fos_user_user_group` (user_id)');
        $this->addSql('CREATE INDEX IDX_B3C77447FE54D947 ON `fos_user_user_group` (group_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_634DAC1D5E237E06 ON `pilot_fos_user_group` (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C4192FC23A8 ON `pilot_fos_user_user` (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41A0D96FBF ON `pilot_fos_user_user` (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBF33C41C05FB297 ON `pilot_fos_user_user` (confirmation_token)');
        $this->addSql('CREATE INDEX IDX_158A6AF04E7AF8F ON `pilot_media__gallery_media` (gallery_id)');
        $this->addSql('CREATE INDEX IDX_158A6AF0EA9FDD75 ON `pilot_media__gallery_media` (media_id)');
    }
}
