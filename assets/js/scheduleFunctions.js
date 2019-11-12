document.addEventListener('DOMContentLoaded', function () {
    
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        defaultView: 'timeGridWeek',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,dayGridMonth,listWeek'
        },
        locale: 'pt-br',
        // timeZone: 'BRT',        
        slotDuration: '00:15',
        // minTime: '07:00',
        // maxTime: '22:00',
        nowIndicator: true,
        selectable: true,
        editable: true,
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events

        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [1, 2, 3, 4, 5, 6],
            startTime: '09:00', // a start time (10am in this example)
            endTime: '18:00', // an end time (6pm in this example)
        },              
        events:        
        {
           url: 'php/select-events.php',       
        },
        select: function(info) {            
            $('#registerModal #add-start').val(info.start.toLocaleString());
            $('#registerModal #add-end').val(info.end.toLocaleString());
            $('#registerModal').modal('show');
        },
        
        eventDrop: function (info) { 
            //alert(info.event.end);
            $.ajax({
                url: 'php/update-events.php',
                type: 'POST', 
                data: {                   
                    inicio: info.event.start.toLocaleString(),
                    fim: info.event.end.toLocaleString(),                   
                    id: info.event.id                    
                },                 
            })              
        },
        eventResize: function (info) {                
            //alert(info.event.end);
            $.ajax({
                url: 'php/update-events.php',
                type: 'POST', 
                data: {                   
                    inicio: info.event.start.toLocaleString(),
                    fim: info.event.end.toLocaleString(),                   
                    id: info.event.id                    
                },                 
            })   
        },

        eventClick: function (info) {    
            info.jsEvent.preventDefault(); 
            // console.log(info.event.description);
            $('#scheduleModal #content').text(info.event.title);
            // $('#scheduleModal #id').text(info.event.id);                
            $('#event-patient').val(info.event.title);
            $('#event-title').val(info.event.id);
            $('#event-description').val(info.event.patient);
            $('#event-start').val(info.event.start);
            $('#event-end').val(info.event.end);                        
            $('#scheduleModal').modal('show');            
        },
    });
    calendar.render();
});

$(document).ready(function () {
    $("#scheduleForm").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "php/add-events.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                location.reload();
            }
        })
    });
});