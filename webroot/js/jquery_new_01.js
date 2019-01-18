$(document).ready(function(){

    $(".newListSelected").mouseover(function(){
        
     $(this).addClass('newListSelHover').css('postion','relative');
    
        
      });
      
      $(".newListSelected ,.newListSelHover").click(function(){
        
       $(this).addClass('newListSelFocus');
      // $(".newListSelected ,.newListSelHover,.newListSelFocus").css('position','relative');
      $(this).css('position','relative');
       $(this).find('.SSContainerDivWrapper').css('display','block');
       
       

           
         });

         $(".newList li a").mouseover(function(){
        
            $(this).addClass('newListHover');
           
               
             });
        $(".newList li a").mouseleave(function(){
        
            $(this).removeClass('newListHover');
               
                   
        });

        $(".SSContainerDivWrapper .newList li a").click(function(){
        
           //console.log('sadasdasd');
           var txt=$(this).text();


          // $(this).parent().find('.selectedTxt').css('color','red'); 
           console.log(txt);
         
       
                  
                       
            });

            $( function() {
                $( "#CaseTableDueDate" ).datepicker();
              } );
         


   
});

// $( function() {
//     $( "#CaseTableDueDate" ).datepicker();
//   } )