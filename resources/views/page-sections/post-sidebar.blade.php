
    {{-- <header class="last-posts-list">
        <h2>Outras notícias</h2>
    </header> --}}
    @foreach ($lastNews as $list)
    <a href="{{ route('site.pages.post', $list->slug) }}">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-8 col-lg-6">
                    <h3>{{ $list->title }} </h3>
                </div>
                <div class="col-6 col-md-4 col-lg-6">
                    <div class="img-box">
                    <img src="{{ url("storage/{$list->thumb}") }}" class="radius5" alt="{{ $list->title }}">
                </div></div>
            </div>
        </div>
    </a>
    @endforeach
