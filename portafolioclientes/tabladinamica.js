function addRow(tableID){
	var table =document.getElementById(tableID);
	var rowCount = table.rows.length;
	if (rowCount < 5) {
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for (var i =0 ; i < colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}
	else
	{
		alert("Numero maximo de productos");
	}
}

function deleteRow(tableID){
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for (var i =0 ; i < rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[1];
			/*alert(chkbox);
			if (null != chkbox) {
				alert("esta marcado");
			}
			else
			{
				alert("no esta marcado");
			}*/
			if (null != chkbox && true == chkbox.checked) {
				if (rowCount <= 1) {
					alert("Selecciona un campo para eliminar");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}
		}
}