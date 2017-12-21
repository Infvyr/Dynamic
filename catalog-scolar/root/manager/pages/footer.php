
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versiune</b> 0.1
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.catalog-scolar.xyz" target="_blank" title="deschideți pagina principală a catalogului" rel="nofollow">catalog-scolar.xyz</a></strong> Toate drepturile sunt rezervate.
  </footer>



</div>
<!-- ./wrapper -->

<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<script>
  $(function () {
    $("#passwd").mouseup(function(){
			$("#password").attr("type", "password");
		});
		$("#passwd").mousedown(function(){
			$("#password").attr("type", "text");
		});

  });
</script>


</body>
</html>