function expand(s)
{
  var d = s.getElementsByTagName("ul").item(0); 
  // var r = d.getElementsByTagName("a");
  d.className = "menuHover";            
}


function collapse(s)
{
	var d = s.getElementsByTagName("ul").item(0); 
	// var r = d.getElementsByTagName("a");  
  d.className = "menuNormal";         
}
