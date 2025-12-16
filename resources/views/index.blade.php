@extends('layouts.app')

@section('title', 'Guestbook')

@section('content')

<h1 class="mb-4">Guestbook</h1>

{{-- Messaggio di successo --}}
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Errori di validazione (generali) --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- FORM DI INSERIMENTO --}}
<form method="POST" action="{{ route('messages.store') }}" class="mb-4">
    @csrf

    <div class="mb-3">
        <label for="author" class="form-label">Nome</label>
        <input
            type="text"
            id="author"
            name="author"
            class="form-control"
            value="{{ old('author') }}"
            required>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Messaggio</label>
        <textarea
            id="message"
            name="message"
            rows="4"
            class="form-control"
            required>{{ old('message') }}</textarea>
    </div>

    <button class="btn btn-primary">Invia</button>
</form>

<hr>

<h2>Messaggi</h2>

@if ($messages->isEmpty())
<p class="text-muted">Nessun messaggio ancora. Scrivi tu il primo!</p>
@else
<ul class="list-group">
    @foreach ($messages as $msg)
    <li class="list-group-item">
        <strong>{{ $msg->author }}</strong><br>
        {{ $msg->message }}<br>
        <small class="text-muted">
            {{ $msg->created_at->format('d/m/Y H:i') }}
        </small>

        <div class="mt-2">
            <a
                class="btn btn-sm btn-outline-primary"
                href="{{ route('messages.edit', $msg->id) }}">
                Modifica
            </a>

            <form
                method="POST"
                action="{{ route('messages.destroy', $msg->id) }}"
                class="d-inline"
                onsubmit="return confirm('Eliminare questo messaggio?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">
                    Elimina
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>

<div class="mt-3">
    {{ $messages->links() }}
</div>


@endif

@endsection