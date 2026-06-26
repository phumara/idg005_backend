<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatSystem</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }
        .app {
            width: 100%;
            max-width: 640px;
            padding: 32px 20px 64px;
        }
        h1 { font-size: 1.6rem; margin-bottom: 4px; }
        .subtitle { color: #94a3b8; margin-top: 0; font-size: .9rem; }
        form {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 16px;
            margin: 24px 0;
            display: grid;
            gap: 10px;
        }
        input, textarea {
            width: 100%;
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: 8px;
            color: #e2e8f0;
            padding: 10px 12px;
            font: inherit;
        }
        textarea { resize: vertical; min-height: 70px; }
        button {
            justify-self: start;
            background: #6366f1;
            color: #fff;
            border: 0;
            border-radius: 8px;
            padding: 10px 18px;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover { background: #4f46e5; }
        .errors { color: #f87171; font-size: .85rem; margin: 0; padding-left: 18px; }
        .message {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 12px;
        }
        .message .meta {
            display: flex;
            justify-content: space-between;
            font-size: .8rem;
            color: #94a3b8;
            margin-bottom: 6px;
        }
        .message .author { font-weight: 600; color: #a5b4fc; }
        .message .body { margin: 0; white-space: pre-wrap; }
        .empty { color: #64748b; text-align: center; padding: 24px 0; }
    </style>
</head>
<body>
    <div class="app">
        <h1>💬 ChatSystem</h1>
        <p class="subtitle">A simple Laravel message board — Session 1.</p>

        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            @if ($errors->any())
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="text" name="author" placeholder="Your name" value="{{ old('author') }}" maxlength="50">
            <textarea name="body" placeholder="Write a message…" maxlength="1000">{{ old('body') }}</textarea>
            <button type="submit">Send</button>
        </form>

        @forelse ($messages as $message)
            <div class="message">
                <div class="meta">
                    <span class="author">{{ $message->author }}</span>
                    <span>{{ $message->created_at->diffForHumans() }}</span>
                </div>
                <p class="body">{{ $message->body }}</p>
            </div>
        @empty
            <p class="empty">No messages yet. Be the first to say hello! 👋</p>
        @endforelse
    </div>
</body>
</html>
