<?php

namespace App\Http\Controllers;

use App\Models\UserResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = UserResponse::all();

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
        $userResponse = UserResponse::create([
            'user_id'=> $request->user_id,
            'question_id'=> $request->question_id,
            'choice_id'=> $request->choice_id,
            'is_right'=> $request->is_right
        ]);


        return  response()->json([
            'status' => 'success',
            'data' => $userResponse,
            'message' => 'Successfull',
            'status_code' => Response::HTTP_OK
        ]);    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserResponse  $userResponse
     * @return \Illuminate\Http\Response
     */
    public function show(UserResponse $userResponse)
    {
        if (!empty($userResponse)) {
            return  response()->json([
                'status' => 'success',
                'data' => $userResponse,
                'message' => 'Successfull',
                'status_code' => Response::HTTP_OK
            ]);    
        }else{
            return  response()->json([
                'status' => 'not found',
                'data' => $userResponse,
                'message' => 'UserResponse not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);    
        }
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserResponse  $userResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserResponse $userResponse)
    {
        if(!empty($userResponse)){

            $userResponse->update($request->all());

        }else{

            return  response()->json([
                'status' => 'not found',
                'data' => $userResponse,
                'message' => 'UserResponse not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);  

        }
        
        return  response()->json([
            'status' => 'success',
            'data' => $userResponse,
            'message' => 'Updated',
            'status_code' => Response::HTTP_OK
        ]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserResponse  $userResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserResponse $userResponse)
    {
        if(!empty($userResponse)){
            
            $userResponse->delete();

            return  response()->json([
                'status' => 'success',
                'data' => $userResponse,
                'message' => 'Deleted',
                'status_code' => Response::HTTP_NO_CONTENT
            ]); 

        }else{

            return  response()->json([
                'status' => 'not found',
                'data' => $userResponse,
                'message' => 'UserResponse not found',
                'status_code' => Response::HTTP_NOT_FOUND
            ]);    

        }

    }
}
