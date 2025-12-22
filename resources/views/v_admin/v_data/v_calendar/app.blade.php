@include('base.start')
@include('base.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexch arts.css">
    <!-- Styles lainnya -->
    @stack('styles')
</head>

<body>
    <!-- strat wrapper -->
    <div class="flex h-screen">
        @include('base.sidebar')
        <div class="p-6 w-full">
            <h1 class="text-xl font-bold mb-4">Delivery Calendar</h1>

            <div id="calendar"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 650,

                events: "{{ route('admin.dashboard.calendar.events') }}",

                eventDidMount: function (info) {
                    if (info.event.extendedProps.status === 'shipped') {
                        info.el.style.backgroundColor = '#3b82f6'; 
                    }
                    if (info.event.extendedProps.status === 'delivered') {
                        info.el.style.backgroundColor = '#22c55e'; 
                    }
                    if (info.event.extendedProps.status === 'late') {
                        info.el.style.backgroundColor = '#ef4444'; 
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>