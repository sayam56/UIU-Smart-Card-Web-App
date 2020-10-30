function add_student(){
    // var s_id="011163045";
    // var s_tag="B8ED5C19";
    // var s_name="alex";
    // var s_email="alex@costa.com";
    // var s_password="1234";
    // var s_department="CSE";
    // var s_batch="202";
    // var s_phone="0175084555";
    // var s_photo="res/userProfile/alex.jpg";
    // var running_trimester=202;
   
    var s_id= document.getElementById('s_id').value;
    var s_tag=document.getElementById('s_tag').value;
    var s_name=document.getElementById('s_name').value;
    var s_email=document.getElementById('s_email').value;
    var s_password=document.getElementById('s_password').value;
    var s_department=document.getElementById('s_department').value;
    var s_batch=document.getElementById('s_batch').value;
    var s_phone=document.getElementById('s_phone').value;
    var s_photo="res/userProfile/alex.jpg";
    var running_trimester=document.getElementById('running_trimester').value;
    
    
    


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","add_student.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('detailsmodal');
                  
              
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("s_id="+s_id+"&s_tag="+s_tag+"&s_name="+s_name+"&s_email="+s_email+"&s_password="+s_password+"&s_department="+s_department+"&s_batch="+s_batch+"&s_phone="+s_phone+"&s_photo="+s_photo+"&running_trimester="+running_trimester);

}



function add_teacher(){
    // var t_id="F11163045";
    // var t_tag="F8ED5C19";
    // var t_name="Jack";
    // var t_email="jack@teacher.com";
    // var t_password="1234";
    // var t_department="CSE";
    
    // var t_phone="0175084555";
    // var t_photo="res/userProfile/jack.jpg";
    
   
    var t_id= document.getElementById('t_id').value;
    var t_tag=document.getElementById('t_tag').value;
    var t_name=document.getElementById('t_name').value;
    var t_email=document.getElementById('t_email').value;
    var t_password=document.getElementById('t_password').value;
    var t_department=document.getElementById('t_department').value;
    
    var t_phone=document.getElementById('t_phone').value;
    var t_photo="res/userProfile/alex.jpg";
    
    
    
    


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","add_teacher.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('detailsmodalTeacher');
                  
              
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("t_id="+t_id+"&t_tag="+t_tag+"&t_name="+t_name+"&t_email="+t_email+"&t_password="+t_password+"&t_department="+t_department+"&t_phone="+t_phone+"&t_photo="+t_photo);

}



function add_course(){
    // var c_code="CSE 000";
    
    // var c_name="Intro";
   
    
   
    var c_code= document.getElementById('c_code').value;
    
    var c_name=document.getElementById('c_name').value;
    
    
    
    


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","add_course.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
         var divelm=document.getElementById('detailsmodalCourse');
           
       
         divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("c_code="+c_code+"&c_name="+c_name);

}


function add_vendor(){
   
   
    var v_reader= document.getElementById('v_reader').value;
    
    var vendor_name=document.getElementById('vendor_name').value;
    var vendor_uid=document.getElementById('vendor_uid').value;
    var vendor_password=document.getElementById('vendor_password').value;
    var vendor_email=document.getElementById('vendor_email').value;
   
    var vendor_phone=document.getElementById('vendor_phone').value;
    var vendor_photo="res/userProfile/alex.jpg";
    
    
    
    


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","add_vendor.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('detailsmodalVendor');
                  
              
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("v_reader="+v_reader+"&vendor_name="+vendor_name+"&vendor_uid="+vendor_uid+"&vendor_password="+vendor_password+"&vendor_email="+vendor_email+"&vendor_phone="+vendor_phone+"&vendor_photo="+vendor_photo);

}

