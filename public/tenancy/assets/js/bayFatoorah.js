$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ----------------------------------- start Code

        $(document).on('click','.addItembtbnfatoorah' ,function (e) {
            e.preventDefault();
        
            // $('.DisplayEntryItems').hide();
            // $('.nowEntryItems').show();
         $('#inputitemBrnch_NO').val(''); 
         $('#inputitembox').val('');
        $('#inputitemStore').val('');
         $('#inputitemEventy').val('');
         $('#inputItemClient').val('');
         $('#inputItemTAK_NO').val('');
         $('#flagopater').val('1');
         $('.addItembtbnfatoorah').hide();
         $('#EditeItemsBtnfatoorah').hide();         
         $('#AcceptItemsBtnfatoorah').show();
         $('#CloseItemsBtnfatoorah').show();
         $('#tablesubfatoorah').hide();
         $('#datasumfatoorahall').hide();
         
         
    
        });


        // ------------------------------------------------------

        $(document).on('click','#CloseItemsBtnfatoorah' ,function (e) {
            e.preventDefault();
            $ww =window.location.origin+window.location.pathname+"?page="+$('#IdFatoorah').val();
          
            window.location.replace($ww);
            
        });



        // --------------------------------------------------------------------
        $(document).on('click','.EditeItemsBtnfatoorah' ,function (e) {
          e.preventDefault();
    
          var idd=$('#IdFatoorah').val();
          var brnch =$('#inputitemBrnch_NO').attr('data-store'); 
         var box= $('#inputitembox').attr('data-store'); 
         var Store= $('#inputitemStore').attr('data-store'); 
         var Eventy= $('#inputitemEventy').attr('data-store'); 

         var client= $('#inputItemClient').attr('data-store'); 
         var tak= $('#inputItemTAK_NO').attr('data-store'); 
         var pub =$('#publicitems').val();
         var cachitems =$('#cachitems').val();
         var kindffatoorah =$('#kindffatoorah').val();
         var restitems =$('#restitems').val();
         var netitems =$('#netitems').val();
        //  var Tr = $('#inputItemInt_NO').val();
         var flag = $('#flagopater').val();
         
         

         console.log();
        $.ajax({
            type: "post",
            url: "adhnsarf.store",
          
            data: { 
              'id': idd, 
              'Brnch': brnch, 
              'box': box, 
              'kindffatoorah':kindffatoorah,
              'Store': Store, 
              'Eventy': Eventy, 
              'client': client, 
              'tak': tak, 
              'offer':pub,
              'netitems':netitems,
              'restitems':restitems,
              'cachitems':cachitems,
              // 'Int_NO': Tr, 
              'flag':flag,
            
            },
            cache:false,
            success: function (data) {
              
              // flasher.success("Data has been saved successfully!");
              if(data.flag=='insert')
              { 
                $ww =window.location.origin+window.location.pathname+"?page="+data.Count;
                window.location.replace($ww);

              }
              
                console.log(data);
            } 
          });
      

       
           
          
    
      });





































      $('#TRNSFatoorah').on('click' ,function(){
        var sum= $('#sumfatoorahtext').text();
        var cach = $('#cachfatoorah').val();
        var id = $('#IdFatoorah').val();
        var net = $('#Netfatoorah').val();
        var tax = $('#taxTOtalfatoorah').val();
        var disc = $('#DiscountTOtalfatoorah').val();

        $.ajax({
          type: "post",
          url: "saleFatoorah.TRNSFatoorah",
          data: {id:id ,sum:sum ,cach:cach ,net:net,tax:tax ,disc:disc },
          cache:false,
          success: function (data) {

            flasher.success("Data has been saved successfully!");
            location.reload();
            
          }
        });


      });
      

      $('#cachfatoorah').on('keyup', function(){

               
       

        var sum= $('#sumfatoorahtext').text();
        var cach = $(this).val();

        $('#Netfatoorah').val(parseInt(sum)-parseInt(cach));
      })


      $('#Netfatoorah').on('keyup', function(){

               
       
        var cach = $('#cachfatoorah').val();
        var sum= $('#sumfatoorahtext').text();
        var net = $(this).val();

        $('#Restfatoorah').val(parseInt(sum)-parseInt(cach)-parseInt(net));
      })


 
// _----------------------------------------------------------------------------------
      $('.inputsearch').on('keyup', function(){

              
        // console.log('gogo');
        var inf=$(this).val();
        var ten=$(this).attr('data-links');

        console.log($('#Idtype').val()) ;
        var bigon=$(this).next();
                    $.ajax({
              type: "post",
              url: "restrict.search/"+ten,
              data: {inf:inf },
              cache:false,
              success: function (data) {

               
                bigon.html(data);
              }
            });

      })



      // --------------------------------------------
      $('.inputsearchkind').on('keyup', function(){

              
        // console.log('gogo');
        var inf=$(this).val();
        var ten=$(this).attr('data-links');


        var bigon=$(this).next();
                    $.ajax({
              type: "post",
              url: "restrict.searchKind/"+ten,
              data: {inf:inf },
              cache:false,
              success: function (data) {

               
                bigon.html(data);
              }
            });

      })


      


      $(document).on('click', '.list-group-item', function(){
        var value = $(this).text();
        
        var idlink=$(this).attr('data-id');
        var div =$(this).parent().parent();
        var input=div.prev();

        input.attr('data-store',idlink);
        input.val(value);
        div.html("");

     });



      // --------------------------------------------------------------------
    //   $(document).on('click','.EditeItemsBtnCategory' ,function (e) {
    //     e.preventDefault();
  
     
  
    //    console.log(idd);
    // //    $.post({
    // //     url: "Category.StoryItem",
    // //     data : { request_data: code},
    // //     success : function(json) {
         
    // //         console.log("requested access complete");
    // //     }
    // // })
      
    //    $.ajax({
    //     type: "post",
    //     url: "Category.StoryItem",
       
    //     data: { 
    //       'id': idd, 
    //       'code': code, 
    //       'name': name, 
    //       'ENg': ENg, 
    //       'group': group, 
    //       'Req': Req, 
    //       'Tr': Tr, 
        
    //     },
    //     cache:false,
    //     success: function (data) {
          
         
          
    //         console.log(data);
    //     } 
    //   });
  
    
  
    // });
  
  
    // /------------------------------------------------------------------------------------



        // $(document).on('click','#AddEntrysubBtnBtn' ,function (e) {
        //     e.preventDefault();
            
        //       $('#AddEntrysubBtnBtn').hide();
        //     $('#ACC_NameEntrySub').show();
        //     $('#End_NOTEntrySub').show();
        //     $('#ACC_NOEntrySub').show();
        //     $('#MadinEntrySub').show();
        //     $('#DainEntrySub').show();
        //     $('#COS_Cent_NAMeEntrySub').show();
        //     $('#BtnSubiteEntry').show();
          
      
        // });



// ----start delet sub

      //   $(document).on('click','.EntrySUbdelete' ,function (e) {
      //       e.preventDefault();
      //    // alert($(this).val));
      //   //  console.log($(this).attr('data-contant'));
    
      //  // if(confirm('do ready to delete')){
      //       var ten=$(this).attr('data-contant');
      //      $.ajax({
      //           type: "delete",
      //           url: "restrict.destroyrestrict/"+ten,
            
      //           success: function (req) {
      //             $('#idItemEntrySubData'+ten).remove();
    
      //           //     if(req.count == 0){
      //           //       location.reload(true);
      //           //     }
      //                console.log(req);
      //           }
      //       });
    
      //    //  }
            
      //   });


// ----end delet sub


// $('#EntryNewItems').submit(function (e) { 
//     e.preventDefault();


  
//      console.log('gggggggggggggggggg');
//          $.ajax({
//           type: "post",
//           url: "restrict.storeEntrySub",
//           data:$('#EntryNewItems').serialize(),
//           cache:false,
//           success: function (data) {



//               console.log(data);
//           } 
//         });

//   });




    //    ----------------------------------------End Code
});
      