<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Guestbook Laravel</title>
</head>
<body>

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
        <div>
            <label>
                Nome:
                <input type="text" name="author" value="{{ old('author'), $message->author }}" required>
            </label>
        </div>

        <div>
            <label>
                Messaggio:
                <textarea name="message" rows="4" required>{{ old('message'), $message->text }}</textarea>
            </label>
        </div>

        <button type="submit">Modifica</button>
    </form>

    <hr>

</body>
</html>
