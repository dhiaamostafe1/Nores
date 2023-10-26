$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

// ------------------------------------------------------------------------------



$(document).on('dblclick','.sttingUser' ,function (e) {
    e.preventDefault();
 // alert($(this).val));
  console.log($(this).attr('data-contant'));

// if(confirm('do ready to delete')){
    var ten=$(this).attr('data-contant');
    $.ajax({
      type: "GET",
      url: "SittingUser.edit/"+ten,
  
      success: function (req) {
      

        
        $('#idStingUser').val(ten);
        $('#User_Nameinput').val(req.count.User_Name);
        $('#stor_idinput').val(req.count.stor_id);
        $('#SAFE_NOinput').val(req.count.SAFE_NO);
        $('#BANK_NOinput').val(req.count.BANK_NO);
        $('#Disc_Pinput').val(req.count.Disc_P);
        $('#Disc_Ninput').val(req.count.Disc_N);
        $('#Passinput').val(req.count.Pass);
        $('#MNOB_NOinput').val(req.count.MNOB_NO);
        $('#CUS_NOinput').val(req.count.CUS_NO);

        $("#deletesittingUser").attr("data-contant",ten);
           console.log(req);
      }
  });

    
});

// ------------------------------------------------------------------------------



$(document).on('click','#addsittinguser' ,function (e) {
    e.preventDefault();
 
    
   $('#EditeStingUser').hide();
   $('#StoreStingUser').show();

   
    console.log('google');
    
});



// $("#addsittinguser").click(function(){
//   $("#StoreStingUser").addClass("Store");
// });



//-------------------------------------------
$('#StoreStingUser').submit(function (e) { 
    e.preventDefault();

  
      
         $.ajax({
          type: "post",
          url: "SittingUser.store",
          data:$('#StoreStingUser').serialize(),
          cache:false,
          success: function (data) {

            $('#EditeStingUser').show();
            $('#StoreStingUser').hide();


            var dat1='<tr  class="sttingUser" id="sttingUsertable'+data.data.id+'" data-contant="'+data.data.id+'"> <th scope="row">'+data.data.id+'</th>';
            var dat2 ='<td id="sttingUsername{{$item->id }}"> '+data.data.User_Name+'</td>';
            var dat3 ='<td id="sttingUserMNOB_NO{{$item->id }}"> '+data.data.MNOB_NO +'</td>';
            var dat4 ='<td id="sttingUserCUS_NO{{$item->id }}">'+data.data.CUS_NO +' </td> </tr>'; 
        //     $('#StoreEntryTypeModel').modal('hide');
        //    var div1 = '<tr id="EntryType'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td id="EntryTypename'+data.inf.id+'">'+data.inf.Entry_Type+'</td> ';
        //    var div2 = '<td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">';
        //    var div4 ='<a class="EntryTypeEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeEntryTypeModel"  data-contant='+data.inf.id +'></a>';
        //    var div3= '<a type="button"  class="EntryTypedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';

             $('#UserSittingadd').append(dat1+dat2+dat3+dat4);
              console.log(data);
          } 
        });

  });


  //------------------------------------------------------------------------------------

  $('#EditeStingUser').submit(function (e) { 
    e.preventDefault();

    var inf=$('#idStingUser').val();

      
         $.ajax({
          type: "post",
          url: "SittingUser.update",
          data:$('#EditeStingUser').serialize(),
          cache:false,
          success: function (data) {


            // var dat2 ='<td id="sttingUsername{{$item->id }}"> '+data.data.User_Name+'</td>';
            // var dat3 ='<td id="sttingUserMNOB_NO{{$item->id }}"> '+data.data.MNOB_NO +'</td>';
            // var dat4 ='<td id="sttingUserCUS_NO{{$item->id }}">'+data.data.CUS_NO +' </td> </tr>'; 

            $('#sttingUsername'+inf).text(data.data.User_Name);
            $('#sttingUserMNOB_NO'+inf).text(data.data.MNOB_NO);
            $('#sttingUserCUS_NO'+inf).text(data.data.CUS_NO);

         
           // $('#EditeStingUser').show();
           // $('#StoreStingUser').hide();
        //     $('#StoreEntryTypeModel').modal('hide');
        //    var div1 = '<tr id="EntryType'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td id="EntryTypename'+data.inf.id+'">'+data.inf.Entry_Type+'</td> ';
        //    var div2 = '<td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">';
        //    var div4 ='<a class="EntryTypeEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeEntryTypeModel"  data-contant='+data.inf.id +'></a>';
        //    var div3= '<a type="button"  class="EntryTypedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';

        //     $('#EntryTypeItem').append(div1+div2+div4+div3);
       
          } 
        });

  });


// delete  unite-------------------------------------------------------------------------------------

      $(document).on('click','#deletesittingUser' ,function (e) {
        e.preventDefault();
     // alert($(this).val));
      console.log($(this).attr('data-contant'));

   // if(confirm('do ready to delete')){
        var ten=$(this).attr('data-contant');
       $.ajax({
            type: "delete",
            url: "SittingUser.delete/"+ten,
        
            success: function (req) {
               $('#sttingUsertable'+ten).remove();

                // if(req.count==0){
                //     $('#flag').val(0);
                // }
                 console.log(req);
            }
        });

     //  }
        
    });

      //end delete unite -------------------------------------------------------------------------






        


 });
    