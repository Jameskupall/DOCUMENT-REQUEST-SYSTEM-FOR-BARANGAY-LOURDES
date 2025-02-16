<?php

namespace App\Http\Controllers;

use App\Models\RequestItem;
use Illuminate\Http\Request;

class RequestItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = RequestItem::all();
        return view('request-views.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('request-views.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'born_on' => 'required|date',
            'street' => 'required|string|max:255',
            'document_purpose' => 'required|string',
            'document_type' => 'required|in:Brgy Clearance,Indigency,Residency,Brgy Certificate,Oath Undertaking',
        ]);

        RequestItem::create($request->all());

        return redirect()->route('requests.index')->with('success', 'Request submitted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestItem $requestItem)
    {
        return view('request-views.edit', compact('requestItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestItem $requestItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'born_on' => 'required|date',
            'street' => 'required|string|max:255',
            'document_purpose' => 'required|string',
            'document_type' => 'required|in:Brgy Clearance,Indigency,Residency,Brgy Certificate,Oath Undertaking',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $requestItem->update($request->all());

        return redirect()->route('requests.index')->with('success', 'Request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestItem $requestItem)
    {
        $requestItem->delete();

        return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
    }
}
