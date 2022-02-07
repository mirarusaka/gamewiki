<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminaate\Support\Facades\Storage;
use App\Page;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function top()
    {
        $data_page = DB::table('pages')->orderby('created_at', 'desc')->get();
        $data_ine = DB::table('pages')->orderby('ine', 'desc')->get();

        $page_count = count($data_page);
        $ine_count = count($data_ine);
        
        if($page_count > 3)
        {
            $page_count = 3;
        }

        if($ine_count > 3)
        {
            $ine_count = 3;
        }


        return view('TopPage', 
        ['page' => $data_page, 
        'ine' => $data_ine,
        'page_count' => $page_count,
        'ine_count' => $ine_count,
        ]);
    }

    public function about()
    {
        return view('about.about');
    }

    public function link()
    {
        return view('about.links');
    }

    public function toroku()
    {
        return view('about.toroku');
    }
    
}
