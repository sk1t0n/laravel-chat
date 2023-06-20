<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller
{
    public function showChat(Request $request): Response
    {
        $messages = Message::with('user')->get();

        return Inertia::render('Chat', [
            'currentUser' => $request->user(),
            'messages' => $messages,
        ]);
    }

    public function addMessage(MessageRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $request->user();

        $newMessage = Message::create([
            'message' => $data['message'],
            'user_id' => $user->id,
        ]);

        broadcast(new MessageSent($user, $newMessage))->toOthers();

        return response()->json([
            'message' => $newMessage->message,
            'user' => $user,
        ]);
    }
}
