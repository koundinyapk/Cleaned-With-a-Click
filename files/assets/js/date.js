
    /*var today = new Date().toISOString().split('T')[0];
    console.log(today);
    $('#dateInput').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      startDate: today
    });
 


     // Get today's date
                            var datepicker = document.getElementsByClassName('datepicker');
              
                            /*datepicker.setAttribute('format', 'yyyy-mm-dd');
                            datepicker.setAttribute('startDate', newDate().toISOString().split('T')[0]);
  
                            var datePickerOptions = {
                              format: 'yyyy-mm-dd',
                              startDate: new Date().toISOString().split('T')[0],
                              autoclose:true
                          };
                          $('#datepicker').datepicker(datePickerOptions);*/

var date=document.getElementById('dateInput');
date.min=new Date().toISOString().split('T')[0];