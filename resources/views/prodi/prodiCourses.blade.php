@component("components.layout")

@section('body-class', 'bg-light min-h-screen flex  p-4')

@section('content')

    <!-- Program Studi Section -->
    <div class="container max-w-6xl mx-auto">

        <x-navbarLanding></x-navbarLanding>

        <section id="main-content" class="mb-16" aria-labelledby="programs-heading">
            <h2 id="programs-heading" class="text-3xl font-bold text-center text-primary mb-4">Courses in {{$prodi->name}}
            </h2>
            <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">Dibawah Ini Adalah List Dari Kursus Yang tersedia di Program Studi {{$prodi->name}}</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($courses as $course)
                    <div class="course-card">
                    <div class="course-header">
                        @php
                            $thumbnail = $course->thumbnail;
                            $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $thumbnail);
                        @endphp

                        @if ($isImage)
                            <img src="{{ asset($thumbnail) }}" alt="{{ $course->title }}"
                                class="course-image">
                        @else
                            <img src="data:image/svg+xml;utf8,
                                <svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'>
                                    <rect width='300' height='120' fill='{{ urlencode($thumbnail) }}'/>
                                    <text x='150' y='70' font-family='Arial' font-weight='bold' font-size='20' fill='white' text-anchor='middle'>
                                        {{ $course->title }}
                                    </text>
                                </svg>" alt="{{ $course->title }}" class="course-image">
                                <div class="bg1"></div>
                        @endif
                        <div class="course-category">{{collect(explode(' ', $course->prodi->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');}}</div>
                    </div>

                    <div class="course-body">
                        <h3 class="course-title">{{ $course->title }}</h3>

                        <div class="course-instructor">
                            <i class="fas fa-user"></i> {{ $course->instructor->name }}
                        </div>
                            
                             <a href="{{ route('courses.slug', $course->slug) }}" class="course-button">Lihat Kursus</a>
                    </div>
                </div>
                @empty
                    <div class="col-span-4 text-center text-gray-500 py-12">
                        Tidak ada program studi yang tersedia saat ini.
                    </div>
                @endforelse


            </div>


        </section>
    </div>
@endsection

@endcomponent