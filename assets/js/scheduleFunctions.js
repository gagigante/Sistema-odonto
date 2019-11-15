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
        
        //evento disparado ao arrastar o evento (update de data)        
        eventDrop: function (info) {     
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

        //evento disparado ao redimencionar o evento (update de data)        
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

        //evento disparado ao selecionar um evento (abre o modal de update)
        eventClick: function (info) {    
            info.jsEvent.preventDefault();  
            
            //passa o id do evento como data atributes do botao do modal de update
            $('#save-update').data('eventId', info.event.id);
            $('#save-update').data('eventId', info.event.id);
            //passa os dados do evento para os campos do form
            $('#scheduleModal #content').text(info.event.title);            
            $('#event-patient').val(info.event.extendedProps.patient);
            $('#event-title').val(info.event.title);
            $('#event-description').val(info.event.extendedProps.description);
            $('#event-start').val(info.event.start.toLocaleString());
            $('#event-end').val(info.event.end.toLocaleString());                    
            $('#scheduleModal').modal('show');            
        },
    });
    calendar.render();
});

$(document).ready(function () {

    //form de insercao de evento
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

    //form de edicao completa de evento
    $('#modalForm').submit(function (info) {
        info.preventDefault();
        let eventID = $('#save-update').data('eventId');
        data = new FormData(this);
        //acrescenta o id do evento ao objeto de data
        data.append('eventId', eventID);

        $.ajax({
            type: 'POST',
            url: 'php/update-events-click.php', 
            //passa os dados do form com o id do evento para o php atraves de req. post           
            data: data,       
            contentType: false,
            processData: false,
            success: function(response) {
                location.reload();                          
            }
        })
    });

    $('#delete-update').click(function (info) {
        info.preventDefault();        
        let eventID = $('#save-update').data('eventId');        
        $.ajax({
            type: 'POST',
            url: 'php/delete-events.php',             
            data: {eventID:eventID},       
            success: function(response) {
                location.reload();                       
            }
        })
    });
});