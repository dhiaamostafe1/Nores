<?php

function  Admin(){

    $data = array("dhiaamostafe", "dhiaamostafa4@gmail.com", "codecode");
    return    $data ;
}




use App\Models\tenancy\User_Rull;

function getrull($user ,$Roll ,$type){
  
  $fon=User_Rull::where('Roll', '=', $Roll)->where('User_no', '=', $user)->firstorfail();


  if($type =="Inter")
    return $fon->Inter;
  elseif($type =="ADD")
    return $fon->ADD;
  elseif($type =="Update")
    return $fon->Update;
  elseif($type =="Delete")
    return $fon->Delete;
  elseif($type =="Show")
    return $fon->Show;
  else
    return $fon->Print;

}
function arrayRull(){


    $cars = array (
        array("المفضلة","Favorite",22,18),
        array("حركات","movements",15,13),
        array("تقارير","reports",5,2),
        array("بيانات اساسية","basic data",17,15),
        array("مبيعات","sales",5,2),
        array("مشتريات","purchases",5,2),
        array("حركات مخزنية","warehouse movements",5,2),
        array("الاعدادات","Settings",5,2),
        array("تقارير مبيعات","selling reports",5,2),
        array("تقرير مشتريات","Purchase reports",5,2),
        array("تقارير مخازن","Stores reports",5,2),
        array("تقارير محاسبية","Accounting reports",5,2),
        array("تقارير عامة","General reports",5,2),
        array("بيانات منشاة","company data",5,2),
        array("فاتورة مبيعات","sales bill",5,2),
        array("اعدادات عامة","General settings",5,2),
        array("بيانات الاصناف","Item data",5,2),
        array("بيانات الوحدات","Unit data",5,2),
        array("صلاحيات المستخدمين","User permissions",5,2),
        array("دليل الحسابات","Accounts guide",5,2),
        array("اعدادات الحسابات","Account settings",5,2),
        array("بيانات المجموعات","group data",5,2),
        array("مركزالتكلفة","cost center",5,2),
        array("بيانات الفروع","Branch data",5,2),
        array("بيانات الخزائن","Safes data",5,2),
        array("بيانات البنوك","Bank data",5,2),
        array("ترميزالمصروفات","Expense coding",5,2),
        array("بيانات المستوعات","Repository data",5,2),
        array("بيانات المندوبين","Delegate data",5,2),
        array("بيانات العملاء",'customer data',5,2),


        array("قيد يومي","movements",15,13),
        array("بيانات المستخدمين","movements",15,13),
        array("سند قبض","movements",15,13),
        array("أنواع العقود","movements",15,13),
        array("حساب تفصيلي","movements",15,13),
        array("DB Control","movements",15,13),
        array("تقرير مبيعات يومي","movements",15,13),
        array("تقرير مبيعات فروع","movements",15,13),
        array("مرتجع مبيعات","movements",15,13),
        array("اعدادات الواجهات","movements",15,13),
        array("تقرير فواتير مبيعات","movements",15,13),
        array("حركات محاسبية","movements",15,13),
        array("أذن اضافة","movements",15,13),
        array("أذن صرف","movements",15,13),
        array("فاتورة توالف","movements",15,13),
        array("فاتورة محذوف","movements",15,13),
        array("جرد مخزن","movements",15,13),
        array("سند صرف","movements",15,13),
        array("فاتورة شراء","movements",15,13),
        array("مرتجع شراء","movements",15,13),
        array("تقرير مشنريات ","movements",15,13),



        array("تقرير مشريات فروع","movements",15,13),
        array("تقرير مشريات يومي","movements",15,13),
        array("تقرير ربح يومي","movements",15,13),
        array("تقرير ربح فروع","movements",15,13),
        array("تقرير كميات مخزون","movements",15,13),
        array("تقرير مبيعات مجموعات","movements",15,13),
        array("تقرير تفاصيل جدوال","movements",15,13),
        array("اقفال يومي","movements",15,13),
        array("شاشة العقود","movements",15,13),
        array("شاشة تاجير موافق","movements",15,13),
        array("مكونات الاصناف","movements",15,13),
        array("يوميات صندوق","movements",15,13),
        array("فاتورة ذهب","movements",15,13),
        array("طباعة باركود","movements",15,13),
        array("بيانات الموردين","movements",15,13),
        array("اعدادات ربط الفروع","movements",15,13),
        array("تحديث قواعد البيانات","movements",15,13),
        array("قائمة دخل ","movements",15,13),
        array("ميزان المراجعة","movements",15,13),
        array("تقرير ضريبة","movements",15,13),
        array("عقود البرامج","movements",15,13),
        array("مبيعات الشركة ","movements",15,13),
        array("بيانات الطاولات","movements",15,13),
        array("بيانات صندوق","Bank data",5,2),

      );


      return  $cars;
}



// Acount Gurde

function AcountGuiddata()
{

    $cars = array (
        array("الدليل المحاسبي","0",0,18),

        array("الاصوال المتدوالة","01",1,2),
        array("الصنديق","011",2,13),
        array("البنوك","012",2,2),
        array("العملاء","013",2,2),
        array("المخازن","014",2,2),
        array("العهد وسلف الموظفين","015",2,2),
        array("مصروفات مدفوعة مقدما","016",2,2),


        array("الاصوال الثابتة","02",1,2),
        array("سيارات","021",9,2),
        array("الات ومعدات","022",9,2),
        array("اجهزة كمبيوتر","023",9,2),
        array("طابعات","024",9,2),
        array("اجهزة كهربائية","025",9,2),
        array("اثاث ومفروشات","026",9,2),
        array("الفروع","027",9,2),


        array("حصوم وحقوق ملكية","03",1,2),
        array("الخصوم المتدوالة","031",17,2),
        array("الموردين","0311",18,2),
        array("القيمة المضافة على الايرادات","0312",18,2),
        array("القيمة المضافة على المشتريات","0313",18,2),



       
        array("مصروفات مستحقة","032",17,2),
        array("حقوق ملكية","033",17,2),
        array("الارباح والخسائر","0331",24,2),
        array("جاري الشركاء","0332",24,2),
        array("مجمع الاهلاك","0333",24,2),

        array("الايرادات","04",1,2),
        array("ايرادات مبيعات","041",27,2),
        array("مردودات المبيعات","042",27,2),
        array("الخصم على المبيعات","043",27,2),
        array("ايردات اخرى","044",27,2),


        array("المصاريف والتكاليف","05",1,2),
        array("تكاليف مبيعات","051",32,2),
        array("مصاريف بيع وتسويق","052",32,2),
        array("مصاريف عمومية وادارية","053",32,2),
        array("مصاريف اخرى","054",32,2),
        array("عجز في الصندوق","0541",36,2),
        array("عجز في البنك","0541",36,2),



        // ADD
        array("مندوبين","017",2,2),


      );


      return  $cars;

}