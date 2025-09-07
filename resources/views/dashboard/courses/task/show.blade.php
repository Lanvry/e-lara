@extends("dashboard.layout")

@section('title', )

@section("content-dash")
    <div class="task-view-grid">
        <div class="content-task-view">
            <div class="course-grid">
                @if ($task->category == "Tugas")
                    <div class="course-avatar"><i class="fas fa-clipboard"></i></div>
                @elseif($task->category == "Materi")
                    <div class="course-avatar"><i class="fas fa-file"></i></div>
                @elseif($task->category == "Quiz")
                    <div class="course-avatar"><i class="fas fa-comment"></i></div>
                @endif

                <div class="course-content">
                    <h3>{{ $task->name }}</h3>
                    <p>{{$task->course->instructor->name}} | {{ $task->created_at->translatedFormat('j M Y') }}</p>
                    @if ($task->category == "Tugas")
                        <p><span style="color: rgb(0, 204, 0); font-weight: 600;">Ditugaskan</span></p>
                    @endif
                </div>
            </div>
            <div class="dropdown course-actions">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v" style="color: black"></i>
                </button>
                <ul class="dropdown-menu">
                    @if (Auth::user()->role != "Mahasiswa")
                        <li><a href="{{route('edit.materi', ['slug' => $slug, 'task' => $task->id])}}">Edit</a></li>
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
                            onclick="copyLink('{{ route('show.task', ['slug' => $slug, 'task' => $task->id]) }}')">
                            Salin Link
                        </a>
                    </li>
                </ul>
            </div>
            <br>
            <hr><br>
            {!! nl2br(e($task->content)) !!}
            <br><br>
            @if (!empty($task->file))
                <div class="lampiran-view-task-grid">
                    <div class="card lampiran-view-task">
                        <p class="lampiran-view-about">Lampiran</p>
                        <h3><a
                                href="{{asset('storage/' . $task->file)}}">{{$task->name}}.{{pathinfo($task->file, PATHINFO_EXTENSION) }}</a>
                        </h3>
                        <p class="lampiran-view-ext">{{ strtoupper(pathinfo($task->file, PATHINFO_EXTENSION)) }}</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="card view-task-action">
            <h3 class="view-task-title">{{$task->category}}</h3>
            <p>{{$task->name}}</p>
            @if ($task->category == "Materi")
                <form action="{{ route('materi.complete', ['slug' => $slug, 'task' => $task->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-task">Tandai Telah Selesai</button>
                </form>
            @elseif($task->category == "Tugas")
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn-task">Tandai Telah Selesai</button>
                </form>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
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