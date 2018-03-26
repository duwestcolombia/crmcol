function exportToPDF(){
var pdf = new jsPDF('p', 'pt', 'letter');
//source = $('#tabla_planNegocios')[0];
specialElementHandlers = {
	'#editor': function(element, renderer){
		return true;
	}
}
margins = {
    top: 50,
    left: 60,
    width: 545
  };
pdf.fromHTML($('#tabla_planNegocios').get(0), 15, 15, {
	'width': 1170, 
	'elementHandlers': specialElementHandlers
});
pdf.save('Test.pdf');

}