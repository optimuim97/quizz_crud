<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return  response()->json([
            'status' => 'success',
            'data' => $questions,
            'message' => 'Successfull',
            'status_code' => Response::HTTP_OK
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create([
            'question'=> $request->question,
            'is_active'=> $request->is_active
        ]);


        return  response()->json([
            'status' => 'success',
            'data' => $question,
            'message' => 'Successfull',
            'status_code' => Response::HTTP_OK
        ]);    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        if (!empty($question)) {
            return  response()->json([
                'status' => 'success',
                'data' => $question,
                'message' => 'Successfull',
                'status_code' => Response::HTTP_OK
            ]);    
        }else{
            return  response()->json([
                'status' => 'not found',
                'data' => $question,
                'message' => 'Question not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);    
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        if(!empty($question)){

            $question->update($request->all());

        }else{

            return  response()->json([
                'status' => 'not found',
                'data' => $question,
                'message' => 'Question not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);  

        }
        
        return  response()->json([
            'status' => 'success',
            'data' => $question,
            'message' => 'Updated',
            'status_code' => Response::HTTP_OK
        ]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if(!empty($question)){

            $question->delete();

            return  response()->json([
                'status' => 'success',
                'data' => $question,
                'message' => 'Deleted',
                'status_code' => Response::HTTP_NO_CONTENT
            ]); 

        }else{

            return  response()->json([
                'status' => 'not found',
                'data' => $question,
                'message' => 'Question not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);    

        }

    }
}
