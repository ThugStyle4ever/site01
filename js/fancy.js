    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect : 'elastic',
            openSpeed  : 300,
            closeEffect : 'elastic',
            closeSpeed  : 300,
            closeClick : true,
            helpers: {
                title : {
                    type : 'inside'
                },
                overlay : {
                    speedIn : 900,
                    opacity : 0.65,
                    css : {
                        'background-color' : '#fff'
                    }
                }
            }
        });
    });