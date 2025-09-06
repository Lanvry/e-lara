@extends("dashboard.layout")

@section('title', 'Course')

@section("content-dash")
    <div class="create-courses" id="createCourses">
        @include('dashboard.courses.create')
    </div>
    <div class="container">


        <div class="courses-grid">
            @foreach ($courses as $data)
                <div class="course-card">
                    <div class="course-header">
                        @php
                            $thumbnail = $data->thumbnail;
                            $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $thumbnail);
                        @endphp

                        @if ($isImage)
                            <img src="{{ asset($thumbnail) }}" alt="{{ $data->title }}"
                                class="course-image">
                        @else
                            <img src="data:image/svg+xml;utf8,
                                <svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'>
                                    <rect width='300' height='120' fill='{{ urlencode($thumbnail) }}'/>
                                    <text x='150' y='70' font-family='Arial' font-weight='bold' font-size='20' fill='white' text-anchor='middle'>
                                        {{ $data->title }}
                                    </text>
                                </svg>" alt="{{ $data->title }}" class="course-image">
                                <div class="bg1"></div>
                        @endif
                        <div class="course-category">{{collect(explode(' ', $data->prodi->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');}}</div>
                    </div>

                    <div class="course-body">
                        <h3 class="course-title">{{ $data->title }}</h3>

                        <div class="course-instructor">
                            <i class="fas fa-user"></i> {{ $data->instructor->name }}
                        </div>

                        @if(Auth::user()->role == 'Mahasiswa')
                            @php
                                // Cek apakah course ini punya prasyarat
                                $requiredCourse = $data->required ? \App\Models\Course::find($data->required) : null;

                                // Cek apakah user sudah menyelesaikan course prasyarat
                                $completed = false;

                                if ($requiredCourse) {
                                    $completed = \App\Models\Kelas::where('user_id', Auth::id())
                                        ->where('courses_id', $requiredCourse->id)
                                        ->where('task_complete', 100)
                                        ->exists();
                                }
                            @endphp

                            @if ($requiredCourse && !$completed)
                                {{-- Jika belum memenuhi prasyarat --}}
                                <button class="course-button" disabled style="background-color: #ccc; cursor: not-allowed;">
                                    <i class="fas fa-lock"></i>
                                    Selesaikan dulu:
                                    <strong>{{ $requiredCourse->title }}</strong>
                                </button>
                            @else
                                {{-- Jika tidak punya prasyarat atau sudah diselesaikan --}}
                                <form action="{{ route('kelas.enroll', $data->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="course-button">
                                        Mulai Belajar
                                    </button>
                                </form>
                            @endif
                        @else
                            {{-- Untuk Non-Mahasiswa: Tampilkan Dropdown --}}
                            <div class="dropdown course-actions">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('courses.edit', $data->id) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('courses.destroy', $data->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kursus ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                             <a href="{{ route('courses.slug', $data->slug) }}" class="course-button">Lihat Kursus</a>
                        @endif
                    </div>
                </div>
            @endforeach




            @if (Auth::user()->role != "Mahasiswa")
                <div class="course-card" id="AddCourses">
                    <div class="add-courses">
                        <h2><i class="fas fa-plus"></i></h2>
                        <p>Tambahkan Kursus</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
@endsection