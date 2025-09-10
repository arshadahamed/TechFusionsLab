<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\File; // For direct file deletion
use Illuminate\Support\Str;

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
            if ($company->white_logo && File::exists(public_path($company->white_logo))) {
                File::delete(public_path($company->white_logo));
            }
            $whiteName = time().'_white.'.$request->white_logo->getClientOriginalExtension();
            $request->white_logo->move($uploadPath, $whiteName);
            $data['white_logo'] = 'upload/logo/'.$whiteName;
        }

        // Dark Logo
        if ($request->hasFile('dark_logo')) {
            if ($company->dark_logo && File::exists(public_path($company->dark_logo))) {
                File::delete(public_path($company->dark_logo));
            }
            $darkName = time().'_dark.'.$request->dark_logo->getClientOriginalExtension();
            $request->dark_logo->move($uploadPath, $darkName);
            $data['dark_logo'] = 'upload/logo/'.$darkName;
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            if ($company->favicon && File::exists(public_path($company->favicon))) {
                File::delete(public_path($company->favicon));
            }
            $faviconName = time().'_favicon.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move($uploadPath, $faviconName);
            $data['favicon'] = 'upload/logo/'.$faviconName;
        }

        $data['slug'] = Str::slug($request->company_name, '-');

        $company->update($data);

        return redirect()->route('edit.info')->with([
            'message' => 'Company information updated successfully!',
            'alert-type' => 'success'
        ]);
    }
}
