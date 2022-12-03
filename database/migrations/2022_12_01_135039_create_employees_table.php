<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("first_name", 30);
            $table->string("last_name", 50);
            $table->unsignedBigInteger("job_position_id")->nullable();
            $table->timestamp("date_of_employment");
            $table->string("phone_number", 20);
            $table->string("email", 100) ->unique();
            $table->float("salary", );
            $table->string('image')->nullable();
            $table->unsignedBigInteger("manager_level");
            $table->unsignedBigInteger("manager_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
