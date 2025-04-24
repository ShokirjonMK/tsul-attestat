<?php

namespace App\Http\Controllers\X;

use App\Http\Controllers\Controller;
use App\Models\Mk\Department;
use App\Models\Mk\Pass;
use App\Models\Mk\Question;
use App\Models\Mk\UserDep;
use App\Models\Mk\QuestionMain;
use App\User;

use App\Imports\QuestionsImport;
use App\Imports\QuestionMainImport;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class XController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 111) {
            $department = Department::withCount('questions')->get();

//            return $department;
        } else {
            $department = Department::withCount('questions')
                ->distinct()
                ->leftJoin('user_dep', function ($join) {
                    $join->on('department_new.id', '=', 'user_dep.department_id');
                })
                ->where('user_dep.user_id', '=', Auth::id())
//                ->where('department_new.status', 1)
                ->orderBy('department_new.name')
                ->get();
        }


// return $department;
        return view('mk.x.index', [
            'data' => $department,
        ]);
    }

    public function question($id)
    {
        $question = Question::where('department_id', $id)->get();

        $dep = Department::where('id', $id)->first();

        return view('mk.x.question', [
            'data' => $question,
            'department' => $dep,
        ]);

    }


    public function main()
    {
        $question = QuestionMain::all();


        return view('mk.x.main', [
            'data' => $question,
           
        ]);

    }

    public function maindel($id)
    {
        $question = QuestionMain::where('id', $id)->delete();

        return back()->with('success', 'a');

    }


    public function mainupload(Request $request)
    {

        Excel::import(new QuestionMainImport, $request->file('excel_file')->store('temp'));

        if(session()->get("excel_failed")){
            return back()->with('validate', 'a');
        }
        return back()->with('success', 'a');
    }



    public function xquestiondel($id)
    {
        $question = Question::where('id', $id)->delete();

        return back()->with('success', 'a');

    }

    public function xqdepartmentdel($id)
    {
        $question = Department::where('id', $id)->delete();

        return back()->with('success', 'a');

    }

    public function xexcelupload(Request $request)
    {
        session()->put('department_id', $request->department_id);
        Excel::import(new QuestionsImport, $request->file('excel_file')->store('temp'));
        session()->forget('department_id');
        if(session()->get("excel_failed")){
            return back()->with('validate', 'a');
        }
        return back()->with('success', 'a');
    } 

   

    public function test(Request $request)
    {

        return $request;
    }

    public function depstore(Request $request)
    {
        $input = $request->all();
//         return $request;

        $validator = Validator::make($input, [
            'name' => ['required', 'string'],
            'type_count' => ['required'],
            'type' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('validate', 'a');
        }


        $depNew = new Department();

        $depNew->name = $request->name;
        $depNew->main = $request->main;
        $depNew->type_count = $request->type_count;
        $depNew->json_question_count = json_encode((object)$request->type);


        if ($depNew->save()) {
            $newuserDep = new UserDep();
            $newuserDep->user_id = Auth::user()->id;
            $newuserDep->department_id = $depNew->id;
            $newuserDep->save();
        }


        return back();

    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        // return $user;

        return view('mk.pages.user.show', [
            'data' => $user,
        ]);
    }

    public function create()
    {
        // $date = date("Y-m-d");
        $Department = Department::where('status', 1)->get();

        // return $nationalities;
        return view('mk.pages.user.create_', [
            'department' => $Department,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // return $request;

        $validator = Validator::make($input, [
            'last_name' => ['required', 'max:255', 'string'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            // 'phone'             => ['required'],
            // 'department'             => ['required'],
            // 'position'             => ['required'],

            'username' => ['required'],
            'password' => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('validate', 'a');
        }

        $new_user = new User();
        $new_user->last_name = $request->last_name;
        $new_user->first_name = $request->first_name;
        $new_user->middle_name = $request->middle_name;
        $new_user->department_id = $request->department;
        $new_user->position = $request->position;
        $new_user->phone = $request->phone;


        $password = $this->randomPassword_alpha(4) . $this->randomPassword_number(4);
        $tb = 1;
        while ($tb) {
            $ran_un = $this->randomPassword_alpha(3) . date('s') . date('i') . date('d');
            if (!User::where('username', $ran_un)->exists()) {
                $tb = 0;
            }
        }
        $username = $ran_un;


        $new_user->username = $username;
        $new_user->password = Hash::make($password);

        $new_user->role = 555;
        $new_user->status = 1;
        $new_user->save();


        $pass = new Pass();
        $pass->user_id = $new_user->id;
        $pass->username = $new_user->username;
        $pass->password = $password;
        $pass->save();

        return redirect()->route('user.index')->with('success', 'Xodim qo`shildi');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        // return $user;
        $Department = Department::where('status', 1)->get();
        return view('mk.pages.user.edit', [
            'data' => $user,
            'department' => $Department,
        ]);
    }


    public function update(Request $request, $user)
    {
        // return $request;

        $userrrr = User::find($user);

        $userrrr->last_name = $request->last_name;
        $userrrr->first_name = $request->first_name;
        $userrrr->middle_name = $request->middle_name;
        $userrrr->phone = $request->phone;

        $userrrr->department_id = $request->department;
        $userrrr->position = $request->position;
        $userrrr->username = $request->username;
        if ($request->password) {
            $userrrr->password = Hash::make($request->password);
        }

        $userrrr->updated_by = Auth::user()->id;
        if ($userrrr->update()) {
            $pass = Pass::where('user_id', $userrrr->id)->first();

            if (!$pass) {
                $pass = new Pass();

                $pass->user_id = $userrrr->id;
                $pass->username = $userrrr->username;
                if ($request->password) {
                    $pass->password = $request->password;
                }
                $pass->created_by = Auth::user()->id;

                $pass->save();
            } else {


                $pass->user_id = $userrrr->id;
                $pass->username = $userrrr->username;
                if ($request->password) {
                    $pass->password = $request->password;
                }
                $pass->updated_by = Auth::user()->id;

                $pass->update();
            }

            return redirect()->route('user.index')->with('success', 'Ma`lumot o`zgartirildi');
        }
        return $user;
    }

}
