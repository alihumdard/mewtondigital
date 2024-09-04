<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Validator;


class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::all();
        return view('admin.pages.inquiries', compact('inquiries'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:700',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Inquiry::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'created_by' => Auth::id() ?? 'Guest',
        ]);

        return redirect()->back()->with('success', 'Inquiry submitted successfully!');
    }

    public function destroy(Request $request)
    {
        if ($request->id):
            $inquiry = Inquiry::findOrFail($request->id);
            $inquiry->delete();
        endif;
        return redirect()->back()->with('success', 'Inquiry deleted successfully!');
    }
}
