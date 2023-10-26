

    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      
      //   $('.ItemsiconMove').on('click', function(){

              
      //     console.log('gogo');
      //    // var inf=$(this).val();
        
      //    // var bigon=$(this).next();
      //    //             $.ajax({
      //    //       type: "post",
      //    //       url: "Category.searchItemsAll",
      //    //       data: {inf:inf },
      //    //       cache:false,
      //    //       success: function (data) {
       
                
      //    //         bigon.html(data);
      //    //       }
      //    //     });
       
      //  })

       $(document).on('click','.ItemsiconMove' ,function (e) {
        e.preventDefault();
        console.log( $(this).attr('data-id'));
        log=   $(this).attr('data-id');
        $ww =window.location.origin+window.location.pathname+"?page="+log;
          
        window.location.replace($ww);

    
       
});




$(document).on('click','.addItembtnCategory' ,function (e) {
          e.preventDefault();
      
          // $('.DisplayEntryItems').hide();
          // $('.nowEntryItems').show();
       $('#inputItemCode').val(''); 
       $('#inputItemnameCategoryN').val('');
      $('#inputitemEnglish').val('');
       $('#inputItemgroup').val('');
      //  $('#inputItemgroup').removeClass('searchgitemsAll');
       $("#inputItemnameCategoryN").removeClass("searchgitemsAll");
       $('#inputItemREQ').val('');
       $('#inputItemTR').val('');
      // / $('#inputItemInt_NO').val('');
       $('#flagopater').val('1');
       $('.addItembtnCategory').hide();
       $('#EditeItemsBtnCategory').hide();
       
       $('#AcceptItemsBtnCategory').show();
       $('#CloseItemsBtnCategory').show();
  });


      //  unite to stoe --------------------------------------------------------
//       $(document).on('click','.SearchCateroyIcon' ,function (e) {
     
//         e.preventDefault();

//           $.ajax({
//             type: "get",
//             url: "Category.Search",
        
           
//             success: function (req) {
//               var div1 ="";
//               $.each(req.data, function (key, item) { 

//                   div1 =div1+ '<tr id="CategoryMak" data-contant="'+item.id +'"><th></th><th scope="row">'+item.id+'</th><td>'+item.Item_Name+' </td><th></th></tr>';
             
                                                              
//               });
           
//              $('#CatTableremove').append(div1);
//               console.log(req);
//             }
//         });
//    });

//       // end unite to items -------------------------------------------------------------------------------


//       $(document).on('click','#CategoryMak' ,function (e) {
     
//         e.preventDefault();

//         console.log($(this).attr('data-contant'));
//         var ten=$(this).attr('data-contant');

//         window.location.replace("http://127.0.0.1:8000/ar/Category.index?page="+ten);

//        // $('#CatTableremove').remove();


//    });

//       // end  to items-------------------------------------------------------------------------------


//         //     // start Edite unite -----------------------------------------------------------------------
//         $(document).on('click','.ModelEditeCaregory' ,function (e) {
//           e.preventDefault();
      
  
//      // if(confirm('do ready to delete')){
//           var ten=$(this).attr('data-contant');
//          $.ajax({
//               type: "GET",
//               url: "Category.editCategory/"+ten,
          
//               success: function (req) {
//                 console.log('req');
//                    console.log(req);
//               }
//           });
  
//        //  }
          
//       });
  


//       //---------------------------------------------------------------------------------

//       $(document).on('click','.addItembtnCategory' ,function (e) {
//         e.preventDefault();
    
//           $('.dispalyitemcategory').hide();
//         $('.nowCategoryItems').show();

//     });

//     $(document).on('click','#CLoseItemsCategoryModel' ,function (e) {
//       e.preventDefault();
      
//         $('.nowCategoryItems').hide();
//       $('.dispalyitemcategory').show();

//   });



    
// // -------------------------------------------------------------------------------------------------

    $(document).on('click','.EditeItemsBtnCategory' ,function (e) {
      e.preventDefault();

      var idd=$('#IdCategoryInput').val();
      var code =$('#inputItemCode').val(); 
     var name= $('#inputItemnameCategoryN').val();
     var ENg= $('#inputitemEnglish').val();
     var group= $('#inputItemgroup').val();
     var Req = $('#inputItemREQ').val();
     var Tr= $('#inputItemTR').val();
     var kind= $('#inputItemkind').val();


     
     console.log(idd);   
     $.ajax({
      type: "post",
      url: "Category.StoryItem",
     
      data: { 
        'id': idd, 
        'code': code, 
        'name': name, 
        'ENg': ENg, 
        'group': group, 
        'Req': Req, 
        'Tr': Tr, 
        'kind': kind,
      
      },
      cache:false,
      success: function (data) {
        
       
        
          console.log(data);
      } 
    });

  

  });


// --------------------------------------------------------------

  $(document).on('click','#AcceptItemsBtnCategory' ,function (e) {
    e.preventDefault();

    var idd=$('#IdCategoryInput').val();
    var code =$('#inputItemCode').val(); 
   var name= $('#inputItemnameCategoryN').val();
   var ENg= $('#inputitemEnglish').val();
   var group= $('#inputItemgroup').val();
   var Req = $('#inputItemREQ').val();
   var Tr= $('#inputItemTR').val();
   var kind= $('#inputItemkind').val();
   var flag= $('#flagctegoryinput').val();

     
   $.ajax({
    type: "post",
    url: "Category.store",
   
    data: { 
      'id': idd, 
      'code': code, 
      'name': name, 
      'ENg': ENg, 
      'group': group, 
      'Req': Req, 
      'Tr': Tr, 
      'kind': kind,
      'flag': flag,
    
    },
    cache:false,
    success: function (data) {
      
          var inf=data.count;
          $ww =window.location.origin+window.location.pathname+"?page="+inf;
          
        window.location.replace($ww);
         
      
        console.log(data);
    } 
  });



});



$(document).on('click','.AccepENwCatagouryBtn' ,function (e) {
  e.preventDefault();



  var idd=$('#IdCategoryInputnew').val();
  var code =$('#inputItemCodenew').val(); 
 var name= $('#inputItemnameCategoryNnew').val();
 var ENg= $('#inputitemEnglishnew').val();
 var group= $('#inputItemgroupnew').val();
 var Req = $('#inputItemREQnew').val();
 var Tr= $('#inputItemTRnew').val();
 var kind= $('#inputItemkindnew').val();
 var flag= $('#flagctegoryinputnew').val();
 
 $.ajax({
  type: "post",
  url: "Category.store",
 
  data: { 
    'id': idd, 
    'code': code, 
    'name': name, 
    'ENg': ENg, 
    'group': group, 
    'Req': Req, 
    'Tr': Tr, 
    'kind': kind,
    'flag': flag,
  
  },
  cache:false,
  success: function (data) {
    
        var inf=data.count;
        $ww =window.location.origin+window.location.pathname+"?page="+inf;
        
      window.location.replace($ww);
       
    
      console.log(data);
  } 
});



});


//   // /------------------------------------------------------------------------------------
//       $('#NewCategoryItemsForm').submit(function (e) { 
//         e.preventDefault();


   

  
//              $.ajax({
//               type: "post",
//               url: "Category.store",
//               data:$('#NewCategoryItemsForm').serialize(),
//               cache:false,
//               success: function (data) {
                
//                 var inf=data.count+1;
//                  window.location.replace("http://127.0.0.1:8000/ar/Category.index?page="+inf);
//                 // $('.nowCategoryItems').hide();
//                 // $('.dispalyitemcategory').show();
                
//                   console.log(inf);
//               } 
//             });

//       });

//       // end unite to store -------------------------------------------------------------------------------


//       $('#SCatagureSub').submit(function (e) { 
//         e.preventDefault();


      
      
//              $.ajax({
//               type: "post",
//               url: "Category.storeItemSub",
//               data:$('#SCatagureSub').serialize(),
//               cache:false,
//               success: function (data) {
//                 // if(data.count ==1){
//                 //   location.reload(true);
//                 // }
//                 $('#StoreItemSUbCatModel').modal('hide');
                  
//                   var div1 ='<tr id="idItemCatData'+data.item.id+'">';
//                   // var div2 ='<td id="ItemCatDatacode'+data.item.id+'"> '+data.item.Item_cod+'</td>';
//                   var div3 =' <td id="ItemCatDataname'+data.item.id+'"> '+data.item.Item_Unit+'</td>';
//                   var div4 =' <td id="ItemCatDataItem_CNT'+data.item.id+'"> '+data.item.Item_CNT+'</td>';
//                   var div5 = '<td id="ItemCatDataItem_Sell'+data.item.id+'"> '+data.item.Item_Sell+'</td>';
//                   var div6 ='<td id="ItemCatDataItem_BAY'+data.item.id+'">'+data.item.Item_BAY+'</td>';
//                   var div7 ='<td id="ItemCatDataItem_NAT'+data.item.id+'"> '+data.item.Item_NAT+'</td>';
//                   var div9='<td><a class="Cat_SUbEdite ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeItemsCatagureModel"  data-contant="'+data.item.id+'"></a> </td>';
//                   var div10 ='<td><a type="button"  class="Cat_subdelete  ti-trash" id="delete"  data-contant="'+data.item.id+'"></a> </td></tr>';
//                     $('#ItemCatTableData').append(div1+div3+div4+div5+div6+div7+div9+div10);
//                   console.log(data);
//               } 
//             });

//       });

//       // end unite to store -------------------------------------------------------------------------------



//         //     // delete  unite-------------------------------------------------------------------------------------

//         $(document).on('click','.Cat_subdelete' ,function (e) {
//           e.preventDefault();
//        // alert($(this).val));
//       //  console.log($(this).attr('data-contant'));
  
//      // if(confirm('do ready to delete')){
//           var ten=$(this).attr('data-contant');
//          $.ajax({
//               type: "delete",
//               url: "Category.destroyItemsSub/"+ten,
          
//               success: function (req) {
//                 $('#idItemCatData'+ten).remove();
  
//                   if(req.count == 0){
//                     location.reload(true);
//                   }
//                    console.log(req);
//               }
//           });
  
//        //  }
          
//       });
  
//     //     //end delete unite -------------------------------------------------------------------------

//     $(document).on('click','.Cat_SUbEdite' ,function (e) {
//       e.preventDefault();
  

//  // if(confirm('do ready to delete')){
//       var ten=$(this).attr('data-contant');
//      $.ajax({
//           type: "GET",
//           url: "Category.editSub/"+ten,
      
//           success: function (req) {

//              $('#idEdittemsCatagure').val(ten);
             

//             // $('#inputItemCode').val(req.count.Item_cod);
//             $('#inputItemname').val(req.count.Item_Unit);
//             $('#inputItem_CNT').val(req.count.Item_CNT);


//             $('#inputItem_Sell').val(req.count.Item_Sell);
//             $('#inputItem_BAY').val(req.count.Item_BAY);
//             $('#inputItem_BAY1').val(req.count.Item_BAY1);


//             $('#inputItem_NAT').val(req.count.Item_NAT);
//             // $('#inputCalories').val(req.count.Calories);
//             // $('#inputPrcnt').val(req.count.Prcnt);


//             // $('#inputOffer').val(req.count.Offer);
//             // $('#inputBrnch_NO').val(req.count.Brnch_NO);
            

//             // $('#idEditunit').val(req.count.id);
//                console.log(req);
//           }
//       });

//    //  }
      
//   });

// // //end Edite unite -------------------------------------------------------------------------

//  // // start update unite --------------------------------------------------------------------
//  $('#UpdateCatagure_sub').submit(function (e) { 
//   e.preventDefault();

//   // var inf=$('#idEditunit').val();
//   // var datainf=$('#EditeInput').val();

//   //  console.log(inf);

//        $.ajax({
//         type: "post",
//         url: "Category.updateSub",
//         data: $('#UpdateCatagure_sub').serialize(),
//         cache:false,
//         success: function (data) {


//          $('#EditeItemsCatagureModel').modal('hide');



     
//           $('#ItemCatDatacode'+data.data.idEdittemsCatagure).text(data.data.inputItemCode);
//           $('#ItemCatDataname'+data.data.idEdittemsCatagure).text(data.data.inputItemname);
//           $('#ItemCatDataItem_CNT'+data.data.idEdittemsCatagure).text(data.data.inputItem_CNT);

//           $('#ItemCatDataItem_Sell'+data.data.idEdittemsCatagure).text(data.data.inputItem_Sell);
//           $('#ItemCatDataItem_BAY'+data.data.idEdittemsCatagure).text(data.data.inputItem_BAY);
          
//           $('#ItemCatDataItem_NAT'+data.data.idEdittemsCatagure).text(data.data.inputItem_NAT);
//           // $('#ItemCatDataOffer'+data.data.idEdittemsCatagure).text(data.data.inputOffer);
          

//         // var div1='<tr id="idItemsCat'+data.inf.id+'">';
//         // var div2='<th scope="row">'+data.inf.id+'</th> <td id="itemcatcode'+data.inf.id+'"> '+data.inf.Item_cod+'</td>';
//         // var div3='<td id="itemcatname'+data.inf.id+'"> '+data.inf.Item_Name+'</td>';
//         // var div4='<td id="itemcatGroup'+data.inf.id+'"> '+data.inf.Item_Group+'</td>';
//         // var div5='<td id="itemcatbrnch'+data.inf.id+'"> '+data.inf.Brnch_No+'</td>';
//         // var div6='<td id="itemcatTrns'+data.inf.id+'"> '+data.inf.Trns+'</td>';
       
//             console.log(data);
//         }
//       });

// });


$('.searchgroup').on('keyup', function(){

              
  // console.log('gogo');
  var inf=$(this).val();
 
  var bigon=$(this).next();
              $.ajax({
        type: "post",
        url: "Category.searchgroup",
        data: {inf:inf },
        cache:false,
        success: function (data) {

         
          bigon.html(data);
        }
      });

})



$('.searchgitemsAll').on('keyup', function(){

              
  // console.log('gogo');
  var inf=$(this).val();
 
  var bigon=$(this).next();
              $.ajax({
        type: "post",
        url: "Category.searchItemsAll",
        data: {inf:inf },
        cache:false,
        success: function (data) {

         
          bigon.html(data);
        }
      });

})






// // // End update  Unite --------------------------------------------------------------------

  


    });
    