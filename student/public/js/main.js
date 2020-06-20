$(document).ready(function(){

    $('.counter').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        
        $({ countNum: $this.text()}).animate({
          countNum: countTo
        },
      
        {
      
          duration: 4000,
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
});


