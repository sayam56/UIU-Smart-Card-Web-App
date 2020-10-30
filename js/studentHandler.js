function del_student(param)
{
    var s_id=param.substr(6);


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","del_student.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                 
           
                 
            }
    }
    
    ajaxreq.send("s_id="+s_id);
    
}

///details button works

function details_student(param)
{
    var s_id=param.substr(11);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","details_student.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('viewStudentmodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("s_id="+s_id);
        document.getElementById('viewStudentmodal').style.display='block';
}


//update_student settingsicon
function update_student(param)
{
    var s_id=param.substr(7);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","update_student.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('updateStudentmodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("s_id="+s_id);
         document.getElementById('updateStudentmodal').style.display='block';
}

function updatedb_student()
{


    
    var s_id= document.getElementById('ss_id').value;
    var s_tag=document.getElementById('ss_tag').value;
    var s_name=document.getElementById('ss_name').value;
    var s_email=document.getElementById('ss_email').value;
    var s_department=document.getElementById('ss_department').value;
    var s_batch=document.getElementById('ss_batch').value;
    var s_phone=document.getElementById('ss_phone').value;
    var running_trimester=document.getElementById('srunning_trimester').value;
    
    

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","updatedb_student.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
        var response=ajaxreq.responseText;
		              
        var divelm=document.getElementById('updateStudentmodal');
           
       
        divelm.innerHTML=response;
         
     
                 
           
                 
            
    }
    
    ajaxreq.send("s_id="+s_id+"&s_tag="+s_tag+"&s_name="+s_name+"&s_email="+s_email+"&s_department="+s_department+"&s_batch="+s_batch+"&s_phone="+s_phone+"&running_trimester="+running_trimester);
        
}


function assign_student()
{
    var s_id= document.getElementById('ss_id').value;
    console.log("hit");
    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","assignSection_student.php"); 
    //ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
        var response=ajaxreq.responseText;
		              
        var divelm=document.getElementById('assignSection_Studentmodal');
           
       
        divelm.innerHTML=response;
         
     
                 
           
                 
            
    }
    
    ajaxreq.send("s_id="+s_id);
    document.getElementById('updateStudentmodal').style.display='none';
    document.getElementById('assignSection_Studentmodal').style.display='block';


}

function assignSectiondb_student()
{
    var s_id= document.getElementById('ss_id').value;
    var section= document.getElementById('section').value;
   
    var cc_code=section.split(" "); 
    var c_code=(cc_code[0]+" "+cc_code[1]);
    console.log(c_code);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","assignSectiondb_student.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
        var response=ajaxreq.responseText;
		              
        var divelm=document.getElementById('assignSection_Studentmodal');
           
       
        divelm.innerHTML=response;
        
         
     
                 
           
                 
            
    }
    
    ajaxreq.send("s_id="+s_id+"&section="+section+"&c_code="+c_code);
    document.getElementById('assignSection_Studentmodal').style.display='block';

}


