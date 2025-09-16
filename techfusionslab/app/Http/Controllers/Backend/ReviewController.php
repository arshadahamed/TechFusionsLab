<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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
        $path = null;

        if ($request->hasFile('image')) {
            // Resize before saving
            $manager = new ImageManager(new Driver());
            $image   = $manager->read($request->file('image'));
            $image->resize(61, 60);

            $filename = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $path = "reviews/$filename";

            // Save into storage/app/public/reviews
            Storage::disk('public')->put($path, (string) $image->encode());
        }

        Review::create([
            'name'     => $request->name,
            'position' => $request->position,
            'message'  => $request->message,
            'image'    => $path,
        ]);

        return redirect()->route('all.review')->with([
            'message'    => 'Review Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function EditReview($id) {
        $review = Review::findOrFail($id);
        return view('admin.backend.review.edit_review', compact('review'));
    }

    public function UpdateReview(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $path   = $review->image;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($review->image && Storage::disk('public')->exists($review->image)) {
                Storage::disk('public')->delete($review->image);
            }

            // Resize + Save new image
            $manager = new ImageManager(new Driver());
            $image   = $manager->read($request->file('image'));
            $image->resize(61, 60);

            $filename = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $path = "reviews/$filename";

            Storage::disk('public')->put($path, (string) $image->encode());
        }

        $review->update([
            'name'     => $request->name,
            'position' => $request->position,
            'message'  => $request->message,
            'image'    => $path,
        ]);

        return redirect()->route('all.review')->with([
            'message'    => $request->hasFile('image')
                ? 'Review Updated With Image Successfully'
                : 'Review Updated Without Image Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function DeleteReview($id)
    {
        $review = Review::findOrFail($id);

        if ($review->image && Storage::disk('public')->exists($review->image)) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();

        return redirect()->back()->with([
            'message'    => 'Review Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function DeleteReviewAjax($id)
    {
        $review = Review::findOrFail($id);

        if ($review->image && Storage::disk('public')->exists($review->image)) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();

        return response()->json([
            'message'    => 'Review Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }
}
