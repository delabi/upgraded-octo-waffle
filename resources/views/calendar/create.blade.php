<x-layout>
    <x-slot:heading>
        Create Calendar Appointment
    </x-slot:heading>
<form method="POST" action="/appointments">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Compliance Task</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">We just need a little details from you.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="code">Code</x-form-label>

          <div class="mt-2">
            <x-form-input id="code" name="code" placeholder="11" />
            <x-form-error name="code"/>
          </div>
        </x-form-field>


        <x-form-field>
          <x-form-label for="code_details">Code Details</x-form-label>

          <div class="mt-2">
            <x-form-input id="code_details" name="code_details" placeholder="6400.11..."/>
            <x-form-error name="code_details"/>
          </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="discussion">Discussion</x-form-label>

            <div class="mt-2">
              <x-form-input id="discussion" name="discussion" placeholder="Community homes..."/>
              <x-form-error name="discussion"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="inspection_procedure">Inspection Procedure</x-form-label>

            <div class="mt-2">
              <x-form-input id="inspection_procedure" name="inspection_procedure" placeholder="If a violation..."/>
              <x-form-error name="inspection_procedure"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="primary_benefit">Primary Benefit</x-form-label>

            <div class="mt-2">
              <x-form-input id="primary_benefit" name="primary_benefit" placeholder="If a violation..."/>
              <x-form-error name="primary_benefit"/>
            </div>
          </x-form-field>
      </div>

    </div>


  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href='/tasks' type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
    <x-form-button>Save</x-form-button>
  </div>
</form>

</x-layout>
