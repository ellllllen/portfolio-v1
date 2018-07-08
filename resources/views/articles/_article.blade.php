<div>
    <h5>
        <a class="text-secondary" href="{{ route('articles.show', ['article' => $article->id]) }}">
            {{ $article->title }}
        </a>
    </h5>
    <p class="text-justify">
        {!! $article->present()->shortenedSection($length ?? 500) !!}
        <a class="text-secondary" title="Read more"
           href="{{ route('articles.show', ['article' => $article->id]) }}">
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </p>

</div>