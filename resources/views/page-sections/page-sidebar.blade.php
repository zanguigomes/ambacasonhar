<ul class="pages-list">
    @foreach ($pagesList as $list)
    <li><a href="{{ route('site.pages.page', $list->key) }}" class="radius10">{{ $list->title }}</a></li>
    @endforeach
</ul>
