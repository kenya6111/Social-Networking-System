<?php
    
namespace Database\Migrations;
    
use Database\SchemaMigration;
    
class CreateMessageTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE messages (
            message_id int NOT NULL AUTO_INCREMENT,
            send_user_id bigint NOT NULL,
            receive_user_id bigint NOT NULL,
            message text,
            image varchar(255) DEFAULT NULL,
            video varchar(255) DEFAULT NULL,
            sended_at datetime DEFAULT CURRENT_TIMESTAMP,
            iv varchar(255) NOT NULL,
            PRIMARY KEY (message_id),
            KEY send_user_id (send_user_id),
            KEY receive_user_id (receive_user_id),
            CONSTRAINT messages_ibfk_1 FOREIGN KEY (send_user_id) REFERENCES users (id),
            CONSTRAINT messages_ibfk_2 FOREIGN KEY (receive_user_id) REFERENCES users (id)
          );"];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}