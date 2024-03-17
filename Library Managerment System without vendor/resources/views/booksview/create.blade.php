@extends('layouts.app')
@section('pageTitle', 'Add Book')

@section('content')
    <h2>Add Book</h2>

    <h3 class="text-right ml-auto"><a href="{{ route('books.index') }}" class='btn btn-success'>Back</a></h3>

    <form class="row g-3" method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="col-md-6">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" id="" required="" name='title'>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Author</label>
            <!-- Assuming you have a relationship with authors -->
            <select class="form-select" name="author_id">
                <option selected value="">Please select an Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Genre</label>
            <!-- Assuming you have a relationship with genres -->
            <select class="form-select" name="genre_id">
                <option selected>Please select a Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->genre_id }}">{{ $genre->genre_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="" required="" name='ISBN'>
        </div>

        <div class="col-md-6">
          <label for="" class="form-label">Published Date and Time</label>
          <input type="datetime-local" class="form-control" id="" required="" name='published_date'>
      </div>

        <div class="col-md-6">
            <label for="" class="form-label">Quantity Available</label>
            <input type="number" class="form-control" id="" required="" name='quantity_available'>
        </div>

        <div class="col-10">
            <button class="btn btn-primary" type="submit">Add Book</button>
        </div>

        <div id="loadingSpinner" class="spinner-border text-primary col-2" role="status" style="display:none;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </form>

    <script>
        function submitForm() {

            document.getElementById('loadingSpinner').style.display = 'inline-block';

            setTimeout(function () {

                document.getElementById('loadingSpinner').style.display = 'none';

                alert('Form submitted successfully!');
            });
        }
    </script>
@endsection
