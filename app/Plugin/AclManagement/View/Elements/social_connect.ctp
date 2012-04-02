<?php echo $this->Html->css(array(
        '/acl_management/css/social'
    ));?>
<div class="row">
    <div class="span2">&nbsp;</div>
    <div class="span5">
        <div class="row">
            <div class="span2">
            <div class="signin-social signin-facebook">
                <a href="#" onclick="fblogin();return false;">Facebook</a>
            </div>
            </div>
            <div class="span2">
                <div class="signin-social signin-twitter">
                    <a href="<?php echo $this->Html->url('/users/twitter_connect');?>">Twitter</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fb-root"></div>
<script type="text/javascript">
//<![CDATA[
window.fbAsyncInit = function() {
        FB.init({
                appId : '<?php echo Configure::read('Facebook.appId');?>',
                status : true, // check login status
                cookie : true, // enable cookies to allow the server to access the session
                xfbml : true, // parse XFBML
                oauth : true // use Oauth
        });
        FB.Event.subscribe('auth.login',function(){window.location.reload()});
};
    (function() {
            var e = document.createElement('script');
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            e.async = true;
            document.getElementById('fb-root').appendChild(e);
    }());
    //]]>

    //your fb login function
    function fblogin() {
        FB.login(function(response) {
          window.location.href='<?php echo $this->Html->url('/users/facebook_connect');?>';
        }, {perms:'email'});//perms:'read_stream,publish_stream,offline_access'
    }
</script>