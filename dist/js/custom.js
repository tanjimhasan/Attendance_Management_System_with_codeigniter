$(document).ready(function(){ 

// var dataTable = $('#course_list').DataTable({  
//            "processing":true,
//            "serverSide":true,  
//            "order":[],  
//            "ajax":{  
//                 url:"course_list/fetch_course",  
//                 type:"POST"  
//            }  
//       });

$("#attendance_form").submit(function(){
      var student_id = true;
      $(':radio').each(function(){
          name = $(this).attr('name');
          if (student_id && !$(':radio[name ="'+name+'"]:checked').length) {
            alert(name + "student id Missing");
            student_id = false;
          }
      });
      return student_id;
    });

$('#deletemessage').delay(3000).fadeOut();

}); 


  

