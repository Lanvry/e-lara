<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function enroll($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        // Cek apakah sudah terdaftar
        $already = Kelas::where('user_id', $user->id)
            ->where('courses_id', $courseId)
            ->exists();

        if ($already) {
            return redirect()->back()->with('warning', 'Anda sudah terdaftar di course ini.');
        }


        if(Auth::user()->prodi_id != $course->prodi_id){
            return redirect()->back()->with('error', 'Prodi Anda Dengan Kursus yang di pilih berbeda');
        }

        // Insert ke tabel kelas
        Kelas::create([
            'user_id' => $user->id,
            'courses_id' => $courseId,
            'task_complete' => 0, // default
        ]);

        return redirect()->route('courses.index')->with('success', 'Berhasil mulai belajar!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
