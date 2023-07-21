<?php

use yii\db\Migration;

/**
 * Class m230715_060636_create_table_mahasiswa
 */
class m230715_060636_create_table_mahasiswa extends Migration
{
    public function up()
    {
        $this->createTable('mahasiswa', [
            'id' => $this->primaryKey(),
            'nim' => $this->string()->notNull(),
            'nama' => $this->string()->notNull(),
            'jurusan' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function down()
    {
        $this->dropTable('mahasiswa');
    }
}
