<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function AllService(Request $request)
    {
        $query = Service::orderBy('number', 'asc');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $services = $query->paginate(4);
        return view('admin.backend.service.all_service', compact('services'));
    }

    public function AddService()
    {
        return view('admin.backend.service.add_service');
    }

    public function StoreService(Request $request)
    {
        $data = $request->only(['title', 'description', 'number', 'link']);

        // Icon
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }

        // Hover Image
        if ($request->hasFile('hover_image')) {
            $data['hover_image'] = $request->file('hover_image')->store('services', 'public');
        }

        Service::create($data);

        $notification = array(
            'message'    => 'Service Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.services')->with($notification);
    }

    public function EditService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.backend.service.edit_service', compact('service'));
    }

    public function UpdateService(Request $request, $id)
    {
         $service = Service::findOrFail($id);
        $data    = $request->only(['title', 'description', 'number', 'link']);

        // Icon
        if ($request->hasFile('icon')) {
            if ($service->icon && Storage::disk('public')->exists($service->icon)) {
                Storage::disk('public')->delete($service->icon);
            }
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }

        // Hover Image
        if ($request->hasFile('hover_image')) {
            if ($service->hover_image && Storage::disk('public')->exists($service->hover_image)) {
                Storage::disk('public')->delete($service->hover_image);
            }
            $data['hover_image'] = $request->file('hover_image')->store('services', 'public');
        }

        $service->update($data);

        $notification = array(
            'message'    => 'Service Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.services')->with($notification);
    }

    public function DeleteService($id)
    {
        $service = Service::findOrFail($id);

        if ($service->icon && Storage::disk('public')->exists($service->icon)) {
            Storage::disk('public')->delete($service->icon);
        }

        if ($service->hover_image && Storage::disk('public')->exists($service->hover_image)) {
            Storage::disk('public')->delete($service->hover_image);
        }

        $service->delete();

        $notification = array(
            'message'    => 'Service Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.services')->with($notification);
    }
}
