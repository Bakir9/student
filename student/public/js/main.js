$(document).ready(function(){

    $('.counter').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        
        $({ countNum: $this.text()}).animate({
          countNum: countTo
        },
      
        {
          duration: 3000,
          easing:'linear',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }
        });  
      });
    
        // MDB Lightbox Init
        $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });

        $('.box').click(function(){
          $('.full-image').html($(this).html());
      });

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

      $('form').submit(function() {
        var name = $('$name').val();
        var description = $('description').val();
        $.ajax({
          url: "/role/create",
          data: {
              name: name, 
              description: description,
          },
          type: "POST",
          dataType : "json",
          success: function( json ) {
              console.log("proslo");
          },
          error: function( xhr, status, errorThrown ) {
              console.log( "Sorry, there was a problem!" );
          }
        });
      json = '';
      return false;
    });

    $('#edit-permission').on('hidden', function () {
      //$('#Form_Id').find('input[type="text"]').val('');
      $modal.find('form')[0].reset();
   });    
  
   $('#edit-data').on('submit', function (){
		
		console.log("proslo");
	/*	$.ajax({
            url: '/edit/{{$permission->id}}/permission',
            type:"GET",
            data: {
                "_token": "{{csrf_token()}}",
            },
			success: function (response){
                alert("krenulo");
				console.log(url);
			},
			error: function(error) {
                console.log(error);
				console.log(url);
			}
		});*/
	});
});


