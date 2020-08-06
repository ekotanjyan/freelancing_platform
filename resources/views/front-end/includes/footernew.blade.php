@if( Schema::hasTable('site_managements'))
    @php
        $footer = \App\SiteManagement::getMetaValue('footer_settings');
        $search_menu = \App\SiteManagement::getMetaValue('search_menu');
        $menu_title = DB::table('site_managements')->select('meta_value')->where('meta_key', 'menu_title')->get()->first();
    @endphp
    <footer id="wt-footer" class="wt-footer wt-haslayout">
        <div class="row">
        <div class="footerCopyright" style="margin:0 auto;">
            COPYRIGHT © STAFF BACKUP LTD 2019, ALL RIGHTS RESERVED
        </div>
            </div>

        <ul class="socialIcons">
            <li style="list-style: none;">
                <a href="#" class="facebook_icon"><img src="{{url('images/facebook.png')}}"/></a>
                <a href="#" class="linkedin_icon"><img src="{{url('images/linkedin.png')}}"/></a>
                <a href="#" class="twitter_icon"><img src="{{url('images/twitter.png')}}"/></a>
                <a href="#" class="envelope_icon"><img src="{{url('images/envelope.png')}}"/></a>
            </li>
        </ul>
    </footer>
@endif
