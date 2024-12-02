<section class="slider-section">
    <button class="prev-btn">Prev</button>
    <button class="next-btn">Next</button>

    <div class="slick-slider" id="dynamic-slider"></div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script>
    $(document).ready(function() {
        function loadSliderContent() {
            $.get('slider/get_links.php', function(data) {
                const slider = $('#dynamic-slider');
                slider.empty();
                data.forEach(link => {
                    slider.append(`<div><img src="${link.image}" alt="${link.title}"></div>`);
                });

                slider.slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: false,
                    dots: true,
                    responsive: [{
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1
                            }
                        },
                    ],
                });
            });
        }

        loadSliderContent();

        $('.prev-btn').click(function() {
            $('#dynamic-slider').slick('slickPrev');
        });
        $('.next-btn').click(function() {
            $('#dynamic-slider').slick('slickNext');
        });
    });
</script>