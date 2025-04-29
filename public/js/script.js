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
    $('.sam').on('click', function(event) { // Target links within the navbar with the class .nav-link
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

//Get the button
let mybutton = document.getElementById("backToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbar = document.querySelector('.navbar'); //Select the entire nav element
    if (navbarToggler) {
      navbarToggler.addEventListener('click', function() {
        navbar.classList.toggle('no-rounded-pill'); // Toggle a class on the entire navbar
      });
    }
  });

  //Hero Section
document.addEventListener('DOMContentLoaded', function() {
    const heroSection = document.querySelector('#hero section');

    // Add .active after a delay (simulating page load)
    setTimeout(() => {
        heroSection.classList.add('active');
    }, 300); //Adjust the timeout to modify the effect
});

//About Section
document.addEventListener('DOMContentLoaded', function() {
    const aboutSection = document.querySelector('#about');
  
    function handleScroll() {
      const windowHeight = window.innerHeight;
      const scrollY = window.scrollY;
      const elementTop = aboutSection.offsetTop;
  
      if (elementTop < scrollY + windowHeight * 0.8) {
        aboutSection.classList.add('active');
      }
    }
      window.addEventListener('scroll', handleScroll);
      handleScroll();
  });
  document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('#testimonials .card');

    function handleScroll() {
        const windowHeight = window.innerHeight;
        const scrollY = window.scrollY;

        cards.forEach(card => {
            const cardTop = card.offsetTop;
            if (cardTop < scrollY + windowHeight * 0.8) {
                card.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();
});
// JavaScript for Contact Section scroll animations
document.addEventListener('DOMContentLoaded', function() {
    const contactSection = document.querySelector('#contact');

    function handleScroll() {
        const windowHeight = window.innerHeight;
        const scrollY = window.scrollY;
        const elementTop = contactSection.offsetTop;

        if (elementTop < scrollY + windowHeight * 0.8) {
            contactSection.classList.add('active');
        }
    }
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});

document.addEventListener('DOMContentLoaded', function() {
    const footer = document.querySelector('footer');

    // Add .active after a short delay to bring the footer in
    setTimeout(() => {
        footer.classList.add('active');
    }, 500);
});

document.addEventListener('DOMContentLoaded', function() {
    const accordionButtons = document.querySelectorAll('.card-header button');

    accordionButtons.forEach(button => {
      button.addEventListener('click', function() {
        const icon = this.querySelector('.accordion-icon');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
      });
    });
  });

  function openSidePanel() {
    document.getElementById("sidePanel").style.width = "250px"; // Adjust width as desired
}

function closeSidePanel() {
    document.getElementById("sidePanel").style.width = "0";
}

// Event listener for the toggle button
document.addEventListener('DOMContentLoaded', function() {
    var toggleButton = document.getElementById('sidePanelToggleButton');
    toggleButton.addEventListener('click', function() {
        if (document.getElementById("sidePanel").style.width === "250px") {
            closeSidePanel();
        } else {
            openSidePanel();
        }
    });
});