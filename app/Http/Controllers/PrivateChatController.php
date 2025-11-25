<?php

namespace App\Http\Controllers;

use App\Models\PrivateChat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivateChatController extends Controller
{
    public function listPasien()
    {
        $pasiens = User::where('role', 'pasien')->get();
        return view('chat.admin_list', compact('pasiens'));
    }

    public function chatRoom($id)
    {
        $pasien = User::findOrFail($id);

        if (Auth::user()->role === 'pasien' && Auth::id() != $id) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        // Tandai pesan pasien sebagai sudah dibaca
        if (Auth::user()->role === 'admin') {
            PrivateChat::where('user_id', $id)
                ->where('sender_role', 'pasien')
                ->where('is_read', false)
                ->update(['is_read' => true]);
        }

        $chats = PrivateChat::where('user_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat.room', compact('chats', 'pasien'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['message' => 'required']);
        if (Auth::user()->role === 'pasien' && Auth::id() != $id) {
            abort(403, 'Akses ditolak.');
        }

        PrivateChat::create([
            'user_id' => $id,
            'sender_id' => Auth::id(),
            'sender_role' => Auth::user()->role,
            'message' => $request->message,
            'is_read' => false
        ]);

        return back();
    }
}
