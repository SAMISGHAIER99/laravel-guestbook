<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Guestbook Laravel</title>
</head>

<body>
    <h1>Guestbook Laravel</h1>

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

    {{-- FORM DI INSERIMENTO --}}
    <form method="POST" action="{{ route('messages.store') }}">
        @csrf {{-- token di sicurezza --}}

        <div>
            <label>
                Nome:
                <input type="text" name="author" value="{{ old('author') }}" required>
            </label>
        </div>

        <div>
            <label>
                Messaggio:
                <textarea name="message" rows="4" required>{{ old('message') }}</textarea>
            </label>
        </div>

        <button type="submit">Invia</button>
    </form>

    <hr>

    <h2>Messaggi:</h2>

    @if($messages->isEmpty())
    <p>Nessun messaggio ancora. Scrivi tu il primo!</p>
    @else
    <ul>
        @foreach ($messages as $msg)
        <li style="margin-bottom: 10px;">
            <strong>{{ $msg->author }}</strong><br>
            {{ $msg->message }}<br>
            <small>{{ $msg->created_at }}</small>


            <a href="{{ route('messages.edit', $msg->id) }}">Modifica</a>

            {{-- pulsantre per la cnaellazione del messaggio --}}
            <form method="POST" action="{{route('messages.destroy',$msg->id)}}" style="display:inline">
                @csrf {{-- token di sicurezza --}}
                @method('DELETE')
                <button type="submit">Elimina</button>
            </form>
        </li>
        @endforeach
    </ul>
    @endif
</body>

</html>