<?php

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322131138 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pilot_news__post (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, author_id INT DEFAULT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, abstract LONGTEXT NOT NULL, content LONGTEXT NOT NULL, raw_content LONGTEXT NOT NULL, content_formatter VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, publication_date_start DATETIME DEFAULT NULL, comments_enabled TINYINT(1) NOT NULL, comments_close_at DATETIME DEFAULT NULL, comments_default_status INT NOT NULL, comments_count INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_DAAADB783DA5256D (image_id), INDEX IDX_DAAADB78F675F31B (author_id), INDEX IDX_DAAADB78514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_news__post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_535B93724B89032C (post_id), INDEX IDX_535B9372BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_news__comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, message LONGTEXT NOT NULL, status INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_B791FB604B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__context (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__collection (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_57ED7F77E25D857E (context), INDEX IDX_57ED7F77EA9FDD75 (media_id), UNIQUE INDEX tag_collection (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_90D5BF85727ACA70 (parent_id), INDEX IDX_90D5BF85E25D857E (context), INDEX IDX_90D5BF85EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__tag (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2BB2920FE25D857E (context), UNIQUE INDEX tag_context (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_media__media (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, enabled TINYINT(1) NOT NULL, provider_name VARCHAR(255) NOT NULL, provider_status INT NOT NULL, provider_reference VARCHAR(255) NOT NULL, provider_metadata LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', width INT DEFAULT NULL, height INT DEFAULT NULL, length NUMERIC(10, 0) DEFAULT NULL, content_type VARCHAR(255) DEFAULT NULL, content_size INT DEFAULT NULL, copyright VARCHAR(255) DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, cdn_is_flushable TINYINT(1) DEFAULT NULL, cdn_flush_identifier VARCHAR(64) DEFAULT NULL, cdn_flush_at DATETIME DEFAULT NULL, cdn_status INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_CE749FDC12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_media__gallery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, context VARCHAR(64) NOT NULL, default_format VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_media__gallery_media (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, media_id INT DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_158A6AF04E7AF8F (gallery_id), INDEX IDX_158A6AF0EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_fos_user_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_of_birth DATETIME DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, website VARCHAR(64) DEFAULT NULL, biography VARCHAR(1000) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, locale VARCHAR(8) DEFAULT NULL, timezone VARCHAR(64) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, facebook_uid VARCHAR(255) DEFAULT NULL, facebook_name VARCHAR(255) DEFAULT NULL, facebook_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', twitter_uid VARCHAR(255) DEFAULT NULL, twitter_name VARCHAR(255) DEFAULT NULL, twitter_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', gplus_uid VARCHAR(255) DEFAULT NULL, gplus_name VARCHAR(255) DEFAULT NULL, gplus_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', token VARCHAR(255) DEFAULT NULL, two_step_code VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_DBF33C4192FC23A8 (username_canonical), UNIQUE INDEX UNIQ_DBF33C41A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_DBF33C41C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_fos_user_user_group (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_5222478FA76ED395 (user_id), INDEX IDX_5222478FFE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_fos_user_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_634DAC1D5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pilot_news__post ADD CONSTRAINT FK_DAAADB783DA5256D FOREIGN KEY (image_id) REFERENCES pilot_media__media (id)');
        $this->addSql('ALTER TABLE pilot_news__post ADD CONSTRAINT FK_DAAADB78F675F31B FOREIGN KEY (author_id) REFERENCES pilot_fos_user_user (id)');
        $this->addSql('ALTER TABLE pilot_news__post ADD CONSTRAINT FK_DAAADB78514956FD FOREIGN KEY (collection_id) REFERENCES pilot_classification__collection (id)');
        $this->addSql('ALTER TABLE pilot_news__post_tag ADD CONSTRAINT FK_535B93724B89032C FOREIGN KEY (post_id) REFERENCES pilot_news__post (id)');
        $this->addSql('ALTER TABLE pilot_news__post_tag ADD CONSTRAINT FK_535B9372BAD26311 FOREIGN KEY (tag_id) REFERENCES pilot_classification__tag (id)');
        $this->addSql('ALTER TABLE pilot_news__comment ADD CONSTRAINT FK_B791FB604B89032C FOREIGN KEY (post_id) REFERENCES pilot_news__post (id)');
        $this->addSql('ALTER TABLE pilot_classification__collection ADD CONSTRAINT FK_57ED7F77E25D857E FOREIGN KEY (context) REFERENCES pilot_classification__context (id)');
        $this->addSql('ALTER TABLE pilot_classification__collection ADD CONSTRAINT FK_57ED7F77EA9FDD75 FOREIGN KEY (media_id) REFERENCES pilot_media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE pilot_classification__category ADD CONSTRAINT FK_90D5BF85727ACA70 FOREIGN KEY (parent_id) REFERENCES pilot_classification__category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_classification__category ADD CONSTRAINT FK_90D5BF85E25D857E FOREIGN KEY (context) REFERENCES pilot_classification__context (id)');
        $this->addSql('ALTER TABLE pilot_classification__category ADD CONSTRAINT FK_90D5BF85EA9FDD75 FOREIGN KEY (media_id) REFERENCES pilot_media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE pilot_classification__tag ADD CONSTRAINT FK_2BB2920FE25D857E FOREIGN KEY (context) REFERENCES pilot_classification__context (id)');
        $this->addSql('ALTER TABLE pilot_media__media ADD CONSTRAINT FK_CE749FDC12469DE2 FOREIGN KEY (category_id) REFERENCES pilot_classification__category (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE pilot_media__gallery_media ADD CONSTRAINT FK_158A6AF04E7AF8F FOREIGN KEY (gallery_id) REFERENCES pilot_media__gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_media__gallery_media ADD CONSTRAINT FK_158A6AF0EA9FDD75 FOREIGN KEY (media_id) REFERENCES pilot_media__media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_fos_user_user_group ADD CONSTRAINT FK_5222478FA76ED395 FOREIGN KEY (user_id) REFERENCES pilot_fos_user_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_fos_user_user_group ADD CONSTRAINT FK_5222478FFE54D947 FOREIGN KEY (group_id) REFERENCES pilot_fos_user_group (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_news__post_tag DROP FOREIGN KEY FK_535B93724B89032C');
        $this->addSql('ALTER TABLE pilot_news__comment DROP FOREIGN KEY FK_B791FB604B89032C');
        $this->addSql('ALTER TABLE pilot_classification__collection DROP FOREIGN KEY FK_57ED7F77E25D857E');
        $this->addSql('ALTER TABLE pilot_classification__category DROP FOREIGN KEY FK_90D5BF85E25D857E');
        $this->addSql('ALTER TABLE pilot_classification__tag DROP FOREIGN KEY FK_2BB2920FE25D857E');
        $this->addSql('ALTER TABLE pilot_news__post DROP FOREIGN KEY FK_DAAADB78514956FD');
        $this->addSql('ALTER TABLE pilot_classification__category DROP FOREIGN KEY FK_90D5BF85727ACA70');
        $this->addSql('ALTER TABLE pilot_media__media DROP FOREIGN KEY FK_CE749FDC12469DE2');
        $this->addSql('ALTER TABLE pilot_news__post_tag DROP FOREIGN KEY FK_535B9372BAD26311');
        $this->addSql('ALTER TABLE pilot_news__post DROP FOREIGN KEY FK_DAAADB783DA5256D');
        $this->addSql('ALTER TABLE pilot_classification__collection DROP FOREIGN KEY FK_57ED7F77EA9FDD75');
        $this->addSql('ALTER TABLE pilot_classification__category DROP FOREIGN KEY FK_90D5BF85EA9FDD75');
        $this->addSql('ALTER TABLE pilot_media__gallery_media DROP FOREIGN KEY FK_158A6AF0EA9FDD75');
        $this->addSql('ALTER TABLE pilot_media__gallery_media DROP FOREIGN KEY FK_158A6AF04E7AF8F');
        $this->addSql('ALTER TABLE pilot_news__post DROP FOREIGN KEY FK_DAAADB78F675F31B');
        $this->addSql('ALTER TABLE pilot_fos_user_user_group DROP FOREIGN KEY FK_5222478FA76ED395');
        $this->addSql('ALTER TABLE pilot_fos_user_user_group DROP FOREIGN KEY FK_5222478FFE54D947');
        $this->addSql('DROP TABLE pilot_news__post');
        $this->addSql('DROP TABLE pilot_news__post_tag');
        $this->addSql('DROP TABLE pilot_news__comment');
        $this->addSql('DROP TABLE pilot_classification__context');
        $this->addSql('DROP TABLE pilot_classification__collection');
        $this->addSql('DROP TABLE pilot_classification__category');
        $this->addSql('DROP TABLE pilot_classification__tag');
        $this->addSql('DROP TABLE pilot_media__media');
        $this->addSql('DROP TABLE pilot_media__gallery');
        $this->addSql('DROP TABLE pilot_media__gallery_media');
        $this->addSql('DROP TABLE pilot_fos_user_user');
        $this->addSql('DROP TABLE pilot_fos_user_user_group');
        $this->addSql('DROP TABLE pilot_fos_user_group');
    }
}
