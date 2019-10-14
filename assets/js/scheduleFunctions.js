document.addEventListener('DOMContentLoaded', function () {
    
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        locale: 'pt-br',
        timeZone: 'BRT',        
        slotDuration: '00:15',
        minTime: '07:00',
        maxTime: '22:00',
        editable: true,
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [1, 2, 3, 4, 5], // Monday - Thursday

            startTime: '10:00', // a start time (10am in this example)
            endTime: '18:00', // an end time (6pm in this example)
        },
        
        // events: 'php/select-events.php',
        // extraParams: function() {
        //     return {
        //       cachebuster: new Date().valueOf()  
        //     };
        // },
        
        events:        
        {
           url: 'php/select-events.php',
        //    failure: function () {
        //        alert('deu erro');
        //    }
        },
       
        dateClick: function () {
            alert('a day has been clicked!');
        },
        eventDrop: function (info) {
            //alert(info.event.title + " was dropped on " + info.event.start.toISOString());
            if (!confirm("Are you sure about this change?")) {
                info.revert();
            }
        },
        eventResize: function (info) {
            alert(info.event.title + " end is now " + info.event.end.toISOString());

            if (!confirm("is this okay?")) {
                info.revert();
            }
        },
        eventClick: function (info) {            
            $('#scheduleModal').modal('show');
            //$('#scheduleModal').modal('show');
        },
    });
    calendar.render();
});
