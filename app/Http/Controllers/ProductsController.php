<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ProductResource;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $product = Product::all();
            return response(['product' => ProductResource::collection($product),
                'message' => 'Successful'], 200);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('isAdmin') || Gate::allows('seller')) {
//            echo $request->user()->id;die();
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'price' => 'required|max:255'
            ]);

            if ($validator->fails()) {
                return response(['error' => $validator->errors(),
                    'Validation Error']);
            }
            $data = $validator->getData();
            $data['store_id'] = $request->user()->id;
            $product = Product::create($data);

            return response(['product' => new ProductResource($product),
                'message' => 'Success'], 200);
        }
    }


}
