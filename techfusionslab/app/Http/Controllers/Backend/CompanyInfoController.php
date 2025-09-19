<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CompanyInfoController extends Controller
{
    // Show Edit Form
    public function editCompany()
    {
        $company = CompanyInfo::first();

        if (!$company) {
            $company = CompanyInfo::create([
                'company_name' => 'Enter Your Company Name',
            ]);
        }

        return view('admin.backend.company.edit_company', compact('company'));
    }

    // Update Company Info
    public function updateCompany(Request $request, $id)
    {
        $company = CompanyInfo::findOrFail($id);

        $data = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'white_logo'   => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'dark_logo'    => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'favicon'      => 'nullable|image|mimes:jpg,jpeg,png,svg,ico|max:1024',
            'description'  => 'nullable|string',
            'phone_one'    => 'nullable|string|max:50',
            'phone_two'    => 'nullable|string|max:50',
            'email_one'    => 'nullable|email|max:255',
            'email_two'    => 'nullable|email|max:255',
            'address'      => 'nullable|string',
            'map_iframe'   => 'nullable|string',
            'facebook'     => 'nullable|string|max:255',
            'twitter'      => 'nullable|string|max:255',
            'linkedin'     => 'nullable|string|max:255',
            'youtube'      => 'nullable|string|max:255',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'instagram'        => 'nullable|string|max:255',
            'tiktok'           => 'nullable|string|max:255',
        ]);

        // Create folder if not exists
        $uploadPath = public_path('upload/logo');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // White Logo
        if ($request->hasFile('white_logo')) {
            if ($company->white_logo && Storage::exists($company->white_logo)) {
                Storage::delete($company->white_logo);
            }
            $whiteName = time().'_white.'.$request->white_logo->getClientOriginalExtension();
            $path = $request->file('white_logo')->storeAs('public/upload/logo', $whiteName);
            $data['white_logo'] = str_replace('public/', 'storage/', $path); // For public URL
        }

        // Dark Logo
        if ($request->hasFile('dark_logo')) {
            if ($company->dark_logo && Storage::exists($company->dark_logo)) {
                Storage::delete($company->dark_logo);
            }
            $darkName = time().'_dark.'.$request->dark_logo->getClientOriginalExtension();
            $path = $request->file('dark_logo')->storeAs('public/upload/logo', $darkName);
            $data['dark_logo'] = str_replace('public/', 'storage/', $path);
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            if ($company->favicon && Storage::exists($company->favicon)) {
                Storage::delete($company->favicon);
            }
            $faviconName = time().'_favicon.'.$request->favicon->getClientOriginalExtension();
            $path = $request->file('favicon')->storeAs('public/upload/logo', $faviconName);
            $data['favicon'] = str_replace('public/', 'storage/', $path);
        }

        $data['slug'] = Str::slug($request->company_name, '-');

        $company->update($data);

        return redirect()->route('edit.info')->with([
            'message' => 'Company information updated successfully!',
            'alert-type' => 'success'
        ]);
    }
}
