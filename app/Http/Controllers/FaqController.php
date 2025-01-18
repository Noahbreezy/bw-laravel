<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Http\Requests\UpdateFaqRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FaqController extends Controller
{
    use AuthorizesRequests;

    // Display FAQs for users and admins
    public function index()
    {
        $faqs = Faq::all();
        $isAdmin = auth()->check() && auth()->user()->isAdmin(); // Assume isAdmin is defined on the User model

        return view('faqs.index', compact('faqs', 'isAdmin'));
    }

    // Store a new FAQ (admin only)
    public function store(Request $request)
    {
        $this->authorize('admin'); // Ensure the user is an admin

        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->only('question', 'answer'));

        return redirect()->route('faqs.index')->with('success', 'FAQ added successfully.');
    }

    // Update an existing FAQ (admin only)
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->only('question', 'answer'));

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    // Delete an FAQ (admin only)
    public function destroy(Faq $faq)
    {
        $this->authorize('admin'); // Ensure the user is an admin

        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
