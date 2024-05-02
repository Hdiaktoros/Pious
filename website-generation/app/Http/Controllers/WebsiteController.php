<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function createWebsite(Request $request)
    {
        $siteName = $request->input('site_name');
        $sitePath = public_path() . '/sites/' . $siteName;

        // Create directory for new site
        File::makeDirectory($sitePath, $mode = 0777, true, true);

        // Copy template files to the new directory
        $templatePath = resource_path('views/templates/basic_site');
        File::copyDirectory($templatePath, $sitePath);

        return redirect()->route('dashboard')->with('status', 'Website created successfully!');
    }

}
