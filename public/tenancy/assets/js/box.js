
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
    
    
          
    
    
    

               //  add Mostafid

               $('.btnaddMostafed').click(function(){
                $('.formaddMostafeddesplay').show();
                $('#idMostafid').val(-1);
                
                $('#NameCleint').val("");
                $('#MobileClient').val("");
                $('#EmailClient').val("");
                $('#MaxcreditClient').val("");
                $('#VatClient').val("");
                $('#ACClient').val("");
                
                $('#AddressClient').val("");
                $('.tableMostafide').hide();
                
             });
    
             $('.Closebtnadd').click(function(){
                $('.formaddMostafeddesplay').hide();
                $('.tableMostafide').show();
                
             });
    
             $('.editeMostafed').click(function(){
    
                var ten =$(this).attr('data-contant');
                $.ajax({
                    type: "GET",
                    url: "Client.edit/"+ten,
                
                    success: function (req) {
    
                        console.log(req);
                      $('#idMostafid').val(req.count.id);
                      $('#NameCleint').val(req.count.Name);
                      $('#MobileClient').val(req.count.Mobile);
                      $('#EmailClient').val(req.count.Email);
                      $('#MaxcreditClient').val(req.count.Max_credit);
                      $('#VatClient').val(req.count.Vat_No);
                      $('#ACClient').val(req.count.ACC_NO);
                      
                      $('#AddressClient').val(req.count.Address);
                      if(req.count.Activ ==1)
                      $('#ActiveMostafed').attr('checked','true');
    
                      $('.tableMostafide').hide();
                      $('.formaddMostafeddesplay').show();
                    
                    }
                });
    
    
                
                
             });
    
    
             
    
             
    
            // end add Mosatfed
    
      // End update  Unite --------------------------------------------------------------------
    
    
        });
        