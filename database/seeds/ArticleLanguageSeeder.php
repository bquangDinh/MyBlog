<?php

use Illuminate\Database\Seeder;
use App\ArticleLanguage;

class ArticleLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $available_languages = array('Vietnamese','English');

        foreach($available_languages as $language){
            $l = new ArticleLanguage;
            $l->name = $language;
            $l->save();
        }
    }
}
