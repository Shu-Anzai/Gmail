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

    public function create_url($to, $Cc, $Bcc, $subject, $letterBody)
    {
        // $to = $request->to;
        // $subject = $request->subject;
        // $letterBody = $request->letterBody;

        $httpsmail = "https://mail.google.com/mail/?view=cm&fs=1&to=";

        $noNewLine = str_replace("\r\n", "%0D%0A", $letterBody);


        #入力していない部分はURLに含まないように選別
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

        $url = $httpsmail.$to.$Cc_spec.$Bcc_spec.$subject_spec.$body_spec;

        return $url;

    }



    public function newUrl(Request $request)
    {
        $to = $request->to;
        $subject = $request->subject;

        // $detail_data = TestController::create_url($request);

        // ４つの入力欄のうち、実際に入力したもののみ,で繋げてをURLの関数に引き渡す
        $Cc = "";
        if (($_POST['Cc1'] !== "")) {
            $Cc = $_POST['Cc1'];
        }

        if (($Cc !== "") && ($_POST['Cc2'] !== "")) {
            $Cc = $Cc . "," . $_POST['Cc2'];
        }elseif(($_POST['Cc2'] !== "")){
            $Cc = $_POST['Cc2'];
        }

        if (($Cc !== "") && ($_POST['Cc3'] !== "")) {
            $Cc = $Cc . "," . $_POST['Cc3'];
        }elseif(($_POST['Cc3'] !== "")){
            $Cc = $_POST['Cc3'];
        }

        if (($Cc !== "") && ($_POST['Cc4'] !== "")) {
            $Cc = $Cc . "," . $_POST['Cc4'];
        }elseif(($_POST['Cc4'] !== "")){
            $Cc = $_POST['Cc4'];
        }

        // ４つの入力欄のうち、実際に入力したもののみ,で繋げてをURLの関数に引き渡す
        $Bcc = "";
        if (($_POST['Bcc1'] !== "")) {
            $Bcc = $_POST['Bcc1'];
        }

        if (($Bcc !== "") && ($_POST['Bcc2'] !== "")) {
            $Bcc = $Bcc . "," . $_POST['Bcc2'];
        }elseif(($_POST['Bcc2'] !== "")){
            $Bcc = $_POST['Bcc2'];
        }

        if (($Bcc !== "") && ($_POST['Bcc3'] !== "")) {
            $Bcc = $Bcc . "," . $_POST['Bcc3'];
        }elseif(($_POST['Bcc3'] !== "")){
            $Bcc = $_POST['Bcc3'];
        }

        if (($Bcc !== "") && ($_POST['Bcc4'] !== "")) {
            $Bcc = $Bcc . "," . $_POST['Bcc4'];
        }elseif(($_POST['Bcc4'] !== "")){
            $Bcc = $_POST['Bcc4'];
        }

        $letterBody = $request->letterBody;

        // URLを作成
        $url = TestController::create_url($to, $Cc, $Bcc, $subject, $letterBody);

        // URLが何も入力していないものならエラー用の変数として入力用のページにリダイレクト
        if ($url == "https://mail.google.com/mail/?view=cm&fs=1&to=") {
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

        return view('mypage', compact('urls'));
    }

    public function login()
    {
        return view('login');
    }

    public function regNewUrl(Request $request)
    {
        $to = $request->to;
        $Cc = $request->Cc;
        $Bcc = $request->Bcc;
        $subject = $request->subject;
        $letterBody = $request->letterBody;
        $name = $request->url_name;

        $new_url = new Mail();
        $new_url->user_id = auth()->user()->id;
        $new_url->name = $name;
        $new_url->to = $to;
        $new_url->cc = $Cc;
        $new_url->bcc = $Bcc;
        $new_url->subject = $subject;
        $new_url->letter_body = $letterBody;

        $new_url -> save();

        return redirect("/mypage");
    }

    public function edit($id)
    {
        return($id."番の編集画面");
    }
}
