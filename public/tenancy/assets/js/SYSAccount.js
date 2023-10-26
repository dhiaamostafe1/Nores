$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ----------------------------------- start Code

   


      $('.searchsittingAcc').on('keyup', function(){

              
        console.log('gogo');

        var inf=$(this).val();
     

        var bigon=$(this).next();
                    $.ajax({
              type: "post",
              url: "SYSAccount.Search",
              data: {inf:inf },
              cache:false,
              success: function (data) {

               
                bigon.html(data);
              }
            });

      })



  


      $(document).on('click', '.list-Acc', function(){
        var value = $(this).text();
        
        var idlink=$(this).attr('data-id');
        var div =$(this).parent().parent();
        var input=div.prev();

        input.attr('data-store',idlink);
        input.val(value);
        div.html("");

     });



    



    //  $('#StoreSittingAcc').submit(function (e) { 
    //   e.preventDefault();

    //  // var inf=$('#unit').val();


    //       var flag =$('#flagacc').val();
         
    //         var client =$('#client').attr('data-store');
    //         var supplier =$('#supplier').attr('data-store');
    //         var box =$('#box').attr('data-store');
    //         var bank =$('#bank').attr('data-store');
    //         var brnch =$('#brnch').attr('data-store');
    //         var store =$('#store').attr('data-store');
    //         var employ =$('#employ').attr('data-store');
    //         var expenses =$('#expenses').attr('data-store');
    //         var tax =$('#tax').attr('data-store');
    //         var costsales =$('#costsales').attr('data-store');
    //         var salesprofits =$('#salesprofits').attr('data-store');
    //         var envoy =$('#envoy').attr('data-store');
    //        $.ajax({
    //         type: "post",
    //         url: "SYSAccount.store",
    //         data:{'client':client,'supplier':supplier,'box':box,'bank':bank,
    //                'brnch':brnch,'store':store ,'employ':employ,'expenses':expenses,'tax':tax ,
    //                 'costsales':costsales ,'salesprofits':salesprofits ,'envoy' :envoy , 'flag':flag},
    //         cache:false,
    //         success: function (data) {

          
    //         //  location.reload(true);
            
           
    //             console.log(data);
    //         } 
    //       });

    // });


  //   $(document).on('click', '.list-group-item', function(){
  //     var value = $(this).text();
      
  //     var idlink=$(this).attr('data-id');
  //     var div =$(this).parent().parent();
  //     var input=div.prev();

  //     input.attr('data-store',idlink);
  //     input.val(value);
  //     div.html("");

  //  });


    // end Group to store -------------------------------------------------------------------------------

    $('#EditeSittingAcc').submit(function (e) { 
      e.preventDefault();

     // var inf=$('#unit').val();


          var flag =$('#flagaccn').val();
         
            var client =$('#clientn').attr('data-store');
            var supplier =$('#suppliern').attr('data-store');
            var box =$('#boxn').attr('data-store');
            var bank =$('#bankn').attr('data-store');
            var brnch =$('#brnchn').attr('data-store');
            var store =$('#storen').attr('data-store');
            var employ =$('#employn').attr('data-store');
            var expenses =$('#expensesn').attr('data-store');
            var tax =$('#taxn').attr('data-store');
            var costsales =$('#costsalesn').attr('data-store');
            var salesprofits =$('#salesprofitsn').attr('data-store');
            var envoy =$('#envoyn').attr('data-store');

          

         
     
           $.ajax({
            type: "post",
            url: "SYSAccount.Editesys",
            data:{'client':client,'supplier':supplier,'box':box,'bank':bank,
                   'brnch':brnch,'store':store ,'employ':employ,'expenses':expenses,'tax':tax ,
                    'costsales':costsales ,'salesprofits':salesprofits ,'envoy' :envoy , 'flag':flag},
            cache:false,
            success: function (data) {

          
            //  location.reload(true);
            
           
                console.log(data);
            } 
          });

    });





    //    ----------------------------------------End Code
});
      