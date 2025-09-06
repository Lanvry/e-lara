@component("components.layout")

@section('body-class', '')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
        <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
        <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    @endpush
    <div class="dashboard">
        <x-sidebar-dash></x-sidebar-dash>

        <!-- Overlay -->
        <div class="overlay side" id="overlayside"></div>
        <div class="overlay" id="overlay"></div>

        <x-popup></x-popup>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <x-header-dash></x-header-dash>

            <!-- Content Area -->
            <div class="content">
                @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
                    <nav aria-label="breadcrumb" class="breadcrumb margin-10">
                        <ol>
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li>
                                    @if ($loop->last)
                                        <span aria-current="page">{{ $breadcrumb['label'] }}</span>
                                    @else
                                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                @endif
                @yield('content-dash')
            </div>
        </main>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script>hljs.highlightAll();</script>
        <script src="{{ asset('js/dash.js') }}"></script>
        <script src="{{ asset('js/chat.js') }}"></script>
    @endpush
@endsection

@endcomponent