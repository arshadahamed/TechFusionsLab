<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function show($id, $slug)
    {
        $blog = Blog::findOrFail($id);
        return view('home.blog.blog_detail_page', compact('blog'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::orderBy('id', 'asc')->paginate(10);
        return view('admin.backend.blog.all_blogs', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.blog.add_blog');
    }

    /**
     * Store a newly created blog
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author_name' => 'nullable|string|max:255',
            'author_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Main Image
        $mainImagePath = $request->file('main_image')->store('blogs', 'public');

        // Author Image
        $authorImagePath = $request->hasFile('author_image')
            ? $request->file('author_image')->store('authors', 'public')
            : null;

        Blog::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'main_image' => $mainImagePath,
            'author_name' => $request->author_name,
            'author_image' => $authorImagePath,
            'published_at' => $request->published_at ?: null,
            'tags' => $request->tags,
            'category' => $request->category,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('blogs.index')->with([
            'message' => 'Blog Created Successfully!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Update an existing blog
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=916,height=505',
            'author_name' => 'nullable|string|max:255',
            'author_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Handle Main Image
        if ($request->hasFile('main_image')) {
            if ($blog->main_image && file_exists(public_path('storage/' . $blog->main_image))) {
                unlink(public_path('storage/' . $blog->main_image));
            }
            $mainImagePath = $request->file('main_image')->store('blogs', 'public');
            $blog->main_image = $mainImagePath;
        }

        // Handle Author Image
        if ($request->hasFile('author_image')) {
            if ($blog->author_image && file_exists(public_path('storage/' . $blog->author_image))) {
                unlink(public_path('storage/' . $blog->author_image));
            }
            $authorImagePath = $request->file('author_image')->store('authors', 'public');
            $blog->author_image = $authorImagePath;
        }

        // Update other fields
        $blog->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'author_name' => $request->author_name,
            'published_at' => $request->published_at ?: null,
            'tags' => $request->tags,
            'category' => $request->category,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('blogs.index')->with([
            'message' => 'Blog Updated Successfully!',
            'alert-type' => 'success'
        ]);
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.backend.blog.edit_blog', compact('blog'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        // 📌 Delete Main Image
        if ($blog->main_image && file_exists(base_path('public/' . $blog->main_image))) {
            unlink(base_path('public/' . $blog->main_image));
        }

        // 📌 Delete Author Image
        if ($blog->author_image && file_exists(base_path('public/' . $blog->author_image))) {
            unlink(base_path('public/' . $blog->author_image));
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with([
            'message'    => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }
}
