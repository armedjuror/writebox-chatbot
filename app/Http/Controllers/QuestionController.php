<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

//Models
use App\Models\Question;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Question[]
     */
    public function index()
    {
        return Question::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'=>'required',
            'type'=>'required|max:3',
            'hint'=>'array'
        ]);
        return Question::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Question::find($id);
    }

    /**
     * Search for the specified resource.
     *
     * @param string $question
     * @return Response
     */
    public function search(string $question)
    {
        return Question::where('question', 'like', '%'.$question.'%')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'type'=>'max:3',
            'hint'=>'array',
            'rule' => 'array'
        ]);
        $question = Question::find($id);
        return $question->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id): int
    {
        return Question::destroy($id);
    }
}
