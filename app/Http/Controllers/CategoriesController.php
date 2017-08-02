<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        try {
//            if (!$user = JWTAuth::parseToken()->authenticate()) {
//                return response()->json([
//                    'error' => 'Invalid credentials'
//                ], 401);
//            }
//        } catch(JWTException $e) {
//            return response()->json([
//                'error' => 'Missing token'
//            ], 500);
//        }

        return Category::orderBy('id', 'desc')->get();
    }
    
    public function setData() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => -1, 'msg' => $validator->errors()];
        }

        $result = Category::create($request->all());
        return ['status' => 0, 'id' => $result->id];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return ['status' => -1, 'msg' => $validator->errors()];
        }

        $category->update($request->all());
        return ['status' => 0, 'id' => $category->id];
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return ['status' => 0];
    }
}
