/* global $ */
function Applications(){
	this.models = [];
}


Applications.prototype.save = function(applicationData) {

	 var formData = new FormData();
	formData.append("title", applicationData.title);
	formData.append("description", applicationData.content);
	formData.append("active", applicationData.active);

	
	var config = {
		url: "https://web91-iraresrazvan.c9users.io/api/application/add",
		method: "POST",
		data: formData,
		
		success: function(resp) {
			console.log("All good");
		},
		error: function() {
			console.log("Application was not added");
		}
	}
	
	return $.ajax(config);
}