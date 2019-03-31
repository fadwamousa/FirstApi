<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
class ProductController extends Controller
{


    public function __construct(){

        return $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return  Product::all();
        return Productcollection::collection(Product::paginate(10));

        //return new ProductResource(Product::all());
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function store(ProductRequest $request)
    {

        $product = Product::create($request->all());
        return apiResponse(1,'Good Data',['data' => new ProductResource($product)],201);
       // return response()->json(['data' => new ProductResource($product)],201);
       // return response()->json(['data' => new ProductResource($product)],Response::HTTP_CREATED);
    }

    

    public function update(ProductRequest $request,Product $product)
    {
       $product->update($request->all());
       return apiResponse(1,'Updated',['data' => new ProductResource($product)],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return apiResponse(1,'Deleted-Data');

    }
}
