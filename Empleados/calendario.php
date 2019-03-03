<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-7"><div id="CalendarioWeb"></div></div>
        <div class="col"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#CalendarioWeb').fullCalendar({
            header:{
                left:'today, prev, next',
                center:'title',
                right:'month, basicWeek, basicDay'
            }
        });
    });
</script>    
</body>
</html>