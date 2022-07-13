<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ForTest extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'=>'INT',
                'constraint'=> 9,
                'auto_increment'=> true,
                'unsigned'=> true,
            ],
            'c1' =>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false
            ],
            'c2' =>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false,
            ],
            'c3' =>[
                'type'=>'TEXT',
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
        $this->forge->createTable('for_test',true);
    }

    public function down()
    {
         $this->forge->dropTable('for_test',true);
    }
}
