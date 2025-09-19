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
        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'number'      => $request->number ?? null,
            'link'        => $request->link ?? null,
        ];

        $manager = new ImageManager(new Driver());

        // Icon upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $icon = $request->file('icon');
            $ext  = $icon->getClientOriginalExtension();
            $name = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                Storage::disk('public')->putFileAs('upload/services', $icon, $name);
            } else {
                $img_icon = $manager->make($icon)->resize(61, 60);
                Storage::disk('public')->put('upload/services/' . $name, (string)$img_icon->encode());
            }

            $data['icon'] = 'upload/services/' . $name;
        }

        // Hover image
        if ($request->hasFile('hover_image') && $request->file('hover_image')->isValid()) {
            $hover = $request->file('hover_image');
            $ext   = $hover->getClientOriginalExtension();
            $name  = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                Storage::disk('public')->putFileAs('upload/services', $hover, $name);
            } else {
                $img_hover = $manager->make($hover)->resize(61, 60);
                Storage::disk('public')->put('upload/services/' . $name, (string)$img_hover->encode());
            }

            $data['hover_image'] = 'upload/services/' . $name;
        }

        Service::create($data);

        return redirect()->route('all.services')->with([
            'message'    => 'Service Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function EditService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.backend.service.edit_service', compact('service'));
    }

    public function UpdateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $data    = [
            'title'       => $request->title,
            'description' => $request->description,
            'number'      => $request->number,
            'link'        => $request->link,
        ];

        $manager = new ImageManager(new Driver());

        // Icon upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            if ($service->icon && Storage::disk('public')->exists($service->icon)) {
                Storage::disk('public')->delete($service->icon);
            }

            $icon = $request->file('icon');
            $ext  = $icon->getClientOriginalExtension();
            $name = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                Storage::disk('public')->putFileAs('upload/services', $icon, $name);
            } else {
                $img_icon = $manager->make($icon)->resize(61, 60);
                Storage::disk('public')->put('upload/services/' . $name, (string)$img_icon->encode());
            }

            $data['icon'] = 'upload/services/' . $name;
        }

        // Hover image
        if ($request->hasFile('hover_image') && $request->file('hover_image')->isValid()) {
            if ($service->hover_image && Storage::disk('public')->exists($service->hover_image)) {
                Storage::disk('public')->delete($service->hover_image);
            }

            $hover = $request->file('hover_image');
            $ext   = $hover->getClientOriginalExtension();
            $name  = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                Storage::disk('public')->putFileAs('upload/services', $hover, $name);
            } else {
                $img_hover = $manager->make($hover)->resize(61, 60);
                Storage::disk('public')->put('upload/services/' . $name, (string)$img_hover->encode());
            }

            $data['hover_image'] = 'upload/services/' . $name;
        }

        $service->update($data);

        return redirect()->route('all.services')->with([
            'message'    => 'Service Updated Successfully',
            'alert-type' => 'success'
        ]);
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

        return redirect()->route('all.services')->with([
            'message'    => 'Service Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }
}
