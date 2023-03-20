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

        $names = NameTable::with('TestBody', 'TestOperate', 'TestTheory')->has('TestBody')->has('TestOperate')->has('TestTheory')->get();
        // return $names;

        // return view('welcome');
        return view('welcome', compact('names'));

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
        $test_body = TestBody::where('user_id', '=', $id)->first();

        return view('testbody', compact('id', 'test_body'));

    }

    public function operate(Request $req)
    {
        $id = $req->id;
        $test_operate = TestOperate::where('user_id', '=', $id)->first();
        return view('testoperate', compact('id', 'test_operate'));

    }

    public function theory(Request $req)
    {
        $id = $req->id;
        $test_theory = TestTheory::where('user_id', '=', $id)->first();
        return view('testtheory', compact('id', 'test_theory'));

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
        // return $req->user_id;
        $test_body = TestBody::where('user_id', '=', $req->user_id)->first();
        if ($test_body) {
            $test_body->eyecolor = $req->eyecolor;
            $test_body->longsighted = $req->longsighted;
            $test_body->astigmatism = $req->astigmatism;
            $test_body->response = $req->response;
            $test_body->save();
        } else {
            // return 'not have';
            $test_body = new TestBody;
            $test_body->eyecolor = $req->eyecolor;
            $test_body->longsighted = $req->longsighted;
            $test_body->astigmatism = $req->astigmatism;
            $test_body->response = $req->response;
            $test_body->user_id = $req->user_id;
            $test_body->save();
        }

        $id = $req->user_id;

        return redirect()->route('option', compact('test_body', 'id'));
    }

    public function saveTestTheory(Request $req)
    {

        $test_theory = TestTheory::where('user_id', '=', $req->user_id)->first();

        if ($test_theory) {
            $test_theory->traffic_sign = $req->traffic_sign;
            $test_theory->traffic_lines = $req->traffic_lines;
            $test_theory->giving_way = $req->giving_way;
            $test_theory->user_id = $req->user_id;
            $test_theory->save();
        } else {
            // return 'not have';
            $test_theory = new TestTheory;
            $test_theory->traffic_sign = $req->traffic_sign;
            $test_theory->traffic_lines = $req->traffic_lines;
            $test_theory->giving_way = $req->giving_way;
            $test_theory->user_id = $req->user_id;
            $test_theory->save();
        }

        $id = $req->user_id;

        return redirect()->route('option', compact('test_theory', 'id'));

    }

    public function saveTestOperate(Request $req)
    {

        $test_operate = TestOperate::where('user_id', '=', $req->user_id)->first();
        if ($test_operate) {
            $test_operate->check = $req->check;
            $test_operate->user_id = $req->user_id;
            $test_operate->save();
        } else {
            // return 'not have';
            $test_operate = new TestOperate;
            $test_operate->check = $req->check;
            $test_operate->user_id = $req->user_id;
            $test_operate->save();
        }

        $id = $req->user_id;

        return redirect()->route('option', compact('test_operate', 'id'));
    }

    // public function saveData(Request $req)
    // {

    //     $data->fname = $req->fname;
    //     $data->lname = $req->lname;
    //     $name->updated_at = $req->updated_at;
    //     $name->save();

    //     return redirect()->route('welcome', ['id' => $data->id]);
    // }

    public function deleteBody($id)
    {
        $test_body = TestBody::where('id', '=', $id)->first();
        $id = $test_body->user_id;
        $test_body->delete();

        return redirect()->route('option', compact('id'));

    }

    public function deleteTheory($id)
    {
        $test_theory = TestTheory::where('id', '=', $id)->first();
        $id = $test_theory->user_id;
        $test_theory->delete();

        return redirect()->route('option', compact('id'));

    }

    public function deleteOperate($id)
    {
        $test_operate = TestOperate::where('id', '=', $id)->first();
        $id = $test_operate->user_id;
        $test_operate->delete();

        return redirect()->route('option', compact('id'));

    }

    // public function dataTable()
    // {

    //     $names = NameTable::with('TestBody', 'TestOperate', 'TestTheory')->has('TestBody')->has('TestOperate')->has('TestTheory')->get();
    //     // return $names;

    //     // return view('welcome');
    //     return view('datatable', compact('names'));

    // }

    // public function test()
    // {

    //     return view('test');

    // }

    public function deleteUser($id)
    {
        // return 5555;
        $name = NameTable::where('id', '=', $id)->first();
        $name->delete();
        return redirect()->route('welcome', compact('id'));

    }
}
