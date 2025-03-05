$(document).ready(function() {
    $("#contactForm").submit(function(event) {
        event.preventDefault();

        var formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            subject: $("#subject").val(),
            message: $("#message").val()
        };

        $.ajax({
            type: "POST",
            url: "your-server-endpoint.php",  // Replace with the URL of your server-side script
            data: formData,
            dataType: "json",
            encode: true
        })
        .done(function(data) {
            if (data.success) {
                alert("Message sent successfully!");
                $("#contactForm")[0].reset();
            } else {
                alert("Error: " + data.message);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
            alert("An error occurred while submitting the form.");
        });
    });
});
$(document).ready(function(){
    $('.nav-item a').on('click', function(event) { // Target links within the navbar with the class .nav-link
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });
});