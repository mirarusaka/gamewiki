<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Page;
use App\Comment;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(5);
        $data = count($pages);
        return view('pages.index')
                    ->with(['pages' => $pages, 'data' => $data]);
    }

    public function create() //入力フォーム
    {
        return view('pages.form');        
    }

    public function pagefirm(Request $request) //確認画面
    {
        $this->validate($request, Page::$rules);
        $page_data = $request->except('titlegamen', 'gamen1', 'gamen2', 'gamen3'); //画像以外のデータを取得
        $gazou = 0;
        
        $imagefile1 = $request->file('titlegamen'); //画像のデータを取得
        $temp_path1 = $imagefile1->store('page',"public"); //画像をストレージに保存

        $imagefile2 = $request->file('gamen1');
        if (isset($imagefile2))
        {
        $temp_path2 = $imagefile2->store('page',"public");
        }else
        {
            $temp_path2 = "null";
            $gazou++;
        }

        $imagefile3 = $request->file('gamen2');
        if (isset($imagefile3))
        {
        $temp_path3 = $imagefile3->store('page',"public");
        }else
        {
            $temp_path3 = "null";
            $gazou++;
        }

        $imagefile4 = $request->file('gamen3');
        if (isset($imagefile4))
        {
        $temp_path4 = $imagefile4->store('page',"public");
        }else
        {
            $temp_path4 = "null";
            $gazou++;
        }

        $page = //データを全て保存
        [
            'title' => $page_data["title"],
            'dl' => $page_data["dl"],
            'tool' => $page_data["tool"],
            'creater' => $page_data["creater"],
            'janru' => $page_data["janru"],
            'body' => $page_data["body"],
            'titlegamen' => $temp_path1,
            'gamen1' => $temp_path2,
            'gamen2' => $temp_path3,
            'gamen3' => $temp_path4,
        ];

        return view('pages.page_firm', [
            'page' => $page,
            'gazou' => $gazou,
        ]);        
    }

    public function done(Request $request) //送信完了
    {
        $inputs = $request->all();
        $action = $request->input('action');
        
        //フォームから受け取ったactionを除いたinputの値を取得
        //$inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
            ->route('create')
            ->withInput($inputs); 
        } else {
            $inputs = new Page();
            $inputs->title = $request->title;
            $inputs->dl = $request->dl;
            $inputs->tool = $request->tool;
            $inputs->creater = $request->creater;
            $inputs->janru = $request->janru;
            $inputs->body = $request->body;
            $inputs->titlegamen = $request->titlegamen;
            $inputs->gamen1 = $request->gamen1;
            $inputs->gamen2 = $request->gamen2;
            $inputs->gamen3 = $request->gamen3;
            $inputs->save();
            return redirect('/pages');
        }
    }

    public function show(string $title) //ページの要素を取得
    {

        $page = Page::whereTitle($title)->first();
        $comments = Comment::where('pagetitle', $page['id'])->paginate(10);
        $gazou = 0;

        if (is_null($page['gamen1'])) //画像が無ければ画像表示コードの読み込みをさせない
        {
            $page['gamen1'] = "null";
            $gazou = $gazou + 1;

        }elseif($page['gamen1'] == "null")
        {
            $gazou = $gazou + 1;            
        }

        if (is_null($page['gamen2']))
        {
            $page['gamen2'] = "null";
            $gazou = $gazou + 1;

        }elseif($page['gamen1'] == "null")
        {
            $gazou = $gazou + 1;            
        }

        if (is_null($page['gamen3']))
        {
            $page['gamen3'] = "null";
            $gazou = $gazou + 1;

        }elseif($page['gamen1'] == "null")
        {
            $gazou = $gazou + 1;            
        }

        return view('pages.show')->with([
            'page' => $page,
            'comments' => $comments,
            'gazou' => $gazou,
        ]);
    }

    public function edit(Page $page) //編集ページに値を渡す
    {
        return view('pages.edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request, Page $page) //更新完了
    {
        
        $this->validate($request, [
            'title' => 'required|unique:pages,title,'.$page->id,
            'dl' => 'required|url',
            'tool' => 'required|min:1',
            'creater'  => 'required',
            'janru' => 'required|min:1',
            'body' => 'required',
            'titlegamen' => 'file|image',
            'gamen1' => 'file|image',
            'gamen2' => 'file|image',
            'gamen3' => 'file|image',
        ]);
        
    if($request->gazou == "update") //画像を更新するか否かを判定
    {
        $imagefile1 = $request->file('titlegamen'); //画像のデータを取得
        if(isset($imagefile1)) //UPされた画像がnullか判定
        {
            $temp_path1 = $imagefile1->store('page',"public"); //画像をストレージに保存
        }else{
            $temp_path1 = $page->titlegamen;
        }

        $imagefile2 = $request->file('gamen1'); //画像のデータを取得
        if(isset($imagefile2)) //UPされた画像がnullか判定
        {
            $temp_path2 = $imagefile2->store('page',"public"); //画像をストレージに保存
        }else{
            $temp_path2 = $page->gamen1;
        }
        
        $imagefile3 = $request->file('gamen2'); //画像のデータを取得        
        if(isset($imagefile3)) //UPされた画像がnullか判定
        {
            $temp_path3 = $imagefile3->store('page',"public"); //画像をストレージに保存
        }else{
            $temp_path3 = $page->gamen2;
        }
        
        $imagefile4 = $request->file('gamen3'); //画像のデータを取得        
        if(isset($imagefile4)) //UPされた画像がnullか判定
        {
            $temp_path4 = $imagefile4->store('page',"public"); //画像をストレージに保存
        }else{
            $temp_path4 = $page->gamen3;
        }
        $page_data =
        [
            'title' => $request->title,
            'dl' => $request->dl,
            'tool' => $request->tool,
            'creater' => $request->creater,
            'janru' => $request->janru,
            'body' => $request->body,
            'titlegamen' => $temp_path1,
            'gamen1' => $temp_path2,
            'gamen2' => $temp_path3,
            'gamen3' => $temp_path4,
        ];
    }else
    {
        $page_data =
        [
            'title' => $request->title,
            'dl' => $request->dl,
            'tool' => $request->tool,
            'creater' => $request->creater,
            'janru' => $request->janru,
            'body' => $request->body,
        ];
    }
        Page::where('title', $page->title)
        ->update($page_data);

        $page->title = $page_data['title'];

        return redirect($page->url);
    }

    public function ine(Request $request) //ページの要素を取得
    {
        $page = Page::whereTitle($request->title)->first();
        $page->ine++;
        $page->save();
        return redirect($page->url);
    }

    public function delete(Page $page) //削除確認ページに値を渡す
    {
        $gazou = 0;
        if (is_null($page['gamen1'])) //画像が無ければ画像表示コードの読み込みをさせない
        {
            $page['gamen1'] = "null";
            $gazou = $gazou + 1;

        }elseif($page['gamen1'] == "null")
        {
            $gazou = $gazou + 1;            
        }

        if (is_null($page['gamen2']))
        {
            $page['gamen2'] = "null";
            $gazou = $gazou + 1;

        }elseif($page['gamen1'] == "null")
        {
            $gazou = $gazou + 1;            
        }

        if (is_null($page['gamen3']))
        {
            $page['gamen3'] = "null";
            $gazou = $gazou + 1;

        }elseif($page['gamen1'] == "null")
        {
            $gazou = $gazou + 1;            
        }

        return view('pages.delete', [
            'page' => $page,
            'gazou' => $gazou,
        ]);
    }

    public function remove(Request $request) //削除ページに値を渡す
    {
        Page::find($request->id)->delete();
        return view('pages.remove');
    }

    public function find(Request $request)
    {
        $inputs = $request->all();
        return view('pages.find', [
            'inputs' => $inputs,
        ]);     
    }
}