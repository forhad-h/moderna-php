$('.hover_m .sub_menu').hide();

$(document).ready(function() {
	/*hover menu of admin pannel*/
	$('#userm.hover_m').on({
		mouseenter: function() {
		  $('#userm.hover_m .sub_menu').stop().show(200);
		},
		mouseleave: function() {
		  $('#userm.hover_m .sub_menu').stop().hide(200);
		}
	
	});
	
	$('#bannerm.hover_m').on({
		mouseenter: function() {
		  $('#bannerm.hover_m .sub_menu').stop().show(200);
		},
		mouseleave: function() {
		  $('#bannerm.hover_m .sub_menu').stop().hide(200);
		}
	
	});
	
	$('#portm.hover_m').on({
		mouseenter: function() {
		  $('#portm.hover_m .sub_menu').stop().show(200);
		},
		mouseleave: function() {
		  $('#portm.hover_m .sub_menu').stop().hide(200);
		}
	
	});
	
	
	$("#upPic").on('change', function(e) {
		var reader = new FileReader();
		reader.onload = imageIsLoaded;
		reader.readAsDataURL(this.files[0]);
	});
	
	function imageIsLoaded(e) {
	    $('#tmpPreview').attr('src', e.target.result);
	};
	
	$('#print_btn').on('click', function(e) {
		e.preventDefault();
		window.open('print-table.php', '_new', 'height=500,width=1000')
	})
});//End