<x-layout>
    <x-slot:heading>
        Tasks Listings
    </x-slot:heading>

        <div class="space-y-4">

        @foreach ($tasks as $task)
        <div class="block px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
            <div class="font-bold text-blue-500 ">{{ $task->code }}</div>
            <div>{{ $task['code_details'] }}: </div>
            {{-- <div><strong>Discussion:</strong> {{ $task['discussion'] }}</div>
            <div><strong>Inspection Procedure:</strong>  {{ $task['inspection_procedure'] }} </div>
            <div><strong>Primary Benefit: </strong> {{ $task['primary_benefit'] }}</div> --}}
            <div class="m-5">
                <a href="/tasks/{{ $task['id'] }}" class="text-green-700 font-bold"  >More Info...</a>
                <a href="/tasks/{{ $task['id'] }}" class="text-yellow-600 font-bold border border-gray-400 rounded m-2 py-2 px-4" >Audit This</a>

            </div>
        </div>

        @endforeach

        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</x-layout>
