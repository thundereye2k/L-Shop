<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20180425195829 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lshop_activations (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, code VARCHAR(64) NOT NULL, completed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C4AD3053A76ED395 (user_id), INDEX code_idx (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_balance_transactions (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, delta DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_3515718AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_bans (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, until DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', reason VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C4A65971A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_categories (id INT AUTO_INCREMENT NOT NULL, server_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E58BBDB31844E6B7 (server_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_distributions (id INT AUTO_INCREMENT NOT NULL, purchase_item_id INT DEFAULT NULL, shopping_cart_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_A95F2FFC9B59827 (purchase_item_id), UNIQUE INDEX UNIQ_A95F2FFC45F80CD (shopping_cart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_enchantments (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, max_level SMALLINT NOT NULL, `group` VARCHAR(32) DEFAULT NULL, UNIQUE INDEX UNIQ_A6790267E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_enchantment_items (id INT AUTO_INCREMENT NOT NULL, enchantment_id INT DEFAULT NULL, item_id INT DEFAULT NULL, level INT NOT NULL, INDEX IDX_B3160766F3927CF3 (enchantment_id), INDEX IDX_B3160766126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_items (id INT AUTO_INCREMENT NOT NULL, `name` VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, type VARCHAR(32) NOT NULL, image VARCHAR(255) DEFAULT NULL, game_id VARCHAR(255) NOT NULL, extra LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_news (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1279E70DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_pages (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_35A16242F47645AE (url), INDEX url_idx (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_permissions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_3C33BFC85E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_permission_user (permission_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2F5D723FFED90CCA (permission_id), INDEX IDX_2F5D723FA76ED395 (user_id), PRIMARY KEY(permission_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_permission_role (permission_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_F5A72E1CFED90CCA (permission_id), INDEX IDX_F5A72E1CD60322AC (role_id), PRIMARY KEY(permission_id, role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_persistences (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, code VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_9E86B38D77153098 (code), INDEX IDX_9E86B38DA76ED395 (user_id), INDEX search_idx (code, user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_products (id INT AUTO_INCREMENT NOT NULL, item_id INT DEFAULT NULL, category_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, stack INT NOT NULL, sort_priority DOUBLE PRECISION NOT NULL, hidden TINYINT(1) NOT NULL, INDEX IDX_10E5818D126F525E (item_id), INDEX IDX_10E5818D12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_purchases (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, cost DOUBLE PRECISION NOT NULL, player VARCHAR(255) DEFAULT NULL, ip VARCHAR(45) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', via VARCHAR(64) DEFAULT NULL, completed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B2702952A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_purchase_items (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, purchase_id INT DEFAULT NULL, amount INT NOT NULL, INDEX IDX_8C9BF4754584665A (product_id), INDEX IDX_8C9BF475558FBEB9 (purchase_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_reminders (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, code VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7586A178A76ED395 (user_id), INDEX code_idx (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, UNIQUE INDEX UNIQ_A3EBA9F05E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_role_user (role_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2B38BC71D60322AC (role_id), INDEX IDX_2B38BC71A76ED395 (user_id), PRIMARY KEY(role_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_servers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ip VARCHAR(45) DEFAULT NULL, port INT DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, distributor VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, monitoring_enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_shopping_cart (id INT AUTO_INCREMENT NOT NULL, server INT DEFAULT NULL, distribution_id INT DEFAULT NULL, player VARCHAR(255) NOT NULL, type VARCHAR(16) NOT NULL, item VARCHAR(255) NOT NULL, amount INT NOT NULL, extra LONGTEXT DEFAULT NULL, INDEX IDX_5AE0CF805A6DD5F6 (server), UNIQUE INDEX UNIQ_5AE0CF806EB6DDB5 (distribution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(32) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(60) NOT NULL, balance DOUBLE PRECISION NOT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', accessToken CHAR(36) DEFAULT NULL, serverId VARCHAR(41) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_15622DEF85E0677 (username), UNIQUE INDEX UNIQ_15622DEE7927C74 (email), UNIQUE INDEX UNIQ_15622DED17F50A6 (uuid), INDEX username_idx (username), INDEX email_idx (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_settings (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(255) NOT NULL, value LONGTEXT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_461A7B124E645A7E (`key`), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_actions (id INT AUTO_INCREMENT NOT NULL, time BIGINT NOT NULL, actor_uuid VARCHAR(36) NOT NULL, actor_name VARCHAR(100) DEFAULT NULL, type CHAR(1) NOT NULL, acted_uuid VARCHAR(36) NOT NULL, acted_name VARCHAR(36) NOT NULL, action VARCHAR(300) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_groups (`name` VARCHAR(36) NOT NULL, PRIMARY KEY(`name`)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_group_permissions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(36) DEFAULT NULL, value TINYINT(1) NOT NULL, server VARCHAR(36) NOT NULL, world VARCHAR(36) NOT NULL, expiry INT NOT NULL, contexts VARCHAR(200) NOT NULL, permission VARCHAR(200) NOT NULL, INDEX name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_messages (id INT AUTO_INCREMENT NOT NULL, time DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', msg LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_players (uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', primary_group VARCHAR(36) DEFAULT NULL, username VARCHAR(32) NOT NULL, INDEX IDX_30AEC934F8D69D18 (primary_group), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_user_permissions (id INT AUTO_INCREMENT NOT NULL, uuid CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', value TINYINT(1) NOT NULL, server VARCHAR(36) NOT NULL, world VARCHAR(36) NOT NULL, expiry INT NOT NULL, contexts VARCHAR(200) NOT NULL, permission VARCHAR(200) NOT NULL, INDEX uuid_idx (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lshop_lp_tracks (name VARCHAR(36) NOT NULL, groups LONGTEXT NOT NULL, PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lshop_activations ADD CONSTRAINT FK_C4AD3053A76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_balance_transactions ADD CONSTRAINT FK_3515718AA76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_bans ADD CONSTRAINT FK_C4A65971A76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_categories ADD CONSTRAINT FK_E58BBDB31844E6B7 FOREIGN KEY (server_id) REFERENCES lshop_servers (id)');
        $this->addSql('ALTER TABLE lshop_distributions ADD CONSTRAINT FK_A95F2FFC9B59827 FOREIGN KEY (purchase_item_id) REFERENCES lshop_purchase_items (id)');
        $this->addSql('ALTER TABLE lshop_distributions ADD CONSTRAINT FK_A95F2FFC45F80CD FOREIGN KEY (shopping_cart_id) REFERENCES lshop_shopping_cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_enchantment_items ADD CONSTRAINT FK_B3160766F3927CF3 FOREIGN KEY (enchantment_id) REFERENCES lshop_enchantments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_enchantment_items ADD CONSTRAINT FK_B3160766126F525E FOREIGN KEY (item_id) REFERENCES lshop_items (id)');
        $this->addSql('ALTER TABLE lshop_news ADD CONSTRAINT FK_1279E70DA76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_permission_user ADD CONSTRAINT FK_2F5D723FFED90CCA FOREIGN KEY (permission_id) REFERENCES lshop_permissions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_permission_user ADD CONSTRAINT FK_2F5D723FA76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_permission_role ADD CONSTRAINT FK_F5A72E1CFED90CCA FOREIGN KEY (permission_id) REFERENCES lshop_permissions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_permission_role ADD CONSTRAINT FK_F5A72E1CD60322AC FOREIGN KEY (role_id) REFERENCES lshop_roles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_persistences ADD CONSTRAINT FK_9E86B38DA76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_products ADD CONSTRAINT FK_10E5818D126F525E FOREIGN KEY (item_id) REFERENCES lshop_items (id)');
        $this->addSql('ALTER TABLE lshop_products ADD CONSTRAINT FK_10E5818D12469DE2 FOREIGN KEY (category_id) REFERENCES lshop_categories (id)');
        $this->addSql('ALTER TABLE lshop_purchases ADD CONSTRAINT FK_B2702952A76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_purchase_items ADD CONSTRAINT FK_8C9BF4754584665A FOREIGN KEY (product_id) REFERENCES lshop_products (id)');
        $this->addSql('ALTER TABLE lshop_purchase_items ADD CONSTRAINT FK_8C9BF475558FBEB9 FOREIGN KEY (purchase_id) REFERENCES lshop_purchases (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_reminders ADD CONSTRAINT FK_7586A178A76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id)');
        $this->addSql('ALTER TABLE lshop_role_user ADD CONSTRAINT FK_2B38BC71D60322AC FOREIGN KEY (role_id) REFERENCES lshop_roles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_role_user ADD CONSTRAINT FK_2B38BC71A76ED395 FOREIGN KEY (user_id) REFERENCES lshop_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_shopping_cart ADD CONSTRAINT FK_5AE0CF805A6DD5F6 FOREIGN KEY (server) REFERENCES lshop_servers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lshop_shopping_cart ADD CONSTRAINT FK_5AE0CF806EB6DDB5 FOREIGN KEY (distribution_id) REFERENCES lshop_distributions (id)');
        $this->addSql('ALTER TABLE lshop_lp_group_permissions ADD CONSTRAINT FK_B9AE8D3E5E237E06 FOREIGN KEY (name) REFERENCES lshop_lp_groups (name)');
        $this->addSql('ALTER TABLE lshop_lp_players ADD CONSTRAINT FK_30AEC934F8D69D18 FOREIGN KEY (primary_group) REFERENCES lshop_lp_groups (name)');
        $this->addSql('ALTER TABLE lshop_lp_user_permissions ADD CONSTRAINT FK_7441B1C1D17F50A6 FOREIGN KEY (uuid) REFERENCES lshop_lp_players (uuid)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lshop_products DROP FOREIGN KEY FK_10E5818D12469DE2');
        $this->addSql('ALTER TABLE lshop_shopping_cart DROP FOREIGN KEY FK_5AE0CF806EB6DDB5');
        $this->addSql('ALTER TABLE lshop_enchantment_items DROP FOREIGN KEY FK_B3160766F3927CF3');
        $this->addSql('ALTER TABLE lshop_enchantment_items DROP FOREIGN KEY FK_B3160766126F525E');
        $this->addSql('ALTER TABLE lshop_products DROP FOREIGN KEY FK_10E5818D126F525E');
        $this->addSql('ALTER TABLE lshop_permission_user DROP FOREIGN KEY FK_2F5D723FFED90CCA');
        $this->addSql('ALTER TABLE lshop_permission_role DROP FOREIGN KEY FK_F5A72E1CFED90CCA');
        $this->addSql('ALTER TABLE lshop_purchase_items DROP FOREIGN KEY FK_8C9BF4754584665A');
        $this->addSql('ALTER TABLE lshop_purchase_items DROP FOREIGN KEY FK_8C9BF475558FBEB9');
        $this->addSql('ALTER TABLE lshop_distributions DROP FOREIGN KEY FK_A95F2FFC9B59827');
        $this->addSql('ALTER TABLE lshop_permission_role DROP FOREIGN KEY FK_F5A72E1CD60322AC');
        $this->addSql('ALTER TABLE lshop_role_user DROP FOREIGN KEY FK_2B38BC71D60322AC');
        $this->addSql('ALTER TABLE lshop_categories DROP FOREIGN KEY FK_E58BBDB31844E6B7');
        $this->addSql('ALTER TABLE lshop_shopping_cart DROP FOREIGN KEY FK_5AE0CF805A6DD5F6');
        $this->addSql('ALTER TABLE lshop_distributions DROP FOREIGN KEY FK_A95F2FFC45F80CD');
        $this->addSql('ALTER TABLE lshop_activations DROP FOREIGN KEY FK_C4AD3053A76ED395');
        $this->addSql('ALTER TABLE lshop_balance_transactions DROP FOREIGN KEY FK_3515718AA76ED395');
        $this->addSql('ALTER TABLE lshop_bans DROP FOREIGN KEY FK_C4A65971A76ED395');
        $this->addSql('ALTER TABLE lshop_news DROP FOREIGN KEY FK_1279E70DA76ED395');
        $this->addSql('ALTER TABLE lshop_permission_user DROP FOREIGN KEY FK_2F5D723FA76ED395');
        $this->addSql('ALTER TABLE lshop_persistences DROP FOREIGN KEY FK_9E86B38DA76ED395');
        $this->addSql('ALTER TABLE lshop_purchases DROP FOREIGN KEY FK_B2702952A76ED395');
        $this->addSql('ALTER TABLE lshop_reminders DROP FOREIGN KEY FK_7586A178A76ED395');
        $this->addSql('ALTER TABLE lshop_role_user DROP FOREIGN KEY FK_2B38BC71A76ED395');
        $this->addSql('ALTER TABLE lshop_lp_group_permissions DROP FOREIGN KEY FK_B9AE8D3E5E237E06');
        $this->addSql('ALTER TABLE lshop_lp_players DROP FOREIGN KEY FK_30AEC934F8D69D18');
        $this->addSql('ALTER TABLE lshop_lp_user_permissions DROP FOREIGN KEY FK_7441B1C1D17F50A6');
        $this->addSql('DROP TABLE lshop_activations');
        $this->addSql('DROP TABLE lshop_balance_transactions');
        $this->addSql('DROP TABLE lshop_bans');
        $this->addSql('DROP TABLE lshop_categories');
        $this->addSql('DROP TABLE lshop_distributions');
        $this->addSql('DROP TABLE lshop_enchantments');
        $this->addSql('DROP TABLE lshop_enchantment_items');
        $this->addSql('DROP TABLE lshop_items');
        $this->addSql('DROP TABLE lshop_news');
        $this->addSql('DROP TABLE lshop_pages');
        $this->addSql('DROP TABLE lshop_permissions');
        $this->addSql('DROP TABLE lshop_permission_user');
        $this->addSql('DROP TABLE lshop_permission_role');
        $this->addSql('DROP TABLE lshop_persistences');
        $this->addSql('DROP TABLE lshop_products');
        $this->addSql('DROP TABLE lshop_purchases');
        $this->addSql('DROP TABLE lshop_purchase_items');
        $this->addSql('DROP TABLE lshop_reminders');
        $this->addSql('DROP TABLE lshop_roles');
        $this->addSql('DROP TABLE lshop_role_user');
        $this->addSql('DROP TABLE lshop_servers');
        $this->addSql('DROP TABLE lshop_shopping_cart');
        $this->addSql('DROP TABLE lshop_users');
        $this->addSql('DROP TABLE lshop_settings');
        $this->addSql('DROP TABLE lshop_lp_actions');
        $this->addSql('DROP TABLE lshop_lp_groups');
        $this->addSql('DROP TABLE lshop_lp_group_permissions');
        $this->addSql('DROP TABLE lshop_lp_messages');
        $this->addSql('DROP TABLE lshop_lp_players');
        $this->addSql('DROP TABLE lshop_lp_user_permissions');
        $this->addSql('DROP TABLE lshop_lp_tracks');
    }
}