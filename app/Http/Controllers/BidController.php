<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bids = Bid::orderBy('id', 'DESC')->get();
        return view('ihaleler')->with('bids', $bids);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bid = new Bid;
        $bid->name =  $request->bid_name;
        $bid->date = $request->bid_date;
        $bid->save();
        $bid->addMediaFromRequest('file')->toMediaCollection(); 
        // $bid->getFirstMediaUrl();
    }

    /**
     * Display the specified resource.
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bid $bid)
    {
        if($request->file('file')) {
        $bid->clearMediaCollection();
        $bid->addMediaFromRequest('file')->toMediaCollection(); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        $bid = Bid::find($id);
        $bid->delete();
        return redirect()->back();
    }

}
