<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function AllTeam()
    {
        $teams = Team::latest()->paginate(10);
        return view('admin.backend.team.all_team', compact('teams'));
    }

    public function AddTeam()
    {
        return view('admin.backend.team.add_team');
    }

    public function StoreTeam(Request $request)
    {
        $data = $request->only([
            'name','position','email','phone','bio','facebook','twitter',
            'linkedin','youtube','instagram','status'
        ]);

        $data['status'] = $data['status'] ?? 'active';
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $ext   = $image->getClientOriginalExtension();
            $name  = hexdec(uniqid()) . '.' . $ext;
            $path  = "upload/team/$name";

            if (strtolower($ext) === 'svg') {
                Storage::disk('public')->putFileAs('upload/team', $image, $name);
            } else {
                $img = $manager->make($image)->resize(524, 588);
                Storage::disk('public')->put($path, (string)$img->encode());
            }

            $data['image'] = $path;
        }

        Team::create($data);

        return redirect()->route('all.team')->with([
            'message'    => '✅ Team member added successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function EditTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.backend.team.edit_team', compact('team'));
    }

    public function UpdateTeam(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $data = $request->only([
            'name','position','email','phone','bio','facebook','twitter',
            'linkedin','youtube','instagram','status'
        ]);
        $data['status'] = $data['status'] ?? 'active';
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            $image = $request->file('image');
            $ext   = $image->getClientOriginalExtension();
            $name  = hexdec(uniqid()) . '.' . $ext;
            $path  = "upload/team/$name";

            if (strtolower($ext) === 'svg') {
                Storage::disk('public')->putFileAs('upload/team', $image, $name);
            } else {
                $img = $manager->make($image)->resize(524, 588);
                Storage::disk('public')->put($path, (string)$img->encode());
            }

            $data['image'] = $path;
        }

        $team->update($data);

        return redirect()->route('all.team')->with([
            'message'    => '✅ Team member updated successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function DeleteTeam($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image && Storage::disk('public')->exists($team->image)) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return redirect()->route('all.team')->with([
            'message'    => '🗑️ Team member deleted successfully!',
            'alert-type' => 'success'
        ]);
    }
}
