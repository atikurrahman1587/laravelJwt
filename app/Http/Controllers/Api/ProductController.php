<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        try {
            return sendSuccessResponse(Product::query()->orderByDesc('id')->get(), 'Data Retrieve Successfully!');
        }catch (QueryException $exception){
           return sendErrorResponse($exception->getMessage(), 'Database connection error', 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()){
            return sendErrorResponse($validator->errors(), 'Client side error', 422);
        }
        try {
            return sendSuccessResponse(Product::newProduct($request), 'Product Create Successfully!', 201);
        }catch (QueryException $exception){
            return sendErrorResponse($exception->getMessage(), 'Something went wrong!', 500);
        }
    }
}
