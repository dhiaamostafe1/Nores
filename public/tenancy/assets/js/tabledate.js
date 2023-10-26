
    $(document).ready(function(){

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
  
  
  
        
  
  
  
  
        //  unite to stoe --------------------------------------------------------
        $('#StoreCostForm').submit(function (e) { 
          e.preventDefault();
  
          //  var inf=$('#nameEntryType').val();
          //     console.log(inf);
               $.ajax({
                type: "post",
                url: "tabledate.store",
                data:$('#StoreCostForm').serialize(),
                cache:false,
                success: function (data) {
                  $('#StoreCostModel').modal('hide');
                  if(data.count ==1){
                    location.reload(true);
                  }
                 var div1 = '<tr id="EntryType'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td id="EntryTypename'+data.inf.id+'">'+data.inf.name+'</td> ';
                 var div2 = '<td>';
                 var div4 ='<a class="EntryTypeEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeEntryTypeModel"  data-contant='+data.inf.id +'></a></td>';
                 var div3= '<td><a type="button"  class="EntryTypedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';
  
                 flasher.success("Data has been saved successfully!");
                  $('#CostItemtable').append(div1+div2+div4+div3);
                    console.log(data);
                } 
              });
  
        });
  
        // end unite to store -------------------------------------------------------------------------------
  
  
        // delete  unite-------------------------------------------------------------------------------------
  
        $(document).on('click','.Costdelete' ,function (e) {
          e.preventDefault();
       // alert($(this).val));
        console.log($(this).attr('data-contant'));
  
     // if(confirm('do ready to delete')){
          var ten=$(this).attr('data-contant');
         $.ajax({
              type: "delete",
              url: "tabledate.delete/"+ten,
          
              success: function (req) {
                  $('#CostTr'+ten).remove();
                  if(req.count == 0){
                    location.reload(true);
                  }
                  flasher.warning("Are you sure you want to proceed ?");
                  // if(req.count==0){
                  //     $('#flag').val(0);
                  // }
                   console.log(req);
              }
          });
  
       //  }
          
      });
  
        //end delete unite -------------------------------------------------------------------------
  
  
        // start Edite unite -----------------------------------------------------------------------
        $(document).on('click','.CostEdite' ,function (e) {
          e.preventDefault();
       // alert($(this).val));
        console.log($(this).attr('data-contant'));
  
     // if(confirm('do ready to delete')){
          var ten=$(this).attr('data-contant');
         $.ajax({
              type: "GET",
              url: "tabledate.edit/"+ten,
          
              success: function (req) {
                $('#EditenameEntryType').val(req.count.name);
                $('#idEditEntryType').val(req.count.id);
                   console.log(req);
              }
          });
  
       //  }
          
      });
  
    //end Edite unite -------------------------------------------------------------------------
  
  
    // start update unite --------------------------------------------------------------------
    $('#UpdatCost').submit(function (e) { 
      e.preventDefault();
  
      var inf=$('#idEditEntryType').val();
      var datainf=$('#EditenameEntryType').val();
  
      //  console.log(inf);
      
           $.ajax({
            type: "post",
            url: "tabledate.update",
            data: $('#UpdatCost').serialize(),
            cache:false,
            success: function (data) {
             $('#EditeCostModel').modal('hide');
             flasher.success("Data has been saved successfully!");
             // $('#unitedeletitem'+data.data.idEditunit).remove();
           $('#EntryTypename'+inf).text(data.data.name);
                console.log(data);
            }
          });
  
    });
  
  
    // End update  Unite --------------------------------------------------------------------
  
  
      });
      