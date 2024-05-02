<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function createWebsite(Request $request)
    {
        $subfolderName = $request->input('subfolder_name');  // Ensure this input is sanitized and validated

        // Path to the template and new website directory
        $templatePath = resource_path('templates/defaultWebsite');
        $newWebsitePath = public_path('websites/' . $subfolderName);

        // Check if directory already exists
        if (File::isDirectory($newWebsitePath)) {
            return back()->with('error', 'Website already exists!');
        }

        // Copy the directory contents to the new location
        File::copyDirectory($templatePath, $newWebsitePath);

        return back()->with('success', 'Website created successfully!');
    }

    public function updateWebsite(Request $request)
    {
        $subfolderName = $request->input('subfolder_name');  // Existing website folder
        $newName = $request->input('new_name');  // New name for the website folder

        $currentPath = public_path('websites/' . $subfolderName);
        $newPath = public_path('websites/' . $newName);

        if (!File::isDirectory($currentPath)) {
            return back()->with('error', 'Website does not exist!');
        }

        if ($subfolderName !== $newName) {
            File::moveDirectory($currentPath, $newPath);
            return back()->with('success', 'Website updated successfully!');
        }
        return back()->with('error', 'No changes made to the website name.');
    }

    public function deleteWebsite(Request $request)
    {
        $subfolderName = $request->input('subfolder_name');  // Website folder to delete

        $websitePath = public_path('websites/' . $subfolderName);
        if (File::isDirectory($websitePath)) {
            File::deleteDirectory($websitePath);
            return back()->with('success', 'Website deleted successfully!');
        }
        return back()->with('error', 'Website does not exist!');
    }


}
