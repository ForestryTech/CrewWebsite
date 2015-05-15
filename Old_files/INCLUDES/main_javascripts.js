<script language=javascript>
<!--
// This is from trbc_java.inc
function delay_move() {
   var x;
   var y;
   x = 0;
   while(x < 100) {
      x++;
      y = x;
   }
   move_title();
   //for(x = 0; x < 10000; x++) {
   //   y = x;
   //}
   move_table();
   return;
}

function move_title(){
  var t;
  t = document.all['logo'].style;
  if(do_pos(t.top) < 10) {
     t.top = do_pos(t.top) + 10;
  } else {
     return;
  }
  setTimeout("move_title()",50);
}

function move_table()
{
   var m;
   var t;

   t = document.all['logo'].style;
   m = document.all['ind'].style;
   if(do_pos(m.left) < 0) {
      m.left = do_pos(m.left) + 10;
   } else {
      return;
   }
   setTimeout("move_table()",10);
}

function do_pos(x) {
   return (eval(x.substring(0,x.length - 2)));
}


function show_window(h_window) {
   document.all[h_window].style.visibility = 'visible';
}

function hide_window(h_window) {
   document.all[h_window].style.visibility = 'hidden';
}

//-->
</script>
