<div class="row mb-5">
    <div class="col-2 align-self-center">
        <a href="{{ route('articles.show', ['article' => $article->id]) }}">
            <img src="{{ $article->getPublicImage() }}" class="rounded img-thumbnail img-fluid"
                 alt="{{ $article->title }}">
        </a>
    </div>
    <div class="col">
        <h4>
            <a class="text-secondary" href="{{ route('articles.show', ['article' => $article->id]) }}">
                {{ $article->title }}
            </a>
        </h4>
        <p class="card-text text-justify">{!! $article->present()->shortenedSection() !!}</p>
    </div>
    @if(isset($haveReadMoreButton) && $haveReadMoreButton)
        <div class="col-2 align-self-end">
            <div class="text-right">
                <a class="btn btn-primary"
                   href="{{ route('articles.show', ['article' => $article->id]) }}"
                   role="button">
                    <span class="mr-2">Read More</span>
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    @endif
</div>