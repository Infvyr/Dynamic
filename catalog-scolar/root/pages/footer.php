<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Versiune</b> 0.1
	</div>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.catalog-scolar.xyz" target="_blank" title="deschideți pagina principală a catalogului" rel="nofollow">catalog-scolar.xyz</a></strong> Toate drepturile sunt rezervate.
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fullcalendar/moment.min.js"></script>
<script src="../plugins/fullcalendar/fullcalendar.min.js"></script>

<script>
	$(document).ready(function(){
		$("#password_show_button").mouseup(function(){
		$("#pwd").attr("type", "password");
		});
		$("#password_show_button").mousedown(function(){
		$("#pwd").attr("type", "text");
		});

		$("#password_show_button2").mouseup(function(){
		$("#newpwd").attr("type", "password");
		});
		$("#password_show_button2").mousedown(function(){
		$("#newpwd").attr("type", "text");
		});

		$("#password_show_button3").mouseup(function(){
		$("#newpwd2").attr("type", "password");
		});
		$("#password_show_button3").mousedown(function(){
		$("#newpwd2").attr("type", "text");
	});

	/* calendar */
	$('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'azi',
                month: 'lună',
                week: 'săptamînă',
                day: 'zi'
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                edit(event);
            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                edit(event);
            },
            events: [
            <?php foreach($events as $event): 
            
                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['end'];
                }
            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                },
            <?php endforeach; ?>
            ]
        });
        
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
             url: 'editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                    if(rep == 'OK'){
                        alert('Saved');
                    }else{
                        alert('Could not be saved. try again.'); 
                    }
                }
            });
        }

});
</script>

</body>
</html>