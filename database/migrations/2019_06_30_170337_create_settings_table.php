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
          $table->text('landing_header')->nullable();
          $table->text('landing_tagline')->nullable();
          $table->tinyInteger('text_selection_policy');
          $table->string('contact_form_email')->nullable();
          $table->text('logo_location')->nullable();
          $table->text('logo_description')->nullable();
          $table->text('hero_location')->nullable();
          $table->text('hero_description')->nullable();
          $table->boolean('enable_subscribe_form')->default(false);
          $table->string('subscribe_form_title')->nullable();
          $table->text('subscribe_form_copy')->nullable();
          $table->string('thank_you_title')->nullable();
          $table->text('thank_you_copy')->nullable();
          $table->string('font_pref');
          $table->tinyInteger('enable_backups')->default(true);
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
