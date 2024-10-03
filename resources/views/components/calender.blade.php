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
      initialDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: false,
       //select box 
      select: function(arg) {
        const selectedDate = arg.startStr;
      // Generate the URL for the Laravel route dynamically
     const targetUrl = `{{ route('appointment.daily', ':date') }}`.replace(':date', selectedDate);
      // go of the laravel route 
      window.location.href = targetUrl;
      },

      //click event 
      eventClick: function(arg) { 

        if(confirm('are you sure you want to leave current page and view  appointment details')){
         const selectedID = 1;
          const targetUrl = `{{ route('orderQoutation.print', ':id') }}`.replace(':id', selectedID);
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