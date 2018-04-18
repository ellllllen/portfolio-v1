@extends('articles.show')

@section('additional-content')
    <div class="articles books">
    @foreach($books as $book)
        <h3>{{ $book->getTitle() }}</h3>
        <div class="d-flex justify-content-center flex-wrap book">
            @foreach($book->getAllImages() as $image)
                @if($book->doesImageExist($image))
                    <div class="m-2">
                        <img class="img-thumbnail" src="/{{ $book->getImagePath($image) }}"
                             data-toggle="modal" data-target="#bookImageModal"
                             data-source="/{{ $book->getImagePath($image) }}">
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
    </div>
    <div class="modal fade" id="bookImageModal" tabindex="-1" role="dialog" aria-labelledby="bookImageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <img src="" class="book-image">
            </div>
        </div>
    </div>
@append

@section('js')
    <script>
        $('#bookImageModal').on('show.bs.modal', function (event) {
            let recipient = $(event.relatedTarget).data('source');
            $(this).find('.book-image').attr('src', recipient);
        })
    </script>
@append