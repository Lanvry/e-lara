@extends("dashboard.layout")

@section('title', $course->title)

@section("content-dash")
    <div class="container-courses">
        @php
            $thumbnail = $course->thumbnail ?? '';
            $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $thumbnail);
        @endphp

        @if ($isImage)
            <img src="{{ asset($thumbnail) }}" alt="{{ $course->title }}" class="course-image">
        @else
            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'><rect width='300' height='120' fill='{{ urlencode($thumbnail) }}'/><text x='150' y='70' font-family='Arial' font-size='20' font-weight='bold' fill='white' z-index='100' text-anchor='middle'>{{ $course->title }}</text></svg>"
                alt="{{ $course->title }}" class="course-image">
            <div class="bg"></div>
        @endif
    </div>
    <div class="card">
        <div class="card-grid-courses">
            <div>
                <h2 class="course-title">{{$course->title}}</h2>
                <p class="course-instructor">{{$course->instructor->name}}</p>
            </div>
            @if (Auth::user()->role != "Mahasiswa")
                <div>
                    <div class="menu-create-task">
                        <button class="button-create-task" id="toggleMenu">
                            <i class="fas fa-plus"></i> Buat
                        </button>
                        <ul class="menu-create-task-list" id="taskMenu">
                            <li><a href="{{ route('create.task', $course->slug) }}">Buat Tugas</a></li>
                            <li><a href="{{route('create.materi', $course->slug)}}">Buat Materi</a></li>
                            <li><a href="">Buat Quiz</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <br>
    <hr><br>
    @foreach ($task as $taskdata)
        @php
            $isLocked = false;
            if ($taskdata->required && Auth::user()->role == "Mahasiswa") {
                $completed = \App\Models\TaskComplete::where('user_id', Auth::id())
                    ->where('task_id', $taskdata->required)
                    ->exists();

                $isLocked = !$completed;
            }
        @endphp


        <div class="card card-content {{ $isLocked ? 'card-locked' : '' }}">
            <div class="dropdown course-actions">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v" style="color: black"></i>
                </button>
                <ul class="dropdown-menu">
                    @if (Auth::user()->role != "Mahasiswa")
                        <li><a href="{{route('edit.materi', ['slug' => $course->slug, 'task' => $taskdata->id])}}">Edit</a></li>
                        <li>
                            <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus kursus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">Delete</button>
                            </form>
                        </li>
                    @endif
                    <li>
                        <a href="javascript:void(0)"
                            onclick="copyLink('{{ route('show.task', ['slug' => $course->slug, 'task' => $taskdata->id]) }}')">
                            Salin Link
                        </a>
                    </li>
                </ul>
            </div>
            <a href="{{route('show.task', ['slug' => $course->slug, 'task' => $taskdata->id])}}">
                <div class="{{ $isLocked ? 'locked' : '' }}">
                    <div class="course-grid">
                        @if ($taskdata->category == "Tugas")
                            <div class="course-avatar"><i class="fas fa-clipboard"></i></div>
                        @elseif($taskdata->category == "Materi")
                            <div class="course-avatar"><i class="fas fa-file"></i></div>
                        @elseif($taskdata->category == "Quiz")
                            <div class="course-avatar"><i class="fas fa-comment"></i></div>
                        @endif

                        <div class="course-content">
                            <h3>{{ $taskdata->name }}</h3>
                            <p>{{ $taskdata->created_at->translatedFormat('j M Y') }}</p>
                            @if ($taskdata->category == "Tugas")
                                <span class="course-status">Ditugaskan</span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @if($isLocked)
                <div class="locked-overlay">
                    🔒 Selesaikan terlebih dahulu tugas di atas
                </div>
            @endif
        </div>
    @endforeach

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const toggleBtn = document.getElementById("toggleMenu");
                const menu = document.getElementById("taskMenu");

                toggleBtn.addEventListener("click", function (e) {
                    e.stopPropagation();
                    menu.style.display = menu.style.display === "block" ? "none" : "block";
                });

                // klik di luar menu → tutup dropdown
                document.addEventListener("click", function () {
                    menu.style.display = "none";
                });

            });
            function copyLink(url) {
                navigator.clipboard.writeText(url).then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: "Link telah di salin"
                    });
                }).catch(err => {
                    alert("Gagal menyalin link: " + err);
                });
            }

        </script>
    @endpush
@endsection