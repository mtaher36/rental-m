<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviews extends Migration
{
    public function up()
    {
        // reviews
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_client'      => ['type' => 'varchar', 'constraint' => 255],
            'bintang'          => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('reviews', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {

        $this->forge->dropTable('reviews', true);
    }
}
