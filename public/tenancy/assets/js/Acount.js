
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#StoreAccountGuide').submit(function (e) { 
                e.preventDefault();
        
                
                console.log($('#nameAccount').val());
                     $.ajax({
                      type: "post",
                      url: "Accountguide.store",
                      data:$('#StoreAccountGuide').serialize(),
                      cache:false,
                      success: function (data) {
                        // if(data.count ==1){
                        //   
                        // }
                       location.reload(true);
                          console.log(data);
                      } 
                    });
        
              });
        
  
            

//   //----------------------------------------------------------------------------------     
              var toggler = document.getElementsByClassName("box");
              var i;

              for (i = 0; i < toggler.length; i++) {
                toggler[i].addEventListener("click", function() {
             
                  var ten=this.parentElement.getAttribute("data-count");
                   console.log(ten);
                  $.ajax({
                    type: "get",
                    url: "Accountguide.edit/"+ten,
                    cache:false,
                    success: function (data) {
            
                        $('#InputSourceAccount').val(ten);
                        $('#MadinAcc').text(data.count.DebitAccount);
                        $('#AccountAcc').text(data.count.AccountID);
                        $('#SourceAcc').text(data.count.AccountSource);
                        $('#DainAcc').text(data.count.CreditAccount);
                        $('#BalanceAcc').text(data.count.BalanceAccount);
                        $('#MAINAcc').text(data.count.TYPE);
                        $('#NameAcc').text(data.count.AccountName);
            
                        //          $('#CloseAccountGuide').hide();
                        
                        console.log(data);
                    } 
                  });
                  // console.log( $(this).attr('data-count'));
                  this.parentElement.querySelector(".nested").classList.toggle("active");
                  this.classList.toggle("check-box");
                });
              }
          
//   //----------------------------------------------------------------------------------          
  $('#AddItemsACCount').on('click', function(){


    $('#CloseAccountGuide').show();
    
  
    console.log("dd");

  })

  //------------------------------------------------
  $('ul').on('click','.listAccount' ,function (e) {
     
    e.preventDefault();

    console.log($(this).attr('data-count'));

    $('.activity').removeClass(); 
    $(this).addClass('activity');
    var ten=$(this).attr('data-count');

    $.ajax({
        type: "get",
        url: "Accountguide.edit/"+ten,
        cache:false,
        success: function (data) {

            $('#InputSourceAccount').val(ten);
            $('#MadinAcc').text(data.count.DebitAccount);
            $('#AccountAcc').text(data.count.AccountID);
            $('#SourceAcc').text(data.count.AccountSource);
            $('#DainAcc').text(data.count.CreditAccount);
            $('#BalanceAcc').text(data.count.BalanceAccount);
            $('#MAINAcc').text(data.count.TYPE);
            $('#NameAcc').text(data.count.AccountName);

                     $('#CloseAccountGuide').hide();
            
            console.log(data);
        } 
      });
  

   e.stopPropagation();

});
//------------------------------------------------------------
});







        