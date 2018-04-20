</div>
<footer class="text-center" id="footer" >&copy; copyright 2016-2018 three stars</footer>

<script>
function detailsmodal(id){
var data={"id":id};
jQuery.ajax({
	url:'/includes/detailsmodal.php',
	method : "post",
	data:data,
	success:function(data){jQuery('body').append(data); jQuery('#details-modal').modal('toggle');},
	error:function(){ alert("something went wrong ");}
});
 }
 
 function add_to_cart()
 {
	jQuery('#modal_errors').html("");
	var quantity= jQuery('#quantity').val();
	var available= jQuery('#available').val();
	var error='';
	var data=jQuery('#add_product_form').serialize();
	if(quantity=='' || quantity==0)
	{
		error +='<p class="text-danger text-center">you must choose quantity</p>';
		jQuery('#modal_errors').html(error);
		return;
	}/*else if(quantity>available){error +='<p class="text-danger text-center">there are only '+available+' available </p>';}
	jQuery('#modal_errors').html(error);
	return;*/
	else{
	jQuery.ajax({url: '/admin/add_cart.php', method: 'post', data:data,success:function(){location.reload();},
	error: function(){alert("something wnt wrong");}
	});
	}
 }
</script>
</body>
</html>