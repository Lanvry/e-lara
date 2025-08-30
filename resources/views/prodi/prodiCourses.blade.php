@component("components.layout")

@section('body-class', 'bg-light min-h-screen flex  p-4')

@section('content')

    <!-- Program Studi Section -->
    <div class="container max-w-6xl mx-auto">

        <x-navbarLanding></x-navbarLanding>

        <section id="programs" class="mb-16" aria-labelledby="programs-heading">
            <h2 id="programs-heading" class="text-3xl font-bold text-center text-primary mb-4">Courses in {{$prodi->name}}
            </h2>
            <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">Dibawah Ini Adalah List Dari Kursus Yang tersedia di Program Studi {{$prodi->name}}</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($courses as $course)
                    <div class="program-card bg-white p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                        <div class="program-icon w-16 h-16 rounded-2xl text-white flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="fas {{$course->logo}}"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-2">{{$course->name}}</h3>
                        <p class="text-gray-600 text-sm">{{$course->description}}</p>
                        <a href="{{route('register')}}"
                            class="mt-4 text-primary text-sm font-medium hover:underline">Lihat
                            detail</a>
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