<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('settings', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->tinyInteger('view_count_policy');
          $table->tinyInteger('comment_lock_policy');
          $table->tinyInteger('comment_approval_policy');
          $table->tinyInteger('landing_header')->nullable();
          $table->tinyInteger('landing_tagline')->nullable();
          $table->tinyInteger('text_selection_policy');
          $table->string('contact_form_email')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
