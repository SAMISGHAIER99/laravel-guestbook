<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class GuestbookController extends Controller
{
    // GET /
    public function index()
    {
        // prendo i messaggi dal DB, dal più recente al più vecchio
        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('index', [
            'messages' => $messages,
        ]);
    }


    // POST /messages
    public function store(Request $request)
    {
        // 1) validazione dati
        $validated = $request->validate([
            'author'  => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        // 2) salvataggio su DB
        Message::create($validated);

        // 3) redirect alla pagina principale
        return redirect('/guestbook')->with('success', 'Messaggio aggiunto con successo!');
    }

    public function edit(Message $message)
    {
        return view('edit', [
            'message' => $message,
        ]);
    }

    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'author'  => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $message->update($validated);
        // 3) redirect alla pagina principale
        return redirect('/guestbook')->with('success', 'Messaggio Modificato con successo!');
    }

    //destroy 
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect('/guestbook')->with('success', 'Messaggio cancellato con successo!');
    }
}
