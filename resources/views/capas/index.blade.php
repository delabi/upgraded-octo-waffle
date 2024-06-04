<x-layout>
    <x-slot:heading>
        CAPAs Listings
    </x-slot:heading>

        <div class="space-y-4">

        {{-- @foreach ($tasks as $task) --}}
        <div class="flex px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
            <div class="m-3 w-2/12">
                <strong class="font-bold text-gray-500 ">11 - Access by Wheelchair</strong>
            </div>

            <div class="m-3 w-7/12">
                <p>Last Audit: 5/27/2022</p>
                <h1>CAPA: <span class="font-bold text-red-800">Fix ramp to house by wheel chair</span></h1>
                <h3>Due date: 6/5/2024</h3>
            </div>

            <div class="m-3 w-3/12">
                <a href="" class="text-white bg-green-500 font-bold  rounded py-2 px-4" >Mark as Compliant</a>
            </div>
        </div>

        <div class="flex px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
            <div class="m-3 w-2/12">
                <strong class="font-bold text-gray-500 ">14 - Fire Extinguisher</strong>
            </div>

            <div class="m-3 w-7/12">
                <p>Last Audit: 5/27/2022</p>
                <h1>CAPA: <span class="font-bold text-red-800">Provide a fire extinguisher on each floor of the house</span></h1>
                <h3>Due date: 6/5/2024</h3>
            </div>

            <div class="m-3 w-3/12">
                <a href="" class="text-white bg-green-500 font-bold  rounded py-2 px-4" >Mark as Compliant</a>
            </div>
        </div>

        <div class="flex px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
            <div class="m-3 w-2/12">
                <strong class="font-bold text-gray-500 ">10 - Fire Certificates</strong>
            </div>

            <div class="m-3 w-7/12">
                <p>Last Audit: 5/27/2022</p>
                <h1>CAPA: <span class="font-bold text-red-800">Get fire safety certification</span></h1>
                <h3>Due date: 6/5/2024</h3>
            </div>

            <div class="m-3 w-3/12">
                <a href="" class="text-white bg-green-500 font-bold  rounded py-2 px-4" >Mark as Compliant</a>
            </div>
        </div>

        

        {{-- @endforeach --}}

        {{-- <div>
            {{ $tasks->links() }}
        </div> --}}
    </div>
</x-layout>
