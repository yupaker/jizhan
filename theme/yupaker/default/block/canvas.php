<div class="banner"><img src="__IMG__/banner_01.jpg" width="100%"></div>
              <div class="canvas">
				<iframe id="z" width="100%" height="100%" scrolling="no" src="canvas/1.html"></iframe>
				<script type="text/javascript">
                try {
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i ["test"](navigator["userAgent"])) {
                        
                    } else {
                        $("#z", parent["document"]["body"])["attr"]("src",  "__CANVAS__/"+getRandom(7) + ".html");
                    }
                } catch (e) {
                    
                }
            
                function getRandom(n) {
                    return window["Math"]["floor"](window["Math"]["random"]() * n + 1);
                }
                </script>
              </div>