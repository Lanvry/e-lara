@component("components.layout")

@section('body-class', 'bg-light min-h-screen flex items-center justify-center p-4')

@section('content')

    <!-- Program Studi Section -->
    <div class="container max-w-6xl mx-auto">

        <x-navbarLanding></x-navbarLanding>

        <section id="main-content" class="mb-16" aria-labelledby="programs-heading">
            <h2 id="programs-heading" class="text-3xl font-bold text-center text-primary mb-4">Program Studi Tersedia
            </h2>
            <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">Kami menyediakan berbagai program studi dengan
                kurikulum terkini dan dosen berpengalaman</p>

            <form action="{{route('searchlistProdi')}}" method="post">
                @csrf
                <div class="search">
                    <div class="search search-v4">
                        <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition">
                            <div class="flex items-center">
                                <i class="fas fa-search text-gray-400 mr-3"></i>
                                <input type="serach" name="search" value="{{$search ? $search : ''}}" placeholder="Cari Kursus..."
                                    class="w-full bg-transparent focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($data as $prodi)
                    <div class="program-card bg-white p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                        <div class="program-icon w-16 h-16 rounded-2xl text-white flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="fas {{$prodi->logo}}"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-2">{{$prodi->name}}</h3>
                        <p class="text-gray-600 text-sm">{{$prodi->description}}</p>
                        <a href="{{route('prodiCourses', $prodi->slug)}}"
                            class="mt-4 text-primary text-sm font-medium hover:underline">Lihat
                            detail</a>
                    </div>
                @endforeach


            </div>


        </section>
    </div>
@endsection

@endcomponent