<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
    public function up()
    {
        // booking
        $this->forge->addField([
            'id_booking'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tgl_booking'      => ['type' => 'date'],
            'batas_ambil'      => ['type' => 'date', 'constraint' => 11, 'null' => true],
            'id_client'        => ['type' => 'int', 'constraint' => 11],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_booking', true);
        $this->forge->createTable('booking', true);
    }

    public function down()
    {
        $this->forge->dropTable('booking', true);
    }
}
