<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClassroomInvite;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:teacher')->except('update','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notIncludedUsers = User::get();

        $notIncludedCourses = Course::where('created_by', Auth::user()->id)->get();

        return view('classroom.create', [
            'users' => $notIncludedUsers,
            'courses' => $notIncludedCourses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = Auth::user();
        $classroom = Classroom::create($request->input());
        $classroom->slug = Str::slug($classroom->name);
        $classroom->teacher_id = $teacher->id;

        if ($request->input('includedCourses')) {
            $classroom->courses()->attach($request->input('includedCourses'));
        }

        /*if($request->input('users')){
            $classroom->users()->attach($request->input('users'));
        }*/

        $classroom->save();
        return redirect()->route('teacher.dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        $usersList = $classroom->users()->get();
        $coursesList = $classroom->courses()->get();
        return view('classroom.show', ['classroom' => $classroom, 'users' => $usersList, 'courses' => $coursesList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $teacher = Auth::user();


        if ($teacher->can('edit', $classroom)) {
            $includedUsers = $classroom->users()->get();

            $includedUsersID = $classroom->users()->pluck('users.id')->toArray();
            $invitedUsersID = ClassroomInvite::where('classroom_id', $classroom->id)->pluck('user_id')->toArray();


            $notIncludedUsers = User::get()->except($includedUsersID)->except($invitedUsersID);
            //dd($invitedUsersID, $notIncludedUsers);


            $includedCourses = $classroom->courses()->get();

            $includedCoursesID = $classroom->courses()->pluck('courses.id')->toArray();
            $notIncludedCourses = Course::where('created_by', Auth::user()->id)->get()->except($includedCoursesID);

            //some users may be included to this course, but not being deleted ivite message.
            //So we need to see this users, to know is invite message was made correctly
            //$invitedButNotIncludedUsers = ClassroomInvite::where('classroom_id', $classroom->id)->where(->get()->except($includedUsersID);

            $invitedUsers = $classroom->invitedUsers()->get()->except($includedUsersID);

            //dd($invitedUsers);

            return view('classroom.edit', [
                'classroom' => $classroom,
                'includedUsers' => $includedUsers,
                'notIncludedUsers' => $notIncludedUsers,
                'includedCourses' => $includedCourses,
                'notIncludedCourses' => $notIncludedCourses,
                'invitedUsers' => $invitedUsers,
            ]);


        } else return redirect()
            ->route('teacher.dashboard')
            ->with(['message' => 'permission denied']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //$teacher = Auth::user();
        //if($teacher->can('update', $classroom)){

        //dd($request->input('newIncludedUsers'));
        //dd($request->input('newIncludedCourses'), $request->input('excludedUsers'));

        //
        if ($request->input('newIncludedCourses')) {
            $classroom->courses()->attach($request->input('newIncludedCourses'));
        }

        if ($request->input('excludedCourses')) {
            $classroom->courses()->detach($request->input('excludedCourses'));
        }

        if ($request->input('newIncludedUsers')) {
            $includedUsersID = $classroom->users()->pluck('users.id')->toArray();//get already included users
            $newIds = array_diff($request->input('newIncludedUsers'), $includedUsersID);//check if this user is already included
            $classroom->users()->attach($newIds);//if he is already here $newIds will be empty
        }

        if ($request->input('excludedUsers')) {
            $classroom->users()->detach($request->input('excludedUsers'));
        }

        $classroom->update($request->except('slug'));


        $classroom->save();
        return redirect()->back();
        /// }else{
        //return redirect()->route('classroom.show', $classroom)->with(['message'=>'Permission denied']);
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classroom $classroom
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Classroom $classroom)
    {
        $teacher = Auth::user();
        if ($teacher->can('destroy', $classroom)) {
            $classroom->delete();
            return redirect()->route('teacher.dashboard');
        } else return redirect()->route('teacher.dashboard')->with(['message' => 'Permission denied']);
    }
}
