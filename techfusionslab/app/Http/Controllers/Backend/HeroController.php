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
                'title' => '',
                'title_two' => '',
                'highlight' => '',
                'description' => '',
                'button_text' => '',
                'button_link' => '',
                'main_image' => '',
                'bg_image' => '',
                'map_image' => '',
            ]);
        }

        return view('admin.backend.hero.get_hero_section', compact('hero'));
    }

    public function updateHero(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);

        $data = $request->only([
            'title', 'title_two', 'highlight', 'description', 'button_text', 'button_link'
        ]);

        // Handle image uploads
        if ($request->hasFile('main_image')) {
            // Delete old image if exists
            if ($hero->main_image && Storage::disk('public')->exists($hero->main_image)) {
                Storage::disk('public')->delete($hero->main_image);
            }
            $data['main_image'] = $request->file('main_image')->store('hero', 'public');
        }

        if ($request->hasFile('bg_image')) {
            if ($hero->bg_image && Storage::disk('public')->exists($hero->bg_image)) {
                Storage::disk('public')->delete($hero->bg_image);
            }
            $data['bg_image'] = $request->file('bg_image')->store('hero', 'public');
        }

        if ($request->hasFile('map_image')) {
            if ($hero->map_image && Storage::disk('public')->exists($hero->map_image)) {
                Storage::disk('public')->delete($hero->map_image);
            }
            $data['map_image'] = $request->file('map_image')->store('hero', 'public');
        }

        $hero->update($data);

        $notification = array(
            'message' => 'Hero Section Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.hero')->with($notification);
    }
}
