@extends('layouts.app')
@section('pageTitle','Contact')

@section('content')
<section id="category" class="feature">
	<div class="container">
    <h1>Contact</h1>
    <p>Here is how you can reach us:</p>
    <ul>
        <li>Phone: (123) 456-7890</li>
        <li>Email: info@example.com</li>
        <li>Address: 1234 Example St, City, ST 12345</li>
    </ul>
    <form action="/contact" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
    </div>
<section>
@endsection