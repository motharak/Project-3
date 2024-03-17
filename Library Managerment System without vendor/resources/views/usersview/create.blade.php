@extends('layouts.app')
@section('pageTitle','Add User')

@section('content')
<h2>Add User</h2>

<h3 class="text-right ml-auto"><a href="{{ route('user.index') }}" class='btn btn-success'>Back</a></h3>

<form class="row g-3" method="POST" action="{{route('user.store')}}">
    @csrf
    <div class="col-md-6">
      <label for="" class="form-label">UserName</label>
      <input type="text" class="form-control" id="" required="" name='username'>
    </div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label" >Password</label>
        <input type="password" class="form-control" id="password" required="" name='password'>
        <input type="checkbox" onclick="myFunction()">Show Password

      <script>
        function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
      </script>
    </div>

    <div class="col-md-12">
        <label for="validationServer03" class="form-label" >Role</label>
        <select class="form-select" name="role">
            <option selected>Please select a Role</option>
                  <option value="Admin">Admin</option>
                  <option value="Librarian">Librarian</option>
                  <option value="Member">Member</option>

          </select>
    </div>
    
    <div class="col-10">
      <button class="btn btn-primary" type="submit">Add User</button>
    </div>
    <div id="loadingSpinner" class="spinner-border text-primary col-2" role="status" style="display:none;">
        <span class="visually-hidden">Loading...</span>
      </div>
  </form>

  <script>
    function submitForm() {

      document.getElementById('loadingSpinner').style.display = 'inline-block';

      setTimeout(function() {

        document.getElementById('loadingSpinner').style.display = 'none';

        alert('Form submitted successfully!');
      }); 
    }
  </script>
@endsection


