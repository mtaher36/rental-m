<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKatalog extends Migration
{
    public function up()
    {
        // reviews
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'sampul'           => ['type' => 'varchar', 'constraint' => 255],
            'judul'            => ['type' => 'varchar', 'constraint' => 255],
            'tahun'            => ['type' => 'int', 'constraint' => 11,],
            'cc'               => ['type' => 'int', 'constraint' => 11,],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('katalog', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {

        $this->forge->dropTable('katalog', true);
    }
}
