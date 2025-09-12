<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'nim' =>[
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true
            ],
            'tahun_masuk' =>[
                'type' => 'INT',
                'constraint' => 4,
            ]
        ]);

        $this->forge->addKey('nim', true);
        $this->forge->addForeignKey('nim','users','user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
