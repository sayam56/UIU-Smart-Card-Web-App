function del_vendor(param)
{
    var vendor_id=param.substr(6);


    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","del_vendor.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                 
           
                 
            }
    }
    
    ajaxreq.send("vendor_id="+vendor_id);
    
}

function details_vendor(param)
{
    var vendor_id=param.substr(11);
    console.log(vendor_id);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","details_vendor.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('viewVendormodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("vendor_id="+vendor_id);
        document.getElementById('viewVendormodal').style.display='block';
}


function update_vendor(param)
{
    var vendor_id=param.substr(7);

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","update_vendor.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
     if(ajaxreq.readyState==4 && ajaxreq.status==200)
            {
                var response=ajaxreq.responseText;
		              
                var divelm=document.getElementById('updateVendormodal');
                   
               
                divelm.innerHTML=response;
                 
           
                 
            }
    }
    
    ajaxreq.send("vendor_id="+vendor_id);
         document.getElementById('updateVendormodal').style.display='block';
}

function updatedb_vendor()
{


    
    var vendor_id= document.getElementById('vv_id').value;
    var v_reader=document.getElementById('vv_tag').value;
    var vendor_name=document.getElementById('vv_name').value;
    var vendor_email=document.getElementById('vv_email').value;
    var vendor_phone=document.getElementById('vv_phone').value;
   
    
    

    var ajaxreq=new XMLHttpRequest();
    ajaxreq.open("POST","updatedb_vendor.php"); 
    ajaxreq.setRequestHeader("Content-type","application/x-www-form-urlencoded");


    ajaxreq.onreadystatechange=function ()
    {
        var response=ajaxreq.responseText;
		              
        var divelm=document.getElementById('updateVendormodal');
           
       
        divelm.innerHTML=response;
         
     
                 
           
                 
            
    }
    
    ajaxreq.send("vendor_id="+vendor_id+"&v_reader="+v_reader+"&vendor_name="+vendor_name+"&vendor_email="+vendor_email+"&vendor_phone="+vendor_phone);
        
}

