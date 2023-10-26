$(document).ready(function(){

  $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      // ----------------------------------- start Code

      $(document).on('click','.addItembtbnEntry' ,function (e) {
          e.preventDefault();
      
          // $('.DisplayEntryItems').hide();
          // $('.nowEntryItems').show();
       $('#inputitemBrnch_NO').val(''); 
       $('#inputItemStor_id').val('');
      // $('#inputItemENT_KIND').val('');
       $('#inputItemTAK_NO').val('');
       $('#inputItemENd_Note').val('');
      // / $('#inputItemInt_NO').val('');
       $('#flagopater').val('1');
       $('.addItembtbnEntry').hide();
       $('#EditeItemsBtnEntry').hide();

      


   
      //  $ww=window.location.href


       
       $('#AcceptItemsBtnEntry').show();
       $('#CloseItemsBtnEntry').show();
  
      });

      $(document).on('click','#CloseItemsBtnEntry' ,function (e) {
          e.preventDefault();
          $ww =window.location.origin+window.location.pathname+"?page="+$('#IdEntryInput').val();
        
          window.location.replace($ww);
          // window.location.replace("http://127.0.0.1:8000/en/restrict.index?page="+$('#IdEntryInput').val());
    
      });

      $(document).on('click','.EditeItemsBtnEntry' ,function (e) {
        e.preventDefault();
        var idd=$('#IdEntryInput').val();
        var code =$('#inputitemBrnch_NO').attr('data-store'); 
       var name= $('#inputItemStor_id').attr('data-store'); 
       var ENg= $('#inputItemENT_KIND').attr('data-store'); 
       var group= $('#inputItemTAK_NO').attr('data-store'); 
       var Req = $('#inputItemENd_Note').val();
      //  var Tr = $('#inputItemInt_NO').val();
       var flag = $('#flagopater').val();

   $.ajax({
      type: "post",
      url: "sanadsarf.store",
     
      data: { 
        'id': idd, 
        'Brnch_NO': code, 
        'Stor_id': name, 
        'ENT_KIND': ENg, 
        'TAK_NO': group, 
        'ENd_Note': Req, 
        // 'Int_NO': Tr, 
        'flag':flag,
      
      },
      cache:false,
      success: function (data) {
        
        flasher.success("Data has been saved successfully!");
        if(data.flag=='insert')


        $ww =window.location.origin+window.location.pathname+"?page="+data.Count;
        
          window.location.replace($ww);
          console.log(data);
      } 
    });
    

     
         
        
  
    });



    $(document).on('click','.AccepENwtItemsBtnEntry' ,function (e) {
      e.preventDefault();
      var idd=$('#IdEntryInputnew').val();
      var code =$('#inputitemBrnch_NOnew').attr('data-store'); 
     var name= $('#inputItemStor_idnew').attr('data-store'); 
     var ENg= $('#inputItemENT_KINDnew').attr('data-store'); 
     var group= $('#inputItemTAK_NOnew').attr('data-store'); 
     var Req = $('#inputItemENd_Notenew').val();
    //  var Tr = $('#inputItemInt_NO').val();
     var flag = $('#flagopatenew').val();


    //  console.log(' '+code+' '+name+ ' '+ENg+' '+group+' '+Req+' ');

 $.ajax({
    type: "post",
    url: "sanadsarf.store",
   
    data: { 
      'id': idd, 
      'Brnch_NO': code, 
      'Stor_id': name, 
      'ENT_KIND': ENg, 
      'TAK_NO': group, 
      'ENd_Note': Req, 
      // 'Int_NO': Tr, 
      'flag':flag,
    
    },
    cache:false,
    success: function (data) {
      
      flasher.success("Data has been saved successfully!");
      if(data.flag=='insert')
      {
        $ww =window.location.origin+window.location.pathname+"?page="+data.Count;
        
        window.location.replace($ww);
      }
        //  window.location.replace("http://127.0.0.1:8000/en/restrict.index?page="+data.Count);
        console.log(data);
    } 
  });
  

   
       
      

  });



    $('.inputsearch').on('keyup', function(){

            
      // console.log('gogo');
      var inf=$(this).val();
      var ten=$(this).attr('data-links');


      var bigon=$(this).next();
                  $.ajax({
            type: "post",
            url: "sanadsarf.search/"+ten,
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
            url: "sanadsarf.searchKind/"+ten,
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
    