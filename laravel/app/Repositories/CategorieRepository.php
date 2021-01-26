<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategorieRepository extends BaseRepository
{
    public function getCategories()
    {
        $categories = DB::table('categories')
            ->select('id', 'name', 'parentid')
            ->get();

        return($categories);
    }
}
