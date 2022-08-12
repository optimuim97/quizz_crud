<?php

namespace App\Http\Controllers;

use App\Models\QuestionChoices;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionChoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionChoices = QuestionChoices::all();

        return  response()->json([
            'status' => 'success',
            'data' => $questionChoices,
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
        $questionChoices = QuestionChoices::create([
            'choice_id'=> $request->choice_id,
            'question_id'=> $request->question_id,
            'is_rigtht_choice'=> $request->is_rigtht_choice,
            'choice'=> $request->choice
        ]);


        return  response()->json([
            'status' => 'success',
            'data' => $questionChoices,
            'message' => 'Successfull',
            'status_code' => Response::HTTP_OK
        ]);    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionChoices $questionChoices)
    {
        if (!empty($questionChoices)) {
            return  response()->json([
                'status' => 'success',
                'data' => $questionChoices,
                'message' => 'Successfull',
                'status_code' => Response::HTTP_OK
            ]);    
        }else{
            return  response()->json([
                'status' => 'not found',
                'data' => $questionChoices,
                'message' => 'QuestionChoices not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);    
        }
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionChoices $questionChoices)
    {
        if(!empty($questionChoices)){

            $questionChoices->update($request->all());

        }else{

            return  response()->json([
                'status' => 'not found',
                'data' => $questionChoices,
                'message' => 'QuestionChoices not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);  

        }
        
        return  response()->json([
            'status' => 'success',
            'data' => $questionChoices,
            'message' => 'Updated',
            'status_code' => Response::HTTP_OK
        ]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionChoices $questionChoices)
    {
        if(!empty($questionChoices)){
            
            $questionChoices->delete();

            return  response()->json([
                'status' => 'success',
                'data' => $questionChoices,
                'message' => 'Deleted',
                'status_code' => Response::HTTP_NO_CONTENT
            ]); 

        }else{

            return  response()->json([
                'status' => 'not found',
                'data' => $questionChoices,
                'message' => 'QuestionChoices not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);    

        }

    }
}
