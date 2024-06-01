<?php
    
namespace Database\Migrations;
    
use Database\SchemaMigration;
    
class CreateNotificationsTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return ["CREATE TABLE notifications (
            notice_id int NOT NULL AUTO_INCREMENT,
            user_id_to bigint DEFAULT NULL,
            notification_type varchar(50) NOT NULL,
            source_id int NOT NULL,
            is_read tinyint(1) DEFAULT '0',
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            user_id_from bigint DEFAULT NULL,
            PRIMARY KEY (notice_id),
            KEY user_id (user_id_to),
            KEY fk_user_id_from (user_id_from),
            CONSTRAINT fk_user_id_from FOREIGN KEY (user_id_from) REFERENCES users (id),
            CONSTRAINT notifications_ibfk_1 FOREIGN KEY (user_id_to) REFERENCES users (id)
          ); "];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}