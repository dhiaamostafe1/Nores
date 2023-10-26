$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        

      //  Group to stoe --------------------------------------------------------
      // $('#StoreGroup').submit(function (e) { 
      //   e.preventDefault();

      //  // var inf=$('#unit').val();
      //        $.ajax({
      //         type: "post",
      //         url: "group.store",
      //         data:$('#StoreGroup').serialize(),
      //         cache:false,
      //         success: function (data) {

      //        $('#StoreGroupModel').modal('hide');

      //         if(data.Count ==1){
      //           location.reload(true);
      //         }
      //         var div1 = '<tr id="group'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td id="groupname'+data.inf.id+'">'+data.inf.group_name+'</td> <td id="groupprint'+data.inf.id+'">'+data.inf.group_print+'</td>  ';
      //         var div2 = '<td><a class="groupEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditegroupModel"  data-contant='+data.inf.id +'></a></td>';
          
      //         var div3= '<td><a type="button"  class="groupdelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';

      //          $('#groupItem').append(div1+div2+div3);
      //          flasher.success("Data has been saved successfully!");
      //             console.log(data);
      //         } 
      //       });

      // });

      // end Group to store -------------------------------------------------------------------------------

     // delete  Group-------------------------------------------------------------------------------------

            $(document).on('click','.groupdelete' ,function (e) {
                e.preventDefault();
             // alert($(this).val));
              console.log($(this).attr('data-contant'));
        
           // if(confirm('do ready to delete')){
                var ten=$(this).attr('data-contant');
               $.ajax({
                    type: "delete",
                    url: "Usersystem.delete/"+ten,
                
                    success: function (req) {
                        $('#UserSystem'+ten).remove();
                        flasher.warning("Are you sure you want to proceed ?");
                         console.log(req);
                    }
                });
        
             //  }
                
            });
        
 //end delete Group -------------------------------------------------------------------------



       // start Edite unite -----------------------------------------------------------------------
   $(document).on('click','.groupEdite' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
      console.log($(this).attr('data-contant'));

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "GET",
            url: "Usersystem.edit/"+ten,
        
            success: function (req) {
              $('#Editenamegroup').val(req.count.name);
              $('#Editeprintgroup').val(req.count.email);
              $('#idEditgroup').val(req.count.id);
                 console.log(req);
            }
        });

     //  }
        
    });

  //end Edite unite -------------------------------------------------------------------------


   // start update unite --------------------------------------------------------------------
   $('#Updategroup').submit(function (e) { 
    e.preventDefault();

         $.ajax({
          type: "post",
          url: "Usersystem.update",
          data: $('#Updategroup').serialize(),
          cache:false,
          success: function (data) {
           $('#EditegroupModel').modal('hide');
           // $('#unitedeletitem'+data.data.idEditunit).remove();
          $('#groupname'+data.data.idEditgroup).text(data.data.Editenamegroup);
          $('#groupprint'+data.data.idEditgroup).text(data.data.Editeprintgroup);
          // var div1 = '<tr id="unite'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td>'+data.inf.unite_name+'</td> ';
          // var div2 = '<td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><a class=" uniteEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-contant='+data.inf.id +'></a>';
          // var div3= '<a type="button"  class="unitedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
          flasher.success("Data has been saved successfully!");
          //  $('#uniteItem').append(div1+div2+div3);
              console.log(data);
          }
        });

  });


  // End update  Unite --------------------------------------------------------------------

        



    });
    