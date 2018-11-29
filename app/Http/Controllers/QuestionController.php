<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;


class QuestionController extends Controller
{

	public function __construct(){
		$this->middleware('auth')->except(['index','view']); //control authenticaion
	}

    public function index($type="latest")
    {
    	
        if($type=="answer"){
            $questions=Question::withCount('answers')->orderBy('answers_count','desc')->paginate(5);
        }
        elseif($type=="vote"){
            $questions=Question::orderBy('vote','desc')->paginate(5);
        }
        else{
            $questions=Question::orderBy('id','desc')->paginate(5);
        }

    	return view('questions/index',[
    			'questions'=>$questions
    		]);
    }

    public function view($id)
    {
        $question=Question::find($id);
        return view('questions/view',[
                'question'=>$question
            ]);
    }

    public function add()
    {
        return view('questions/add');
    }

    public function create()
    {

        //validation algorithm
      /* $validator=validator(request()->all(),[
            'subject'=>'required',
            'detail'=>'required'  
        ]);

        if($validator->fails()){
            return redirect('questions/add')->withErrors($validator); //return error message
        }
    */
    
        $question=new Question();
        $question->subject=request()->subject;
        $question->detail=request()->detail;
        $question->save();

        return redirect('questions');
    }

    public function addAnswer(){
        $answer=new Answer();

        $answer->detail=request()->detail;
        $answer->question_id=request()->question_id;
        $answer->save();

        return back();
    }

    public function up($id){
        $question=Question::find($id);
        $question->vote=$question->vote+1;
        $question->save();

        return back();
    }

    public function down($id){
        $question=Question::find($id);
        $question->vote=$question->vote-1;
        $question->save();

        return back();
    }


}
