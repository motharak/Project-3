<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    public function index()
    {
        //
        $trans = Transaction::all();
        return view('transactionview.index',compact('trans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('transactionview.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'user_id' => 'required|numeric',
            'book_id' => 'required|numeric',
            'transaction_type' => 'required|in:Borrow,Return',
            'transaction_date' => 'required|date',
            'returned_date' => 'nullable|date', // Make it nullable if it's a borrow transaction
            'due_date' => 'required|date',
            // Add more validation rules as needed for other fields
        ]);
        Transaction::create($request->all());

        return redirect()->route('tran.index')->with('msg','Make Transaction sussess');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tran = Transaction::find($id);
        return view('transactionview.detail',compact('tran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $transaction=Transaction::find($id);
        return view('transactionview.edit',compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'book_id' => 'required|numeric',
            'transaction_type' => 'required|in:Borrow,Return',
            'transaction_date' => 'required|date',
            'due_date' => 'required|date',
            // Add more validation rules as needed for other fields
        ]);
    
        // Find the transaction by ID
        $transaction = Transaction::find($id);
    
        // Check if the transaction exists
        if (!$transaction) {
            return redirect()->route('tran.index')->with('error', 'Transaction not found');
        }
    
        // Update the transaction with the new data
        $transaction->update($request->all());
    
        // Redirect back to the index page with a success message
        return redirect()->route('tran.index')->with('msg', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaction::find($id)->delete();
        return back()->with('msg','Delete Genre Successfully!');
    }
}
