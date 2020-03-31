<?php

use Illuminate\Database\Seeder;
use App\ArticleType;

class ArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_types = array('note','diary','review');
        foreach($article_types as $type){
            $t = new ArticleType;
            $t->name = $type;
            $t->save();
        }
    }
}
