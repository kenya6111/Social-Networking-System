<?php
    
namespace Database\Migrations;
    
use Database\SchemaMigration;
    
class CreateUserTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE users (
          id bigint NOT NULL AUTO_INCREMENT,
          username varchar(255) NOT NULL,
          email varchar(255) NOT NULL,
          password varchar(255) NOT NULL,
          created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
          updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          company varchar(255) DEFAULT NULL,
          email_verified_at date DEFAULT NULL,
          age int DEFAULT NULL,
          address varchar(255) DEFAULT NULL,
          hobby varchar(255) DEFAULT NULL,
          self_introduction text,
          profile_image varchar(255) DEFAULT NULL,
          PRIMARY KEY (id),
          UNIQUE KEY email (email)
        );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}