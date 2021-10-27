<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class ProductTotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        return ["total_sum" => $product->find($request->quotation_address)->user_quotation()->get()->sum('product_total'), 
                "products" => $product->find($request->quotation_address)->user_quotation()->get()->makeHidden('product_id')->toArray()];
        // 
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        //
        Product::updateOrCreate($product->setTotalPrice($product->validateProduct($request,$product)->all(),$product));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
 
          return ["total_sum" => Product::find($id)->userQuotation()->sum('product_total'), "products" =>  $user->filterProduct(User::find($id)->quotation()->get())];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Product::updateDetails($request,Product::find($id));
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
        Product::find($id)->truncate();
    }
}
