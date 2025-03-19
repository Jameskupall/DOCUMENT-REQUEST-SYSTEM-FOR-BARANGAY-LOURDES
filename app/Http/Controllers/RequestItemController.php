<?php

namespace App\Http\Controllers;

use App\Models\RequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DocumentApprovedNotification;


class RequestItemController extends Controller
{

    public function index()
    {
        $requests = RequestItem::all();
        return view('request-views.index', compact('requests'));
    }


    public function create()
    {
        return view('request-views.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'born_on' => 'required|date',
            'street' => 'required|string|max:255',
            'document_purpose' => 'required|string',
            'document_type' => 'required|in:Brgy Clearance,Indigency,Residency,Brgy Certificate,Oath Undertaking',
        ]);

        RequestItem::create([
            'user_id' => auth('web')->id(),
            'name' => $request->name,
            'born_on' => $request->born_on,
            'street' => $request->street,
            'document_purpose' => $request->document_purpose,
            'document_type' => $request->document_type,
            'status' => 'pending',
        ]);

        return redirect()->route('requests.index')->with('success', 'Request submitted successfully.');
    }

    public function updateStatus(Request $request, RequestItem $requestItem, $status)
    {
        if (!in_array($status, ['approved', 'rejected'])) {
            return redirect()->back()->with('error', 'Invalid status.');
        }

        $requestItem->update(['status' => $status]);

        if ($requestItem->user) {
            if ($status === 'approved') {
                $requestItem->user->notify(new DocumentApprovedNotification($requestItem));
            } elseif ($status === 'rejected') {
                $requestItem->user->notify(new DocumentRejectedNotification($requestItem));
            }
        }

        return redirect()->back()->with('success', "Request has been {$status} successfully!");
    }


    public function edit(RequestItem $requestItem)
    {
        return view('request-views.edit', compact('requestItem'));
    }


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


    public function destroy(RequestItem $requestItem)
    {
        $requestItem->delete();

        return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
    }
}
