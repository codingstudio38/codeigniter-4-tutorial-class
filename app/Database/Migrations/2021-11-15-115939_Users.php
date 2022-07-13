<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;
class Users extends Migration
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
            'username' =>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false
            ],
            'email' =>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false,
            ],
            'phone' =>[
                'type'=>'VARCHAR',
                'constraint'=>12,
                'null'=>false,
            ],
            'password' =>[
                'type'=>'TEXT',
                'null'=>false,
            ],
            'options' =>[
                'type'=>'LONGTEXT',
                'default'=>null,
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
        //$this->forge->addKey(timestamp);
        $this->forge->createTable('auth_users',true);
    }

    public function down()
    {
        $this->forge->dropTable('auth_users',true);
    }
}
