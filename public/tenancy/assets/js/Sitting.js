$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        // ----------------------------------------------------------------------

        //  Group to stoe --------------------------------------------------------
      // $('#UpdateSittingString').submit(function (e) { 
      //   e.preventDefault();

      //        $.ajax({
      //         type: "post",
      //         url: "Sitting.store",
      //         data:$('#UpdateSittingString').serialize(),
      //         cache:false,
      //         success: function (data) {
      //             console.log(data);
      //         } 
      //       });

           

      // });

      // end Group to store -------------------------------------------------------------------------------


        $('input[type="radio"]').change(function(){
            
            var user =$('#idSitting').val();
            var val =$(this).val();
            var name =$(this).attr('name');
            
            $.ajax({
              type: "post",
              url:  "/Sitting.index/Sitting.storeRed",
              data:{user:user ,val:val ,name:name },
              cache:false,
              success: function (data) {
                  console.log(data);
              } 
            });

           
        });


        // 0-----------------------------------------------------------------

        $('.formlabelcu').click(function(){
            
          $(this).prev().attr('checked','checked');

      });


      // 0-----------------------------------------------------
      $('input[type="checkbox"]').click(function(){

           var user =$('#idSitting').val();
            var val =$(this).val();
            var name =$(this).attr('name');


            console.log(name);
            $.ajax({
              type: "post",
              url:  "/Sitting.index/Sitting.Check",
              data:{user:user ,val:val ,name:name },
              cache:false,
              success: function (data) {
                  console.log(data);
              } 
            });

        
    });
        

       


  


});