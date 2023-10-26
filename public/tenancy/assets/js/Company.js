$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

// ------------------------------------------------------------------------------



$(document).on('click','.Campanyitem' ,function (e) {
    e.preventDefault();
 // alert($(this).val));
  console.log($(this).attr('data-contant'));

// if(confirm('do ready to delete')){
    var ten=$(this).attr('data-contant');
    $.ajax({
      type: "GET",
      url: "Company.edit/"+ten,
  
      success: function (req) {
      
        flasher.success("Data has been saved successfully!");


      //   $('#NameCompany').text(req.count.Company_name);
      //   $('#CountryCompany').text(req.count.Country);
      //   $('#CityCompany').text(req.count.City);

      //   $('#TelPhoneCompany').text(req.count.TelePhone);
      //   $('#PhoneCompany').text(req.count.Mobile);

      //   $('#Address1Company').text(req.count.Address1);
      //   $('#Address2Company').text(req.count.Address2);
      //   $('#Address3Company').text(req.count.Address3);
      //   $('#CurrencyCompany').text(req.count.Currency);
      //   $('#FooterCompany').text(req.count.Footer);


      //  $('#idCompanyInput').val(ten);
      //   $('#NameCompanyinput').val(req.count.Company_name);
      //   $('#CountryCompanyinput').val(req.count.Country);
      //   $('#CityCompanyinput').val(req.count.City);
      //   $('#TelPhoneCompanyinput').val(req.count.TelePhone);
      //   $('#PhoneCompanyinput').val(req.count.Mobile);
      //   $('#Address1Companyinput').val(req.count.Address1);
      //   $('#Address2Companyinput').val(req.count.Address2);
      //   $('#Address3Companyinput').val(req.count.Address3);
      //   $('#CurrencyCompanyinput').val(req.count.Currency);
      //   $('#FooterCompanyinput').text(req.count.Footer);

        // $("#deletesittingUser").attr("data-contant",ten);
           console.log(req);
      }
  });

    
});

// ------------------------------------------------------------------------------



$(document).on('click','#EditeCompany' ,function (e) {
    e.preventDefault();
 
    
   $('#textcompany').hide();
   $('#inputcompany').show();

   
  //  console.log('google');
    
});



// // $("#addsittinguser").click(function(){
// //   $("#StoreStingUser").addClass("Store");
// // });



// //-------------------------------------------
// $('#StoreStingUser').submit(function (e) { 
//     e.preventDefault();

  
      
//          $.ajax({
//           type: "post",
//           url: "SittingUser.store",
//           data:$('#StoreStingUser').serialize(),
//           cache:false,
//           success: function (data) {

//             $('#EditeStingUser').show();
//             $('#StoreStingUser').hide();


//             var dat1='<tr  class="sttingUser" id="sttingUsertable'+data.data.id+'" data-contant="'+data.data.id+'"> <th scope="row">'+data.data.id+'</th>';
//             var dat2 ='<td id="sttingUsername{{$item->id }}"> '+data.data.User_Name+'</td>';
//             var dat3 ='<td id="sttingUserMNOB_NO{{$item->id }}"> '+data.data.MNOB_NO +'</td>';
//             var dat4 ='<td id="sttingUserCUS_NO{{$item->id }}">'+data.data.CUS_NO +' </td> </tr>'; 
//         //     $('#StoreEntryTypeModel').modal('hide');
//         //    var div1 = '<tr id="EntryType'+ data.inf.id+'"><th scope="row">'+data.inf.id +'</th> <td id="EntryTypename'+data.inf.id+'">'+data.inf.Entry_Type+'</td> ';
//         //    var div2 = '<td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">';
//         //    var div4 ='<a class="EntryTypeEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeEntryTypeModel"  data-contant='+data.inf.id +'></a>';
//         //    var div3= '<a type="button"  class="EntryTypedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant='+data.inf.id +'></td></tr>';

//              $('#UserSittingadd').append(dat1+dat2+dat3+dat4);
//               console.log(data);
//           } 
//         });

//   });


//   //------------------------------------------------------------------------------------

  $('#UpdateCompany').submit(function (e) { 
    e.preventDefault();

    var inf=$('#idCompanyInput').val();
      // console.log('kkkkkkkkkkkkkkk');
      
         $.ajax({
          type: "post",
          url: "Company.update",
          data:$('#UpdateCompany').serialize(),
          cache:false,
          success: function (data) {

         // $('#nameCompanytext'+inf).text(data.unit.Company_name);


          $('#UpdateCompany').reset();
         // $('.Campanyitem').click();
          
            // $('#sttingUsername'+inf).text(data.data.User_Name);
            // $('#sttingUserMNOB_NO'+inf).text(data.data.MNOB_NO);
            // $('#sttingUserCUS_NO'+inf).text(data.data.CUS_NO);
            console.log(data);
       
          } 
        });

  });


// // delete  unite-------------------------------------------------------------------------------------

//       $(document).on('click','#deletesittingUser' ,function (e) {
//         e.preventDefault();
//      // alert($(this).val));
//       console.log($(this).attr('data-contant'));

//    // if(confirm('do ready to delete')){
//         var ten=$(this).attr('data-contant');
//        $.ajax({
//             type: "delete",
//             url: "SittingUser.delete/"+ten,
        
//             success: function (req) {
//                $('#sttingUsertable'+ten).remove();

//                 // if(req.count==0){
//                 //     $('#flag').val(0);
//                 // }
//                  console.log(req);
//             }
//         });

//      //  }
        
//     });

      //end delete unite -------------------------------------------------------------------------






        


 });
    