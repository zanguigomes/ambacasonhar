<section class="section-padding next-prev-section">
    <div class="container">
        <div class="row">

            @if($prevPost)

            <div class="col-12 col-md-6 news-block ">
                <h6><a href="{{ route('site.pages.post', $prevPost->slug) }}" class="news-block-title-link"><i class="fa-solid fa-arrow-left"></i> Anterior</a></h6>
                <div class="news-block-info">

                    <div class="news-block-title mb-2">
                        <h4><a href="{{ route('site.pages.post', $prevPost->slug) }}" class="news-block-title-link">{{ $prevPost->title }}</a></h4>
                    </div>

                    <div class="news-block-body">
                        <p>{{ $prevPost->head_line }}</p>
                    </div>
                </div>
            </div>
        @else
        <div class="col-12 col-md-6 news-block ">
            <div class="news-block-info">
                <div class="news-block-title mb-2"></div>
                <div class="news-block-body"></div>
            </div>
        </div>
        @endif
        @if($nextPost)
            <div class="col-12 col-md-6 news-block text-right">
                <h6 class="text-right"><a href="{{ route('site.pages.post', $nextPost->slug) }}" class="news-block-title-link">Próximo <i class="fa-solid fa-arrow-right"></i></a></h6>
                <div class="news-block-info">

                    <div class="news-block-title mb-2">
                        <h4><a href="{{ route('site.pages.post', $nextPost->slug) }}" class="news-block-title-link">{{ $nextPost->title }}</a></h4>
                    </div>

                    <div class="news-block-body">
                        <p>{{ $nextPost->head_line }}</p>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>