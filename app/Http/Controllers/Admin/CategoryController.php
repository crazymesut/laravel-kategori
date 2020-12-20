<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //

    public function show()
    {

    }

    public function list()
    {
        $datas = [];
        $datas['categories'] = Category::defaultOrder()->get();
        return Inertia::render('category/index', $datas);
    }

    public function tree()
    {
        $result = Category::get()->toTree();
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }

    public function createText()
    {
        //$request['slug'] = Str::slug($request->name, '-');


        $ust = Category::create(
            [
                'name' => 'Kitap',
                'slug' => Str::slug('Kitap', '-')
            ]
        );

        $alt = Category::create([
            'name' => 'Edebiyat',
            'slug' => Str::slug('Edebiyat', '-')
        ]);
        $ust->appendNode($alt);

        $alt1 = Category::create([
            'name' => 'Edebiyat Tarihi',
            'slug' => Str::slug('Edebiyat Tarihi', '-')
        ]);
        $alt->appendNode($alt1);

        $alt = Category::create([
            'name' => 'Tarih',
            'slug' => Str::slug('Tarih', '-')
        ]);
        $ust->appendNode($alt);

        $alt1 = Category::create([
            'name' => 'Türk Tarihi',
            'slug' => Str::slug('Türk Tarihi', '-')
        ]);
        $alt->appendNode($alt1);

        $alt = Category::create([
            'name' => 'Sosyoloji',
            'slug' => Str::slug('Sosyoloji', '-')
        ]);
        $ust->appendNode($alt);

        $alt = Category::create([
            'name' => 'Felsefe',
            'slug' => Str::slug('Felsefe', '-')
        ]);
        $ust->appendNode($alt);

    }
}
