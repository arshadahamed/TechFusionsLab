<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Storage;
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
            'favicon'      => 'nullable|image|mimes:jpg,jpeg,png,svg,ico|max:1024',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'instagram'        => 'nullable|string|max:255',
            'tiktok'           => 'nullable|string|max:255',
        ]);

        // Handle Logo Uploads
        if ($request->hasFile('white_logo')) {
            if ($company->white_logo) {
                Storage::disk('public')->delete($company->white_logo);
            }
            $data['white_logo'] = $request->file('white_logo')->store('logos', 'public');
        }

        if ($request->hasFile('dark_logo')) {
            if ($company->dark_logo) {
                Storage::disk('public')->delete($company->dark_logo);
            }
            $data['dark_logo'] = $request->file('dark_logo')->store('logos', 'public');
        }

        $data['slug'] = Str::slug($request->company_name, '-');

        if ($request->hasFile('favicon')) {
            if ($company->favicon) {
                Storage::disk('public')->delete($company->favicon);
            }
            $data['favicon'] = $request->file('favicon')->store('logos', 'public');
        }

        $company->update($data);

        $notification = array(
            'message' => 'Company information updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.info')->with($notification);

    }
}
