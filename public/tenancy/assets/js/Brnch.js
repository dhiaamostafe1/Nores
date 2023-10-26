
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      




      //  unite to stoe --------------------------------------------------------
      $('#StorebranchForm').submit(function (e) { 
        e.preventDefault();

        // var inf=$('#unit').val();
             $.ajax({
              type: "post",
              url: "Branch.store",
              data:$('#StorebranchForm').serialize(),
              cache:false,
              success: function (data) {
                if(data.count ==1){
                  location.reload(true);
                }
                $('#StoreBranchModel').modal('hide');
              var div1 = '<tr id="BanktrTable'+ data.inf.id+'"><th scope="row">'+data.inf.AccountID +'</th> <td id="Bankname'+data.inf.id+'"><span id="Bankdeletitem'+data.inf.id+'">'+data.inf.AccountName+'</span></td> ';
              var div2 = '<td>';
              var div4 ='<a class="branchEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeBankModel"  data-contant='+data.inf.id +'></a></td>';
              var div3= '<td><a type="button"  class="branchdelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
              flasher.success("Data has been saved successfully!");
               $('#BankTableItem').append(div1+div2+div4+div3);
                 console.log(data);
              } 
            });

      });

      // end unite to store -------------------------------------------------------------------------------


  //     // delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','.branchdelete' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
      console.log($(this).attr('data-contant'));

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "delete",
            url: "Branch.delete/"+ten,
        
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
      $(document).on('click','.branchEdite' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
     

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "GET",
            url: "Branch.edit/"+ten,
        
            success: function (req) {
              $('#EditeInputbranchAcc').val(req.count.AccountName);
              $('#idEditbranchAcc').val(ten);
             
            }
        });

     //  }
        
    });

  // //end Edite unite -------------------------------------------------------------------------


  // // start update unite --------------------------------------------------------------------
  $('#UpdatbranchForm').submit(function (e) { 
    e.preventDefault();

    var inf=$('#idEditbranchAcc').val();
    var datainf=$('#EditeInputbranchAcc').val();

     console.log(inf);

         $.ajax({
          type: "post",
          url: "Bank.update",
          data: $('#UpdatbranchForm').serialize(),
          cache:false,
          success: function (data) {

           $('#EditbranchModel').modal('hide');
           // $('#unitedeletitem'+data.data.idEditunit).remove();
           flasher.success("Data has been saved successfully!");
          $('#Bankname'+inf).text(datainf);
  
       
          }
        });

  });


  // End update  Unite --------------------------------------------------------------------


    });
    