<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller
{
    public function showChat(): Response
    {
        return Inertia::render('Chat', [
            'currentUser' => auth()->user(),
            'messages' => [
                [
                    'message' => 'Message 1',
                    'user' => User::find(1),
                ],
                [
                    'message' => 'Message 2',
                    'user' => User::find(2),
                ],
            ],
        ]);
    }
}
