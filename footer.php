</main> <!-- close main content area -->

<footer class="alert alert-info">
    <div class="col-sm-8">
        &copy; 2016 | COMP1006 Intro to Web Programming | Rich Freeman
    </div>

        <!-- weather widget start -->
        <div  id="m-booked-small-t3-75834">
            <div class="booked-weather-160x36 w160x36-01" style="background-color:#FFF5D9;
                color:#333333; border-radius:4px; -moz-border-radius:4px;">
                <a style="color:#08488D;"
                   href="//www.booked.net/weather/barrie-w631790"
                   class="booked-weather-160x36-city">Barrie</a>
            <div class="booked-weather-160x36-degree">0&deg;<span>C</span></div>
            </div>
        </div>

        <script type="text/javascript"> var css_file=document.createElement("link");
            css_file.setAttribute("rel","stylesheet");
            css_file.setAttribute("type","text/css");
            css_file.setAttribute("href",'//s.bookcdn.com/css/w/bw-160-36.css?v=0.0.1');
            document.getElementsByTagName("head")[0].appendChild(css_file);
            function setWidgetData(data) {
                if(typeof(data) != 'undefined' && data.results.length > 0) {
                    for(var i = 0; i < data.results.length; ++i) {
                        var objMainBlock = document.getElementById('m-booked-small-t3-75834');
                        if(objMainBlock !== null) {
                            var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type);
                            objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script>
    <script type="text/javascript" charset="UTF-8" src="http://widgets.booked.net/weather/info/?action=get_weather_info&cityID=&type=13&scode=124&domid=w209&cmetric=1&wlangID=1&color=fff5d9&wwidth=158&header_color=fff5d9&text_color=333333&link_color=08488D&border_form=0&footer_color=fff5d9&footer_text_color=333333&transparent=0"></script>
    <!-- weather widget end -->

</footer>

</body>
</html>