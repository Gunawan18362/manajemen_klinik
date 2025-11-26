@extends('layouts.app')

@section('content')

<style>
.chat-wrapper {
    display: flex;
    flex-direction: column;
    height: 80vh;
    border-radius: 10px;
    overflow: hidden;
    background: #ece5dd;
    border: 1px solid #c1b7a0;
}

.chat-header {
    background: #075E54;
    color: white;
    padding: 12px 18px;
    font-size: 16px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 12px;
}

.chat-box {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    background: #ece5dd;
}

.bubble-container {
    margin-bottom: 12px;
    display: flex;
    width: 100%;
}

.bubble-admin {
    background: #dcf8c6;
    padding: 10px 14px;
    border-radius: 10px 10px 0 10px;
    max-width: 70%;
    margin-left: auto;
    box-shadow: 0 1px 1px rgba(0,0,0,0.2);
}

.bubble-user {
    background: white;
    padding: 10px 14px;
    border-radius: 10px 10px 10px 0;
    max-width: 70%;
    margin-right: auto;
    box-shadow: 0 1px 1px rgba(0,0,0,0.2);
}

.chat-time {
    font-size: 10px;
    opacity: .7;
    text-align: right;
}

.chat-input-area {
    background: #f0f0f0;
    padding: 12px;
    display: flex;
    gap: 10px;
    border-top: 1px solid #ccc;
}

.chat-input-area input {
    flex: 1;
    border-radius: 20px;
    border: 1px solid #ccc;
    padding: 10px 15px;
}

.chat-input-area button {
    background: #128C7E;
    border: none;
    color: white;
    padding: 10px 16px;
    border-radius: 20px;
}
</style>

<div class="chat-wrapper">

    {{-- HEADER --}}
    <div class="chat-header">
        <i class="bi bi-person-circle" style="font-size:22px;"></i>
        Chat dengan {{ $pasien->name }}
    </div>

    {{-- CHAT MESSAGES --}}
    <div class="chat-box" id="chatBox">
        @foreach($chats as $c)

            @if($c->sender_role === 'admin')
                <div class="bubble-container" style="justify-content: flex-end;">
                    <div class="bubble-admin">
                        {{ $c->message }}
                        <div class="chat-time">{{ $c->created_at->format('H:i') }}</div>
                    </div>
                </div>

            @else
                <div class="bubble-container" style="justify-content: flex-start;">
                    <div class="bubble-user">
                        {{ $c->message }}
                        <div class="chat-time">{{ $c->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @endif

        @endforeach
    </div>


    {{-- INPUT AREA --}}
    @php
        $routeToSend = auth()->user()->role === 'admin'
            ? route('admin.chat.send', $pasien->id)
            : route('pasien.chat.send', $pasien->id);
    @endphp

    <form action="{{ $routeToSend }}" method="POST" class="chat-input-area">
        @csrf
        <input type="text" name="message" placeholder="Ketik pesan..." required>
        <button type="submit"><i class="bi bi-send"></i></button>
    </form>

</div>

<script>
    let box = document.getElementById('chatBox');
    box.scrollTop = box.scrollHeight;
</script>

@endsection
