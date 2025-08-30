<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landingPage', [
            "prodi" => Prodi::limit(4)->get(),
        ]);
    }

    public function listProdi()
    {
        return view('prodi.listProdi', [
            "data" => Prodi::all(),
            "search" => null,
        ]);
    }

    public function searchlistprodi(Request $request)
    {
        $search = $request->input('search');
        $results = Prodi::where('name', 'like', '%' . $search . '%')->get();

        return view('prodi.listProdi', [
            'data' => $results,
            'search' => $search,
        ]);
    }

    public function prodiCourses($slug)
    {
        $prodi = Prodi::where('slug', $slug)->firstOrFail();
        $courses = $prodi->courses()->with('instructor')->get();

        return view('prodi.prodiCourses', [
            'prodi' => $prodi,
            'courses' => $courses,
        ]);
    }
}
