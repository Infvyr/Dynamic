<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Gestionare orar teze
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/learner/" title="pagina de administrare a elevilor" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Operații orar teze</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Forma de adăugare/modificare/ștergere a orarului tezelor</h3>
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
                url:"teze_select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var discipline = $('#discipline').text();  
           var data = $('#data').text();  
           var ora = $('#ora').text();  
           var locul = $('#locul').text();  
           var prof = $('#prof').text();  
           var userClasa = $('#userClasa').text();  
           if(discipline == '')  
           {  
                alert("Introduceți disciplina!");  
                return false;  
           }  
           if(data == '')  
           {  
                alert("Introduceți data de începere a tezei!");  
                return false;  
           }
           if(ora == '')  
           {  
                alert("Introduceți ora de începere a tezei!");  
                return false;  
           } 
           if(locul == '')  
           {  
                alert("Introduceți locul desfășurării tezei!");  
                return false;  
           }
           if(prof == '')  
           {  
                alert("Introduceți profesorul!");  
                return false;  
           } 
           if(userClasa == '')  
           {  
                alert("Introduceți clasa!");  
                return false;  
           } 
            
           $.ajax({  
                url:"teze_insert.php",  
                method:"POST",  
                data:{discipline:discipline, data:data, ora:ora, locul:locul, prof:prof, userClasa:userClasa},  
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
                url:"teze_edit.php",  
                method:"POST",  
                data:{orar_id:orar_id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.discipline', function(){  
           var orar_id = $(this).data("id1");  
           var discipline = $(this).text();  
           edit_data(orar_id, discipline, "discipline");  
      });  
      $(document).on('blur', '.data', function(){  
           var orar_id = $(this).data("id2");  
           var data = $(this).text();  
           edit_data(orar_id,data, "data");  
      });  
      $(document).on('blur', '.ora', function(){  
           var orar_id = $(this).data("id3");  
           var ora = $(this).text();  
           edit_data(orar_id,ora, "ora");  
      }); 
      $(document).on('blur', '.locul', function(){  
           var orar_id = $(this).data("id4");  
           var locul = $(this).text();  
           edit_data(orar_id,locul, "locul");  
      }); 
      $(document).on('blur', '.prof', function(){  
           var orar_id = $(this).data("id5");  
           var prof = $(this).text();  
           edit_data(orar_id,prof, "prof");  
      }); 
      $(document).on('blur', '.userClasa', function(){  
           var orar_id = $(this).data("id6");  
           var userClasa = $(this).text();  
           edit_data(orar_id,userClasa, "user_clasa");  
      }); 
      
      $(document).on('click', '.btn_delete', function(){  
           var orar_id=$(this).data("id7");  
           if(confirm("Sigur doriți să ștergeți?"))  
           {  
                $.ajax({  
                     url:"teze_delete.php",  
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