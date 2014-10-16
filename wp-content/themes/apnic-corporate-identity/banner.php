        <div id="banner">
            <a href="//www.apnic.net/"><img src="https://www.apnic.net/__data/assets/image/0003/69384/apnic-logotype-200x55.png" alt="APNIC"></a>
           <div id="utilities" class="pull-right hidden-print">
               <?php include_once("translatesnippet.php") ?>
               <form class="pull-right searchform" action="http://blog.apnic.net/" id="searchform" role="search"><input type="text" name="s" placeholder="Search blog..." id="search"><input type="submit" name="sa" value="Go" id="go" /></form>
                <ul class="list-inline pull-right">

                    <li><a href="http://www.apnic.net/about-APNIC/organization/contact-APNIC"><span>Contact us</span></a></li>
                    <li><a href="http://www.apnic.net/jobs"><span>Jobs</span></a></li>
                    <li><a href="http://www.apnic.net/apnic-info/site-map"><span>Site map</span></a></li>
                </ul>
                <p id="ip">Your IP address:</p>
            </div>
            <div id="glyph" class="apnic-sprite apnic-sprite-glyphs glyph-blue-1 hidden-print"></div>
            <div class="apnic-sprite apnic-sprite-icons" id="bg-glyphs"></div>
        </div><!-- /#banner -->

<script>
    (function(){
        // Set a random glyph

        // Random colour by default, but some sections are themed a particular colour
        var colour = _.sample(["blue" , "darkgreen" , "lightgreen" , "orange" , "purple" , "yellow"]);
        colour = "blue";
        var position = _.random(1, 5);
        var selector = "apnic-sprite apnic-sprite-glyphs glyph-" + colour + "-" + position + " hidden-print";
        $('#glyph').attr('class',selector);

        // Add your IP address
        $.ajax({
            url: "https://cgi1.apnic.net/cgi-bin/my-ip.php",
            jsonp: "callback",
            dataType: "jsonp",
            success: function( response ) {
                var $node = $('#ip');
                var txt = $node.text();
                var ip = response.ip;
                var ipv6 = ip.indexOf(':')!=-1;
                var url = "https://www.apnic.net/apnic-info/whois_search/your-ip";
                var markup = txt + " <a href='" + url + "'>" + ip + "</a>";
                $node.html(markup);
                if(ipv6){
                    $node.prepend('<strong id="via-ipv6" class="apnic-sprite apnic-sprite-icons"><span>Connected Via IPv6</span></strong>');
                }
            }
        });
    }).call(this);
</script>
