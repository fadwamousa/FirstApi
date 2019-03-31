<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Product;
use App\Review;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }

    public function store(ReviewRequest $request,Product $product)
    {

        $review = Review::create($request->all());
        $product->reviews()->save($review);

        return apiResponse(1,'Good Review',
            [ 'data' => new ReviewResource($review)],201
        );
        
    }

    
    public function show(Request $review)
    {
        //
    }

    public function ProductUserCheck($review){

        if(\Auth::id() !== $review->id){

            return "no review belongs to this user";
            
        }
    }
    
    public function update(ReviewRequest $request,$id)
    {
       // $this->ProductUserCheck($review);
        $review = Review::find($id);
        $review->update($request->all());
        //$product->reviews()->save($review);

        return apiResponse(1,'Updated Review',
            [ 'data' => new ReviewResource($review)],201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->ProductUserCheck($review);
        $review = Review::find($id);
        $review->delete();
        return apiResponse(1,'Deleted-Review');
    }
}
