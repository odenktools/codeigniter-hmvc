<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration_Add_Column_Version_To_Users extends CI_Migration
{
    public function up()
    {
        Capsule::schema()->table('users', function (Blueprint $table) {
            $table->string('sample', 100)->nullable();
        });
    }

    public function down()
    {
        Capsule::schema()->table('users', function (Blueprint $table) {
            $table->dropColumn('sample');
        });
    }
}
