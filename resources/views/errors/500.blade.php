@extends("layouts.error")

@section('content')
    <div class="d-flex align-items-center justify-content-center m-5">
        <img src="/images/error.jpg" alt="Whoops!">
        <div>
            <h1>500 Error</h1>
            <p>
                Looks something has gone wrong, <a href="{{ route('welcome') }}">click here to go back</a>.
            </p>
        </div>
    </div>
@endsection
