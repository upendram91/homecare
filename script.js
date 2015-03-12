/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */

$(document).ready(
  
  
/* This is the function that will get executed after the DOM is fully loaded */
  
function () {
    $( "#datepicker" ).datepicker({
      
changeMonth: true,     
changeYear: true 
    
});
  
  $( "#datepicker1" ).datepicker({
      
changeMonth: true,     
changeYear: true 
    
});
}

);