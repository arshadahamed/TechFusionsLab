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

        // Handle logo uploads
        $data['white_logo'] = $this->uploadFile($request, 'white_logo', $company->white_logo);
        $data['dark_logo']  = $this->uploadFile($request, 'dark_logo', $company->dark_logo);
        $data['favicon']    = $this->uploadFile($request, 'favicon', $company->favicon);

        $data['slug'] = Str::slug($request->company_name, '-');

        $company->update($data);

        return redirect()->route('edit.info')->with([
            'message' => 'Company information updated successfully!',
            'alert-type' => 'success'
        ]);
    }

    // ✅ Helper to handle upload + delete old file
    private function uploadFile(Request $request, string $field, ?string $oldFile = null): ?string
    {
        if ($request->hasFile($field)) {
            // Delete old file if exists
            if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }

            // Store new file inside "storage/app/public/company"
            return $request->file($field)->store('company', 'public');
        }

        return $oldFile; // keep old file if no new upload
    }

    // ✅ Destroy Company with image cleanup
    public function destroyCompany($id)
    {
        $company = CompanyInfo::findOrFail($id);

        // Delete images if exist
        foreach (['white_logo', 'dark_logo', 'favicon'] as $field) {
            if ($company->$field && Storage::disk('public')->exists($company->$field)) {
                Storage::disk('public')->delete($company->$field);
            }
        }

        $company->delete();

        return redirect()->route('edit.info')->with([
            'message'    => 'Company information deleted successfully!',
            'alert-type' => 'success'
        ]);
    }
}
