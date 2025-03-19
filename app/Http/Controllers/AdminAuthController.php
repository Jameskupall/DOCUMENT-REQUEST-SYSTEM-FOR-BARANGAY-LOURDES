<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\RequestItem;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function destroyResident($id)
    {
        $resident = User::findOrFail($id);
        $resident->delete();

        return redirect()->route('admin.residents')->with('success', 'Resident deleted successfully.');
    }

    public function editResident($id)
    {
        $resident = User::findOrFail($id);
        return view('admin.edit-resident', compact('resident'));
    }
    public function index()
    {
        $documentCounts = [
            'Brgy Clearance' => RequestItem::where('document_type', 'Brgy Clearance')->count(),
            'Indigency' => RequestItem::where('document_type', 'Indigency')->count(),
            'Residency' => RequestItem::where('document_type', 'Residency')->count(),
            'Brgy Certificate' => RequestItem::where('document_type', 'Brgy Certificate')->count(),
            'Oath Understanding' => RequestItem::where('document_type', 'Oath Understanding')->count(),
        ];

        return view('admin.admin-home', compact('documentCounts'));
    }


    public function documentsAdmin()
    {

        $requests = RequestItem::all();

        return view('admin.documents-admin', compact('requests'));
    }


    public function updateResident(Request $request, $id)
    {
        $resident = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $resident->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.residents')->with('success', 'Resident updated successfully.');
    }


    public function dailyTransactions()
    {
        $transactionData = RequestItem::selectRaw("
            SUM(CASE WHEN document_type = 'Indigency' THEN 1 ELSE 0 END) AS indigency,
            SUM(CASE WHEN document_type = 'Residency' THEN 1 ELSE 0 END) AS residency,
            SUM(CASE WHEN document_type = 'Brgy Clearance' THEN 1 ELSE 0 END) AS clearance,
            SUM(CASE WHEN document_type = 'Oath Undertaking' THEN 1 ELSE 0 END) AS oath,
            SUM(CASE WHEN document_type = 'Brgy Certificate' THEN 1 ELSE 0 END) AS certification
        ")->first();

        return view('admin.daily_transactions', compact('transactionData'));
    }

    public function residents()
    {
        $residents = User::all();

        return view('admin.residents', compact('residents'));
    }
}
