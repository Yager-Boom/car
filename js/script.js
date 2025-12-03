$(document).ready(function() {
    
    // ==================== Navigation ====================
    
    // Mobile Menu Toggle
    $('#mobile-menu-btn').click(function() {
        $('#mobile-menu').toggleClass('active');
        $(this).find('i').toggleClass('fa-bars fa-times');
    });
    
    // Close mobile menu when clicking on a link
    $('#mobile-menu a').click(function() {
        $('#mobile-menu').removeClass('active');
        $('#mobile-menu-btn').find('i').removeClass('fa-times').addClass('fa-bars');
    });
    
    // Smooth scroll for navigation links
    $('a[href^="#"]').click(function(e) {
        const target = $(this).attr('href');
        if (target !== '#') {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(target).offset().top - 80
            }, 800, 'swing');
        }
    });
    
    // Active navigation link on scroll
    $(window).scroll(function() {
        let scrollPos = $(window).scrollTop() + 100;
        
        $('section').each(function() {
            const sectionTop = $(this).offset().top;
            const sectionBottom = sectionTop + $(this).outerHeight();
            const sectionId = $(this).attr('id');
            
            if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                $('.nav-link').removeClass('active');
                $(`.nav-link[href="#${sectionId}"]`).addClass('active');
            }
        });
    });
    
    // Navbar background on scroll
    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('#navbar').addClass('navbar-scrolled');
        } else {
            $('#navbar').removeClass('navbar-scrolled');
        }
    });
    
    
    // ==================== Animations ====================
    
    // Fade in on scroll
    function fadeInOnScroll() {
        $('.fade-in').each(function() {
            const elementTop = $(this).offset().top;
            const elementBottom = elementTop + $(this).outerHeight();
            const viewportTop = $(window).scrollTop();
            const viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).css({
                    'opacity': '1',
                    'animation-play-state': 'running'
                });
            }
        });
    }
    
    $(window).scroll(fadeInOnScroll);
    fadeInOnScroll(); // Initial check
    
    // Service cards stagger animation
    $('.service-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
    });
    
    
    // ==================== Back to Top Button ====================
    
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            $('#back-to-top').addClass('show');
        } else {
            $('#back-to-top').removeClass('show');
        }
    });
    
    $('#back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800, 'swing');
    });
    
    
    // ==================== Contact Form ====================
    
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = {
            name: $(this).find('input[type="text"]').val(),
            phone: $(this).find('input[type="tel"]').val(),
            service: $(this).find('select').val(),
            message: $(this).find('textarea').val()
        };
        
        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.text();
        submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>送出中...').prop('disabled', true);
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(function() {
            // Show success message
            alert('感謝您的諮詢！我們會盡快與您聯繫。');
            
            // Reset form
            $('#contact-form')[0].reset();
            
            // Restore button
            submitBtn.text(originalText).prop('disabled', false);
        }, 1500);
        
        // Uncomment and modify for actual AJAX submission:
        /*
        $.ajax({
            url: 'your-api-endpoint.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('感謝您的諮詢！我們會盡快與您聯繫。');
                $('#contact-form')[0].reset();
                submitBtn.text(originalText).prop('disabled', false);
            },
            error: function() {
                alert('送出失敗，請稍後再試或直接來電聯繫。');
                submitBtn.text(originalText).prop('disabled', false);
            }
        });
        */
    });
    
    
    // ==================== Interactive Effects ====================
    
    // Parallax effect for hero section
    $(window).scroll(function() {
        const scrolled = $(window).scrollTop();
        $('.hero-circle').css('transform', 'translateY(' + (scrolled * 0.5) + 'px)');
    });
    
    // Service card tilt effect (subtle 3D effect)
    $('.service-card').mousemove(function(e) {
        const card = $(this);
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = (y - centerY) / 20;
        const rotateY = (centerX - x) / 20;
        
        card.css('transform', `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`);
    });
    
    $('.service-card').mouseleave(function() {
        $(this).css('transform', 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)');
    });
    
    
    // ==================== Counter Animation ====================
    
    function animateCounter(element, target, duration) {
        let current = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(function() {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            $(element).text(Math.floor(current));
        }, 16);
    }
    
    // Trigger counter animation when in viewport
    let counterAnimated = false;
    $(window).scroll(function() {
        if (!counterAnimated) {
            const counterSection = $('.counter-section');
            if (counterSection.length) {
                const elementTop = counterSection.offset().top;
                const viewportBottom = $(window).scrollTop() + $(window).height();
                
                if (viewportBottom > elementTop) {
                    $('.counter').each(function() {
                        const target = parseInt($(this).data('target'));
                        animateCounter(this, target, 2000);
                    });
                    counterAnimated = true;
                }
            }
        }
    });
    
    
    // ==================== Lazy Load Images ====================
    
    $('img[data-src]').each(function() {
        const img = $(this);
        img.attr('src', img.data('src')).removeAttr('data-src');
    });
    
    
    // ==================== Social Media Hover Effects ====================
    
    $('.social-link').hover(
        function() {
            $(this).find('i').addClass('fa-bounce');
        },
        function() {
            $(this).find('i').removeClass('fa-bounce');
        }
    );
    
    
    // ==================== Line Click Tracking ====================
    
    $('a[href*="line.me"]').click(function() {
        // Track LINE button click (can integrate with Google Analytics)
        console.log('LINE button clicked');
    });
    
    
    // ==================== Phone Call Tracking ====================
    
    $('a[href^="tel:"]').click(function() {
        // Track phone call click (can integrate with Google Analytics)
        console.log('Phone call initiated:', $(this).attr('href'));
    });
    
    
    // ==================== Responsive Map ====================
    
    function adjustMapHeight() {
        if ($(window).width() < 768) {
            $('iframe').css('height', '300px');
        } else {
            $('iframe').css('height', '500px');
        }
    }
    
    $(window).resize(adjustMapHeight);
    adjustMapHeight();
    
    
    // ==================== Preloader (Optional) ====================
    
    /*
    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });
    });
    */
    
    
    // ==================== Easter Egg (Fun Feature) ====================
    
    let konamiCode = [];
    const konamiSequence = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65]; // ↑↑↓↓←→←→BA
    
    $(document).keydown(function(e) {
        konamiCode.push(e.keyCode);
        if (konamiCode.length > konamiSequence.length) {
            konamiCode.shift();
        }
        
        if (JSON.stringify(konamiCode) === JSON.stringify(konamiSequence)) {
            // Easter egg activated!
            $('body').addClass('rainbow-mode');
            alert('🏍️ TURBO MODE ACTIVATED! 🔥');
            
            // Add rainbow animation
            $('<style>')
                .text(`
                    @keyframes rainbow {
                        0% { filter: hue-rotate(0deg); }
                        100% { filter: hue-rotate(360deg); }
                    }
                    .rainbow-mode * {
                        animation: rainbow 3s linear infinite;
                    }
                `)
                .appendTo('head');
            
            setTimeout(function() {
                $('body').removeClass('rainbow-mode');
                location.reload();
            }, 10000);
        }
    });
    
    
    // ==================== Console Message ====================
    
    console.log('%c🏍️ MOTO ZONE', 'font-size: 24px; font-weight: bold; color: #f97316;');
    console.log('%cRide the Limit | 重機專業車行', 'font-size: 14px; color: #dc2626;');
    console.log('%c有興趣加入我們的團隊嗎？請寄送履歷至 careers@motozone.com', 'font-size: 12px; color: #6b7280;');
    
});


// ==================== External Functions ====================

// Function to open LINE chat
function openLineChat(lineId) {
    window.open(`https://line.me/ti/p/${lineId}`, '_blank');
}

// Function to make phone call
function makeCall(phoneNumber) {
    window.location.href = `tel:${phoneNumber}`;
}

// Function to send email
function sendEmail(email) {
    window.location.href = `mailto:${email}`;
}

// Function to get directions via Google Maps
function getDirections() {
    const address = encodeURIComponent('台北市信義區忠孝東路五段123號');
    window.open(`https://www.google.com/maps/dir/?api=1&destination=${address}`, '_blank');
}
