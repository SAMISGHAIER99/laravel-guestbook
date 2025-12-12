@extends('layouts.app')

@section('title', 'Guestbook')

@section('content')

<h1 class="mb-4">Guestbook</h1>

{{-- Messaggio di successo dopo il redirect --}}
@if (session('success'))
<p style="color: green;">
    {{ session('success') }}
</p>
@endif

{{-- Errori di validazione --}}
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- FORM DI Modifica messaggio --}}
<form method="POST" action="{{ route('messages.update', $message->id) }}">
    @csrf {{-- token di sicurezza --}}
    @method('PUT');
    <form>
        <div class="mb-3">
            <label for="author" class="form-label">Nome
              
            </label>
            <input type="author" class="form-control" id="author" aria-describedby="author">

        </div>
        <div class="mb-3">
            <label for="message" class="form-label">message
                
            </label>
            <input type="text" class="form-control" id="message">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</form>






<hr>
@endsection('content')