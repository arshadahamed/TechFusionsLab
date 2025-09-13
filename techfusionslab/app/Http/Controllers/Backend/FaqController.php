<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $faqs = Faq::when($search, function($query, $search) {
                $query->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return view('admin.backend.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.backend.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        Faq::create($request->all());

        $notification = [
            'message' => 'FAQ created successfully.',
            'alert-type' => 'success'
        ];

        // Check which button was clicked
        if ($request->action === 'save_add') {
            return redirect()->route('add.faq')->with($notification);
        }

        return redirect()->route('all.faqs')->with($notification);
    }

    public function show(Faq $faq)
    {
        return view('admin.backend.faq.index', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('admin.backend.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq->update($request->all());

        $notification = array(
            'message' => 'FAQ updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('all.faqs')->with($notification);
    }

    // 👇 Soft delete
    public function destroy(Faq $faq)
    {
        $faq->delete();

        $notification = array(
            'message' => 'FAQ deleted successfully (soft delete).',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faqs')->with($notification);
    }

    // 👇 View Trashed FAQs
    public function trashed()
    {
        $faqs = Faq::onlyTrashed()->paginate(10);
        return view('admin.backend.faq.trashed', compact('faqs'));
    }

    // 👇 Restore Soft Deleted FAQ
    public function restore($id)
    {
        $faq = Faq::onlyTrashed()->where('id', $id)->firstOrFail();
        $faq->restore();

        $notification = array(
            'message' => 'FAQ restored successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faqs')->with($notification);
    }

    // 👇 Permanently Delete
    public function forceDelete($id)
    {
        $faq = Faq::onlyTrashed()->find($id);

        if (!$faq) {
            return redirect()->route('trashed.faqs')
                            ->with(['message' => 'FAQ not found!', 'alert-type' => 'error']);
        }

        $faq->forceDelete();

        return redirect()->route('trashed.faqs')
                        ->with(['message' => 'FAQ permanently deleted.', 'alert-type' => 'success']);
    }
}
