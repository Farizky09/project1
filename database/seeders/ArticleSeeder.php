<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Article::truncate();
        $article = Article::create([
            'judul' => 'Habis Gelap Terbitlah Terang'
        ]);

        Tag::create([
            'tag' => 'surat',
            'article_id'    => $article->id
        ]);
        Tag::create([
            'tag' => 'sejarah',
            'article_id'    => $article->id
        ]);
        Tag::create([
            'tag' => 'diksi',
            'article_id'    => $article->id
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
