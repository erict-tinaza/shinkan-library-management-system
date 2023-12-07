<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'author_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'author_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ]
        ]);

        $this->forge->addPrimaryKey('author_id');
        $this->forge->createTable('authors');
    }

    public function down()
    {
        $this->forge->dropTable('authors');
    }
}
