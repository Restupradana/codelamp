<?php

public function index()
{
    $users = User::where('id', '!=', auth()->id())->get();
    $layout = match(auth()->user()->role) {
        'admin' => 'layouts.admin',
        'instruktur' => 'layouts.instruktur',
        default => 'layouts.sidebar',
    };
    return view('chat.index', compact('users', 'layout'));
}

public function fetchMessages(User $user)
{
    $messages = Message::where(function($q) use ($user) {
        $q->where('from_id', auth()->id())->where('to_id', $user->id);
    })->orWhere(function($q) use ($user) {
        $q->where('from_id', $user->id)->where('to_id', auth()->id());
    })->get();

    return response()->json($messages);
}

public function sendMessage(Request $request)
{
    $message = Message::create([
        'from_id' => auth()->id(),
        'to_id' => $request->to_id,
        'message' => $request->message
    ]);

    broadcast(new MessageSent($message))->toOthers();

    return response()->json($message);
}
