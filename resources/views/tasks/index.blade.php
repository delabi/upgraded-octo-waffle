<x-layout>
    <x-slot:heading>
        Tasks Listings
    </x-slot:heading>

        <div class="space-y-4">

        @foreach ($tasks as $task)
        <div class="flex block px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
            <div class="m-5">
                <strong class="font-bold m-5 text-gray-500 ">{{ $task->code }} - {{ $task['code_details'] }}</strong>

            </div>

            <div class="m-3">
                <p>Last Audit: 5/27/2022</p>
                <h1> Status: <span class="font-bold text-green-700">Compliant</span></h1>
            </div>


            <div class="m-5">
                {{-- <a href="/tasks/{{ $task['id'] }}" class="text-green-700 font-bold"  >More Info...</a> --}}
                <a href="/tasks/{{ $task['id'] }}" class="text-yellow-600 font-bold border border-gray-400 rounded py-2 px-4" >Audit This</a>

            </div>


        </div>

        @endforeach

        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</x-layout>
