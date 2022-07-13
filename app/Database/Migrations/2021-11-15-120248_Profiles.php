<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Profiles extends Migration
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
            'user_id' =>[
                'type'=>'INT',
                'constraint'=>9,
                'unsigned'=>true
            ],
            'name' =>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false,
            ],
            'address' =>[
                'type'=>'VARCHAR',
                'constraint'=>200,
                'null'=> true,
            ],
            'city' =>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=> true,
            ],
            'state' =>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=> true,
            ],
            'country' =>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=> true,
            ],
            'thumbnail' =>[
                'type'=>'VARCHAR',
                'constraint'=>300,
                'null'=> true,
                'default'=> NULL,
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
        $this->forge->createTable('profiles',true);
    }

    public function down()
    {
        $this->forge->dropTable('profiles',true);
    }
}
