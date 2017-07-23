function tr_show(id)	// Show specific TR
{
	try
	{
		document.getElementById(id).style.display='table-row';			
	}
	catch(eIE)
	{
		document.getElementById(id).style.display='';						
	}
}
function tr_hide(id)	// Show specific TR
{
	try
	{
		document.getElementById(id).style.display='none';			
	}
	catch(eIE)
	{
		document.getElementById(id).style.display='none';						
	}
}
function show(id)        // Show specific DIV
{
       document.getElementById(id).style.display='block';
}

function hide(id)        // Hide specific DIV,TR
{
       document.getElementById(id).style.display='none';
}
function show_loading()
{
       document.getElementById("show").style.display='none';
       document.getElementById("hide").style.display='block';
}
/*button disable*/
function disable(main,show)
{
	document.getElementById(main).style.display = 'none';

	try
	{
		document.getElementById(show).style.display = 'table-row';			
	}
	catch(eIE)
	{
		document.getElementById(show).style.display = 'inline';							
	}
}