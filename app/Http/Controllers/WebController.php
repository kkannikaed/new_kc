<?php

namespace App\Http\Controllers;

use App\Models\NameTable;
use App\Models\TestBody;
use App\Models\TestOperate;
use App\Models\TestTheory;
use Illuminate\Http\Request;
use Log;

class WebController extends Controller
{
    //

    public function home()
    {

        return view('home');

    }

    public function welcome()
    {

        return view('welcome');

    }

    public function drive()
    {
        Log::debug('test0');

        // $a = DB::select('SELECT * FROM test_drive_detail');
        // Log::debug($a);

        // $id = ['a' => $a[0]->id];
        return view('testdrive');

    }

    public function body(Request $req)
    {
        $id = $req->id;

        return view('testbody', compact('id'));

    }

    public function operate(Request $req)
    {
        $id = $req->id;
        return view('testoperate', compact('id'));

    }

    public function theory(Request $req)
    {
        $id = $req->id;
        return view('testtheory', compact('id'));

    }

    public function option(Request $req)
    {
        $id = $req->id;
        $name = NameTable::where('id', '=', $id)->first();
        $test_body = TestBody::where('user_id', '=', $name->id)->first();
        $test_theory = TestTheory::where('user_id', '=', $name->id)->first();
        $test_operate = TestOperate::where('user_id', '=', $name->id)->first();

        // return $test_body;
        return view('list_option', compact('name', 'test_body', 'test_theory', 'test_operate'));

    }

    public function saveName(Request $req)
    {

        //add data database
        $name = new NameTable;
        $name->fname = $req->fname;
        $name->lname = $req->lname;
        $name->updated_at = $req->updated_at;
        $name->save();

        // return view('list_option', compact('name'));
        return redirect()->route('option', ['id' => $name->id]);

    }

    public function saveTestBody(Request $req)
    {

        $test_body = new TestBody;
        $test_body->eyecolor = $req->eyecolor;
        $test_body->longsighted = $req->longsighted;
        $test_body->astigmatism = $req->astigmatism;
        $test_body->response = $req->response;
        $test_body->user_id = $req->user_id;
        $test_body->save();

        $id = $req->user_id;

        return redirect()->route('option', compact('test_body', 'id'));
    }

    public function saveTestTheory(Request $req)
    {

        $test_theory = new TestTheory;
        $test_theory->traffic_sign = $req->traffic_sign;
        $test_theory->traffic_lines = $req->traffic_lines;
        $test_theory->giving_way = $req->giving_way;
        $test_theory->user_id = $req->user_id;
        $test_theory->save();

        $id = $req->user_id;

        return redirect()->route('option', compact('test_theory', 'id'));
    }

    public function saveTestOperate(Request $req)
    {

        $test_operate = new TestOperate;
        $test_operate->check = $req->check;
        $test_operate->user_id = $req->user_id;
        $test_operate->save();

        $id = $req->user_id;

        return redirect()->route('option', compact('test_operate', 'id'));
    }

}
