 
       <!-- Photo Gallery Starts -->
        <div class="row gallery">
            <?php
                $result = $obj->getGalley();
                if (!empty($result)) {
                    foreach ($result AS $row) {
                        /* IF is Video */
                        if ($row['media_type'] == 'YouTube') {
                            $rel = 'video';
                            $href = "http://www.youtube.com/embed/" . $row['media_name'];
                            $src_bg = 'http://img.youtube.com/vi/' . $row['media_name'] . '/mqdefault.jpg';
                            $src = 'http://img.youtube.com/vi/' . $row['media_name'] . '/mqdefault.jpg';
                        } else {
                            /* IF is Image */
                            $rel = '';
                            $href = "images/large/" . $row['media_name'];
                            $src_bg = "images/small/" . $row['media_name'];
                            $src = "images/small/" . $row['media_name'];
                        }
                        ?>
            <div class="col-xs-6 col-md-3 col-lg-2 col-sm-4 gallery-block" data-media_guid="<?php echo $row['media_GUID']; ?>">
                <div class="gallery-block-inner">
                    <a class="photobox_a <?php if ($rel != '') { ?> media-video<?php } ?>" href="<?php echo $href; ?>" rel="<?php echo $rel; ?>" <?php if ($rel != '') { ?> style="background-image:url('images/placeholder.png'), url('<?php echo $src_bg; ?>');" <?php } ?>>
                        <img src="<?php echo $src; ?>" class="img-responsive">
                    </a>
                </div>
                <span class="media-name"><?php echo $row['media_name_original']; ?></span>
            </div>
            <?php
                    }
                } else {
                    ?>
            <p id="gallery-empty">Esta vacio</p>
            <?php
                }
                ?>
            <!-- ProgressBar Starts -->
            <div class="col-lg-2 col-md-3 col-xs-6 gallery-block" id="gallery-block-loader">
                <div class="gallery-block-inner">
                    <div id="progressbar">
                        <div class="bar percent"></div>
                    </div>
                </div>
            </div>
            <!-- ProgressBar Ends -->
        </div>