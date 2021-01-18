<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cni')->nullable();
            $table->string('telephone');
            
            $table->string('sexe');
            $table->string('etat_civil')->nullable();
            //$table->string('unique_code')->unique();
            $table->float('nombre_enfant_dirrect')->default(0);
            $table->string('code_parrent')->nullable();
            $table->double('montant')->nullable();

            $table->foreignId('groupement_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
