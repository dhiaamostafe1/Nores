$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $(document).ready(function() {
           

            $.ajax({
                type: "GET",
                url: "datetimeclose",
            
                success: function (req) {

                if(req.data<10)
                
                flasher.success("يرجى تجديد الاشتراك خلال  "+req.data+" أيام" ," عميلانا المحترم");
                 
                }
            });

        });
        


// -----------------------------------------------------------------------
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $(this).val('1');
            }
            else if($(this).prop("checked") == false){
              $(this).val('0');
            }
        });


        $("#SelectUser").change(function(){

              
            var string = window.location.origin+window.location.pathname+"";
            // console.log(  );
                string = string.substring(0, string.length-1);
                // console.log(string);

                window.location.replace(string+$(this).val());
            //   
            //    $dd= ww.substring(0, string.length-1);
            //   
            //    
        });

        $('.btnaddticet').click(function(){

           $('.formaddticketdesplay').show();

        });

        $('.sendticketdesplay').click(function(){

            $('.formaddticketdesplay').hide();
 
         });






 


// -----------------------------------------------------------------------
    });

