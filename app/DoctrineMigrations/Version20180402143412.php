<?php declare(strict_types = 1);

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180402143412 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pilot_classification__category DROP FOREIGN KEY FK_90D5BF85727ACA70');
        $this->addSql('ALTER TABLE pilot_media__media DROP FOREIGN KEY FK_CE749FDC12469DE2');
        $this->addSql('ALTER TABLE pilot_news__post DROP FOREIGN KEY FK_DAAADB78514956FD');
        $this->addSql('ALTER TABLE pilot_classification__category DROP FOREIGN KEY FK_90D5BF85E25D857E');
        $this->addSql('ALTER TABLE pilot_classification__collection DROP FOREIGN KEY FK_57ED7F77E25D857E');
        $this->addSql('ALTER TABLE pilot_classification__tag DROP FOREIGN KEY FK_2BB2920FE25D857E');
        $this->addSql('ALTER TABLE pilot_news__post_tag DROP FOREIGN KEY FK_535B9372BAD26311');
        $this->addSql('ALTER TABLE pilot_news__comment DROP FOREIGN KEY FK_B791FB604B89032C');
        $this->addSql('ALTER TABLE pilot_news__post_tag DROP FOREIGN KEY FK_535B93724B89032C');
        $this->addSql('CREATE TABLE pilot_Feedback (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, who VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE pilot_blog_post');
        $this->addSql('DROP TABLE pilot_category');
        $this->addSql('DROP TABLE pilot_classification__category');
        $this->addSql('DROP TABLE pilot_classification__collection');
        $this->addSql('DROP TABLE pilot_classification__context');
        $this->addSql('DROP TABLE pilot_classification__tag');
        $this->addSql('DROP TABLE pilot_news__comment');
        $this->addSql('DROP TABLE pilot_news__post');
        $this->addSql('DROP TABLE pilot_news__post_tag');
        $this->addSql('DROP TABLE pilot_notification__message');
        $this->addSql('DROP INDEX IDX_CE749FDC12469DE2 ON pilot_media__media');
        $this->addSql('ALTER TABLE pilot_media__media DROP category_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pilot_blog_post (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, body LONGTEXT NOT NULL COLLATE utf8_unicode_ci, draft TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_90D5BF85727ACA70 (parent_id), INDEX IDX_90D5BF85E25D857E (context), INDEX IDX_90D5BF85EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__collection (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX tag_collection (slug, context), INDEX IDX_57ED7F77E25D857E (context), INDEX IDX_57ED7F77EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__context (id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_classification__tag (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX tag_context (slug, context), INDEX IDX_2BB2920FE25D857E (context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_news__comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, url VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, email VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, message LONGTEXT NOT NULL COLLATE utf8_unicode_ci, status INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_B791FB604B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_news__post (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, author_id INT DEFAULT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, abstract LONGTEXT NOT NULL COLLATE utf8_unicode_ci, content LONGTEXT NOT NULL COLLATE utf8_unicode_ci, raw_content LONGTEXT NOT NULL COLLATE utf8_unicode_ci, content_formatter VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, publication_date_start DATETIME DEFAULT NULL, comments_enabled TINYINT(1) NOT NULL, comments_close_at DATETIME DEFAULT NULL, comments_default_status INT NOT NULL, comments_count INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_DAAADB783DA5256D (image_id), INDEX IDX_DAAADB78F675F31B (author_id), INDEX IDX_DAAADB78514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_news__post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_535B93724B89032C (post_id), INDEX IDX_535B9372BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot_notification__message (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, body LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:json)\', state INT NOT NULL, restart_count INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, started_at DATETIME DEFAULT NULL, completed_at DATETIME DEFAULT NULL, INDEX notification_message_state_idx (state), INDEX notification_message_created_at_idx (created_at), INDEX idx_state (state), INDEX idx_created_at (created_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pilot_classification__category ADD CONSTRAINT FK_90D5BF85727ACA70 FOREIGN KEY (parent_id) REFERENCES pilot_classification__category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilot_classification__category ADD CONSTRAINT FK_90D5BF85E25D857E FOREIGN KEY (context) REFERENCES pilot_classification__context (id)');
        $this->addSql('ALTER TABLE pilot_classification__category ADD CONSTRAINT FK_90D5BF85EA9FDD75 FOREIGN KEY (media_id) REFERENCES pilot_media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE pilot_classification__collection ADD CONSTRAINT FK_57ED7F77E25D857E FOREIGN KEY (context) REFERENCES pilot_classification__context (id)');
        $this->addSql('ALTER TABLE pilot_classification__collection ADD CONSTRAINT FK_57ED7F77EA9FDD75 FOREIGN KEY (media_id) REFERENCES pilot_media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE pilot_classification__tag ADD CONSTRAINT FK_2BB2920FE25D857E FOREIGN KEY (context) REFERENCES pilot_classification__context (id)');
        $this->addSql('ALTER TABLE pilot_news__comment ADD CONSTRAINT FK_B791FB604B89032C FOREIGN KEY (post_id) REFERENCES pilot_news__post (id)');
        $this->addSql('ALTER TABLE pilot_news__post ADD CONSTRAINT FK_DAAADB783DA5256D FOREIGN KEY (image_id) REFERENCES pilot_media__media (id)');
        $this->addSql('ALTER TABLE pilot_news__post ADD CONSTRAINT FK_DAAADB78514956FD FOREIGN KEY (collection_id) REFERENCES pilot_classification__collection (id)');
        $this->addSql('ALTER TABLE pilot_news__post ADD CONSTRAINT FK_DAAADB78F675F31B FOREIGN KEY (author_id) REFERENCES pilot_fos_user_user (id)');
        $this->addSql('ALTER TABLE pilot_news__post_tag ADD CONSTRAINT FK_535B93724B89032C FOREIGN KEY (post_id) REFERENCES pilot_news__post (id)');
        $this->addSql('ALTER TABLE pilot_news__post_tag ADD CONSTRAINT FK_535B9372BAD26311 FOREIGN KEY (tag_id) REFERENCES pilot_classification__tag (id)');
        $this->addSql('DROP TABLE pilot_Feedback');
        $this->addSql('ALTER TABLE pilot_media__media ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot_media__media ADD CONSTRAINT FK_CE749FDC12469DE2 FOREIGN KEY (category_id) REFERENCES pilot_classification__category (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_CE749FDC12469DE2 ON pilot_media__media (category_id)');
    }
}
