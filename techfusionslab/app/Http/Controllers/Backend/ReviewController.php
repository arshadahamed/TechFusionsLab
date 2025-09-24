<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function AllReview() {
        $review = Review::orderBy('id', 'asc')->paginate(2);
        return view('admin.backend.review.all_review', compact('review'));
    }

    public function AddReview() {
        return view('admin.backend.review.add_review');
    }

    public function StoreReview(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'message'  => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'position', 'message']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('upload/review', 'public');
        }

        Review::create($data);

        $notification = array(
            'message'    => 'Review Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('reviews.index')->with($notification);
    }

    public function EditReview($id) {
        $review = Review::findOrFail($id);
        return view('admin.backend.review.edit_review', compact('review'));
    }

    public function UpdateReview(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'message'  => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $review = Review::findOrFail($id);
        $data   = $request->only(['name', 'position', 'message']);

        if ($request->hasFile('image')) {
            if ($review->image && Storage::disk('public')->exists($review->image)) {
                Storage::disk('public')->delete($review->image);
            }

            $data['image'] = $request->file('image')->store('upload/review', 'public');
        }

        $review->update($data);

        $notification = array(
            'message'    => $request->hasFile('image')
                ? 'Review Updated With Image Successfully'
                : 'Review Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification);
    }

    public function DeleteReview($id)
    {
        $review = Review::findOrFail($id);

        if ($review->image && Storage::disk('public')->exists($review->image)) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();

        $notification = array(
            'message'    => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteReviewAjax($id)
    {
        $review = Review::findOrFail($id);

        if ($review->image && Storage::disk('public')->exists($review->image)) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();

        $notification = array(
            'message'    => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );
        return response()->json($notification);
    }
}
