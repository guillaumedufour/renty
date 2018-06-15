<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613143016 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F831C51C0A');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC1E9DC375');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_FBD8E0F831C51C0A ON job');
        $this->addSql('ALTER TABLE job ADD job_title VARCHAR(255) NOT NULL, ADD job_content LONGTEXT NOT NULL, ADD job_author VARCHAR(255) NOT NULL, ADD job_contact VARCHAR(255) NOT NULL, ADD job_date DATETIME NOT NULL, ADD job_location VARCHAR(255) NOT NULL, ADD housed TINYINT(1) NOT NULL, DROP job_author_id, DROP title, DROP joblocation, DROP description, CHANGE monthly_wage monthly_wage INT NOT NULL');
        $this->addSql('DROP INDEX IDX_2784DCC1E9DC375 ON rent');
        $this->addSql('ALTER TABLE rent ADD rent_content LONGTEXT NOT NULL, ADD rent_author VARCHAR(32) NOT NULL, ADD rent_contact VARCHAR(255) NOT NULL, ADD rent_date DATETIME NOT NULL, ADD rent_location VARCHAR(255) NOT NULL, ADD surface INT NOT NULL, ADD furnished TINYINT(1) NOT NULL, DROP name, DROP nbpeople, DROP rentlocation, DROP monthlyrent, CHANGE renttype rent_title VARCHAR(255) NOT NULL, CHANGE rent_author_id monthly_cost INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, usertype VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD job_author_id INT NOT NULL, ADD title VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD joblocation VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP job_title, DROP job_content, DROP job_author, DROP job_contact, DROP job_date, DROP job_location, DROP housed, CHANGE monthly_wage monthly_wage DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F831C51C0A FOREIGN KEY (job_author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F831C51C0A ON job (job_author_id)');
        $this->addSql('ALTER TABLE rent ADD rent_author_id INT NOT NULL, ADD name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD nbpeople DOUBLE PRECISION NOT NULL, ADD rentlocation VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD renttype VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD monthlyrent DOUBLE PRECISION NOT NULL, DROP rent_title, DROP rent_content, DROP rent_author, DROP rent_contact, DROP rent_date, DROP monthly_cost, DROP rent_location, DROP surface, DROP furnished');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC1E9DC375 FOREIGN KEY (rent_author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2784DCC1E9DC375 ON rent (rent_author_id)');
    }
}
