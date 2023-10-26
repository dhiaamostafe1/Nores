
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      




      //  unite to stoe --------------------------------------------------------
      $('#StoreUnite').submit(function (e) { 
        e.preventDefault();

        var inf=$('#unit').val();
             $.ajax({
              type: "post",
              url: "unite.store",
              data:$('#StoreUnite').serialize(),
              cache:false,
              success: function (data) {
                if(data.count ==1){
                  location.reload(true);
                }
                $('#StoreUniteModel').modal('hide');
              var div1 = '<tr id="unite'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td id="unitename'+data.inf.id+'"><span id="unitedeletitem'+data.inf.id+'">'+data.inf.unite_name+'</span></td> ';
              var div2 = '<td>';
              var div4 ='<a class="uniteEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeUniteModel"  data-contant='+data.inf.id +'></a></td>';
              var div3= '<td><a type="button"  class="unitedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
              flasher.success("Data has been saved successfully!");
               $('#uniteItem').append(div1+div2+div4+div3);
                  console.log(data);
              } 
            });

      });

      // end unite to store -------------------------------------------------------------------------------


      // delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','.unitedelete' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
      console.log($(this).attr('data-contant'));

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "delete",
            url: "unite.delete/"+ten,
        
            success: function (req) {
                $('#unite'+ten).remove();

                if(req.count == 0){
                  location.reload(true);
                }
                flasher.warning("Are you sure you want to proceed ?");
                 console.log(req);
            }
        });

     //  }
        
    });

      //end delete unite -------------------------------------------------------------------------


      // start Edite unite -----------------------------------------------------------------------
      $(document).on('click','.uniteEdite' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
      console.log($(this).attr('data-contant'));

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "GET",
            url: "unite.edit/"+ten,
        
            success: function (req) {
              $('#EditeInput').val(req.count.unite_name);
              $('#idEditunit').val(req.count.id);
                 console.log(req);
            }
        });

     //  }
        
    });

  //end Edite unite -------------------------------------------------------------------------
  // flasher.error("Oops! Something went wrong!");
  // flasher.warning("Are you sure you want to proceed ?");
  // flasher.success("Data has been saved successfully!");
  // flasher.info("Welcome back");

  // start update unite --------------------------------------------------------------------
  $('#UpdatUnite').submit(function (e) { 
    e.preventDefault();

    var inf=$('#idEditunit').val();
    var datainf=$('#EditeInput').val();

     console.log(inf);

         $.ajax({
          type: "post",
          url: "unite.update",
          data: $('#UpdatUnite').serialize(),
          cache:false,
          success: function (data) {
           $('#EditeUniteModel').modal('hide');
           // $('#unitedeletitem'+data.data.idEditunit).remove();
          $('#unitename'+data.data.idEditunit).text(data.data.EditeInput);
          // var div1 = '<tr id="unite'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td>'+data.inf.unite_name+'</td> ';
          // var div2 = '<td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><a class=" uniteEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-contant='+data.inf.id +'></a>';
          // var div3= '<a type="button"  class="unitedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
          flasher.success("Data has been saved successfully!");
          //  $('#uniteItem').append(div1+div2+div3);
              console.log(data);
          }
        });

  });


  // End update  Unite --------------------------------------------------------------------


    });
    