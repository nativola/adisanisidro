
                <?php global $data; $icons = $data['icon_menu']; 
                $iconcount = count($icons); 
                if ($iconcount == "2") {
                		$columnsize = 'span6';
                } elseif ($iconcount == "3") {
                		$columnsize = 'span4';
                } else {
                		$columnsize = 'span3';
                	}
                	?>
                <div class="home-margin home-padding">
                	<div class="row homepromo">
        
                        <?php foreach ($icons as $icon) : ?>
                            <div class="<?php echo $columnsize;?> home-iconmenu">
	                            <a href="<?php echo $icon['link'] ?>" title="<?php echo $icon['title'] ?>">
	                            <?php if($icon['url'] != '') echo '<img src="'.$icon['url'].'"/>' ; else echo '<i class="'.$icon['icon_o'].'"></i>'; ?>
	                            <?php if ($icon['title'] != '') echo '<h4>'.$icon['title'].'</h4>'; ?>
	                            </a>
                            </div>
                        <?php endforeach; ?>

                    </div> <!--homepromo -->
                </div>