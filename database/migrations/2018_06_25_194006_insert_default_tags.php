<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDefaultTags extends Migration
{
    private $defaultTags = ['about me', 'knowledge base'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->defaultTags as $tag) {
            DB::table('tags')->insert([
                'tag' => $tag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $query = DB::table('tags')->where(function($q)
        {
            foreach ($this->defaultTags as $tag) {
                $q->orWhere('tag', $tag);
            }
        })->delete();
    }
}
