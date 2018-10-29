<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181026151937 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chamado (id INT AUTO_INCREMENT NOT NULL, prioridade_id INT NOT NULL, tipo_id INT NOT NULL, status_id INT NOT NULL, data_abertura DATETIME NOT NULL, data_atualizacao DATETIME NOT NULL, data_conclusao DATETIME DEFAULT NULL, assunto VARCHAR(100) NOT NULL, descricao LONGTEXT NOT NULL, INDEX IDX_3B02066F226EFC79 (prioridade_id), INDEX IDX_3B02066FA9276E6C (tipo_id), INDEX IDX_3B02066F6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chamado ADD CONSTRAINT FK_3B02066F226EFC79 FOREIGN KEY (prioridade_id) REFERENCES prioridade (id)');
        $this->addSql('ALTER TABLE chamado ADD CONSTRAINT FK_3B02066FA9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo (id)');
        $this->addSql('ALTER TABLE chamado ADD CONSTRAINT FK_3B02066F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE chamado');
    }
}
