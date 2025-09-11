<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    // Show all team members
    public function AllTeam()
    {
        $teams = Team::latest()->paginate(10);
        return view('admin.backend.team.all_team', compact('teams'));
    }

    // Show add team member form
    public function AddTeam()
    {
        return view('admin.backend.team.add_team');
    }

    // Store new team member
    public function StoreTeam(Request $request)
    {
        $data = [
            'name'      => $request->name,
            'position'  => $request->position,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'bio'       => $request->bio,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'linkedin'  => $request->linkedin,
            'youtube'   => $request->youtube,
            'instagram' => $request->instagram,
            'status'    => $request->status ?? 'active',
        ];

        $manager = new ImageManager(new Driver());

        // Image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name_image = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                $image->move(public_path('upload/team/'), $name_image);
            } else {
                $img = $manager->read($image);
                $img->resize(524, 588)->save(public_path('upload/team/' . $name_image));
            }

            $data['image'] = 'upload/team/' . $name_image;
        }

        Team::create($data);

        return redirect()->route('all.team')->with([
            'message'    => '✅ Team member added successfully!',
            'alert-type' => 'success'
        ]);
    }

    // Show edit team member form
    public function EditTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.backend.team.edit_team', compact('team'));
    }

    // Update team member
    public function UpdateTeam(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $data = [
            'name'      => $request->name,
            'position'  => $request->position,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'bio'       => $request->bio,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'linkedin'  => $request->linkedin,
            'youtube'   => $request->youtube,
            'instagram' => $request->instagram,
            'status'    => $request->status ?? 'active',
        ];

        $manager = new ImageManager(new Driver());

        // Image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name_image = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                $image->move(public_path('upload/team/'), $name_image);
            } else {
                $img = $manager->read($image);
                $img->resize(524, 588)->save(public_path('upload/team/' . $name_image));
            }

            // Delete old image
            if ($team->image && file_exists(public_path($team->image))) {
                unlink(public_path($team->image));
            }

            $data['image'] = 'upload/team/' . $name_image;
        }

        $team->update($data);

        return redirect()->route('all.team')->with([
            'message'    => '✅ Team member updated successfully!',
            'alert-type' => 'success'
        ]);
    }

    // Delete team member
    public function DeleteTeam($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image && file_exists(public_path($team->image))) {
            unlink(public_path($team->image));
        }

        $team->delete();

        return redirect()->route('all.team')->with([
            'message'    => '🗑️ Team member deleted successfully!',
            'alert-type' => 'success'
        ]);
    }
}
