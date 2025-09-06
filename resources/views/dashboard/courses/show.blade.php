@extends("dashboard.layout")

@section('title', $course->title)

@section("content-dash")
    <div class="container-courses">
        @php
            $thumbnail = $course->thumbnail ?? '';
            $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $thumbnail);
        @endphp

        @if ($isImage)
            <img src="{{ asset( $thumbnail) }}" alt="{{ $course->title }}" class="course-image">
        @else
            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'><rect width='300' height='120' fill='{{ urlencode($thumbnail) }}'/><text x='150' y='70' font-family='Arial' font-size='20' font-weight='bold' fill='white' z-index='100' text-anchor='middle'>{{ $course->title }}</text></svg>" alt="{{ $course->title }}" class="course-image">
            <div class="bg"></div>
        @endif
    </div>
    <div class="card">
        <h2 class="course-title">{{$course->title}}</h2>
        <p class="course-instructor">{{$course->instructor->name}}</p>
    </div>
    <br><hr><br>
    <div class="card card-content">
        <div class="course-grid">
            <div class="course-avatar"><i class="fas fa-file"></i></div>
            <div class="course-content">
                <h3>Materi : Dasar Pemerograman</h3>
                <p>4 Sep 2024</p>
            </div>
        </div>
    </div>
    <div class="card card-content">
        <div class="course-grid">
            <div class="course-avatar"><i class="fas fa-clipboard"></i></div>
            <div class="course-content">
                <h3>Tugas : Dasar Pemerograman</h3>
                <p>4 Sep 2024</p>
                <span class="course-status">Ditugaskan</span>
            </div>
        </div>
    </div>
    <div class="card card-content">
        <div class="course-grid">
            <div class="course-avatar"><i class="fas fa-clipboard"></i></div>
            <div class="course-content">
                <h3>Tugas : Principle of Integrity dalam Dunia IT</h3>
                <p>4 Sep 2024</p>
                <span class="course-status">Ditugaskan</span>
            </div>
        </div>
    </div>
@endsection