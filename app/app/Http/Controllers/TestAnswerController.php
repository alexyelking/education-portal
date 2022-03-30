<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestAnswer;
use App\Models\TaskBlock;
use App\Models\TestQuestion;
use Illuminate\Support\Facades\Aut;

class TestAnswerController extends Controller
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
    public function create(TestQuestion $testQuestion)
    {
        //
        return view('lesson.TaskBlock.TestQuestion.TestAnswer.create', ['testQuestion' => $testQuestion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TestQuestion $testQuestion)
    {
        //
        $testAnswer = TestAnswer::create($request->input());
        $testAnswer->test_question_id = $testQuestion->id;
        $testAnswer->save();
        return redirect()->route('testQuestion.edit', [$testQuestion->task_block_id, $testQuestion->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( TestQuestion $testQuestion, TestAnswer $testAnswer)
    {
        //
        return view('lesson.TaskBlock.TestQuestion.TestAnswer.show', ['testQuestion' => $testQuestion, 'testAnswer' => $testAnswer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TestQuestion $testQuestion, TestAnswer $testAnswer)
    {
        //
        return view('lesson.TaskBlock.TestQuestion.TestAnswer.edit', ['testQuestion' => $testQuestion, 'testAnswer' => $testAnswer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestQuestion $testQuestion, TestAnswer $testAnswer)
    {
        //
        $testAnswer->update($request->input());
        $testAnswer->save();
        return redirect()->route('testQuestion.edit', [$testQuestion->task_block_id, $testQuestion->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestQuestion $testQuestion, TestAnswer $testAnswer)
    {
        //
        $testAnswer->delete();
        return redirect()->route('testQuestion.edit', [$testQuestion->task_block_id, $testQuestion->id]);
    }
}
