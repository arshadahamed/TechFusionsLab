<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
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
            'name', 'position', 'email', 'phone', 'bio',
            'facebook','twitter','linkedin','youtube','instagram','status'
        ]);

        $data['status'] = $data['status'] ?? 'active';

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        Team::create($data);
        $notification = array(
            'message'    => 'Team member added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('team.index')->with($notification);
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
            'name', 'position', 'email', 'phone', 'bio',
            'facebook','twitter','linkedin','youtube','instagram','status'
        ]);

        $data['status'] = $data['status'] ?? 'active';

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $team->update($data);

        $notification = array(
            'message'    => '✅ Team member updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.team')->with($notification);
    }

    public function DeleteTeam($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image && Storage::disk('public')->exists($team->image)) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        $notification = array(
            'message'    => '🗑️ Team member deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.team')->with($notification);
    }
}
