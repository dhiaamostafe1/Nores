
    $(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      




      //  unite to stoe --------------------------------------------------------
      $('#StoreItemsCAt').submit(function (e) { 
        e.preventDefault();

        var inf=$('#unit').val();
             $.ajax({
              type: "post",
              url: "Items.store",
              data:$('#StoreItemsCAt').serialize(),
              cache:false,
              success: function (data) {
                if(data.count ==1){
                  location.reload(true);
                }
                $('#StoreItemCatModel').modal('hide');
                     var div1='<tr id="idItemsCat'+data.inf.id+'">';
                     var div2='<th scope="row">'+data.inf.id+'</th> <td id="itemcatcode'+data.inf.id+'"> '+data.inf.Item_cod+'</td>';
                     var div3='<td id="itemcatname'+data.inf.id+'"> '+data.inf.Item_Name+'</td>';
                     var div4='<td id="itemcatGroup'+data.inf.id+'"> '+data.inf.Item_Group+'</td>';
                     var div5='<td id="itemcatbrnch'+data.inf.id+'"> '+data.inf.Brnch_No+'</td>';
                     var div6='<td id="itemcatTrns'+data.inf.id+'"> '+data.inf.Trns+'</td>';
                     var div7= '<td><a class="ItemsCatEdite ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeItemsCatagureModel"  data-contant="'+data.inf.id+'"></a></td>';
                     var div8='<td><a type="button"  class="ItemsCatdelete  ti-trash" id="delete"  data-contant="'+data.inf.id+'></a></td></tr> ';

                     $('#ItemCatagure').append(div1+div2+div3+div4+div5+div6+div7+div8+"");
                  console.log(data);
              } 
            });

      });

      // end unite to store -------------------------------------------------------------------------------


  //     // delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','.ItemsCatdelete' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
    //  console.log($(this).attr('data-contant'));

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "delete",
            url: "Items.delete/"+ten,
        
            success: function (req) {
                $('#idItemsCat'+ten).remove();

                if(req.count == 0){
                  location.reload(true);
                }
                 console.log(req);
            }
        });

     //  }
        
    });

  //     //end delete unite -------------------------------------------------------------------------


  //     // start Edite unite -----------------------------------------------------------------------
      $(document).on('click','.ItemsCatEdite' ,function (e) {
        e.preventDefault();
    

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "GET",
            url: "Items.edit/"+ten,
        
            success: function (req) {

              $('#idEdittemsCatagure').val(ten);

              $('#inputItemCode').val(req.count.Item_cod);
              $('#inputItemname').val(req.count.Item_Name);
              $('#inputItemgroup').val(req.count.Item_Group);

              $('#inputitemEnglish').val(req.count.Item_Name_E);
              $('#inputItemREQ').val(req.count.Brnch_No);
              $('#inputItemTR').val(req.count.Trns);

              // $('#idEditunit').val(req.count.id);
                 console.log(req);
            }
        });

     //  }
        
    });

  // //end Edite unite -------------------------------------------------------------------------


  // // start update unite --------------------------------------------------------------------
  $('#UpdateItemsCatagure').submit(function (e) { 
    e.preventDefault();

    // var inf=$('#idEditunit').val();
    // var datainf=$('#EditeInput').val();

    //  console.log(inf);

         $.ajax({
          type: "post",
          url: "Items.update",
          data: $('#UpdateItemsCatagure').serialize(),
          cache:false,
          success: function (data) {
           $('#EditeItemsCatagureModel').modal('hide');



       
            $('#itemcatcode'+data.data.idEdittemsCatagure).text(data.data.inputItemCode);
            $('#itemcatname'+data.data.idEdittemsCatagure).text(data.data.inputItemname);
            $('#itemcatGroup'+data.data.idEdittemsCatagure).text(data.data.inputItemgroup);

            $('#itemcatbrnch'+data.data.idEdittemsCatagure).text(data.data.inputItemREQ);
            $('#itemcatTrns'+data.data.idEdittemsCatagure).text(data.data.inputItemTR);
            

          // var div1='<tr id="idItemsCat'+data.inf.id+'">';
          // var div2='<th scope="row">'+data.inf.id+'</th> <td id="itemcatcode'+data.inf.id+'"> '+data.inf.Item_cod+'</td>';
          // var div3='<td id="itemcatname'+data.inf.id+'"> '+data.inf.Item_Name+'</td>';
          // var div4='<td id="itemcatGroup'+data.inf.id+'"> '+data.inf.Item_Group+'</td>';
          // var div5='<td id="itemcatbrnch'+data.inf.id+'"> '+data.inf.Brnch_No+'</td>';
          // var div6='<td id="itemcatTrns'+data.inf.id+'"> '+data.inf.Trns+'</td>';
         
              console.log(data);
          }
        });

  });


  // // End update  Unite --------------------------------------------------------------------


    });
    