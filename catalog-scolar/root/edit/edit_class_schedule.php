<?php 
	$title = "Modificare orarul claselor";
	
	require_once 'pages/head.php';
	require_once 'pages/header.php';
	require_once 'pages/sidebar.php'; // Left side column	

?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Modificare Orar Clase
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/learner/" title="pagina de administrare a elevilor" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Operații orar clase</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Forma de adăugare/modificare/ștergere a orarului claselor</h3>
          </div>
        
        <!-- Tabelul orar lectii -->
        <div class="panel">
        <div id="live_data"></div> 
        </div>

        </div> <!-- col-md-12 -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

<script>

$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var zi = $('#zi').text();  
           var c10a = $('#10a').text();  
           var c10b = $('#10b').text();  
           var c10c = $('#10c').text();  
           var c11a = $('#11a').text();  
           var c11b = $('#11b').text();  
           var c11c = $('#11c').text();  
           var c12a = $('#12a').text();  
           var c12b = $('#12b').text();  
           var c12c = $('#12c').text();  
           if(zi == '')  
           {  
                alert("Enter Day");  
                return false;  
           }  
           if(c10a == '')  
           {  
                alert("Enter discipline for 10 A");  
                return false;  
           }
           if(c10b == '')  
           {  
                alert("Enter discipline for 10 B");  
                return false;  
           } 
           if(c10c == '')  
           {  
                alert("Enter discipline for 10 C");  
                return false;  
           }
           if(c11a == '')  
           {  
                alert("Enter discipline for 11 A");  
                return false;  
           } 
           if(c11b == '')  
           {  
                alert("Enter discipline for 11 B");  
                return false;  
           } 
           if(c11c == '')  
           {  
                alert("Enter discipline for 11 C");  
                return false;  
           } 
           if(c12a == '')  
           {  
                alert("Enter discipline for 12 A");  
                return false;  
           } 
           if(c12b == '')  
           {  
                alert("Enter discipline for 12 B");  
                return false;  
           } 
           if(c12c == '')  
           {  
                alert("Enter discipline for 12 C");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{zi:zi, c10a:c10a, c10b:c10b, c10c:c10c, c11a:c11a, c11b:c11b, c11c:c11c, c12a:c12a, c12b:c12b, c12c:c12c},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(orar_id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{orar_id:orar_id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.zi', function(){  
           var orar_id = $(this).data("id1");  
           var zi = $(this).text();  
           edit_data(orar_id, zi, "zi");  
      });  
      $(document).on('blur', '.10a', function(){  
           var orar_id = $(this).data("id2");  
           var c10a = $(this).text();  
           edit_data(orar_id,c10a, "10a");  
      });  
      $(document).on('blur', '.10b', function(){  
           var orar_id = $(this).data("id3");  
           var c10b = $(this).text();  
           edit_data(orar_id,c10b, "10b");  
      }); 
      $(document).on('blur', '.10c', function(){  
           var orar_id = $(this).data("id4");  
           var c10c = $(this).text();  
           edit_data(orar_id,c10c, "10c");  
      }); 
      $(document).on('blur', '.11a', function(){  
           var orar_id = $(this).data("id5");  
           var c11a = $(this).text();  
           edit_data(orar_id,c11a, "11a");  
      }); 
      $(document).on('blur', '.11b', function(){  
           var orar_id = $(this).data("id6");  
           var c11b = $(this).text();  
           edit_data(orar_id,c11b, "11b");  
      }); 
      $(document).on('blur', '.11c', function(){  
           var orar_id = $(this).data("id7");  
           var c11c = $(this).text();  
           edit_data(orar_id,c11c, "11c");  
      }); 
      $(document).on('blur', '.12a', function(){  
           var orar_id = $(this).data("id8");  
           var c12a = $(this).text();  
           edit_data(orar_id,c12a, "12a");  
      }); 
      $(document).on('blur', '.12b', function(){  
           var orar_id = $(this).data("id9");  
           var c12b = $(this).text();  
           edit_data(orar_id,c12b, "12b");  
      }); 
      $(document).on('blur', '.12c', function(){  
           var orar_id = $(this).data("id10");  
           var c12c = $(this).text();  
           edit_data(orar_id,c12c, "12c");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var orar_id=$(this).data("id11");  
           if(confirm("Sigur doriți să ștergeți?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{orar_id:orar_id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });	
	
</script>

<?php require_once 'pages/footer.php'; ?>