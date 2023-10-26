<?php



 function ModelAcc($Model ,$Form ,$NameModel ,$Dis ,$close ,$save) {
 
  echo ' <div class="modal fade" id="'. $Model.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
  echo '<div class="modal-dialog"> <div class="modal-content"><div class="modal-header"> ';
  echo '<h1 class="modal-title fs-5" id="exampleModalLabel"> '.$NameModel.'</h1></div> ';
  echo '<form id="'.$Form.'"  action="#"> <div class="modal-body">';
  echo  '<input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="row mb-3">';
  echo  '<label for="exampleInputPassword1" class="col-sm-2 form-label">'.$Dis.'</label><div class="col-sm-10">';
  echo  ' <input type="text" class="form-control" id="nameAccountBank" name="nameAccountBank" required> ';
  echo  '</div> </div> </div><div class="modal-footer"> ';
  echo   '  <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">'.$close.'</button>';
  echo   '<button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >'.$save.'</button>';
  echo   '  </div> </form> </div></div></div> ';



 
  
}







function TableAcc($Number ,$name ,$edite ,$delete ,$data ,$nameEdite ,$namedelete ,$editeMode ,$user ,$rol)
{
   echo' <table class="table table-hover "> <thead> <tr>';
   echo ' <th>'.$Number.'</th><th>'.$name.'</th>';
   echo '<th style="width: 5%">'.$edite.'</th>';
   echo '<th style="width: 5%">'.$delete.'</th> </tr> </thead>';
   echo '<tbody  id="BankTableItem">';
   

        foreach ($data as $item){

       
           echo' <tr id="BanktrTable'.$item->id.'">';
           echo  '<th scope="row">'.$item->AccountID.'</th>';
           echo  '<td id="Bankname'.$item->id.'">'.$item->AccountName .' </td>';
           if (getrull($user, $rol,'Update'))
           echo  '<td ><a class=" '.$nameEdite.' jsgrid-button jsgrid-edit-button  ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#'.$editeMode.'"  data-contant="'.$item->id.'"></a>';
           if (getrull($user, $rol,'Delete'))
           echo  '<td ><a type="button"  class=" '.$namedelete.' jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant="'.$item->id.'"></a>';
           echo   '</td></tr> ';
            
        }
    
    echo '</tbody></table>';



}



function manuNavTabAcc($data ,$next,$previous,$add ,$edite ,$accpte ,$close ,$user , $rol)
{
  
  echo ' <div class="ControlCategoryItems"> <ul class="nav nav-tabs" role="tablist">';
  echo '<li role="presentation" class="active"><a href="'.$data->nextPageUrl().'" class="btn">'.$next.'</a></li>';
  echo '<li role="presentation"> <a href="'.$data->previousPageUrl().'" class="btn">'.$previous.'</a> </li>';
  if (getrull($user, $rol,'ADD'))
  echo '<li role="presentation"><a  class="btn '.$add.'"   ><i   class="fa fa-plus-circle" aria-hidden="true"></i></a></li>';
  if (getrull($user, $rol,'Update'))
  echo '<li role="presentation"><a  class="btn '.$edite.'"  id="'.$edite.'"><i   class="ti-pencil" aria-hidden="true"></i></a></li>';
  echo '<li role="presentation"><a  class="btn EditeItemsBtnEntry"  id="'.$accpte.'"  style="display: none"><i   class="fa fa-check" aria-hidden="true"></i></a></li>';
  echo  '<li role="presentation"><a  class="btn "  id="'.$close.'"  style="display: none"><i   class="fa fa-times" aria-hidden="true"></i></a></li>';
  echo ' </ul></div>';

}


function TableSubEntry($id ,$name ,$madin ,$Dain ,$Catch ,$End_NOT,$COS_Cent_NAMe,$data)
{

 echo '<table class="table table-hover " id="DyanmicTable"> <thead><tr>';
 
       
      //  foreach($inf as $kay => $items){

      //  echo  '<th>'.$items[$kay].'</th>';

      //  }

       echo  '<th>'.$id.'</th>';
       echo  '<th>'.$name.'</th>';
       echo  '<th>'.$madin.'</th>';
       echo  '<th>'.$Dain.'</th>';
       echo  '<th>'.$Catch.'</th>';
       echo  '<th  style="width:30%">'.$End_NOT.'</th>';
       echo  '<th>'.$COS_Cent_NAMe.'</th>';
 
echo '</tr></thead><tbody  id="ItemCatTableData">';

       foreach ($data[0]->Childs as $item)
       {
         echo ' <tr id="idItemEntrySubData'.$item->id .'" data-contact="'.$item->id.'" data-falge="0">';
         echo '   <td id="ItemCatDataItem_Sell'.$item->id.'"> '. $item->ACC_NO.'</td>';
         echo '  <td id="ItemCatDataname'.$item->id .'"> '. $item->ACC_Name .'</td>';
         echo  ' <td id="ItemCatDataItem_CNT'.$item->id .'"> '. $item->Madin .'</td>';
         echo  '   <td id="ItemCatDataItem_NAT'.$item->id .'"> '. $item->Dain .'</td>';
         echo  '   <td id="ItemCatDataItem_BAY'.$item->id .'"> '. $item->Catch .'</td>';
         echo   ' <td id="ItemCatDataItem_BAY'.$item->id .'"> '. $item->End_NOT .'</td>';
         echo   ' <td id="ItemCatDataItem_NAT'.$item->id .'"> '. $item->COS_Cent_NAMe .'</td>  </tr>';
       }
          
       echo '</tbody> <tfoot><th> <a  id="addNewRow"><i class="fa fa-plus-circle  " ></i></a></th></tfoot></table>';
}