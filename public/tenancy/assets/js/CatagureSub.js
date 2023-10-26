
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      





      //  unite to stoe --------------------------------------------------------
      // $('#SCatagureSub').submit(function (e) { 
      //   e.preventDefault();


      
      
      //        $.ajax({
      //         type: "post",
      //         url: "Categories.store",
      //         data:$('#SCatagureSub').serialize(),
      //         cache:false,
      //         success: function (data) {
      //           if(data.count ==1){
      //             location.reload(true);
      //           }
      //           $('#StoreItemSUbCatModel').modal('hide');
                  
      //             var div1 ='<tr id="idItemCatData'+data.item.id+'"> <th scope="row">'+data.item.id+'</th>';
      //             var div2 ='<td id="ItemCatDatacode'+data.item.id+'"> '+data.item.Item_cod+'</td>';
      //             var div3 =' <td id="ItemCatDataname'+data.item.id+'"> '+data.item.Item_Unit+'</td>';
      //             var div4 =' <td id="ItemCatDataItem_CNT'+data.item.id+'"> '+data.item.Item_CNT+'</td>';
      //             var div5 = '<td id="ItemCatDataItem_Sell'+data.item.id+'"> '+data.item.Item_Sell+'</td>';
      //             var div6 ='<td id="ItemCatDataItem_BAY'+data.item.id+'">'+data.item.Item_BAY+'</td>';
      //             var div7 ='<td id="ItemCatDataItem_NAT'+data.item.id+'"> '+data.item.Item_NAT+'</td>';
      //             var div8 ='<td id="ItemCatDataOffer'+data.item.id+'"> '+data.item.Offer+'</td>';
      //             var div9='<td><a class="Cat_SUbEdite ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeItemsCatagureModel"  data-contant="'+data.item.id+'"></a> </td>';
      //             var div10 ='<td><a type="button"  class="Cat_subdelete  ti-trash" id="delete"  data-contant="'+data.item.id+'"></a> </td></tr>';
      //               $('#ItemCatData').append(div1+div2+div3+div4+div5+div6+div7+div8+div9+div10);
      //             console.log(data);
      //         } 
      //       });

      // });

      // // end unite to store -------------------------------------------------------------------------------




  // //     // start Edite unite -----------------------------------------------------------------------
  //     $(document).on('click','.Cat_SUbEdite' ,function (e) {
  //       e.preventDefault();
    

  //  // if(confirm('do ready to delete')){
  //       var ten=$(this).attr('data-contant');
  //      $.ajax({
  //           type: "GET",
  //           url: "Categories.edit/"+ten,
        
  //           success: function (req) {

  //              $('#idEdittemsCatagure').val(ten);
               

  //             $('#inputItemCode').val(req.count.Item_cod);
  //             $('#inputItemname').val(req.count.Item_Unit);
  //             $('#inputItem_CNT').val(req.count.Item_CNT);


  //             $('#inputItem_Sell').val(req.count.Item_Sell);
  //             $('#inputItem_BAY').val(req.count.Item_BAY);
  //             $('#inputItem_BAY1').val(req.count.Item_BAY1);


  //             $('#inputItem_NAT').val(req.count.Item_NAT);
  //             $('#inputCalories').val(req.count.Calories);
  //             $('#inputPrcnt').val(req.count.Prcnt);


  //             $('#inputOffer').val(req.count.Offer);
  //             $('#inputBrnch_NO').val(req.count.Brnch_NO);
              

  //             // $('#idEditunit').val(req.count.id);
  //                console.log(req);
  //           }
  //       });

  //    //  }
        
  //   });

  // // //end Edite unite -------------------------------------------------------------------------


  // // // start update unite --------------------------------------------------------------------
  // $('#UpdateCatagure_sub').submit(function (e) { 
  //   e.preventDefault();

  //   // var inf=$('#idEditunit').val();
  //   // var datainf=$('#EditeInput').val();

  //   //  console.log(inf);

  //        $.ajax({
  //         type: "post",
  //         url: "Categories.update",
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
  //           $('#ItemCatDataOffer'+data.data.idEdittemsCatagure).text(data.data.inputOffer);
            

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


  // // // End update  Unite --------------------------------------------------------------------


    //     // start Edite unite -----------------------------------------------------------------------
    $(document).on('click','.btnsearchCat' ,function (e) {
      e.preventDefault();
  

 // if(confirm('do ready to delete')){
    //  var ten=$(this).attr('data-contant');
     $.ajax({
          type: "GET",
          url: "Categories.Search",
      
          success: function (req) {

            //  $('#idEdittemsCatagure').val(ten);
             

            // $('#inputItemCode').val(req.count.Item_cod);
            // $('#inputItemname').val(req.count.Item_Unit);
            // $('#inputItem_CNT').val(req.count.Item_CNT);


            // $('#inputItem_Sell').val(req.count.Item_Sell);
            // $('#inputItem_BAY').val(req.count.Item_BAY);
            // $('#inputItem_BAY1').val(req.count.Item_BAY1);


            // $('#inputItem_NAT').val(req.count.Item_NAT);
            // $('#inputCalories').val(req.count.Calories);
            // $('#inputPrcnt').val(req.count.Prcnt);


            // $('#inputOffer').val(req.count.Offer);
            // $('#inputBrnch_NO').val(req.count.Brnch_NO);
            

            // // $('#idEditunit').val(req.count.id);
          console.log(req);
          }
      });

   //  }
      
  });

// //end Edite unite -------------------------------------------------------------------------



    });
    