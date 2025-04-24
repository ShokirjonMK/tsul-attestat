<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;

use App\Models\Mk\Department;
use App\Models\Mk\QuestionMain;
use App\Models\Mk\QuestionKazus;
use App\Models\Mk\QuestionLogic;

use App\User;

use Illuminate\Support\Facades\DB;

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

        $department = DB::table('department_new')
            ->distinct()
            ->leftJoin('user_dep', function ($join) {
                $join->on('department_new.id', '=', 'user_dep.department_id');
            })
            ->where('user_dep.user_id', '=', Auth::id())
            ->get();
//return $department;
        // $department = Department::where()->orderBy('name')->get();

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
                $questions_all = QuestionLogic::where('department_id', $dep->id)->where('status', 0)->get();

                if ($questions_all->count() < $dep->special) {

                    $questions_special_all = QuestionLogic::where('department_id', $dep->id)->get();
                    foreach ($questions_special_all as $questions_special_one) {
                        $questions_special_one->status = 0;
                        $questions_special_one->update();
                    }
                }
                $questions = QuestionLogic::where('department_id', $dep->id)
                    ->where('status', 0)
                    // ->inRandomOrder()
                    // ->take($dep->special)
                    ->get();


                $data['question_logic'] = $questions->shuffle()->take($dep->special);

                foreach ($data['question_logic'] as $q_throw_dep) {
                    $q_throw_dep->status = 1;
                    $q_throw_dep->update();
                }
            }
//return $dep;

            if ($dep->additional > 0) {

                $questions_additional = QuestionKazus::where('department_id', $dep->id)->where('status', 0)->get();

                if ($questions_additional->count() < $dep->additional) {

                    $questions_additional_all = QuestionKazus::where('department_id', $dep->id)->get();
                    foreach ($questions_additional_all as $question_additional_one) {
                        $question_additional_one->status = 0;
                        $question_additional_one->update();
                    }
                }

                $questions_additional = QuestionKazus::where('status', 0)
                    ->where('department_id', $dep->id)
                    // ->inRandomOrder()
                    // ->take($dep->question_kazus)
                    ->get();

                // return $questions_question_kazus;
                $data['question_kazus'] = $questions_additional->shuffle()->take($dep->additional);

                foreach ($data['question_kazus'] as $q_question_kazus) {
                    $q_question_kazus->status = 1;
                    $q_question_kazus->update();
                }
            }


            if ($dep->main > 0) {

                $questions_main = QuestionMain::where('status', 0)
                    ->where(function ($query) use ($dep) {
                        if ($dep->id == 7) {
                            $query->where('department_id', $dep->id);
                        } else {
                            $query->where('department_id', NULL);
                        }
                    })
                    ->get();

                if ($questions_main->count() < $dep->main) {

                    $questions_main_all = QuestionMain::where('department_id', $dep->id)->get();
                    foreach ($questions_main_all as $question_main_one) {
                        $question_main_one->status = 0;
                        $question_main_one->update();
                    }
                }

                $questions_main = QuestionMain::where('status', 0)
                    ->where(function ($query) use ($dep) {
                        if ($dep->id == 7) {
                            $query->where('department_id', $dep->id);
                        } else {
                            $query->where('department_id', NULL);
                        }
                    })
                    ->get();

                $data['main'] = $questions_main->shuffle()->take($dep->main);

                foreach ($data['main'] as $q_main) {
                    $q_main->status = 1;
                    $q_main->update();
                }
            }

            session()->put('data', $data);
            session()->put('dep', $dep);
            session()->put('department', $department);

            return view('mk.pages.main', [
                'dep' => $dep,
                'data' => $data,
                'department' => $department
            ]);

        }


//

        return view('mk.pages.main', ['department' => $department]);


    }

    public
    function clear(Request $request)
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
