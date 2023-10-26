
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      




    

      // delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','.deleteClient' ,function (e) {
        e.preventDefault();
    
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "delete",
            url: "Client.delete/"+ten,
        
            success: function (req) {

              flasher.warning("Are you sure you want to proceed ?");
                $('#deleteitemClient'+ten).remove();

                
                
            }
        });

     //  }
        
    });

      //end delete unite -------------------------------------------------------------------------

    });
    