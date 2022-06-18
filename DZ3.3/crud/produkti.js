$(document).on('click','#btn-add',function(e) {
    var data = $("#product_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "backend/saveprodukti.php",
        success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#addProductModal').modal('hide');
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
    var productCode=$(this).attr("data-productCode");
    var productName=$(this).attr("data-productName");
    var productLine=$(this).attr("data-productLine");
    var productScale=$(this).attr("data-productScale");
    var productVendor=$(this).attr("data-productVendor");
    var quantityInStock=$(this).attr("data-quantityInStock");
    var buyPrice=$(this).attr("data-buyPrice");
    var MSRP=$(this).attr("data-MSRP");
    $('#productCode_u').val(productCode);
    $('#productName_u').val(productName);
    $('#productLine_u').val(productLine);
    $('#productScale_u').val(productScale);
    $('#productVendor_u').val(productVendor);
    $('#quantityInStock_u').val(quantityInStock);
    $('#buyPrice_u').val(buyPrice);
    $('#MSRP_u').val(MSRP);
});

$(document).on('click','#update',function(e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "backend/saveprodukti.php",
        success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#editProductModal').modal('hide');
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
    var productCode=$(this).attr("data-productCode");
    $('#productCode_d').val(productCode);
    
});
$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "backend/saveprodukti.php",
        type: "GET", //ovdje
        cache: false,
        data:{
            type:3,
            productCode: $("#productCode_d").val()
        },
        success: function(dataResult){
                $('#deleteProductModal').modal('hide');
                $("#"+dataResult).remove();
                location.reload();	
        
        }
    });
});
$(document).on("click", "#delete_multiple", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-productCode'));
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
                url: "backend/saveprodukti.php",
                cache:false,
                data:{
                    type: 4,						
                    productCode : selected_values
                },
                success: function(response) {
                    var productCodes = response.split(",");
                    for (var i=0; i < productCodes.length; i++ ) {	
                        $("#"+productCodes[i]).remove(); 
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
