<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241023144735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredients_recipes (ingredients_id INT NOT NULL, recipes_id INT NOT NULL, INDEX IDX_C1E222F13EC4DCE (ingredients_id), INDEX IDX_C1E222F1FDF2B1FA (recipes_id), PRIMARY KEY(ingredients_id, recipes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredients_recipes ADD CONSTRAINT FK_C1E222F13EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredients (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredients_recipes ADD CONSTRAINT FK_C1E222F1FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredients ADD genre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_4B60114F4296D31F ON ingredients (genre_id)');
        $this->addSql('ALTER TABLE recipes ADD user_id INT DEFAULT NULL, ADD calendar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recipes ADD CONSTRAINT FK_A369E2B5A40A2C8 FOREIGN KEY (calendar_id) REFERENCES calendar (id)');
        $this->addSql('CREATE INDEX IDX_A369E2B5A76ED395 ON recipes (user_id)');
        $this->addSql('CREATE INDEX IDX_A369E2B5A40A2C8 ON recipes (calendar_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredients_recipes DROP FOREIGN KEY FK_C1E222F13EC4DCE');
        $this->addSql('ALTER TABLE ingredients_recipes DROP FOREIGN KEY FK_C1E222F1FDF2B1FA');
        $this->addSql('DROP TABLE ingredients_recipes');
        $this->addSql('ALTER TABLE ingredients DROP FOREIGN KEY FK_4B60114F4296D31F');
        $this->addSql('DROP INDEX IDX_4B60114F4296D31F ON ingredients');
        $this->addSql('ALTER TABLE ingredients DROP genre_id');
        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B5A76ED395');
        $this->addSql('ALTER TABLE recipes DROP FOREIGN KEY FK_A369E2B5A40A2C8');
        $this->addSql('DROP INDEX IDX_A369E2B5A76ED395 ON recipes');
        $this->addSql('DROP INDEX IDX_A369E2B5A40A2C8 ON recipes');
        $this->addSql('ALTER TABLE recipes DROP user_id, DROP calendar_id');
    }
}
