$(document).ready(function(){

    $(".selectedTxt").mouseover(function(){
        
     $(this).parent().addClass('newListSelHover').css('postion','relative');
    // $(this).children('.selectedTxt').addClass('dueTxt');
    
        
      });

     $(".selectedTxt").mouseleave(function(){
        
     $(this).parent().removeClass('newListSelHover');
     $(this).css('position','static');
     //$(this).find('.SSContainerDivWrapper').css('display','none');
    // $(this).children('.selectedTxt').addClass('dueTxt');
    
    
        
      });
      
      $(".selectedTxt").click(function(){
        
      $(this).parent().addClass('newListSelFocus');
      // $(".newListSelected ,.newListSelHover,.newListSelFocus").css('position','relative');
      $(this).parent().css('position','relative');
     //  $(this).find('.SSContainerDivWrapper').css('display','block');
       $(this).parent().find('div:eq(1)').css('display','block');
       
       

           
         });

         $(".newList li a").mouseover(function(){
        
            $(this).addClass('newListHover');
           
               
             });
        $(".newList li a").mouseleave(function(){
        
            $(this).removeClass('newListHover');
               
                   
        });

      //  $(".newList li").click(function(){
        
         // var p= $(this).parent();
         
         // var p=$('.SSContainerDivWrapper').parent()
         // console.log(p);
       // var txt=$(this).text();
      //  console.log(txt);

        
       //  $(this).parents().find('.newListSelected').eq(1).text(txt);

        // $(this).parents().find('.newListSelected').css('position','static');
        // $(this).parents().find('.SSContainerDivWrapper').css('display','none');
        // $(this).parents().find('.newListSelHover').removeClass();
 //});

 $('.newList li a').click(function(){
    var txt=$(this).text();

    var par=$(this).parents();
    console.log(par);

            $(this).parents().find('.newListSelected').children('div:eq(0)').text(txt);
            $(this).parents().find('.SSContainerDivWrapper').css('display','none');
            $(this).parents().find('.newListSelected').css('position','static');
            

})

          


   
});
$( function() {
 $( "#CaseTableDueDate" ).datepicker();
} )


    // $(document).ready(function() {
    //     $("#forgot_password").click(function(e) {
    //         $("div#forgot_password_dialog").dialog("open");
    //         e.preventDefault();
    //     });
    //     $("div#forgot_password_dialog").dialog({
    //         autoOpen: false,
    //         width: 450,
    //         modal: true
    //     });
    //     $("div#forgot_password_dialog").find("#submit_password").click(function(e) {
    //         $("div#forgot_password_dialog").find("#UserForgotpasswordForm").submit();
    //         e.preventDefault();
    //     });
    // });
$(document).ready(function(){

    $('#ui-dialog-title-forgot_password_dialog').replaceWith('Forget Password');

});
    