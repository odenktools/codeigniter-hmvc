<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => '40'
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'unique' => true,
            ),
            'role_slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '191',
            ),
            'created_at' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
            'updated_at' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
            'deleted_at' => array(
                'type' => 'timestamp',
                'null' => true,
            )
        ));

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}