<x-layout>
    <x-slot:heading>
        Task
    </x-slot:heading>

    <h2 class="m-5 font-bold text-lg">{{ $task->code }} - {{ $task->code_details }}</h2>

    <div class="m-5">
            <strong>Discussion: </strong> {{ $task->discussion }}.
    </div>
    <div class="m-5">
            <strong>Inspection Procedure: </strong> {{ $task->inspection_procedure }}
    </div>
    <div class="m-5">
            <strong>Primary Benefit: </strong> {{ $task->primary_benefit }}
        </div>

    {{-- <p class="mt-6">
            <x-button href="/tasks/{{ $task->id }}/edit">Edit</x-button>
    </p> --}}

    <form method="POST" action="/audit">
        @csrf
      <div class="space-y-12 m-5">
        <div class="border border-gray-500 rounded-lg">

          <div class="m-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
                <x-form-label for="corrective_action">Current Assessment</x-form-label>

                <div class="mt-2">
                    <input type="radio" name="gender" value="not_applicable"> Compliant<br>
                    <input type="radio" name="gender" value="no-violation"> Violation found<br>
                    <input type="radio" name="gender" value="fully_corrected"> Not Applicable<br>
                </div>
            </x-form-field>

            <x-form-field>
              <x-form-label for="violation">Comments</x-form-label>

              <div class="mt-2">
                <x-form-input id="violation" name="violation" placeholder="..." />
                <x-form-error name="violation"/>
              </div>
            </x-form-field>


        </div>

    </div>


  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href='/tasks' type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
    <x-form-button>Save Audit</x-form-button>
  </div>
</form>

    {{-- <p class="mt-6">
        <x-button href="/tasks/{{ $task->id }}/">Audit</x-button>
    </p> --}}
</x-layout>
