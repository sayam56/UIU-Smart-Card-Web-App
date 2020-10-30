function del_teacher(param)
{
    var t_id=param.substr(6);
    console.log(t_id);


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","del_teacher.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('wallet');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("t_id="+t_id);
    
}


function details_teacher(param)
{
    var t_id=param.substr(11);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","details_teacher.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('viewTeachermodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("t_id="+t_id);
        document.getElementById('viewTeachermodal').style.display='block';
}




//--------update-----------//
function update_teacher(param)
{
    var t_id=param.substr(7);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","update_teacher.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('updateTeachermodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("t_id="+t_id);
         document.getElementById('updateTeachermodal').style.display='block';
}

function updatedb_teacher()
{


    
    var t_id= document.getElementById('tt_id').value;
    var t_tag=document.getElementById('tt_tag').value;
    var t_name=document.getElementById('tt_name').value;
    var t_email=document.getElementById('tt_email').value;
    var t_department=document.getElementById('tt_department').value;
    
    var t_phone=document.getElementById('tt_phone').value;
    console.log(t_id+t_name);
    
    
    

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","updatedb_teacher.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
        var response=ajaxreq.responseText;
		              
        var divelm=document.getElementById('updateTeachermodal');
           
       
        divelm.innerHTML=response;
         
     
                 
           
                 
            
    }
    
    ajaxreq.send("t_id="+t_id+"&t_tag="+t_tag+"&t_name="+t_name+"&t_email="+t_email+"&t_department="+t_department+"&t_phone="+t_phone);
        
}


//-----------------assign section to a teacher -------------------//


// function assign_teacher()
// {
//     var t_id= document.getElementById('tt_id').value;
//     console.log("hit");
//     var ajaxreq=new XMLHttpRequest();
//     ajaxreq.open("POST","assignSection_teacher.php"); 
//     //ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


//     ajaxreq.onreadystatechange=function ()
//     {
//         var response=ajaxreq.responseText;
		              
//         var divelm=document.getElementById('assignSection_Teachermodal');
           
       
//         divelm.innerHTML=response;
         
     
                 
           
                 
            
//     }
    
//     ajaxreq.send("t_id="+t_id);
//     document.getElementById('updateTeachermodal').style.display='none';
//     document.getElementById('assignSection_Teachermodal').style.display='block';


// }

// function assignSectiondb_teacher()
// {
//     var t_id= document.getElementById('tt_id').value;
//     var section= document.getElementById('section').value;
   
//     var cc_code=section.split(" "); 
//     var c_code=(cc_code[0]+" "+cc_code[1]);
//     console.log(c_code);

//     var ajaxreq=new XMLHttpRequest();
//     ajaxreq.open("POST","assignSectiondb_student.php"); 
//     ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


//     ajaxreq.onreadystatechange=function ()
//     {
        
         
     
                 
           
                 
            
//     }
    
//     ajaxreq.send("s_id="+s_id+"&section="+section+"&c_code="+c_code);

// }



