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

    public function create_url($request, $Cc, $Bcc)
    {
        $to = $request->to;
        $subject = $request->subject;
        $letterBody = $request->letterBody;

        $httpsmail = "https://mail.google.com/mail/?view=cm&fs=1&to=";

        $noNewLine = str_replace("\r\n", "%0D%0A", $letterBody);

        $url = $httpsmail.$to."&cc=".$Cc."&bcc=".$Bcc."&su=".$subject."&body=".$noNewLine;

        return $url;

    }



    public function newUrl(Request $request)
    {


        // $detail_data = TestController::create_url($request);

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

        $url = TestController::create_url($request, $Cc, $Bcc);
        $to = $request->to;
        $subject = $request->subject;
        $letterBody = str_replace("\r\n", "<br>", $request->letterBody);
        return view("newUrl", compact('to', 'Cc', 'Bcc', 'subject', 'letterBody', 'url'));
    }

    public function myUrl()
    {
        $user_id = Auth::user()->id;
        $urls = Mail::where('user_id', $user_id)->get();
        // return ($urls);
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
}
