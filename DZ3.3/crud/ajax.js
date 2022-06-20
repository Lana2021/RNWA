	$(document).on('click','#btn-add',function(e) {
		var data = $("#office_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addOfficeModal').modal('hide');
						alert('Data added successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on('click','.update',function(e) {
		var officeCode=$(this).attr("data-officeCode");
		var city=$(this).attr("data-city");
		var phone=$(this).attr("data-phone");
		var addressLine1=$(this).attr("data-addressLine1");
		var country=$(this).attr("data-country");
		var postalCode=$(this).attr("data-postalCode");
		var territory=$(this).attr("data-territory");
		$('#officeCode_u').val(officeCode);
		$('#city_u').val(city);
		$('#phone_u').val(phone);
		$('#addressLine1_u').val(addressLine1);
		$('#country_u').val(country);
		$('#postalCode_u').val(postalCode);
		$('#territory_u').val(territory);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editOfficeModal').modal('hide');
						alert('Data updated successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on("click", ".delete", function() { 
		var officeCode=$(this).attr("data-officeCode");
		$('#officeCode_d').val(officeCode);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "backend/save.php",
			type: "GET", //ovdje
			cache: false,
			data:{
				type:3,
				officeCode: $("#officeCode_d").val()
			},
			success: function(dataResult){
					$('#deleteOfficeModal').modal('hide');
					$("#"+dataResult).remove();
					location.reload();	
			
			}
		});
	});
	$(document).on("click", "#delete_multiple", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-officeCode'));
		});
		if(user.length <=0) {
			alert("Please select records."); 
		} 
		else { 
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(user.length>1?"these":"this")+" row?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "backend/save.php",
					cache:false,
					data:{
						type: 4,						
						officeCode : selected_values
					},
					success: function(response) {
						var officeCodes = response.split(",");
						for (var i=0; i < officeCodes.length; i++ ) {	
							$("#"+officeCodes[i]).remove(); 
						}	
					} 
				}); 
			}  
		} 
	});
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});
	});
//search
	$(document).ready(function() {

		$.ajax({   
		type: "GET",
		url: "search.php",             
		dataType: "html", 
		data: { s: "" },
		success: function(response){                    
		  $("#tableAll").html(response); 
		  }
		});
	  
	  $( "#target" ).keyup(function() {
	  $( "#tableAll" ).hide();
	  var str = $("#target").val();
	   
	  
	  $.ajax({   
		type: "GET",
		url: "search.php",             
		dataType: "html", 
		data: { s: str },
		success: function(response){                    
		  $("#txtHint").html(response); 
		  }
	  
		});
		});
		});
