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

    {{-- <p class="mt-6">
            <x-button href="/tasks/{{ $task->id }}/edit">Edit</x-button>
    </p> --}}

    <form method="POST" action="/audit">
        @csrf
      <div class="space-y-12 mt-5">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Record Internal Audit</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Record the results of your internal audit here.</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
                <x-form-label for="corrective_action">Corrective Action Status</x-form-label>

                <div class="mt-2">
                    <input type="radio" name="gender" value="not_applicable"> Not Applicable<br>
                    <input type="radio" name="gender" value="no-violation"> No Violation<br>
                    <input type="radio" name="gender" value="fully_corrected"> Fully Corrected<br>
                    <input type="radio" name="gender" value="partially_corrected"> Partially Corrected<br>
                    <input type="radio" name="gender" value="not_corrected"> Not Corrected
                </div>
            </x-form-field>

            <x-form-field>
              <x-form-label for="violation">Violation and Corrective Action, if applicable</x-form-label>

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
