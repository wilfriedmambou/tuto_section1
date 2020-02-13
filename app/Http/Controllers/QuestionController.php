<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;

class QuestionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::orderBy('id','desc')->paginate(5);
        return view('questions.index')->with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // valider les donnees du formulaire
        $this->validate($request,[
            'title'=> 'required|max:255',
        ]);
        // process the data and submit it 
        $question = new Question();
        $question->title=$request->title;
        $question->description = $request->description;
        $question->user()->associate(Auth::id());
        // en cas de succes rediriger
        if($question->save()){
            return redirect()->route('questions.show',$question->id);
        }else{
            return redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question= Question::findOrFail($id);
        if($question->user->id !=Auth::id()){
            return abort(403);
        }else {
            return view('questions.edit',compact('question'));
        }
      
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question= Question::findOrFail($id);
        if($question->user->id !=Auth::id()){
            return abort(403);
        }
        $this->validate($request,[
            'title'=> 'required|max:255|min:5',
        ]);
        $question->title=$request->title;
        $question->save();
        return redirect()->route('questions.index');

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
