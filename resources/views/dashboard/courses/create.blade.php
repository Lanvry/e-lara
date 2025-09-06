<form action="{{route('courses.store')}}" method="post" class="space-y-6" enctype="multipart/form-data">
    @csrf
    <div class="create-courses-judul">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Buat Kursus</h2>
        <button class="create-courses-close"><i class="fas fa-close"></i></button>
    </div>

    <!-- Email input -->
    <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
        data-aos-duration="1000" data-aos-delay="200">
        <label class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
        <div class="flex items-center">
            <i class="fas fa-image text-gray-400 mr-3"></i>
            <input type="file" name="thumbnail" placeholder="Masukkan File Thumbnail" class="w-full bg-transparent focus:outline-none">
        </div>
    </div>

    <!-- Email input -->
    <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
        data-aos-duration="1000" data-aos-delay="200">
        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kursus</label>
        <div class="flex items-center">
            <i class="fas fa-clipboard text-gray-400 mr-3"></i>
            <input type="text" name="title" placeholder="Nama Kursus" class="w-full bg-transparent focus:outline-none"
                required>
        </div>
    </div>

    <!-- Email input -->
    <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
        data-aos-duration="1000" data-aos-delay="400">
        <label class="block text-sm font-medium text-gray-700 mb-2">Prodi</label>
        <div class="flex items-center">
            <i class="fas fa-graduation-cap text-gray-400 mr-3"></i>
            <select class="w-full no-bg-no-transparant bg-transparent focus:outline-none" required name="prodi">
                <option value="" disabled selected>Pilih Prodi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{$prodi->id}}">{{$prodi->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Email input -->
    <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
        data-aos-duration="1000" data-aos-delay="400">
        <label class="block text-sm font-medium text-gray-700 mb-2">Kursus Yang Harus Diselesaikan</label>
        <div class="flex items-center">
            <i class="fas fa-graduation-cap text-gray-400 mr-3"></i>
            <select class="w-full no-bg-no-transparant bg-transparent focus:outline-none" name="required">
                <option value="" disabled selected>Kosongkan Jika Tidak Ada Kursus Yang Wajib</option>
                @foreach ($courses as $data)
                    <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Email input -->
    <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition margin-10"
        data-aos-duration="1000" data-aos-delay="200">
        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Kursus</label>
        <div class="flex items-center">
            <i class="fa-solid fa-align-left"></i>
            <textarea name="description" class="no-bg-no-transparant w-full" id=""></textarea>
        </div>
    </div>

    <button type="submit" data-aos-duration="1000" data-aos-delay="400"
        class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition focus:outline-none focus:ring-4 focus:ring-blue-200">
        Buat Kursus
    </button>

</form>