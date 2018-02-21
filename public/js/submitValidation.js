document.getElementById('form').onsubmit = function()
{
	var start = document.getElementById("start").value;
	var end = document.getElementById("end").value;

	if (end < start)
	{
		alert("start datum mag niet lager zijn dat de end datum !!!");
		return false;
	}

	return true;
};