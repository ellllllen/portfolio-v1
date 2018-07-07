<div class="jumbotron jumbotron-fluid py-3 rounded">
    <div class="container">
        <h1 class="display-6">
            <img src="{{ $article->getPublicImage() }}" class="rounded img-thumbnail img-fluid"
                alt="{{ $article->title }}">
                {{ $article->title }}
        </h1>
        <p>{!! $article->present()->shortenedSection() !!}</p>
        <div class="text-right">
            <a class="btn btn-primary"
                href="{{ route('articles.show', ['article' => $article->id]) }}"
                role="button">
                More Details
            </a>
        </div>
    </div>
</div>