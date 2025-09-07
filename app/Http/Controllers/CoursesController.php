<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['url' => route('dashboard'), 'label' => 'Dashboard'],
            ['url' => route('courses.index'), 'label' => 'Course'] // item terakhir tanpa link, halaman aktif
        ];

        if (Auth::user()->role != "Mahasiswa" && Auth::user()->role != "Dosen") {
            return view('dashboard.courses.index', [
                'prodis' => Prodi::all(),
                'courses' => Course::all(),
                'breadcrumbs' => $breadcrumbs,
            ]);
        } else if (Auth::user()->role == "Dosen") {
            return view('dashboard.courses.index', [
                'prodis' => Prodi::all(),
                'courses' => Course::where("prodi_id", Auth::user()->prodi_id)->get(),
                'breadcrumbs' => $breadcrumbs,
            ]);
        } else {
            return view('dashboard.courses.mycourses', [
                'prodis' => Prodi::all(),
                'courses' => Kelas::where('user_id', Auth::user()->id)->get(),
                'breadcrumbs' => $breadcrumbs,
            ]);
        }
    }

    public function list()
    {
        $user = Auth::user();

        $breadcrumbs = [
            ['url' => route('dashboard'), 'label' => 'Dashboard'],
            ['url' => route('courses.index'), 'label' => 'Course'],
            ['url' => route('courses.list'), 'label' => 'List']
        ];

        return view('dashboard.courses.index', [
            'prodis' => Prodi::all(),
            'courses' => Course::where('prodi_id', Auth::user()->prodi_id)->get(),
            'breadcrumbs' => $breadcrumbs,
        ]);
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
        if (Auth::user()->role == "Admin" || Auth::user()->role == "Dosen") {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'prodi' => 'required|exists:prodis,id',
                'required' => 'nullable|exists:courses,id',
                'description' => 'nullable|string',
                // Hapus validasi file khusus
                'thumbnail' => 'nullable',
            ]);


            $course = new Course();
            $course->title = $validated['title'];
            $course->prodi_id = $validated['prodi'];
            $course->instructor_id = Auth::user()->id;
            $course->required = $validated['required'] ?? null;
            $course->description = $validated['description'] ?? null;

            // Tangani thumbnail
            if ($request->hasFile('thumbnail')) {
                // Jika file diupload
                $file = $request->file('thumbnail');
                $path = $file->store('thumbnails', 'public');
                $course->thumbnail = $path;
            } else {
                // Jika tidak ada thumbnail sama sekali
                $course->thumbnail = $this->generateRandomColor();
            }

            $course->save();

            return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
        }

        abort(403, 'Unauthorized action.');
    }




    /**
     * Generate warna HEX random
     */
    private function generateRandomColor()
    {
        $colors = [
            'aliceblue',
            'antiquewhite',
            'aqua',
            'aquamarine',
            'azure',
            'beige',
            'bisque',
            'black',
            'blanchedalmond',
            'blue',
            'blueviolet',
            'brown',
            'burlywood',
            'cadetblue',
            'chartreuse',
            'chocolate',
            'coral',
            'cornflowerblue',
            'cornsilk',
            'crimson',
            'cyan',
            'darkblue',
            'darkcyan',
            'darkgoldenrod',
            'darkgray',
            'darkgreen',
            'darkgrey',
            'darkkhaki',
            'darkmagenta',
            'darkolivegreen',
            'darkorange',
            'darkorchid',
            'darkred',
            'darksalmon',
            'darkseagreen',
            'darkslateblue',
            'darkslategray',
            'darkslategrey',
            'darkturquoise',
            'darkviolet',
            'deeppink',
            'deepskyblue',
            'dimgray',
            'dimgrey',
            'dodgerblue',
            'firebrick',
            'floralwhite',
            'forestgreen',
            'fuchsia',
            'gainsboro',
            'ghostwhite',
            'gold',
            'goldenrod',
            'gray',
            'green',
            'greenyellow',
            'grey',
            'honeydew',
            'hotpink',
            'indianred',
            'indigo',
            'ivory',
            'khaki',
            'lavender',
            'lavenderblush',
            'lawngreen',
            'lemonchiffon',
            'lime',
            'limegreen',
            'linen',
            'magenta',
            'maroon',
            'mediumaquamarine',
            'mediumblue',
            'mediumorchid',
            'mediumpurple',
            'mediumseagreen',
            'mediumslateblue',
            'mediumspringgreen',
            'mediumturquoise',
            'mediumvioletred',
            'midnightblue',
            'mintcream',
            'mistyrose',
            'moccasin',
            'navajowhite',
            'navy',
            'oldlace',
            'olive',
            'olivedrab',
            'orange',
            'orangered',
            'orchid',
            'palegoldenrod',
            'palegreen',
            'paleturquoise',
            'palevioletred',
            'papayawhip',
            'peachpuff',
            'peru',
            'pink',
            'plum',
            'powderblue',
            'purple',
            'red',
            'rosybrown',
            'royalblue',
            'saddlebrown',
            'salmon',
            'sandybrown',
            'seagreen',
            'seashell',
            'sienna',
            'silver',
            'skyblue',
            'slateblue',
            'slategray',
            'slategrey',
            'snow',
            'springgreen',
            'steelblue',
            'tan',
            'teal',
            'thistle',
            'tomato',
            'turquoise',
            'violet',
            'wheat',
            'white',
            'whitesmoke',
            'yellow',
            'yellowgreen'
        ];

        return $colors[array_rand($colors)];
    }


    /**
     * Display the specified resource.
     */
    public function show(String $slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $task = Task::where('courses_id', $course->id)->get();
        $breadcrumbs = [
            ['url' => route('dashboard'), 'label' => 'Dashboard'],
            ['url' => route('courses.index'), 'label' => 'Course'],
            ['url' => '#', 'label' => $course->title]
        ];

        return view('dashboard.courses.show', compact('course', 'breadcrumbs', 'task'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        if (Auth::user()->role != "Mahasiswa") {
            $breadcrumbs = [
                ['url' => route('dashboard'), 'label' => 'Dashboard'],
                ['url' => route('courses.index'), 'label' => 'Course'],
                ['url' => '', 'label' => 'Edit'] // Tambahkan breadcrumb aktif
            ];

            if (Auth::user()->role != "Mahasiswa" && Auth::user()->role != "Dosen") {
                return view('dashboard.courses.edit', [
                    'data' => $course, // langsung pakai
                    'prodis' => Prodi::all(),
                    'courses' => Course::all(),
                    'breadcrumbs' => $breadcrumbs
                ]);
            } else {
                return view('dashboard.courses.edit', [
                    'data' => $course,
                    'prodis' => Prodi::all(),
                    'courses' => Course::where("prodi_id", Auth::user()->prodi_id)->get(),
                    'breadcrumbs' => $breadcrumbs
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Mohon Maaf Anda Tidak Dapat Izin Mengakses Halaman Ini');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        if (Auth::user()->role == "Admin" || Auth::user()->role == "Dosen") {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'prodi' => 'required|exists:prodis,id',
                'required' => 'nullable|exists:courses,id',
                'description' => 'nullable|string',
                'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048',
            ]);


            // Update data
            $course->title = $validated['title'];
            $course->prodi_id = $validated['prodi'];
            $course->required = $validated['required'] ?? null;
            $course->description = $validated['description'] ?? null;

            // Upload thumbnail jika ada
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $path = $file->store('thumbnails', 'public');
                $course->thumbnail = $path;
            }

            $course->save();

            return redirect()->route('courses.index')->with('success', 'Kursus berhasil diperbarui.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            if (Auth::user()->role == "Admin" || Auth::user()->role == "Dosen") {

                $course->delete();

                return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Gagal menghapus kursus.');
        }
    }
}
