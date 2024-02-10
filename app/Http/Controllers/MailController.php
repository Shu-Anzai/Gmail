<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mail;

class TestController extends Controller
{

    public function index()
    {
        return view('main');
    }

    public function test()
    {
        return view('main-test');
    }

    public function create_url($to, $Cc, $Bcc, $subject, $letterBody)
    {
        // $to = $request->to;
        // $subject = $request->subject;
        // $letterBody = $request->letterBody;

        $httpsmail = "https://mail.google.com/mail/?view=cm&fs=1";

        $noNewLine = str_replace("\r\n", "%0D%0A", $letterBody);


        #入力していない部分はURLに含まないように選別
        if ($to == "") {
            $to_spec = "";
        }else{
            $to_spec = "&to=".$to;
        }

        if ($Cc == "") {
            $Cc_spec = "";
        }else{
            $Cc_spec = "&cc=".$Cc;
        }

        if ($Bcc == "") {
            $Bcc_spec = "";
        }else{
            $Bcc_spec = "&bcc=".$Bcc;
        }

        if ($subject == "") {
            $subject_spec = "";
        }else{
            $subject_spec = "&su=".$subject;
        }

        if ($letterBody == "") {
            $body_spec = "";
        }else{
            $body_spec = "&body=".$noNewLine;
        }

        $url = $httpsmail.$to_spec.$Cc_spec.$Bcc_spec.$subject_spec.$body_spec;

        return $url;

    }

    public function ConnectFields($recievers)
    {
        $values = [];
        for ($i = 1; $i <= 4; $i++) {
            $fieldValue = $_POST[$recievers . $i];
            if (!empty($fieldValue)) {
                $values[] = $fieldValue;
            }
        }

        return implode(',', $values);
    }


    public function newUrl(Request $request)
    {
        $to = Testcontroller::ConnectFields('To');
        $Cc = Testcontroller::ConnectFields('Cc');
        $Bcc = Testcontroller::ConnectFields('Bcc');
        $subject = $request->subject;
        $letterBody = $request->letterBody;

        // URLを作成
        $url = TestController::create_url($to, $Cc, $Bcc, $subject, $letterBody);

        // URLが何も入力していないものならエラー用の変数として入力用のページにリダイレクト
        if ($url == "https://mail.google.com/mail/?view=cm&fs=1") {
            return view("main", compact('url'));
        }

        // 本文の改行をHTMLで表示できるように一時的に置換
        // （実際にユーザーが扱うのはURLになるため、DBにはこのまま入れて問題ない？？）
        $letterBody = str_replace("\r\n", "<br>", $request->letterBody);
        return view("newUrl", compact('to', 'Cc', 'Bcc', 'subject', 'letterBody', 'url'));
    }

    public function myUrl()
    {
        $user_id = Auth::user()->id;
        $urls = Mail::where('user_id', $user_id)->get();

        foreach ($urls as $key => $url) {

            $to = $url->to;
            $Cc = $url->Cc;
            $Bcc = $url->Bcc;
            $subject = $url->subject;
            $letterBody = str_replace("<br>","\r\n",$url->letter_body);
            $url->URL = TestController::create_url($to, $Cc, $Bcc, $subject, $letterBody);
        }
        return view('mypage', compact('urls'));
    }

    public function login()
    {
        return view('login');
    }

    public function regNewUrl(Request $request)
    {
        $new_url = new Mail();
        $new_url->user_id = auth()->user()->id;
        $new_url->name = $request->url_name;
        $new_url->to = $request->to;
        $new_url->cc = $request->Cc;
        $new_url->bcc = $request->Bcc;
        $new_url->subject = $request->subject;
        $new_url->letter_body = $request->letterBody;

        $new_url -> save();

        return redirect("/mypage");
    }

    public function edit($id)
    {
        $target_url = Mail::where('id', $id)->get();

            $target_url[0]->to = explode(",", $target_url[0]->to);
            $target_url[0]->Cc = explode(",", $target_url[0]->cc);
            $target_url[0]->Bcc = explode(",", $target_url[0]->bcc);


        $target_url[0]->letter_body = str_replace("<br>", "\r\n", $target_url[0]->letter_body);
        return view("editURL", compact('target_url'));
    }

    public function updateUrl(Request $request, $id)
    {
        $to = Testcontroller::ConnectFields('to');
        $Cc = Testcontroller::ConnectFields('Cc');
        $Bcc = Testcontroller::ConnectFields('Bcc');
        $subject = $request->subject;
        $letterBody = $request->letterBody;

        // URLを作成
        $url = TestController::create_url($to, $Cc, $Bcc, $subject, $letterBody);

        // URLが何も入力していないものならエラー用の変数として入力用のページにリダイレクト
        if ($url == "https://mail.google.com/mail/?view=cm&fs=1") {
            return view("editURL", compact('url'));
        }

        // 本文の改行をHTMLで表示できるように一時的に置換
        // （実際にユーザーが扱うのはURLになるため、DBにはこのまま入れて問題ない？？）
        $letterBody = str_replace("\r\n", "<br>", $request->letterBody);

        $target_url = Mail::where('id', $id)->get();
        $name = $target_url[0]->name;
        return view("confirmUrl", compact('to', 'Cc', 'Bcc', 'subject', 'letterBody', 'url', 'name', 'id'));

    }

    public function save(Request $request, $id)
    {
        $data = Mail::find($id);
        $data->name = $request->url_name;
        $data->to = $request->to;
        $data->cc = $request->Cc;
        $data->bcc = $request->Bcc;
        $data->subject = $request->subject;
        $data->letter_body = $request->letterBody;

        $data->save();

        return redirect("/mypage");

    }

    public function delete($id)
    {
        $delete_url = Mail::find($id);
        $delete_url->delete();
        return redirect("/mypage");
    }
}
