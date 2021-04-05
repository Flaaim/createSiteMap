                <?php
                if (isset($_SERVER['HTTP_REFERER'])) {
                echo '<input type="hidden" name="lastUrl" value="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'" />';
                 } ?>
