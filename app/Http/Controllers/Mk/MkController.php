<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Department;
use App\Models\Mk\Question;
use App\Models\Mk\QuestionMain;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            ->where('department_new.status', 1)
            ->orderBy('department_new.name')
            ->get();
        // return $department;

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
            if(!isset($dep)){
                return view('mk.pages.main', ['department' => $department]);
            }

             if($dep->main >= 1){
                $mainQuestionsAll = QuestionMain::where('status', 0)
                        ->get();

                    if ($mainQuestionsAll->count() < $dep->main) {
                        $mainQuestionsAllL = QuestionMain::all();
                        foreach ($mainQuestionsAllL as $mainQuestionsOne) {
                            $mainQuestionsOne->status = 0;
                            $mainQuestionsOne->update();
                        }
                    }

                    $getting_all_main_question = QuestionMain::where('status', 0)
                        ->get();

                    $getting_main_question = $getting_all_main_question->shuffle()->take($dep->main);

                    foreach ($getting_main_question as $getting_main_question_one) {
                        $getting_main_question_one->status = 1;
                        $getting_main_question_one->update();
                    }

                    $data[] = $getting_main_question;
            }
            

            $json_question = json_decode($dep->json_question_count);

            if ($this->isJson($dep->json_question_count)) {
                foreach ($json_question as $type => $count) {

                    $MKquestion = Question::where('department_id', $dep->id)
                        ->where('type', $type)
                        ->where('status', 0)
                        ->get();


                    if ($MKquestion->count() < $count) {
                        $MKquestion = Question::where('department_id', $dep->id)
                            ->where('type', $type)
                            ->get();
                        foreach ($MKquestion as $MKQ) {
                            $MKQ->status = 0;
                            $MKQ->update();
                        }
                    }

                    $getting_all_question = Question::where('department_id', $dep->id)
                        ->where('type', $type)
                        ->where('status', 0)
                        ->get();

                    $getting_question = $getting_all_question->shuffle()->take($count);

                    foreach ($getting_question as $getting_question_one) {
                        $getting_question_one->status = 1;
                        $getting_question_one->update();
                    }
                    $data[] = $getting_question;

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

    public function isJson($string) {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

}
