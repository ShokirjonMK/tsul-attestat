<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;

use App\Models\Mk\Department;

use App\Models\Mk\Questionall as MkQuestionall;
use App\Models\Mk\QuestionMain;
use App\User;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\VarDumper\Cloner\Data;

class MkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $department = Department::orderBy('name')->get();
        // return session('dep');
        if (session('data')) {
            return view('mk.pages.main', [
                'dep' => session('dep'),
                'data' => session('data'),
                'department' => $department
            ])->with('mk_uji_bor', 'a');
        }


        if ($request->department_id > 0) {

            $data = [];
            $dep = Department::find($request->department_id);



            if ($dep->special > 0) {

                $count = MkQuestionall::where('department_id', $dep->id)->count();

                if ($dep->parent_id > 0) {
                    $questions_all = MkQuestionall::where('department_id', $dep->parent_id)->where('user_today', 0)->get();
                    if ($questions_all->count() < $dep->special) {
                        $questions_all = MkQuestionall::where('department_id', $dep->parent_id)->get();
                        foreach ($questions_all  as $q_all_one) {
                            $q_all_one->user_today = 0;
                            $q_all_one->update();
                        }
                    }
                    $questions = MkQuestionall::where('department_id', $dep->parent_id)
                        ->where('user_today', 0)
                        // ->inRandomOrder()
                        // ->take($dep->special)
                        ->get();
                } else {
                    $questions_all = MkQuestionall::where('department_id', $dep->id)->where('user_today', 0)->get();
                    // return $questions_all->count();


                    if ($questions_all->count() < $dep->special) {

                        $questions_all = MkQuestionall::where('department_id', $dep->id)->get();
                        foreach ($questions_all  as $q_all_one) {
                            $q_all_one->user_today = 0;
                            $q_all_one->update();
                        }
                    }
                    $questions = MkQuestionall::where('department_id', $dep->id)
                        ->where('user_today', 0)
                        // ->inRandomOrder()
                        // ->take($dep->special)
                        ->get();


                    // return $questions;
                }

                $data['questions'] = $questions->shuffle()->take($dep->special);
                // return [$questions, $count];

                foreach ($data['questions'] as $q_throw_dep) {
                    $q_throw_dep->user_today = 1;
                    $q_throw_dep->update();
                }
            }
            if ($dep->main > 0) {
                $questions_main = QuestionMain::where('f1', 0)
                    // ->inRandomOrder()
                    // ->take($dep->main)
                    ->get();

                // return $questions_main;
                $data['main'] = $questions_main->shuffle()->take($dep->main);

                foreach ($data['main'] as $q_main) {
                    $q_main->f1 = 1;
                    $q_main->update();
                }
            }


            session()->put('data', $data);
            session()->put('dep', $dep);
            session()->put('department', $department);
            // session()->put('mk_uji_bor', "aa");
            // return $data;
            // return session('data');

            return view('mk.pages.main', [
                'dep' => $dep,
                'data' => $data,
                'department' => $department
            ]);
        }

        return view('mk.pages.main', [
            'department' => $department
        ]);
    }

    public function clear(Request $request)
    {
        // session('dep')->flush();

        session()->forget('data');
        session()->forget('mk_uji_bor');
        session()->forget('department');
        session()->forget('dep');
        return redirect()->route('mk');
        // return 1;
    }
}
