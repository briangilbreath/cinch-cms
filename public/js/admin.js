$(document).ready(function(){

	function imagePickerInit(){
		$("select.image-picker").imagepicker({
	      hide_select : true,
	      show_label  : false,
	      limit       : 1
	    });
	}

	imagePickerInit();
    

    function ajaxPagination(active){
 
	     if(active===true){
	 
	            $('.ajax-pagination .pagination a').each(function(e){
	 
	                $( ".ajax_overlay" ).show();
	                $( ".loader" ).show();
	 
	                $(this).attr('data',$(this).attr('href'));
	                $(this).attr('href','javascript:void(0);');
	 
	                $(this).bind('click',function(){
	 
	                    $.ajax({
	                        url: $(this).attr('data'),
	                        dataType: "html"
	                        })
	                        .done(function( html ) {

	                        	$(".ajaxable").html($(html).find(".ajaxable")
                                  .addClass('done'))
                     			  .fadeIn('slow',function(){
                     			  	imagePickerInit();// reinit image selector
                     			  });
	 
	                        $( ".ajax_overlay" ).hide();
	                        $( ".loader" ).hide();
	 
	                        });
	 
	                });
	 
	                });
	 
	     }
	 
	}
	 
	ajaxPagination(true);


});