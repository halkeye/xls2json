    </div>
    
    <div id="footer">

<?php
// Echo memory peak usage
echo " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , "<br/>";
?>
    </div>
  </div> <!--! end of #container -->

  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet 
       change the UA-XXXXX-X to be your site's ID -->
  <script type="text/javascript">
   var _gaq = [['_setAccount', 'UA-89920-9'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script>
  
</body>
</html>

