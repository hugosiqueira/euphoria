var togglePassword = document.getElementById("toggle-password");
var formContent = document.getElementsByClassName('form-content')[0]; 
var getFormContentHeight = formContent.clientHeight;

var formImage = document.getElementsByClassName('form-image')[0];
if (formImage) {
	var setFormImageHeight = formImage.style.height = getFormContentHeight + 'px';
}
if (togglePassword) {
	togglePassword.addEventListener('click', function() {
	  var x = document.getElementById("password");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	});
}

$(function () {
	$("form").submit(function (e) {
		e.preventDefault();

		var form = $(this);
		var load = $(".ajax_load");

		load.fadeIn(200).css("display", "flex");

		$.ajax({
			url: form.attr("action"),
			type: "POST",
			data: form.serialize(),
			dataType: "json",
			success: function (response) {
				//redirect
				if (response.redirect) {
					window.location.href = response.redirect;
				} else {
					load.fadeOut(200);
				}

				//Error
				if (response.message) {
					$(".ajax_response").html(response.message).effect("bounce");
				}
			},
			error: function (response) {
				load.fadeOut(200);
			}
		});
	});
});