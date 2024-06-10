<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

        <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 ">{{ $job->employer->name }}</div>
            <strong class="text-halipro-green">{{ $job['title'] }}: </strong> Paid ${{ $job['salary'] }} per year.
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>

</x-layout>
