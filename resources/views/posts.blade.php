<x-layout>
    <x-slot:heading>
        Posts Board
    </x-slot:heading>

    <ul>
    @foreach ($posts as $post)
        <div class="card bg-red-300 m-10 p-10 rounded-lg">
            <li>
                <a href="/posts/{{ $post['id'] }}">
                    <h3><strong>{{ $post['posting'] }}: </strong> </h3>
                    <p>{{ $post['company'] }} </p>
                    <p>{{ $post['location'] }} </p>
                    <p>{{ $post['description'] }}</p>
                </a>
            </li>
        </div>
    @endforeach

    </ul>

</x-layout>
