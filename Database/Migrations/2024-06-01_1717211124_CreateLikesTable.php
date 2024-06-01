<?php
    
namespace Database\Migrations;
    
use Database\SchemaMigration;
    
class CreateLikesTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE likes (
            like_id int NOT NULL AUTO_INCREMENT,
            post_id int NOT NULL,
            user_id bigint NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (like_id),
            KEY post_id (post_id),
            KEY user_id (user_id),
            CONSTRAINT likes_ibfk_1 FOREIGN KEY (post_id) REFERENCES posts (post_id) ON DELETE CASCADE,
            CONSTRAINT likes_ibfk_2 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
          ) "];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}