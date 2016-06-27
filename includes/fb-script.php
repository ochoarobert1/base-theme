<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '506348762838809',
            xfbml      : true,
            version    : 'v2.6'
        });
    };
    setTimeout( function () {
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_ES/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    }, 3000);
</script>
