/*
Bootstable
 @description  Javascript library to make HMTL tables editable, using Bootstrap
 @version 1.1
 @autor Tito Hinostroza
*/
"use strict";
//Global variables
var params = null;  		//Parameters
var colsEdi =null;
var Ardata =[];
var countAr =0;
var newColHtml = '<div class="btn-group pull-right">'+
'<button id="bEdit" type="button" class="btn btn-sm btn-default" onclick="butRowEdit(this);">' +
'<span class="glyphicon ti-pencil" > </span>'+
'</button>'+
'<button id="bElim" type="button" class="btn btn-sm btn-default" onclick="butRowDelete(this);">' +
'<span class=" ti-trash" > </span>'+
'</button>'+
'<button id="bAcep" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="butRowAcep(this);">' + 
'<span class="fa fa-check" > </span>'+
'</button>'+
'<button id="bCanc" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="butRowCancel(this);">' + 
'<span class=" fa fa-times" > </span>'+
'</button>'+
  '</div>';
  //Case NOT Bootstrap
  var newColHtml2 = '<div class="btn-group pull-right">'+
  '<button id="bEdit" type="button" class="btn btn-sm btn-default" onclick="butRowEdit(this);">' +
  '<span class="glyphicon ti-pencil" > ✎ </span>'+
  '</button>'+
  '<button id="bElim" type="button" class="btn btn-sm btn-default" onclick="butRowDelete(this);">' +
  '<span class=" ti-trash" > X </span>'+
  '</button>'+
  '<button id="bAcep" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="butRowAcep(this);">' + 
  '<span class="fa fa-check" > ✓ </span>'+
  '</button>'+
  '<button id="bCanc" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="butRowCancel(this);">' + 
  '<span class="fa fa-times" > → </span>'+
  '</button>'+
    '</div>';
var colEdicHtml = '<td name="buttons">'+newColHtml+'</td>'; 


var editunputitems=0;
$.fn.SetEditable = function (options) {
  var defaults = {
      SumItemscolumnsEd: null,         //Index to editable columns. If null all td editables. Ex.: "1,2,3,4,5"
      $addButton: null,        //Jquery object of "Add" button
      bootstrap: true,         //Indicates bootstrap is present.
      onEdit: function() {},   //Called after edition
      onBeforeDelete: function() {}, //Called before deletion
      onDelete: function() {}, //Called after deletion
      onAdd: function() {}     //Called when added a new row
  };
  params = $.extend(defaults, options);
  var $tabedi = this;   //Read reference to the current table.
  $tabedi.find('thead tr').append('<th name="buttons"></th>');  //Add empty column
  if (!params.bootstrap) {
    colEdicHtml = '<td name="buttons">'+newColHtml2+'</td>'; 
  }
  //Add column for buttons to all rows.
  $tabedi.find('tbody tr').append(colEdicHtml);
  var Ardata =[1,1,1,1,1,1,1,1,1];
  var tdval ="";
  Ardata.forEach(element => {
    tdval=tdval+"<td></td>";
  });



  

  
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

  
    $.ajax({
      type: "post",
      url: "adhnsarf.lastinvsab",
      cache:false,
      success: function (data) {
        console.log(data);
        
  
        $('#ItemCatTableData').append('<tr data-contact="'+data.Count+'"  data-falge="1" data-add="1">'+tdval+colEdicHtml+'</tr>');
      } 
    });


  //Process "addButton" parameter
  if (params.$addButton != null) {
      //There is parameter
      params.$addButton.click(function() {

        console.log('code');
        $.ajax({
          type: "post",
          url: "adhnsarf.lastinvsab",
          
          cache:false,
          success: function (data) {
           
            rowAddNew($tabedi.attr("id"),data.Count);
          } 
        });
        
          
      });
  }
  //Process "columnsEd" parameter
  if (params.columnsEd != null) {
      //Extract felds
      colsEdi = params.columnsEd.split(',');
  }



};
function IterarCamposEdit($cols, action) {
//Iterate through editable fields in a row
  var n = 0;
  $cols.each(function() {
      n++;
      if ($(this).attr('name')=='buttons') return;  //Exclude buttons column
      if (!IsEditable(n-1)) return;   //It's not editable
      action($(this));
  });
  
  function IsEditable(idx) {
  //Indicates if the passed column is set to be editable
      if (colsEdi==null) {  //no se definió
          return true;  //todas son editable
      } else {  //hay filtro de campos
          for (var i = 0; i < colsEdi.length; i++) {
            if (idx == colsEdi[i]) return true;
          }
          return false;  //no se encontró
      }
  }
}
function ModoEdicion($row) {
  if ($row.attr('id')=='editing') {
      return true;
  } else {
      return false;
  }
}
//Set buttons state
function SetButtonsNormal(but) {
  $(but).parent().find('#bAcep').hide();
  $(but).parent().find('#bCanc').hide();
  $(but).parent().find('#bEdit').show();
  $(but).parent().find('#bElim').show();
  var $row = $(but).parents('tr');  //accede a la fila
  $row.attr('id', '');  //quita marca
}
function SetButtonsEdit(but) {
  $(but).parent().find('#bAcep').show();
  $(but).parent().find('#bCanc').show();
  $(but).parent().find('#bEdit').hide();
  $(but).parent().find('#bElim').hide();
  var $row = $(but).parents('tr');  //accede a la fila
  $row.attr('id', 'editing');  //indica que está en edición
}






























//Events functions
function butRowAcep(but) {
//Acepta los cambios de la edición
  var $row = $(but).parents('tr');
  var flagaddnew=$row.attr('data-add');
 var $IdFatoorah =$row.attr('data-contact');
 var $flagAditeOrinsert =$row.attr('data-falge');
 var Invid =$('#IdFatoorah').val();
//  var EntryitemsCode =$('#inputItemCode').val();
 
 console.log( $IdFatoorah );
  //accede a la fila
  var $cols = $row.find('td');  //lee campos
  if (!ModoEdicion($row)) return;  //Ya está en edición
  //Está en edición. Hay que finalizar la edición
  IterarCamposEdit($cols, function($td) {  //itera por la columnas
    var cont = $td.find('input').val();
    Ardata[countAr]=cont;
    countAr++;
    if(countAr==9)
    {

      countAr=0;
      console.log(Ardata[4]);

      $.ajax({
        type: "post",
        url: "adhnsarfSub.store",
        data:{  'id':$IdFatoorah,'flag':$flagAditeOrinsert ,'arr':Ardata ,'inv':Invid  },
        cache:false,
        success: function (data) {

        //   if(data.Count=='insert')
        //   $row.attr('data-falge','0');
          flasher.success("Data has been saved successfully!");
           
            var tdval ="";
            Ardata.forEach(element => {
              tdval=tdval+"<td></td>";
            });
           
            if(flagaddnew ==1){
              $('#ItemCatTableData').append('<tr data-contact="'+data.id+'"  data-falge="1" data-add="1">'+tdval+colEdicHtml+'</tr>');
              $row.attr('data-add','0');

              var y= $("#itemsTOtalfatoorah").val();
              $("#itemsTOtalfatoorah").val(parseInt(y)+1);
            }
        } 
      });
    
      
    }
    //lee contenido del input
    $td.html(cont);  //fija contenido y elimina controles
  });
  SetButtonsNormal(but);
  params.onEdit($row);
}
















function butRowCancel(but) {
//Rechaza los cambios de la edición
  var $row = $(but).parents('tr');  //accede a la fila
  var $cols = $row.find('td');  //lee campos
  if (!ModoEdicion($row)) return;  //Ya está en edición
  //Está en edición. Hay que finalizar la edición
  IterarCamposEdit($cols, function($td) {  //itera por la columnas
      var cont = $td.find('div').html(); //lee contenido del div
      $td.html(cont);  //fija contenido y elimina controles
  });
  SetButtonsNormal(but);
}



































function SumItems(but)
{
  // 


  var inf =$('#IdFatoorah').val();

  var texsistem;
  $.ajax({
    type: "post",
    url: "adhnsarf.tex",
    data: {inf:inf },
    cache:false,
    success: function (data) {

   var sunmtotel =0;

      data.data.forEach(element =>{
        
        sunmtotel =sunmtotel+parseFloat(element.Offer);
      });
      
    
     
      $('#totalcode1').val(sunmtotel);
      
  
      texsistem =data.Count;
      var cost=$('#numberitems2').val();
      var price=$('#numberitems3').val();
      var tex=$('#numberitems4').val();
      
      var sum =(cost*price)-tex;
    
      var total=sum *(texsistem/100);
      

      console.log(editunputitems);





      $('#numberitems5').val(sum);
      $('#numberitems6').val(total);
      var totalall =total+sum;


      if(editunputitems < totalall){
        $('#sumfatoorahtext').text(sunmtotel+totalall);
        $('#cachfatoorah').val(sunmtotel+totalall);
      }else
      {
        $('#sumfatoorahtext').text(sunmtotel-totalall);
        $('#cachfatoorah').val(sunmtotel-totalall);
      }
      $('#numberitems8').val(totalall);
     
     
    }
  });


}



// function butclickdd(but)
// {
//   console.log($(but).val());
//   var inf=$(but).val();
//   var ten=$(but).attr('data-links');


//   var bigon=$(but).next();
//         $.ajax({
//         type: "post",
//         url: "restrict.searchEntry/"+ten,
//         data: {inf:inf },
//         cache:false,
//         success: function (data) {

         
//           bigon.html(data);
//         }
//       });
// }


$(document).on('click', '.list-group-item', function(){
  var value = $(this).text();
  
  var idlink=$(this).attr('data-id');
  var div =$(this).parent().parent();
  var input=div.prev();

  input.attr('data-store',idlink);
  input.val(value);
  div.html("");

});

// $(document).on('click', '.EntryItemsearch', function(){
//   var value = $(this).text();
//   const myArray = value.split("-");
//   var idlink=$(this).attr('data-id');
//   var idlinku=$(this).attr('data-r');
//   var div =$(this).parent().parent();
//   var input=div.prev();
//   var idin=input.parent().prev();
//   var inputid = idin.children().eq(1);
 
//  if(idlinku=='2')
//   inputid.val(myArray[0]);
//   input.attr('data-store',idlink);
//   input.val(myArray[1]);
//   div.html("");

// });





















//------------------------------------------------------edite 
function butRowEdit(but) {  
  //Start the edition mode for a row.
  var $row = $(but).parents('tr'); 
  console.log($row.attr('data-contact'));
  //accede a la fila




  var $cols = $row.find('td');  //lee campos
  if (ModoEdicion($row)) return;  //Ya está en edición
  //Pone en modo de edición
  var focused=false; 
  var count=0;
   //flag
  IterarCamposEdit($cols, function($td) {  //itera por la columnas
      var cont = $td.html(); //lee contenido
      //Save previous content in a hide <div>
      var div  = '<div style="display: none;">' + cont + '</div>'; 
     // var input= '<input class="form-control input-sm"   onkeyup="butclickdd(this);" data-links="3" value="' + cont + '">  <div class="product_list" ></div>'; 
      // butclickdd(this);
      if(count==0)
         var input= '<input class="form-control  input-sm"  data-links="3" value="' + cont + '">   <div class="product_list" ></div>';
      else if(count==2 || count==3|| count==4)
      var input= '<input id="numberitems' +count + '"  class="form-control  inputsearch  input-sm"  onkeyup="SumItems(this);"  data-links="3" value="' + cont + '">  <div class="product_list" ></div>';
      else if(count>=5)
          var input= '<input id="numberitems'+count + '" class="form-control  input-sm" data-links="3" value="' + cont + '"  readonly >  <div class="product_list" ></div>';
      else
         var input= '<input class="form-control input-sm"  value="' + cont + '">';


      
      count++;
      $td.html(div + input);  //Set new content
      //Set focus to first column
      if (!focused) {
        $td.find('input').focus();
        focused = true;
      }
  });

  editunputitems =$('#numberitems8').val();

  SetButtonsEdit(but);
}





























//--------------------------------------------------------------end edite
function butRowDelete(but) {  //Elimina la fila actual
  var $row = $(but).parents('tr');  //accede a la fila
  params.onBeforeDelete($row);
  
  console.log($row.attr('data-contact'));
 var ten=$row.attr('data-contact');
  $.ajax({
    type: "delete",
    url: "adhnsarfsbitem.delete/"+ten,

    success: function (req) {
      // $('#idItemEntrySubData'+ten).remove();
      flasher.success("Data has been saved successfully!");
      $row.remove();
      params.onDelete();
         console.log(req);
    }
});
 
}





















//Functions that can be called directly
function rowAddNew(tabId,lastis, initValues=[] ) {  

  var $tab_en_edic = $("#"+tabId);  //Table to edit
  var $rows = $tab_en_edic.find('tbody tr');
  //if ($rows.length==0) {
      //No hay filas de datos. Hay que crearlas completas
      var $row = $tab_en_edic.find('thead tr');  //encabezado
      var $cols = $row.find('th');
        //lee campos
      var lost=0;
      //construye html4


     
      // -------------------------
      var htmlDat = '';
      var i = 0;
      $cols.each(function() {
          if ($(this).attr('name')=='buttons') {
              //Es columna de botones
              htmlDat = htmlDat + colEdicHtml;  //agrega botones
          } else {
              if (i<initValues.length) {
                htmlDat = htmlDat + '<td>'+initValues[i]+'</td>';
              } else {
                htmlDat = htmlDat + '<td></td>';
              }
          }
          i++;
      });
      $.ajax({
        type: "post",
        url: "adhnsarf.lastinvsab",
        
        cache:false,
        success: function (data) {
         
          // lost =data.Count;

          $tab_en_edic.find('tbody').append('<tr data-contact="'+data.Count+'"  data-falge="1">'+htmlDat+'</tr>');
        } 
      });
  
  
  params.onAdd();
}













































// function rowAddNewAndEdit(tabId, initValues=[]) {
// /* Add a new row an set edition mode */  
//   rowAddNew(tabId, initValues);
//   var $lastRow = $('#'+tabId + ' tr:last');
//   butRowEdit($lastRow.find('#bEdit'));  //Pass a button reference
// }



// function TableToCSV(tabId, separator) {  //Convert table to CSV
//   var datFil = '';
//   var tmp = '';
//   var $tab_en_edic = $("#" + tabId);  //Table source
//   $tab_en_edic.find('tbody tr').each(function() {
//       //Termina la edición si es que existe
//       if (ModoEdicion($(this))) {
//           $(this).find('#bAcep').click();  //acepta edición
//       }
//       var $cols = $(this).find('td');  //lee campos
//       datFil = '';
//       $cols.each(function() {
//           if ($(this).attr('name')=='buttons') {
//               //Es columna de botones
//           } else {
//               datFil = datFil + $(this).html() + separator;
//           }
//       });
//       if (datFil!='') {
//           datFil = datFil.substr(0, datFil.length-separator.length); 
//       }
//       tmp = tmp + datFil + '\n';
//   });
//   return tmp;
// }
// function TableToJson(tabId) {   //Convert table to JSON
//   var json = '{';
//   var otArr = [];
//   var tbl2 = $('#'+tabId+' tr').each(function(i) {        
//      var x = $(this).children();
//      var itArr = [];
//      x.each(function() {
//         itArr.push('"' + $(this).text() + '"');
//      });
//      otArr.push('"' + i + '": [' + itArr.join(',') + ']');
//   })
//   json += otArr.join(",") + '}'
//   return json;
// }