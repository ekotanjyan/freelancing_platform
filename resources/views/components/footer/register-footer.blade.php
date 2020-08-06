<div class="clearfix" style="clear: both;"></div>
<div class="short-footer">
    @if(isset($needShortFooterCards))
    <section class="short-footer-cards">
        <div class="short-footer-cards-wrapper index-main-container">
            <div class="footer-cards__item footer-cards__item-yellow">
                <div class="footer-cards__item-top">
                    <div class="footer-cards__item-title">
                        <span>LOCATE</span>
                        <span>ADHOC</span>
                        <span>STAFF</span>
                    </div>
                    <div class="footer-cards__item-img">
                        <img class="footer-cards__item-img-yellow" src="/images/icons/Layer 89.png">
                    </div>
                </div>
                <p>
                    Search staff using loactions that suit you, actually need.
                </p>
            </div>
            <div class="footer-cards__item footer-cards__item-blue">
                <div class="footer-cards__item-top">
                    <div class="footer-cards__item-title">
                        <span>SHORT</span>
                        <span>NOTICE</span>
                        <span>BOOKINGS</span>
                    </div>
                    <div class="footer-cards__item-img">
                        <img class="footer-cards__item-img-blue" src="/images/icons/Layer 84.png">
                    </div>
                </div>
                <p>
                    Search staff using loactions that suit you, actually need.
                </p>
            </div>
            <div class="footer-cards__item footer-cards__item-green">
                <div class="footer-cards__item-top">
                    <div class="footer-cards__item-title">
                        <span>SKILLED</span>
                        <span>TEMP</span>
                        <span>STAFF</span>
                    </div>
                    <div class="footer-cards__item-img">
                        <img class="footer-cards__item-img-green" src="/images/icons/Layer 79.png">
                    </div>
                </div>
                <p>
                    Search staff using loactions that suit you, actually need.
                </p>
            </div>
        </div>
    </section><!-- .footer-cards-->
    @endif
    <div class="footer-arc">
        <div class="footer-arc-social-wrapper">
            @if (\Route::currentRouteName() == 'showUserProfile')
                <a href="#" class="footer-arc-social facebook_icon"><img src="/images/img/public-profile/facebook-y.png"></a>
                <a href="#" class="footer-arc-social linkedin_icon"><img src="/images/img/public-profile/linkedin-y.png"></a>
                <a href="#" class="footer-arc-social twitter_icon"><img src="/images/img/public-profile/twitter-y.png"></a>
                <a href="#" class="footer-arc-social footer-arc-social-last envelope_icon"><img src="/images/img/public-profile/envelope-y.png"></a>
            @else
                <a href="#" class="footer-arc-social facebook_icon"><img src="/images/facebook.png"></a>
                <a href="#" class="footer-arc-social linkedin_icon"><img src="/images/linkedin.png"></a>
                <a href="#" class="footer-arc-social twitter_icon"><img src="/images/twitter.png"></a>
                <a href="#" class="footer-arc-social footer-arc-social-last envelope_icon"><img src="/images/envelope.png"></a>
            @endif
        </div>
        <div class="footer-copyright">
            @if (!isset($withoutCopyright))
            <p>
                ALL COPYRIGHTS STAFFBACKUP LIMITED 2019 &#9400;
            </p>
            @endif
        </div>
    </div><!-- .footer-arc-->
</div>