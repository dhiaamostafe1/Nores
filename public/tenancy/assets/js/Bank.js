
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      




      //  unite to stoe --------------------------------------------------------
      $('#StoreBankForm').submit(function (e) { 
        e.preventDefault();

         var inf=$('#nameAcc').val();
         var flage=$('#flageaccount').val();
         console.log(flage);

             $.ajax({
              type: "post",
              url: "Bank.store",
              data:{'name':inf ,'flage':flage},
              cache:false,
              success: function (data) {
                if(data.count ==1){
                  location.reload(true);
                }
                $('#StoreBankModel').modal('hide');
              var div1 = '<tr id="Acounttryitems'+ data.inf.id+'"><th scope="row">'+data.inf.AccountID +'</th> <td id="Bankname'+data.inf.id+'"><span id="Bankdeletitem'+data.inf.id+'">'+data.inf.AccountName+'</span></td> ';
              var div2 = '<td>';
              var div4 ='<a class="BankEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeBankModel"  data-contant='+data.inf.id +'></a></td>';
              var div3= '<td><a type="button"  class="bankdelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
               flasher.success("Data has been saved successfully!");

                $('#Accounttableitems').append(div1+div2+div4+div3);
                 console.log(data);
              } 
            });

      });

      // end unite to store -------------------------------------------------------------------------------


  //     // delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','.bankdelete' ,function (e) {
        e.preventDefault();
    
      console.log($(this).attr('data-contant'));
      var flage=$('#flageaccount').val();
        var ten=$(this).attr('data-contant');
       
       $.ajax({
            type: "delete",
            url: "Bank.delete/"+ten+"/"+flage,
        
            success: function (req) {

                $('#Acounttryitems'+ten).remove();
                flasher.warning("Are you sure you want to proceed ?");

                
                if(req.count == 0){
                  location.reload(true);
                }
                 console.log(req);
            }
        });

   
        
    });

  //     //end delete unite -------------------------------------------------------------------------






  //     // start Edite unite -----------------------------------------------------------------------
      $(document).on('click','.BankEdite' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
     

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "GET",
            url: "Bank.edit/"+ten,
        
            success: function (req) {
              
              $('#EditeInputBank').val(req.count.AccountName);
              $('#idEditBank').val(ten);
             
            }
        });

     //  }
        
    });

  // //end Edite unite -------------------------------------------------------------------------












  // // start update unite --------------------------------------------------------------------
  $('#UpdatBankForm').submit(function (e) { 
    e.preventDefault();

    var inf=$('#idEditBank').val();
    var datainf=$('#EditeInputBank').val();
    var flage=$('#flageaccount').val();

     console.log(datainf);

         $.ajax({
          type: "post",
          url: "Bank.update",
          data: $('#UpdatBankForm').serialize(),
          cache:false,
          success: function (data) {

            flasher.success("Data has been saved successfully!");
           $('#EditeBankModel').modal('hide');
           // $('#unitedeletitem'+data.data.idEditunit).remove();
          $('#Acountname'+inf).text(datainf);
           console.log(data);
       
          }
        });

  });


  // End update  Unite --------------------------------------------------------------------


    });
    