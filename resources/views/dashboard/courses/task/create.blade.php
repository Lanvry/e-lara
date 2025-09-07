@extends("dashboard.layout")

@section('title', "Add Task")

@section("content-dash")
    @if ($type == "Tugas")
        <form action="{{route('store.task', $course->slug)}}" method="post" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="create-courses-judul">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Buat Tugas</h2>

            </div>

            <!-- Email input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Tugas <span class="required">*</span></label>
                <div class="flex items-center">
                    <i class="fas fa-clipboard text-gray-400 mr-3"></i>
                    <input type="text" name="name" placeholder="Masukkan Nama Tugas"
                        class="w-full bg-transparent focus:outline-none" required>
                </div>
            </div>



            <!-- Content input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Content Tugas</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-align-left"></i>
                    <textarea name="context" class="no-bg-no-transparant w-full" id="editor"></textarea>
                </div>
            </div>


            <!-- Content input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-calendar"></i>
                    <input type="datetime-local" name="deadline" placeholder="Deadline Tugas"
                        class="w-full bg-transparent focus:outline-none">

                </div>
            </div>

            <!-- Content input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran Tugas</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-file"></i>
                    <input type="file" name="file" placeholder="Masukkan Lampiran Tugas"
                        class="w-full bg-transparent focus:outline-none">
                </div>
                <sup>(Opsional) File Harus Bertipe (*pdf, *docx, *pptx)</sup>
            </div>

            <button type="submit" data-aos-duration="1000" data-aos-delay="400"
                class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition focus:outline-none focus:ring-4 focus:ring-blue-200">
                Buat Kursus
            </button>
        </form>

    @elseif($type == "Materi")
        <form action="{{route('store.materi', $course->slug)}}" method="post" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="create-courses-judul">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Buat Materi</h2>

            </div>

            <!-- Email input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Materi <span class="required">*</span></label>
                <div class="flex items-center">
                    <i class="fas fa-clipboard text-gray-400 mr-3"></i>
                    <input type="text" name="name" placeholder="Masukkan Nama Materi"
                        class="w-full bg-transparent focus:outline-none" required>
                </div>
            </div>



            <!-- Content input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Content Materi</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-align-left"></i>
                    <textarea name="context" id="editor" class="no-bg-no-transparant w-full"></textarea>
                </div>
            </div>

            <!-- Content input -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
                data-aos-duration="1000" data-aos-delay="200">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran Materi</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-file"></i>
                    <input type="file" name="file" placeholder="Masukkan Lampiran Tugas"
                        class="w-full bg-transparent focus:outline-none">
                </div>
                <sup>(Opsional) File Harus Bertipe (*pdf, *docx, *pptx)</sup>
            </div>

            <button type="submit" data-aos-duration="1000" data-aos-delay="400"
                class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition focus:outline-none focus:ring-4 focus:ring-blue-200">
                Buat Kursus
            </button>
        </form>
    @endif

    @push('scripts')
        {{-- CKEditor CDN --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection