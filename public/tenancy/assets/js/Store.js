
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      




      //  unite to stoe --------------------------------------------------------
      $('#StoreStoreAccForm').submit(function (e) { 
        e.preventDefault();

        // var inf=$('#unit').val();

   
             $.ajax({
              type: "post",
              url: "StoreACC.store",
              data:$('#StoreStoreAccForm').serialize(),
              cache:false,
              success: function (data) {
                if(data.count ==1){
                  location.reload(true);
                }
                $('#StoreStoreACCModel').modal('hide');
              var div1 = '<tr id="BanktrTable'+ data.inf.id+'"><th scope="row">'+data.inf.AccountID +'</th> <td id="Bankname'+data.inf.id+'"><span id="Bankdeletitem'+data.inf.id+'">'+data.inf.AccountName+'</span></td> ';
              var div2 = '<td>';
              var div4 ='<a class="StoreAccEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeStorAccModel"  data-contant='+data.inf.id +'></a></td>';
              var div3= '<td><a type="button"  class="StoreAccdelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
              flasher.success("Data has been saved successfully!");
               $('#BankTableItem').append(div1+div2+div4+div3);
                 console.log(data);
              } 
            });

      });

      // end unite to store -------------------------------------------------------------------------------


  //     // delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','.StoreAccdelete' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
      console.log($(this).attr('data-contant'));




   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "delete",
            url: "StoreACC.delete/"+ten,
        
            success: function (req) {
                $('#BanktrTable'+ten).remove();

                if(req.count == 0){
                  location.reload(true);
                }
                flasher.warning("Are you sure you want to proceed ?");
                 console.log(req);
            }
        });

     //  }
        
    });

  //     //end delete unite -------------------------------------------------------------------------


  //     // start Edite unite -----------------------------------------------------------------------
      $(document).on('click','.StoreAccEdite' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
     

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "GET",
            url: "StoreACC.edit/"+ten,
        
            success: function (req) {
              $('#EditeInputStoreAcc').val(req.count.AccountName);
              $('#idEditStoreAcc').val(ten);
             
            }
        });

     //  }
        
    });

  // //end Edite unite -------------------------------------------------------------------------


  // // start update unite --------------------------------------------------------------------
  $('#UpdatStoreAccForm').submit(function (e) { 
    e.preventDefault();

    var inf=$('#idEditStoreAcc').val();
    var datainf=$('#EditeInputStoreAcc').val();

     console.log(inf);

         $.ajax({
          type: "post",
          url: "StoreACC.update",
          data: $('#UpdatStoreAccForm').serialize(),
          cache:false,
          success: function (data) {

           $('#EditeStorAccModel').modal('hide');
           // $('#unitedeletitem'+data.data.idEditunit).remove();
          $('#Bankname'+inf).text(datainf);
          flasher.success("Data has been saved successfully!");
       
          }
        });

  });


  // End update  Unite --------------------------------------------------------------------


    });
    