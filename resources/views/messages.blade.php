<x-layout>
    <x-slot:heading>
        Messages List
    </x-slot:heading>

    <ul>
    @foreach ($messages as $message)
        <div class="card">
            <li>
                <a href="/messages/{{ $message['id'] }}">
                    <strong>{{ $message['title'] }}: </strong> " {{ $message['message_body'] }} ".
                </a>
            </li>
        <div class="card">
    @endforeach

    </ul>

</x-layout>
