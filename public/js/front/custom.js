$(document).ready(function () {

    $(".tools-filter-wrap .tools-filter-track li a").click(function () {
        $(".tools-filter-wrap .tools-filter-track li a").parent().removeClass("active");
        $(this).parent().addClass("active");
    });

    function slider() {
        let slideCount = 0
        let sliderTrackWidth = 0
        let slideritems = $(".tools-filter-track li").length;
        for (let i = 1; i <= slideritems; i++) {
            sliderTrackWidth = sliderTrackWidth + $(".tools-filter-track li:nth-child(" + i + ")").outerWidth()
        }
        sliderTrackWidth = sliderTrackWidth.toFixed(2);
        let sliderWidth = $(".tools-filter-list").width();
        let leftwidth = sliderTrackWidth - sliderWidth;

        if (sliderTrackWidth <= sliderWidth) {
            $(".next-btn").addClass("disable");
            $(".prev-btn").addClass("disable");
        }
        else {
            $(".next-btn").click(function () {
                slideCount = slideCount + sliderWidth;
                console.log(slideCount, "slideCount")
                if ((sliderTrackWidth - sliderWidth) < slideCount) {
                    $(".tools-filter-track").css("transform", "translateX(-" + leftwidth + "px)")
                    $(".next-btn").addClass("disable");
                    $(".prev-btn").removeClass("disable");
                    slideCount = (sliderTrackWidth - sliderWidth).toFixed(2);
                }
                else {
                    $(".tools-filter-track").css("transform", "translateX(-" + slideCount + "px)");
                    $(".prev-btn").removeClass("disable");
                }
            });
            $(".prev-btn").click(function () {
                slideCount = slideCount - sliderWidth;
                console.log(slideCount, "slideCount")
                if (slideCount + sliderWidth <= sliderWidth) {
                    slideCount = 0;
                    $(".tools-filter-track").css("transform", "translateX(-" + slideCount + "px)")
                    $(".prev-btn").addClass("disable");
                    $(".next-btn").removeClass("disable");
                }
                else {
                    $(".tools-filter-track").css("transform", "translateX(-" + slideCount + "px)");
                    $(".next-btn").removeClass("disable");
                }
            });
        }
    }

    slider();
    $(window).resize(function () {
        setTimeout(slider(), 500)
    });

    $(".day-mode button").on("click", function () {
        $("body").addClass("night-mode");
        $(this).parent().hide();
        $(".night-mode").show();
    });

    $(".day-mode button").on("click", function () {
        $("body").addClass("night-mode");
        $(this).parent().hide();
        $(".night-mode").show();
    });
    $(".night-mode button").on("click", function () {
        $("body").removeClass("night-mode");
        $(this).parent().hide();
        $(".day-mode").show();
    });
});