<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Categories extends Migration
{
    public function up()
    {
       $this->forge->addField([
            'id' => [
                'type'=>'INT',
                'constraint'=> 9,
                'auto_increment'=> true,
            ],
            'title' =>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ],
            'description' =>[
                'type'=>'VARCHAR',
                'constraint'=>200,
                'null'=>false,
            ],
            'created_at' =>[
                'type'=>'TIMESTAMP',
                 null=> true,
            ],
            'updated_at' =>[
                'type'=>'TIMESTAMP',
                 null=> true,
                 'default'=> NULL,
            ],
            'deleted_at' =>[
                'type'=>'TIMESTAMP',
                 null=> true,
                'default'=> NULL,
            ],
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('categories',true);
    }

    public function down()
    {
        $this->forge->dropTable('categories',true);
    }
}
