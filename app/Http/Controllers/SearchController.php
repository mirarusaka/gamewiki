<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class SearchController extends Controller
{
    public function index() //検索トップぺージ
    {
        return view('search.index');
    }

    public function name()
    {
        return view('search.name');
    }

    public function janru()
    {
        return view('search.janru');
    }

    public function ine()
    {
        return view('search.ine');
    }

    public function find(Request $request)
    {
        $search = $request->search; //検索の種類を取得
        $keyword = $request->keyword;
        if($search == "name"){ //検索の種類で取得するデータを変更
            $page = Page::where('title', 'like', "%$keyword%")->get();
        }elseif($search == "creater"){
            $page = Page::where('creater', 'like', "%$keyword%")->get();
        }elseif($search == "tool"){
            $page = Page::where('tool', "$keyword")->get();        
        }else{
            $page = Page::where('janru', "$keyword")->get();
        }

        $data = count($page);

        return view('search.find')
            ->with(['pages' => $page,
                    'data' => $data,
                    ]);
    }
}
