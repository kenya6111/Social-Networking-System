<?php
    
namespace Database\Migrations;
    
use Database\SchemaMigration;
    
class CreateFollowsTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE follows (
            follower_id bigint NOT NULL,
            followed_id bigint NOT NULL,
            followed_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (follower_id,followed_id),
            KEY followed_id (followed_id),
            CONSTRAINT follows_ibfk_1 FOREIGN KEY (follower_id) REFERENCES users (id),
            CONSTRAINT follows_ibfk_2 FOREIGN KEY (followed_id) REFERENCES users (id)
          );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}