<?php
    
namespace Database\Migrations;
    
use Database\SchemaMigration;
    
class CreatePostsTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE posts (
            post_id int NOT NULL AUTO_INCREMENT,
            reply_to_id int DEFAULT NULL,
            message text,
            image varchar(255) DEFAULT NULL,
            video varchar(255) DEFAULT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            scheduled_at datetime DEFAULT NULL,
            status enum('draft','scheduled','published') DEFAULT NULL,
            user_id bigint DEFAULT NULL,
            PRIMARY KEY (post_id),
            KEY reply_to_id (reply_to_id),
            KEY user_id (user_id),
            CONSTRAINT posts_ibfk_1 FOREIGN KEY (reply_to_id) REFERENCES posts (post_id) ON DELETE CASCADE,
            CONSTRAINT posts_ibfk_2 FOREIGN KEY (user_id) REFERENCES users (id)
          );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}