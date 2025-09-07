@extends("dashboard.layout")

@section('title', "Edit $type")

@section("content-dash")
    @if ($type == "Tugas")
        <form action="{{ route('update.task', ['slug' => $course->slug, 'task' => $task->id]) }}" method="post" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="create-courses-judul">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Edit Tugas</h2>
            </div>

            <!-- Nama -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Tugas <span class="required">*</span></label>
                <div class="flex items-center">
                    <i class="fas fa-clipboard text-gray-400 mr-3"></i>
                    <input type="text" name="name" value="{{ old('name', $task->name) }}" class="w-full bg-transparent focus:outline-none" required>
                </div>
            </div>

            <!-- Content -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Content Tugas</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-align-left"></i>
                    <textarea name="context" id="editor" class="no-bg-no-transparant w-full">{!! old('context', $task->content) !!}</textarea>
                </div>
            </div>

            <!-- Deadline -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-calendar"></i>
                    <input type="datetime-local" name="deadline"
                        value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d\TH:i') : '') }}"
                        class="w-full bg-transparent focus:outline-none">
                </div>
            </div>

            <!-- File -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran (Opsional)</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-file"></i>
                    <input type="file" name="file" class="w-full bg-transparent focus:outline-none">
                </div>
                @if ($task->file)
                    <sup>File lama: <a href="{{ asset('storage/'.$task->file) }}" target="_blank">Lihat</a></sup>
                @endif
            </div>

            <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition">
                Update Tugas
            </button>
        </form>

    @elseif($type == "Materi")
        <form action="{{ route('update.materi', ['slug' => $course->slug, 'task' => $task->id]) }}" method="post" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="create-courses-judul">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Edit Materi</h2>
            </div>

            <!-- Nama -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Materi <span class="required">*</span></label>
                <div class="flex items-center">
                    <i class="fas fa-clipboard text-gray-400 mr-3"></i>
                    <input type="text" name="name" value="{{ old('name', $task->name) }}" class="w-full bg-transparent focus:outline-none" required>
                </div>
            </div>

            <!-- Content -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Content Materi</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-align-left"></i>
                    <textarea name="context" id="editor" class="no-bg-no-transparant w-full">{!! old('context', $task->content) !!}</textarea>
                </div>
            </div>

            <!-- File -->
            <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran (Opsional)</label>
                <div class="flex items-center">
                    <i class="fa-solid fa-file"></i>
                    <input type="file" name="file" class="w-full bg-transparent focus:outline-none">
                </div>
                @if ($task->file)
                    <sup>File lama: <a href="{{ asset('storage/'.$task->file) }}" target="_blank">Lihat</a></sup>
                @endif
            </div>

            <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition">
                Update Materi
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
