<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;

class Migration_Create_users extends CI_Migration
{
    public function up()
    {
        Capsule::schema()->create('users', function ($table) {
            $table->string('id', 40);
            $table->string('email', 80)->unique();
            $table->string('username', 30)->unique();
            $table->string('role_slug', 150);
            $table->string('password');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('users');
    }
}
