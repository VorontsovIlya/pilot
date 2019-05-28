<?php declare(strict_types=1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190322164139 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `fos_user_user_group` (`user_id` INT NOT NULL, `group_id` INT NOT NULL, INDEX IDX_B3C77447C03ACDAE (`user_id`), INDEX IDX_B3C77447A3927697 (`group_id`), PRIMARY KEY(`user_id`, `group_id`)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `fos_user_user_group` ADD CONSTRAINT FK_B3C77447C03ACDAE FOREIGN KEY (`user_id`) REFERENCES `pilot_fos_user_user` (`id`) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `fos_user_user_group` ADD CONSTRAINT FK_B3C77447A3927697 FOREIGN KEY (`group_id`) REFERENCES `pilot_fos_user_group` (`id`) ON DELETE CASCADE');
        $this->addSql('DROP TABLE pilot_fos_user_user_group');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pilot_fos_user_user_group (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_B3C77447A3927697 (group_id), INDEX IDX_B3C77447C03ACDAE (user_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pilot_fos_user_user_group ADD CONSTRAINT FK_B3C77447A76ED395 FOREIGN KEY (user_id) REFERENCES pilot_fos_user_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_fos_user_user_group ADD CONSTRAINT FK_B3C77447FE54D947 FOREIGN KEY (group_id) REFERENCES pilot_fos_user_group (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE `fos_user_user_group`');
    }
}
