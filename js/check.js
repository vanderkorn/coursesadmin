	// @creation_date 5.03.07
	// @modification_date 12.03.07
	// @author Kornilov Ivan
	// @document check.php
	//     
	// @version 0.2
	function isOne(id)
	{
	//	alert(document.getElementById(id).sum);
		
		
		if (document.getElementById(id).attributes["class"].value==1)return;
		
		if (document.sel['dis[]'][id].checked)
		{
			
		
	 for (var i=0;i<document.sel['dis[]'].length;i++)
		{
			if (i!=id)
			{
				document.sel['dis[]'][i].checked=false;
				document.sel['dis[]'][i].disabled=true;
				//document.getElementById(i).style.visibility="hidden";
			}
		}
		}
		else
		{
				 for (var i=0;i<document.sel['dis[]'].length;i++)
		{
			if (i!=id)
			{
						document.sel['dis[]'][i].disabled=false;
				//document.getElementById(i).style.visibility="visible";
			}
		}
		}
                   // alert(range2);
	}
	function isOne2(id)
	{
				if (id==-1)return;
	//	alert(document.getElementById(id).sum);
		 for (var i=0;i<document.sel['dis[]'].length;i++)
		{
		//	alert(document.sel['dis[]'][i].value);
			if (document.sel['dis[]'][i].value!=id)
			{
					document.sel['dis[]'][i].disabled=true;
			}else
			{
				document.sel['dis[]'][i].disabled=false;
			}
		}

			
		
                   // alert(range2);
	}
	function modef(state)
	{
		/*if (state=='0'){document.getElementById("cost").style.visibility="hidden";document.getElementById("interest").style.visibility="visible";}
		if (state=='1'){document.getElementById("interest").style.visibility="hidden";document.getElementById("cost").style.visibility="visible";}*/
		if (state=='0'){document.sel.cost.disabled=true;document.sel.interest.disabled=false;document.sel.interest.value="0";document.sel.cost.value="0";}
		if (state=='1'){document.sel.interest.disabled=true;document.sel.cost.disabled=false;document.sel.cost.value="0";document.sel.interest.value="0";}
	}
	 	function bold2()
	{
           var range = document.selection.createRange();
           var range2 =range.htmlText;
                        alert( range.parentElement().type );
                        alert( range.boundingLeft );
            var  range3= range2.bold();
                 alert(range3);
                        range.text=range2.bold();
                            var sdt=document.getElementById('msg').firstChild.nodeValue;
                            sdr="<b> ggg</b>";
                       alert(document.getElementById('msg').firstChild.nodeValue) ;
                            document.getElementById('msg').firstChild.nodeValue= eval(sdr);
                                               //  document.selection.pasteHTML("<b>textedit</b>");
               // .pasteHTML(range3);
              // alert(range2);
	}
		function ital()
	{

	}
	function emptyField(txt)//   
	{
	if (txt.value.length==0)return true;//             true
	 for (var i=0;i<txt.value.length;++i)
		{
		 var ch=txt.value.charAt(i);//   
		 if ((ch==' ') ||( ch=='\t') )return true;
		}
		 return false;
	}
		function emptyField2(txt)
	{
	if (txt.value.length==0)return true;
	if (txt.value==" ")return true;
	if (txt.value=='\t')return true;
		 return false;
	}

	function emptyFieldTel(txt)	 //   	 
	{
		  var regExpObj=/[\d\-\(\)]/i;	//     - ( )
          if (regExpObj.exec(txt.value)!=null){return false;}
		  return true;//    true
	}
	function emptyFieldCost(txt)	 //   	 
	{	
	    if(emptyField(txt)){return true;}
	    if(txt.value.legth>13){return true;}
		if(txt.value=="0"){return true;}
		var regExpObj=/[^\d\.\d\d$]/i;
		if (regExpObj.exec(txt.value)==null){return false;}
		return true;
	}
	
	function check(frm)
	{
	    if (emptyField2(frm.name))
		{
			window.alert("Введите НАЗВАНИЕ");
		}
	    else
		{
			if (emptyFieldCost(frm.cost)){window.alert("Введите ЦЕНУ");}
			else
			{
				return true;
			}
		}
		return false;
	}
	function twootpr(state)//метод для динамического изменения атрибута action в веб-форме
{
	if (state)
	{
		document.sel.action="print.php";
		document.sel.submit();
	}
	else
	{
		document.sel.action="index.php";
		document.sel.submit();
	}
}
	function emptyFieldDate(txt)	 //   	 
	{	
	  if(emptyField(txt)){return true;}
	    if(txt.value.legth>10){return true;}

		var regExpObj=/^\d\d\.\d\d\.\d\d\d\d$/i;
		var regExpObj2=/^\d\.\d\d\.\d\d\d\d$/i;
		if ((regExpObj.exec(txt.value)!=null)||(regExpObj2.exec(txt.value)!=null)){return false;}
		return true;
	}
	function emptyPercentage(txt)	 //   	 
	{	
	    if(emptyField(txt)){return true;}
	    if(txt.value.legth>3){return true;}
		if(txt.value=="0"){return true;}
		var regExpObj=/[^\d]/i;
		if (regExpObj.exec(txt.value)==null){return false;}
		return true;
	}
	function trueDate(d1,d2)	 
	{	
		var arr1 = d1.value.split('.');
	    var arr2 = d2.value.split('.');
		var date0=new Date(arr1[2],arr1[1],arr1[0]);
		var date1=new Date(arr2[2],arr2[1],arr2[0]);
    	var today=new Date();
		if (date0.getTime()<=date1.getTime()){return false;}
    	return true;
	}
function checkDisAkc(frm)
	{	
	   if (emptyField2(frm.name))
		{
			window.alert("Введите НАЗВАНИЕ");
		}
	    else
		{
			if (!frm.notlimit.checked)
			{
				if (emptyFieldDate(frm.date_begin)){window.alert("Введите ДАТУ НАЧАЛА");}
				else
				{
					if (emptyFieldDate(frm.date_end)){window.alert("Введите ДАТУ КОНЦА");}
					else
					{
						if (trueDate(frm.date_begin,frm.date_end)){window.alert("Неверный диапазон дат");}
						else
						{
												if (frm.mode[0].checked)
			   									 {
													if (emptyPercentage(frm.interest)){window.alert("Введите ПРОЦЕНТ");}else{return true;}
			    								}
			   									 if (frm.mode[1].checked)
			    								{
													  if (emptyFieldCost(frm.cost)){window.alert("Введите ЦЕНУ");}else{return true;}
			   									 }
						}
					}
				}
			}
			else
			{
															if (frm.mode[0].checked)
			   									 {
													if (emptyPercentage(frm.interest)){window.alert("Введите ПРОЦЕНТ");}else{return true;}
			    								}
			   									 if (frm.mode[1].checked)
			    								{
													  if (emptyFieldCost(frm.cost)){window.alert("Введите ЦЕНУ");}else{return true;}
			   									 }
			
		}}
		return false;
	}
function modeCheck(frm)
	{
		/*if (state=='0'){document.getElementById("cost").style.visibility="hidden";document.getElementById("interest").style.visibility="visible";}
		if (state=='1'){document.getElementById("interest").style.visibility="hidden";document.getElementById("cost").style.visibility="visible";}*/
		if (frm.notlimit.checked){
			frm.date_begin.disabled=true;
			frm.date_end.disabled=true;
				frm.Go.disabled=true;
			frm.Go2.disabled=true;
				frm.date_begin.value="00.00.0000";
			frm.date_end.value="00.00.0000";
		}
		else
		{
						frm.date_begin.disabled=false;
			frm.date_end.disabled=false;
			frm.Go.disabled=false;
			frm.Go2.disabled=false;
		}

	}
	/*function check(frm)//    
	{
		
		
		
	if (emptyField(frm.name)){alert("   ");} //  
	else
	{      if (emptyField(frm.msg)){alert("  ");}  //   
	else
	{
	       if (!emptyField(frm.tel))  //   
	       {
	       	    if (emptyFieldTel(frm.tel)) //    
	       	    {
	       	           alert("    ");
	       	    	}
	       	    	else
	       	    	{
	       	    	         if (!emptyField(frm.mail))//    
	                                  {
	             		var regExpObj=/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i;

										 if (regExpObj.exec(frm.mail.value)==null) //     
										 {
										 	alert("  E-Mail.  .");

										 }
										 else
										 {
										       return true;//    	  ;

										 	}
										 	}
										 	else
										 	{
										 	    return true; //    	  ;

	     	}


	       	    		}
	       }
	     else
	     {

	               if (!emptyField(frm.mail))  //    
	                                  {
	             	var regExpObj=/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i;

										 if (regExpObj.exec(frm.mail.value)==null) //     
										 {
										 	alert("  E-Mail.  .");

										 }
										 else
										 {
										       return true;//    	  ;
	                                     }
										 	}
										 	else
										 	{
										 	    return true; //    	  ;
	                                       }

	                }
	              }

	}
	  return false;//       
	}*/