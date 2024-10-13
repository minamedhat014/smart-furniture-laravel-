@props(['events'])


<div id='calendar'></div>


@push('css')
<script src="{{asset('assets\dist\fullcalender\index.global.js')}}"> </script>
@endpush

@push('js-scripts')

<script>
  document.addEventListener('DOMContentLoaded', function() {

    
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
        slotMinTime: '09:00:00',     // Start time at 9 AM
        slotMaxTime: '24:00:00',     // End time at 12 PM
      initialDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      selectable: false,
      selectMirror: false,
       //select box 
      select: function(arg) {
        const selectedDate = arg.startStr;
      },

      //click event 
      eventClick: function(arg) { 
        if(confirm('are you sure you want to leave current page and view  appointment details')){
         const selectedID = 1;
          const targetUrl = `{{ route('appointment.view', ':id') }}`.replace(':id', selectedID);
      // go of the laravel route 
      window.open(targetUrl, '_blank');
        } 
      },


      editable: false,
      dayMaxEvents: true, // allow "more" link when too many events
      events: @json($events), 
    });

    calendar.render();
  });

</script>

@endpush