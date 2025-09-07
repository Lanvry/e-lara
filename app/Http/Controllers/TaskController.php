<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Course;
use App\Models\TaskComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $slug)
    {
        if (Auth::user()->role != "Mahasiswa") {
            $course = Course::where('slug', $slug)->firstOrFail();
            $breadcrumbs = [
                ['url' => route('dashboard'), 'label' => 'Dashboard'],
                ['url' => route('courses.index'), 'label' => 'Course'],
                ['url' => route('courses.slug', $course->slug), 'label' => $course->title],
                ['url' => '#', 'label' => 'Create Task']
            ];
            $type = "Tugas";
            return view('dashboard.courses.task.create', compact('breadcrumbs', 'course', 'type'));
        } else {
            return redirect()->back()->with('error', 'Mohon Maaf Anda Tidak Dapat Izin Mengakses Halaman Ini');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        // Validasi (nullable untuk field yang tidak wajib)
        $request->validate([
            'name'    => 'required|string|max:255',
            'context' => 'nullable|string',
            'file'    => 'nullable|mimes:pdf,docx,pptx|max:2048',
            'deadline' => 'nullable|date_format:Y-m-d\TH:i',
            // kalau mau lebih ketat: 'date_format:Y-m-d\TH:i'
        ]);

        // Upload file hanya jika ada
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tasks', 'public');
        }

        // Cek apakah ada task sebelumnya (ambil id terakhir)
        $lastTask = Task::orderBy('id', 'desc')->first();
        $required = $lastTask ? $lastTask->id : null;

        // // debug -> dd sekarang pasti tercapai (karena validasi tidak mem-blok dan file ditangani)
        // dd([
        //     'name'       => $request->name,
        //     'content'    => $request->context,
        //     'file'       => $filePath,
        //     'course_id'  => $course->id,
        //     'category'   => 'Tugas',
        //     'required'   => $required,
        // ]);

        // Simpan ke database (pastikan field di model sesuai)
        Task::create([
            'courses_id'  => $course->id,
            'name'       => $request->name,
            'category'   => 'Tugas',
            'content'    => $request->context,
            'file'       => $filePath,
            'required'   => $required,
            'deadline'   => $request->deadline,
        ]);

        return redirect()
            ->route('courses.slug', $course->slug)
            ->with('success', 'Tugas berhasil dibuat!');
    }



    /**
     * Display the specified resource.
     */
    public function show($slug, Task $task)
    {
        $isLocked = false;
        $breadcrumbs = [
            ['url' => route('dashboard'), 'label' => 'Dashboard'],
            ['url' => route('courses.index'), 'label' => 'Course'],
            ['url' => route('courses.slug', $task->course->slug), 'label' => $task->course->title],
            ['url' => '#', 'label' => $task->name]
        ];

        if (Auth::user()->role == "Admin") {
            return view('dashboard.courses.task.show', [
                'task' => $task,
                'slug' => $slug,
                'breadcrumbs' => $breadcrumbs,

            ]);
        } else if ($task->course->prodi_id == Auth::user()->prodi_id) {
            if ($task->required && Auth::user()->role === "Mahasiswa") {
                $completed = \App\Models\TaskComplete::where('user_id', Auth::id())
                    ->where('task_id', $task->required)
                    ->exists();

                $isLocked = !$completed; // true kalau belum selesai
                if ($isLocked != true) {
                    return view('dashboard.courses.task.show', [
                        'task' => $task,
                        'slug' => $slug,
                        'breadcrumbs' => $breadcrumbs,

                    ]);
                } else {
                    return redirect()->back()->with('warning', 'Anda Harus menyelesaikan tugas sebelumnya');
                }
            }

            return view('dashboard.courses.task.show', [
                'task' => $task,
                'slug' => $slug,
                'breadcrumbs' => $breadcrumbs,

            ]);
        } else {
            return redirect()->back()->with('warning', 'Mohon Maaf, Prodi Anda Tidak Sesuai Dengan Tugas / Materi / Quiz Ini');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug, Task $task)
    {
        if (Auth::user()->role != "Mahasiswa") {
            $course = Course::findOrFail($task->courses_id);
            $breadcrumbs = [
                ['url' => route('dashboard'), 'label' => 'Dashboard'],
                ['url' => route('courses.index'), 'label' => 'Course'],
                ['url' => route('courses.slug', $course->slug), 'label' => $course->title],
                ['url' => '#', 'label' => 'Edit Tugas']
            ];
            return view('dashboard.courses.task.edit', [
                'slug' => $slug,
                'task' => $task,
                'type' => 'Tugas',
                'course' => $course,
                'breadcrumbs' => $breadcrumbs,
            ]);
        } else {
            return redirect()->back()->with('error', 'Mohon Maaf Anda Tidak Dapat Izin Mengakses Halaman Ini');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($slug, Request $request, Task $task)
    {
        // validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'context' => 'nullable|string',
            'deadline' => 'nullable|date',
            'file' => 'nullable|mimes:pdf,docx,pptx|max:2048', // max 2MB
        ]);

        // kalau ada file baru
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('tasks', $filename, 'public'); // simpan ke storage/app/public/tasks

            // hapus file lama kalau ada
            if ($task->file && Storage::disk('public')->exists($task->file)) {
                Storage::disk('public')->delete($task->file);
            }

            $validated['file'] = 'tasks/' . $filename;
        }

        // update data task
        $task->update($validated);

        return redirect()
            ->route('show.task', ['slug' => $slug, 'task' => $task->id])
            ->with('success', 'Tugas berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
