<x-layout>
    <x-slot:heading>
        Message
    </x-slot:heading>

   <h2 class="font-bold text-lg">{{ $message['title'] }}</h2>
   <p>
        This great man said "<span>{{ $message['message_body'] }}</span>" per year.
   </p>
</x-layout>
