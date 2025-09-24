<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function show($id, $slug)
    {
        $blog = Blog::findOrFail($id);
        return view('home.blog.blog_detail_page', compact('blog'));
    }

    public function index()
    {
        $blog = Blog::orderBy('id', 'asc')->paginate(10);
        return view('admin.backend.blog.all_blogs', compact('blog'));
    }

    public function create()
    {
        return view('admin.backend.blog.add_blog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'subtitle'       => 'nullable|string|max:255',
            'content'        => 'nullable|string',
            'main_image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author_name'    => 'nullable|string|max:255',
            'author_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'published_at'   => 'nullable|date',
            'tags'           => 'nullable|string|max:255',
            'category'       => 'nullable|string|max:255',
            'meta_title'     => 'nullable|string|max:255',
            'meta_description'=> 'nullable|string',
            'meta_keywords'  => 'nullable|string|max:255',
        ]);

        Blog::create([
            'title'           => $request->title,
            'subtitle'        => $request->subtitle,
            'content'         => $request->content,
            'main_image'      => $this->uploadFile($request, 'main_image'),
            'author_name'     => $request->author_name,
            'author_image'    => $this->uploadFile($request, 'author_image'),
            'published_at'    => $request->published_at ?: null,
            'tags'            => $request->tags,
            'category'        => $request->category,
            'is_featured'     => $request->has('is_featured') ? 1 : 0,
            'meta_title'      => $request->meta_title,
            'meta_description'=> $request->meta_description,
            'meta_keywords'   => $request->meta_keywords,
        ]);

        return redirect()->route('blogs.index')->with([
            'message' => 'Blog Created Successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'          => 'required|string|max:255',
            'subtitle'       => 'nullable|string|max:255',
            'content'        => 'nullable|string',
            'main_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=916,height=505',
            'author_name'    => 'nullable|string|max:255',
            'author_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'published_at'   => 'nullable|date',
            'tags'           => 'nullable|string|max:255',
            'category'       => 'nullable|string|max:255',
            'meta_title'     => 'nullable|string|max:255',
            'meta_description'=> 'nullable|string',
            'meta_keywords'  => 'nullable|string|max:255',
        ]);

        $blog->update([
            'title'           => $request->title,
            'subtitle'        => $request->subtitle,
            'content'         => $request->content,
            'main_image'      => $this->uploadFile($request, 'main_image', $blog->main_image),
            'author_name'     => $request->author_name,
            'author_image'    => $this->uploadFile($request, 'author_image', $blog->author_image),
            'published_at'    => $request->published_at ?: null,
            'tags'            => $request->tags,
            'category'        => $request->category,
            'is_featured'     => $request->has('is_featured') ? 1 : 0,
            'meta_title'      => $request->meta_title,
            'meta_description'=> $request->meta_description,
            'meta_keywords'   => $request->meta_keywords,
        ]);

        return redirect()->route('blogs.index')->with([
            'message' => 'Blog Updated Successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.backend.blog.edit_blog', compact('blog'));
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        foreach (['main_image', 'author_image'] as $field) {
            if ($blog->$field && Storage::disk('public')->exists($blog->$field)) {
                Storage::disk('public')->delete($blog->$field);
            }
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with([
            'message'    => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }

    // ✅ Helper for upload + delete old file
    private function uploadFile(Request $request, string $field, ?string $oldFile = null): ?string
    {
        if ($request->hasFile($field)) {
            if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }
            // store in "storage/app/public/blogs"
            return $request->file($field)->store('blogs', 'public');
        }

        return $oldFile;
    }
}
