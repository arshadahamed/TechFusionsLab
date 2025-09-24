<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function HeroSection()
    {
        $hero = Hero::first();
        return view('admin.backend.hero.get_hero_section', compact('hero'));
    }

    public function editHero()
    {
        $hero = Hero::first();

        // If no hero exists, create a default one
        if (!$hero) {
            $hero = Hero::create([
                'title'       => '',
                'title_two'   => '',
                'highlight'   => '',
                'description' => '',
                'button_text' => '',
                'button_link' => '',
                'main_image'  => '',
                'bg_image'    => '',
                'map_image'   => '',
            ]);
        }

        return view('admin.backend.hero.get_hero_section', compact('hero'));
    }

    public function updateHero(Request $request, $id)
    {
                $hero = Hero::findOrFail($id);

        $data = $request->only([
            'title',
            'title_two',
            'highlight',
            'description',
            'button_text',
            'button_link',
        ]);

        // Handle image uploads
        foreach (['main_image', 'bg_image', 'map_image'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old file if exists
                if ($hero->$imageField && Storage::disk('public')->exists($hero->$imageField)) {
                    Storage::disk('public')->delete($hero->$imageField);
                }
                // Store new file
                $data[$imageField] = $request->file($imageField)->store('upload/hero', 'public');
            }
        }

        $hero->update($data);

        $notification = array(
            'message'    => 'Hero Section Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()
            ->route('edit.hero')
            ->with($notification);
    }
}
