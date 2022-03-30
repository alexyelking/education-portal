<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\VideoBlock;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class VideoBlockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $lesson)
    {
        $teacher = Auth::user();
        if($teacher->can('create', [VideoBlock::class, $lesson])){
            return view('lesson.VideoBlock.create', ['lesson' => $lesson]);
        }else {
            return redirect()
            ->route('lesson.edit', [$lesson->module_id, $lesson->id])
            ->with(['message'=>'Permisson denied']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lesson $lesson)
    {
        $teacher = Auth::user();

        if($teacher->can('store', [VideoBlock::class, $lesson])){

            //dd($request);
            //create new lesson and assign serial_number automaticaly
            $videoBlock = VideoBlock::create($request->input());


            $videoBlock->lesson_id = $lesson->id;
            $videoBlock->position = VideoBlock::where('lesson_id', $lesson->id)->max('position') + 1;//make it be after the last added lesson
            $videoBlock->save();
            return redirect()->route('lesson.edit',[$lesson->module_id, $lesson->id]);
        }else{
            return redirect()
            ->route('lesson.edit', $lesson->module_id, $lesson->id)
            ->with(['message'=>'Permission denied']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson, VideoBlock $videoBlock)
    {
        return view('lesson.VideoBlock.show', ['videoBlock' => $videoBlock, 'lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson, VideoBlock $videoBlock)
    {
        $teacher = Auth::user();
        //dd($lesson, $course, $teacher);
        if($teacher->can('edit', [$videoBlock])){
            return view('lesson.VideoBlock.edit', ['videoBlock' => $videoBlock, 'lesson' => $lesson]);
        }else return redirect()
        ->route('lesson.edit', [$lesson->module_id, $lesson->id])
        ->with(['message' => 'permission denied']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson, VideoBlock $videoBlock)
    {
        $teacher = Auth::user();
        if($teacher->can('update', [$videoBlock])){
            $videoBlock->update($request->input());
            $videoBlock->save();
            return redirect()->route('lesson.edit', [$lesson->module_id, $lesson->id]);
        }
        else return redirect()
        ->route('lesson.edit', [$lesson->module_id, $lesson->id])
        ->with(['message'=>'permission enied']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson, VideoBlock $videoBlock)
    {
        $teacher = Auth::user();
        if($teacher->can('destroy', [$videoBlock])){
            $videoBlock->delete();
            return redirect()->route('lesson.edit', [$lesson->module_id, $lesson->id]);
        } else return redirect()
        ->route('lesson.edit',[$lesson->module_id, $lesson->id])
        ->with(['message'=>'permission denied']);
    }
}
