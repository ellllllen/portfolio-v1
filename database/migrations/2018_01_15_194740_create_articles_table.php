<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('section');
            $table->string('image');
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });

        $faker = app(\Faker\Generator::class);
        DB::table('articles')->insert([
            'id' => 1,
            'title' => 'JavaScript',
            'section' => $faker->paragraph,
            'image' => $faker->image('public/storage/images', 400, 300, null, false),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('articles')->insert([
            'id' => 4,
            'title' => 'Children\'s Books',
            'section' => $faker->paragraph,
            'image' => $faker->image('public/storage/images', 400, 300, null, false),
            'created_at' => Carbon::now()->addSecond(),
            'updated_at' => Carbon::now()->addSecond(),
        ]);
        DB::table('articles')->insert([
            'id' => 5,
            'title' => 'Learn Vue 2: Step By Step (Laracasts)',
            'section' => $faker->paragraph,
            'image' => $faker->image('public/storage/images', 400, 300, null, false),
            'created_at' => Carbon::now()->addSeconds(2),
            'updated_at' => Carbon::now()->addSeconds(2),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });
        Schema::dropIfExists('articles');
    }
}
