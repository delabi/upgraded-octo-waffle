<x-layout>
    <x-slot:heading>
       Calendar Listings
    </x-slot:heading>

        <div class="space-y-4">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search events">
                            <div class="input-group-append">
                                <button id="searchButton" class="btn btn-primary">{{__('Search')}}</button>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                            <button id="exportButton" class="btn btn-success">{{__('Export Calendar')}}</button>
                        </div>
                        <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                            <a href="{{ URL('add-schedule') }}" class="btn btn-success">{{__('Add')}}</a>
                        </div>
        
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
            {{-- <script>

                document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
                });

            </script> --}}

            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendarEl = document.getElementById('calendar');
                var events = [];
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    initialView: 'dayGridMonth',
                    timeZone: 'UTC',
                    events: '/events',
                    editable: true,

                    // Deleting The Event
                    eventContent: function(info) {
                        var eventTitle = info.event.title;
                        var eventElement = document.createElement('div');
                        eventElement.innerHTML = '<span style="cursor: pointer;">❌</span> ' + eventTitle;

                        eventElement.querySelector('span').addEventListener('click', function() {
                            if (confirm("Are you sure you want to delete this event?")) {
                                var eventId = info.event.id;
                                $.ajax({
                                    method: 'get',
                                    url: '/schedule/delete/' + eventId,
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        console.log('Event deleted successfully.');
                                        calendar.refetchEvents(); // Refresh events after deletion
                                    },
                                    error: function(error) {
                                        console.error('Error deleting event:', error);
                                    }
                                });
                            }
                        });
                        return {
                            domNodes: [eventElement]
                        };
                    },

                    // Drag And Drop

                    eventDrop: function(info) {
                        var eventId = info.event.id;
                        var newStartDate = info.event.start;
                        var newEndDate = info.event.end || newStartDate;
                        var newStartDateUTC = newStartDate.toISOString().slice(0, 10);
                        var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                        $.ajax({
                            method: 'post',
                            url: `/schedule/${eventId}`,
                            data: {
                                '_token': "{{ csrf_token() }}",
                                start_date: newStartDateUTC,
                                end_date: newEndDateUTC,
                            },
                            success: function() {
                                console.log('Event moved successfully.');
                            },
                            error: function(error) {
                                console.error('Error moving event:', error);
                            }
                        });
                    },

                    // Event Resizing
                    eventResize: function(info) {
                        var eventId = info.event.id;
                        var newEndDate = info.event.end;
                        var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                        $.ajax({
                            method: 'post',
                            url: `/schedule/${eventId}/resize`,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                end_date: newEndDateUTC
                            },
                            success: function() {
                                console.log('Event resized successfully.');
                            },
                            error: function(error) {
                                console.error('Error resizing event:', error);
                            }
                        });
                    },
                });

                calendar.render();

                document.getElementById('searchButton').addEventListener('click', function() {
                    var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
                    filterAndDisplayEvents(searchKeywords);
                });


                function filterAndDisplayEvents(searchKeywords) {
                    $.ajax({
                        method: 'GET',
                        url: `/events/search?title=${searchKeywords}`,
                        success: function(response) {
                            calendar.removeAllEvents();
                            calendar.addEventSource(response);
                        },
                        error: function(error) {
                            console.error('Error searching events:', error);
                        }
                    });
                }


                // Exporting Function
                document.getElementById('exportButton').addEventListener('click', function() {
                    var events = calendar.getEvents().map(function(event) {
                        return {
                            title: event.title,
                            start: event.start ? event.start.toISOString() : null,
                            end: event.end ? event.end.toISOString() : null,
                            color: event.backgroundColor,
                        };
                    });

                    var wb = XLSX.utils.book_new();

                    var ws = XLSX.utils.json_to_sheet(events);

                    XLSX.utils.book_append_sheet(wb, ws, 'Events');

                    var arrayBuffer = XLSX.write(wb, {
                        bookType: 'xlsx',
                        type: 'array'
                    });

                    var blob = new Blob([arrayBuffer], {
                        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    });

                    var downloadLink = document.createElement('a');
                    downloadLink.href = URL.createObjectURL(blob);
                    downloadLink.download = 'events.xlsx';
                    downloadLink.click();
                })
            </script>


            <h2>Upcoming Compliance Activities</h2>
            <div class="space-y-4">
                <div class="flex px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
                    <div class="m-3 w-2/12">
                        <strong class="font-bold text-gray-500 ">General Requirements Audit</strong>
                    </div>
        
                    <div class="m-3 w-7/12">
                        <h1>Description: <span class="font-bold text-green-700">Self Audit General Requirements</span></h1>
                        <h3>Start Date: 6/10/2024</h3>
                        <h3>End date: 6/15/2024</h3>
                    </div>
        
                    <div class="m-3 w-3/12">
                        <a href="" class="text-blue-600 font-bold border border-gray-400 rounded py-2 px-4" >Start Audit</a>
                    </div>
                </div>

                <div class="flex px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
                    <div class="m-3 w-2/12">
                        <strong class="font-bold text-gray-500 ">Individual Rights Audit</strong>
                    </div>
        
                    <div class="m-3 w-7/12">
                        <h1>Description: <span class="font-bold text-green-700">Self Audit Individual Rights</span></h1>
                        <h3>Start Date: 6/18/2024</h3>
                        <h3>End date: 6/25/2024</h3>
                    </div>
        
                    <div class="m-3 w-3/12">
                        <a href="" class="text-blue-600 font-bold border border-gray-400 rounded py-2 px-4" >Start Audit</a>
                    </div>
                </div>

                <div class="flex px-4 py-6 border border-gray-300 shadow-2xl rounded-lg">
                    <div class="m-3 w-2/12">
                        <strong class="font-bold text-gray-500 ">Staffing Audit</strong>
                    </div>
        
                    <div class="m-3 w-7/12">
                        <h1>Description: <span class="font-bold text-green-700">Self Audit Staffing</span></h1>
                        <h3>Start Date: 6/18/2024</h3>
                        <h3>End date: 6/25/2024</h3>
                    </div>
        
                    <div class="m-3 w-3/12">
                        <a href="" class="text-blue-600 font-bold border border-gray-400 rounded py-2 px-4" >Start Audit</a>
                    </div>
                </div> 
                
                <div class="flex px-4 py-6 bg-red-500 border border-gray-300 shadow-2xl rounded-lg">
                    <div class="m-3 w-2/12">
                        <strong class="font-bold text-white ">ODP Audit</strong>
                    </div>
        
                    <div class="m-3 w-7/12 text-white ">
                        <h1>Description: <span class="font-bold">State Authorities Audit Staffing</span></h1>
                        <h3>Start Date: 6/23/2024</h3>
                        <h3>End date: 6/25/2024</h3>
                    </div>
        
                    <div class="m-3 w-3/12">
                        <a href="" class="text-white bg-green-400 font-bold border border-gray-400 rounded py-2 px-4">Start Audit</a>
                    </div>
                </div> 
    </div>
</x-layout>
