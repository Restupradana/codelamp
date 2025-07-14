@extends($layout)

@section('content')
<div class="flex h-screen">
    <div class="w-1/4 bg-gray-100 border-r overflow-y-auto">
        <ul>
            @foreach ($users as $user)
                <li class="p-4 border-b cursor-pointer contact" data-id="{{ $user->id }}">
                    {{ $user->name }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flex-1 flex flex-col">
        <div id="chat-box" class="flex-1 p-4 overflow-y-auto"></div>
        <form id="message-form" class="p-4 flex border-t">
            <input type="hidden" id="to_id">
            <input type="text" id="message" class="flex-1 border p-2" placeholder="Tulis pesan..." />
            <button type="submit" class="ml-2 px-4 bg-blue-500 text-white rounded">Kirim</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('/js/app.js') }}"></script>
<script>
    let currentUserId = {{ auth()->id() }};
    let selectedUserId = null;

    Echo.private(`chat.${currentUserId}`)
        .listen('MessageSent', (e) => {
            if (e.message.from_id === selectedUserId) {
                document.querySelector('#chat-box').innerHTML += `<div class="p-2 bg-gray-200 rounded mb-2">${e.message.message}</div>`;
            }
        });

    document.querySelectorAll('.contact').forEach(el => {
        el.addEventListener('click', async function () {
            selectedUserId = this.dataset.id;
            document.querySelector('#to_id').value = selectedUserId;

            const res = await axios.get(`/chat/messages/${selectedUserId}`);
            let box = document.querySelector('#chat-box');
            box.innerHTML = '';
            res.data.forEach(msg => {
                let align = msg.from_id == currentUserId ? 'text-right bg-blue-200' : 'text-left bg-gray-200';
                box.innerHTML += `<div class="p-2 ${align} rounded mb-2">${msg.message}</div>`;
            });
        });
    });

    document.querySelector('#message-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const to_id = document.querySelector('#to_id').value;
        const message = document.querySelector('#message').value;
        if (!message.trim()) return;

        const res = await axios.post('/chat/send', { to_id, message });

        document.querySelector('#chat-box').innerHTML += `<div class="p-2 text-right bg-blue-200 rounded mb-2">${message}</div>`;
        document.querySelector('#message').value = '';
    });
</script>
@endpush
