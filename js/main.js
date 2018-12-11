$(function(){
    //spinner code for navbar-brand
    
    $('a.navbar-brand i').hover(
        //in handler    
        function(){
            $(this).addClass('fa-spin');
        },
       //out handler
       function(){
           $(this).removeClass('fa-spin');
       });
       var curDate = new Date();
       var curYear = curDate.getFullYear();
       $("#year").text(curYear);
       $('#tablesorted').DataTable({
            "columnDefs":[
                {"orderable":false,"targets":-1}
            ],
            "lengthMenu":[ [5,10,25,50,-1], [5,10,25,50,"All"] ]
       });
       });

