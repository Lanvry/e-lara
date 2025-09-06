
@extends("dashboard.layout")

@section('title', 'Course')
@section("content-dash")
    <div class="create-courses" id="createCourses">
        @include('dashboard.courses.create')
    </div>
    <div class="container">
      @if(!$courses->isEmpty())
       <a href="{{route('courses.list')}}" class="btn-add-course">
            <i class="fas fa-plus"></i> Tambah Kursus
       </a>
      @endif
        <div class="courses-grid">
            @if($courses->isEmpty())
                <div class="empty-state" style="text-align: center; padding: 40px; width:auto; position:absolute;">
                    <div style="font-size: 48px; color: #999;">
                        <i class="fas fa-info-circle"></i> {{-- icon FontAwesome --}}
                    </div>
                    <h2 style="margin-top: 20px;">Mohon maaf, Anda tidak mengikuti course apapun</h2>
                    <p style="color: #666;">Pilih course dulu dengan mengetuk tombol di bawah ini</p>
                    <a href="{{ route('courses.list') }}" class="btn btn-primary" style="margin-top: 20px;">
                        Lihat Daftar Course
                    </a>
                </div>
            @else
                @foreach ($courses as $data)
                    <div class="course-card">
                        <div class="course-header">
                            @php
                                $thumbnail = $data->course->thumbnail ?? '';
                                $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $thumbnail);
                            @endphp

                            @if ($isImage)
                                <img src="{{ asset($thumbnail) }}" alt="{{ $data->course->title }}"
                                    class="course-image">
                            @else
                                <img src="data:image/svg+xml;utf8,
                                                <svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'>
                                                    <rect width='300' height='120' fill='{{ urlencode($thumbnail) }}'/>
                                                    <text x='150' y='70' font-family='Arial' font-weight='bold' font-size='20' fill='white' text-anchor='middle'>
                                                        {{ $data->course->title }}
                                                    </text>
                                                </svg>" alt="{{ $data->course->title }}" class="course-image">
                                                <div class="bg1"></div>
                            @endif
                            <div class="course-category">{{collect(explode(' ', $data->course->prodi->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');}}</div>
                        </div>

                        <div class="course-body">
                            <h3 class="course-title">{{ $data->course->title }}</h3>
                            <div class="course-instructor">
                                <i class="fas fa-user"></i> {{ $data->course->instructor->name ?? '-' }}
                            </div>

                            @if(Auth::user()->role == 'Mahasiswa')
                                <div class="course-progress">
                                    <div class="progress-info">
                                        <span>Progress</span>
                                        <span>{{ $data->task_complete }}%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-value" style="width: {{ $data->task_complete }}%;"></div>
                                    </div>
                                </div>
                                <a href="{{ route('courses.slug', $data->course->slug) }}" class="course-button">Lanjutkan belajar</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif



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