<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trans = Transaction::all();

        return view('Search',compact("trans"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showSearchForm()
    {
        return view('transaction.search');
    }

    /**
     * Handle the search request and display the results.
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'transaction_id' => 'required|numeric',
        ]);

        $transaction = Transaction::find($request->input('transaction_id'));

        return view('transaction.search', ['transaction' => $transaction]);
    }

}
