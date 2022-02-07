<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendmail;

class FormController extends Controller
{
    public function Form() //入力フォーム
    {
        return view('form.contact');
    }

    public function firm(Request $request) //確認画面
    {
        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'body'  => 'required',
        ]);
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('form.contact_firm', [
            'inputs' => $inputs,
        ]);
    }

    public function done(Request $request) //送信完了
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'body'  => 'required',
        ]);

        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        
        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                ->route('form.contact')
                ->withInput($inputs);

        } else {
             //入力されたメールアドレスにメールを送信
            \Mail::to('Pokepikacan@gmail.com')->send(new ContactSendmail($inputs));

            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('form.contact_thanks');
            
        }
    }
}
