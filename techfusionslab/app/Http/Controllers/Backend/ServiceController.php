<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceController extends Controller
{
    // Show all services
    public function AllService()
    {
        $services = Service::orderBy('number', 'asc')->get();
        return view('admin.backend.service.all_service', compact('services'));
    }

    // Show add service form
    public function AddService()
    {
        return view('admin.backend.service.add_service');
    }

    // Store service
    public function StoreService(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'number' => $request->number ?? null,
            'link' => $request->link ?? null,
        ];

        $manager = new ImageManager(new Driver());

        // Icon upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $icon = $request->file('icon');
            $ext = $icon->getClientOriginalExtension();
            $name_icon = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                // Just move SVG without Intervention Image
                $icon->move(public_path('upload/service/'), $name_icon);
            } else {
                $manager = new ImageManager(new Driver());
                $img_icon = $manager->read($icon);
                $img_icon->resize(61, 60)->save(public_path('upload/service/' . $name_icon));
            }

            $data['icon'] = 'upload/service/' . $name_icon;
        }

        // Hover image upload (same logic)
        if ($request->hasFile('hover_image') && $request->file('hover_image')->isValid()) {
            $hover = $request->file('hover_image');
            $ext = $hover->getClientOriginalExtension();
            $name_hover = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                $hover->move(public_path('upload/service/'), $name_hover);
            } else {
                $manager = new ImageManager(new Driver());
                $img_hover = $manager->read($hover);
                $img_hover->resize(61, 60)->save(public_path('upload/service/' . $name_hover));
            }

            $data['hover_image'] = 'upload/service/' . $name_hover;
}


        Service::create($data);

        return redirect()->route('all.services')->with([
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    // Edit service
    public function EditService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.backend.service.edit_service', compact('service'));
    }

    // Update service
    public function UpdateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'number' => $request->number,
            'link' => $request->link,
        ];

        $manager = new ImageManager(new Driver());

        // Icon upload
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $icon = $request->file('icon');
            $ext = $icon->getClientOriginalExtension();
            $name_icon = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                // Just move SVG without Intervention Image
                $icon->move(public_path('upload/service/'), $name_icon);
            } else {
                $manager = new ImageManager(new Driver());
                $img_icon = $manager->read($icon);
                $img_icon->resize(61, 60)->save(public_path('upload/service/' . $name_icon));
            }

            $data['icon'] = 'upload/service/' . $name_icon;
        }

        // Hover image upload (same logic)
        if ($request->hasFile('hover_image') && $request->file('hover_image')->isValid()) {
            $hover = $request->file('hover_image');
            $ext = $hover->getClientOriginalExtension();
            $name_hover = hexdec(uniqid()) . '.' . $ext;

            if (strtolower($ext) === 'svg') {
                $hover->move(public_path('upload/service/'), $name_hover);
            } else {
                $manager = new ImageManager(new Driver());
                $img_hover = $manager->read($hover);
                $img_hover->resize(61, 60)->save(public_path('upload/service/' . $name_hover));
            }

            $data['hover_image'] = 'upload/service/' . $name_hover;
}


        $service->update($data);

        return redirect()->route('all.services')->with([
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    // Delete service
    public function DeleteService($id)
    {
        $service = Service::findOrFail($id);

        // Optionally remove uploaded images
        if ($service->icon && file_exists(public_path($service->icon))) {
            unlink(public_path($service->icon));
        }
        if ($service->hover_image && file_exists(public_path($service->hover_image))) {
            unlink(public_path($service->hover_image));
        }

        $service->delete();

        return redirect()->route('all.services')->with([
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }
}
