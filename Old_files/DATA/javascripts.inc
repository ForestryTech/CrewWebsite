<script language=javascript>
<!--
function show_info(x) {
   var y;            // variable to tell which message is visible
   y = whichVisible();
   
   if(y == 999) {
      alert("Something is very wrong....");
      return;
    }
   //alert(x);
   if(y == 1) {
      document.all['a'].style.visibility = 'hidden';
      document.all['aa'].style.visibility = 'hidden';
      //alert("A was hidden");
   }
   if(y == 2) {
      document.all['b'].style.visibility = 'hidden';
      document.all['bb'].style.visibility = 'hidden';
   }
   if(y == 3) {
      document.all['c'].style.visibility = 'hidden';
      document.all['cc'].style.visibility = 'hidden';
   }
   if(y == 4) {
      document.all['d'].style.visibility = 'hidden';
      document.all['dd'].style.visibility = 'hidden';
   }
   if(y == 5) {
      document.all['e'].style.visibility = 'hidden';
      document.all['ee'].style.visibility = 'hidden';
   }
   if(y == 6) {
      document.all['f'].style.visibility = 'hidden';
      document.all['ff'].style.visibility = 'hidden';
   }
   
   if(x == 1) {
      document.all['a'].style.visibility = 'visible';
      document.all['aa'].style.visibility = 'visible';    
   }
   if(x == 2) {
      document.all['b'].style.visibility = 'visible';
      document.all['bb'].style.visibility = 'visible';
   }
   if(x == 3) {
      document.all['c'].style.visibility = 'visible';
      document.all['cc'].style.visibility = 'visible';
   }
   if(x == 4) {
      document.all['d'].style.visibility = 'visible';
      document.all['dd'].style.visibility = 'visible';
   }
   if(x == 5) {
      document.all['e'].style.visibility = 'visible';
      document.all['ee'].style.visibility = 'visible';
   }
   if(x == 6) {
      document.all['f'].style.visibility = 'visible';
      document.all['ff'].style.visibility = 'visible';
   } 
   return;   
}
function whichVisible(){
        if(document.all['a'].style.visibility == 'visible') {
            //alert("A is visible");
	    return 1;
        }
        if(document.all['b'].style.visibility == 'visible'){
            return 2;
        }
        if(document.all['c'].style.visibility == 'visible'){
            return 3;
        }
        if(document.all['d'].style.visibility == 'visible'){
            return 4;
        }
        if(document.all['e'].style.visibility == 'visible'){
	    //alert("e is visible");
            return 5;
        }
	if(document.all['f'].style.visibility == 'visible'){
	    //alert("e is visible");
            return 6;
        }else{
            return 999;
        }
}

//-->
</script>
