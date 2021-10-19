<?php


namespace App\Http\Controllers;


use App\Price;
use Illuminate\Http\Request;


class PriceController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //$this->middleware('permission:price-list|price-edit', ['only' => ['index','show']]);
        //$this->middleware('permission:price-edit', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = Price::where('id',1)->first();

        $priceHistorys = Price::latest()->paginate(10);

        return view('admin.prices.index',compact('priceHistorys', 'price'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit(Price $price)
    {
        return view('admin.prices.edit',compact('price'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
         request()->validate([
            'latest_price' => 'required',
            'dealing_date' => 'required',
            'ytd_return' => 'required',
        ]);

        $priceData = Price::find($price->id);

        $price->update($request->all());

        if($request->get('latest_price') != $priceData->latest_price){

            $requestData = $request->all();
            Price::create($requestData);
        }


        return redirect()->route('prices.index')
                        ->with('success','price updated successfully');
    }

}