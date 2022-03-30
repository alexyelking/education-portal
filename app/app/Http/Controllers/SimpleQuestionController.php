<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpleQuestion;
use App\Models\TaskBlock;
use Illuminate\Support\Facades\Aut;

class SimpleQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');//->except('show');
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
    public function create(TaskBlock $taskBlock)
    {
        //
        return view('lesson.TaskBlock.SimpleQuestion.create', ['taskBlock' => $taskBlock]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TaskBlock $taskBlock)
    {
        //

        $simpleQuestion = SimpleQuestion::create($request->input());
        $simpleQuestion->task_block_id = $taskBlock->id;
        $simpleQuestion->save();
        return redirect()->route('taskBlock.edit', [$taskBlock->lesson_id, $taskBlock->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TaskBlock $taskBlock, SimpleQuestion $simpleQuestion)
    {
        return view('lesson.TaskBlock.SimpleQuestion.show',[
            'taskBlock' => $taskBlock,
            'simpleQuestion' =>$simpleQuestion,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskBlock $taskBlock, SimpleQuestion $simpleQuestion)
    {
        //
        return view('lesson.TaskBlock.SimpleQuestion.edit', [
            'taskBlock' =>$taskBlock,
            'simpleQuestion' => $simpleQuestion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskBlock $taskBlock, SimpleQuestion $simpleQuestion)
    {
        //
        $simpleQuestion->update($request->input());
        $simpleQuestion->save();
        return redirect()->route('taskBlock.edit', [$taskBlock->lesson_id, $taskBlock->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskBlock $taskBlock, SimpleQuestion $simpleQuestion)
    {
        //
        $simpleQuestion->delete();
        return redirect()->route('taskBlock.edit', [$taskBlock->lesson_id, $taskBlock->id]);
    }

}
