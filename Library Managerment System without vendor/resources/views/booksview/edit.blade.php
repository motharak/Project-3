@extends('layouts.app')
@section('pageTitle', 'Add Book')

@section('content')
    <h2>Update Book</h2>

    <h3 class="text-right ml-auto"><a href="{{ route('books.index') }}" class='btn btn-success'>Back</a></h3>

    <form class="row g-3" method="POST" action="{{ route('books.update',$book->book_id) }}">
        @csrf
        @method("PUT")
        <div class="col-md-6">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" id="" required="" name='title' value="{{$book->title}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Author</label>
            <!-- Assuming you have a relationship with authors -->
            <select class="form-select" name="author_id" select='{{$book->author_id}}'>
                
                @foreach ($authors as $author)
                    <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Genre</label>
            <select class="form-select" name="genre_id" select='{{$book->genre_id}}'>
                
                @foreach ($genres as $genre)
                    <option value="{{ $genre->genre_id }}">{{ $genre->genre_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="" required="" name='ISBN' value="{{$book->ISBN}}">
        </div>

        <div class="col-md-6">
          <label for="" class="form-label">Published Date and Time</label>
          <input type="datetime-local" class="form-control" id="" required="" name='published_date' value="{{$book->published_date}}">
      </div>

        <div class="col-md-6">
            <label for="" class="form-label">Quantity Available</label>
            <input type="number" class="form-control" id="" required="" name='quantity_available' value={{$book->quantity_available}}>
        </div>

        <div class="col-10">
            <button class="btn btn-primary" type="submit">Update Book</button>
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
