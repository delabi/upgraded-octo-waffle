<x-layout>
    <x-slot:heading>
        Task
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $task->code }}</h2>
    <h2 class="font-bold text-lg">{{ $task->code_details }}</h2>
    <div>
            <strong>Discussion: </strong> {{ $task->discussion }}.
    </div>
    <div>
            <strong>Inspection Procedure: </strong> {{ $task->inspection_procedure }}
    </div>
    <div>
            <strong>Primary Benefit: </strong> {{ $task->primary_benefit }}
        </div>

    <p class="mt-6">
            <x-button href="/tasks/{{ $task->id }}/edit">Edit</x-button>
    </p>

    <p class="mt-6">
        <x-button href="/tasks/{{ $task->id }}/audit">Audit</x-button>
    </p>
</x-layout>
