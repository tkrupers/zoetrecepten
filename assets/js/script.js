(function ($) {
  /* add placeholder to subscription box */
  $("#es_txt_name_pg").attr("placeholder", "Vul hier je naam in");
  $("#es_txt_email_pg").attr("placeholder", "Vul hier je emailadres in");

  /* random color class */
  var classes = ['color1', 'color2', 'color3', 'color4'];

    $(".relatedthumb .caption").each(function(){
        $(this).addClass(classes[~~(Math.random()*classes.length)]);
    });

  /* give class to submit button */
  $('#commentform input#submit').addClass('comment-submit');

  /* Print button */
  $('#print-button').click(function() {
    window.print();
  });

  /* Activate tooltips */

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


	//Add pinterest button to all images inside single page article
	jQuery(".single-page-article img").each(function() {
		var siteUrl = window.location.href;
		var url = jQuery(this).attr('src');

		var pinit="<a href='https://www.pinterest.com/pin/create/button/?url=" + siteUrl + "&media=" + url + "' class='pin-it-button'></a>";

		jQuery(this).before(pinit);
	});

})(jQuery);
