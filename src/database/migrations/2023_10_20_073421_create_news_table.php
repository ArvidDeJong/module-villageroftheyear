<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            // Gebruiker tracking
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();

            // Bedrijf en hosting gegevens
            $table->integer('company_id')->nullable()->index();
            $table->string('host')->nullable();

            // Meertalige structuur
            $table->unsignedBigInteger('pid')->nullable()->index(); // Parent ID
            $table->string('locale', 10)->default('en')->index(); // Taalcode met standaardwaarde

            // Content velden
            $table->string('author')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->integer('sort')->default(1);
            $table->string('title')->nullable();
            $table->string('title_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('tags')->nullable();
            $table->text('summary')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();

            // Unieke combinatie van 'pid' en 'locale'
            $table->unique(['pid', 'locale']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
