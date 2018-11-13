(function ($) {
    $(document).ready(function () {
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 52.13, lng: 21.00},
                zoom: 8
            });
        }

        initMap();
    })
})(jQuery);


