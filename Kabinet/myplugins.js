$(function(){


});$( document ).ready(function() {

$( ".cross" ).hide();
$( ".menu" ).hide();
$( ".hamburger" ).click(function() {
$( ".menu" ).slideToggle( "slow", function() {
$( ".hamburger" ).hide();
$( ".cross" ).show();
});
});

$( ".cross" ).click(function() {
$( ".menu" ).slideToggle( "slow", function() {
$( ".cross" ).hide();
$( ".hamburger" ).show();
});
});

});





/*переключение меню jquery*/
jQuery(document).ready(function($){
	$('.tabs-block .tab-link').on('click',function(){
  if(!$(this).hasClass('active')) {
  var parentTabs = $(this).closest('.tabs-block');
  parentTabs.find('.tab-link.active, .tab-content.active').removeClass('active');
  var elemIndex = $(this).index();
  $(this).addClass('active');
  parentTabs.find('.tab-content').eq(elemIndex).addClass('active');
  }
});
});
/*переключение меню jquery*/








/*slider*/





/*slider*/

/*drop-profile-menu*/
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
/*drop-profile-menu*/




