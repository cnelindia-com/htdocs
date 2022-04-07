/**
 * @author Kishor Mali
 */


$(document).ready( function () {
  var table = $('#datatable').DataTable({
  	searching: false,
    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
     oLanguage: {
        oPaginate: {
            sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
            sPrevious: '<span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>',            
        },
        sLengthMenu : "Show Records _MENU_",
         sInfo: "Total _TOTAL_ Records",
    }
  });
} );
$(document).on('click','.paginate_button',function(){
	$('.paginate_button.current').attr('style', 'color: #fff !important');
})

jQuery(document).ready(function(){
	$('.paginate_button.current').attr('style', 'color: #fff !important');
  // $("#datatable").dataTable({
  // 	
  //   oLanguage: {
  //     oPaginate: {
  //       sNext: '<span style="  color: black !important;font-size: 20px;"> &raquo;</span>',
  //       sPrevious: '<span style="color: black !important;font-size: 20px;">&laquo;</span>'
  //     }
  //   }
  // });

  $(document).on('click', '#checkall', function () {
    if ($(this).is(':checked')) {
      $('tr td input:checkbox').not(this).prop('checked', this.checked)

    } else {
      $('tr td input:checkbox').not(this).prop('checked', this.checked)

    }
  })
    $(document).on('click', '.agree_text', function () {
    if ($(this).prev('input').prop("checked")==true) 
      $(this).prev('input').prop('checked', false)
	 else 
       $(this).prev('input').prop('checked', true)
  })
        $(document).on('click', '.radio-btn', function () {
 			$('input[type=radio]').prop("checked",false)
 			$(this).prev('input[type=radio]').prop("checked",true)

  })

  $(".date").datepicker({ 
     dateFormat: 'dd-M-yy',
   })

	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteaUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "user/deleteaUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

	jQuery(document).on("click", ".deleteRole", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteRole",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	

jQuery(document).on("click", ".deletestate", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletestate",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this State ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("State successfully deleted"); }
				else if(data.status = false) { alert("State deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});
jQuery(document).on("click", ".deleteorder", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteorder",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this State ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Order successfully deleted"); }
				else if(data.status = false) { alert("Order deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});


jQuery(document).on("click", ".deletebreed", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletebreed",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Breed ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("breed successfully deleted"); }
				else if(data.status = false) { alert("breed deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});




jQuery(document).on("click", ".deletehospital", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletehospital",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Hospital ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Hospital successfully deleted"); }
				else if(data.status = false) { alert("Hospital deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
jQuery(document).on("click", ".deletepet", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletepet",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Pet ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Pet successfully deleted"); }
				else if(data.status = false) { alert("Pet deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});


jQuery(document).on("click", ".deletecategory", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletecategory",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this category ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("category successfully deleted"); }
				else if(data.status = false) { alert("category deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});
jQuery(document).on("click", ".deleteproduct", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteproduct",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this product ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("product successfully deleted"); }
				else if(data.status = false) { alert("product deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});



jQuery(document).on("click", ".adminstat", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "adminstatus",
			currentRow = $(this);
		var did = $(this).attr("did");
		var adstatus = $(this).attr("adstatus");
		var confirmation = confirm("Are you sure to "+did);
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId,adstatus:adstatus } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				if(data.status = true) {
					if(did =='Disable'){
						jQuery('.adminstatd'+userId).html('<a class="btn btn-sm btn-success adminstat" href="#" data-userid="'+userId+'" did="Enable" adstatus="1" title="">Enable</a>');
						
					}
					if(did =="Enable"){
						jQuery('.adminstate'+userId).html('<a class="btn btn-sm btn-danger adminstat" href="#" data-userid="'+userId+'" did="Disable" adstatus="0" title="">Disable</a>');
					}
				 alert(did+ " successfully");
				  }
				else if(data.status = false) { alert(did+" failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});




jQuery(document).on("click", ".deletepush", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletepush",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this State ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("successfully deleted"); }
				else if(data.status = false) { alert("deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});


jQuery(document).on("click", ".deleteblog", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteblog",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Blog ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Blog successfully deleted"); }
				else if(data.status = false) { alert("Blog deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});



jQuery(document).on("click", ".deletecoupon", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deletecoupon",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Coupon ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : userId } 
			}).done(function(data){
				if(data.status == 'access') { alert("Access denied..!"); }else{
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Coupon successfully deleted"); }
				else if(data.status = false) { alert("Coupon deletion failed"); }
				else { alert("Access denied..!"); }
			}
			});
		}
	});



jQuery(document).on("click", ".resetpass", function(){
		var userId = $(this).data("userid");
			hitURL = baseURL + "resetpass";
		var confirmation = confirm("Are you sure to send reset password link");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : {email:userId } 
			}).done(function(data){
				
				if(data.status == 'access') { alert("Access denied..!"); }else{
				if(data.status = true) {
				 alert("Reset password link sent user email successfully");
				  }
				else if(data.status = false) { alert("Email has been failed, try again."); }
				else if(data.status = 'unable') { alert("It seems an error while sending your details, try again."); }
			}
			});
		}
	});






	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
