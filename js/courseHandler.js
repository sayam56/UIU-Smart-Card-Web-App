
function details_course(param)
{
    var c_code=param.substr(11);
    console.log(c_code);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","details_course.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('viewCoursemodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("c_code="+c_code);
        document.getElementById('viewCoursemodal').style.display='block';
}


function update_course(param)
{
    var c_code=param.substr(7);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","update_course.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('updateCoursemodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("c_code="+c_code);
         document.getElementById('updateCoursemodal').style.display='block';
}


function assign_section_course()
{
    var c_code= document.getElementById('cc_id').value;
    var c_name= document.getElementById('cc_name').value;
    var t_id= document.getElementById('cct_id').value;
    var sec_name= document.getElementById('ccsec_name').value;
    var sec_start_time= document.getElementById('cc_start').value;
    var sec_end_time= document.getElementById('cc_end').value;
    var sec_room_number= document.getElementById('cc_room').value;
    var sec_room_reader_tag= document.getElementById('cc_tag').value;
    var sec_trimester= document.getElementById('cc_trim').value;
    console.log("hit");
    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","assignSection_course.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
         var response=ajaxreq.responseText;
		              
         var divelm=document.getElementById('assignSection_Coursemodal');
           
       
         divelm.innerHTML=response;
         
     
                 
           
                 
            
    }
    
    ajaxreq.send("c_code="+c_code+"&c_name="+c_name+"&t_id="+t_id+"&sec_name="+sec_name+"&sec_start_time="+sec_start_time+"&sec_end_time="+sec_end_time+"&sec_room_number="+sec_room_number+"&sec_rfid_reader="+sec_room_reader_tag+"&sec_trimester="+sec_trimester);
    console.log(ajaxreq.send);
    document.getElementById('updateCoursemodal').style.display='none';
    document.getElementById('assignSection_Coursemodal').style.display='block';


}


function del_course(param)
{
    var c_code=param.substr(6);


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","del_course.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                 
           
                 
            }
    }
    
    ajaxreq.send("c_code="+c_code);
    
}