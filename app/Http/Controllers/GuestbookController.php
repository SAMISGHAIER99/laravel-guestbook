<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreMessageRequest;

use Illuminate\Http\Request;
use App\Models\Message;


class GuestbookController extends Controller
{
    // GET /
    public function index()
    {
        // prendo i messaggi dal DB, dal più recente al più vecchio
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);

        return view('index', [
            'messages' => $messages,
        ]);
    }


    // POST /messages
    public function store(StoreMessageRequest $request)
    {
        // 1) validazione dati
       // $validated = $request->validate([
         //   'author'  => ['required', 'string', 'max:255'],
           // 'message' => ['required', 'string'],
        //]);

        // 2) salvataggio su DB
        
       Message::create($request->validated());

        // 3) redirect alla pagina principale
        return redirect()->back()->with('success','Messaggio aggiungo con successo');
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
        return redirect('/')->with('success', 'Messaggio Modificato con successo!');
    }

    //destroy 
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect('/')->with('success', 'Messaggio cancellato con successo!');
    }
}
