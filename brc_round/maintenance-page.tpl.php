<?php
$vars = get_defined_vars();
$view = get_artx_drupal_view();
$view->print_maintenance_head($vars);
if (isset($page))
foreach (array_keys($page) as $name)
$$name = & $page[$name];
$art_sidebar_left = isset($sidebar_left) && !empty($sidebar_left) ? $sidebar_left : NULL;
$art_sidebar_right = isset($sidebar_right) && !empty($sidebar_right) ? $sidebar_right : NULL;
if (!isset($vnavigation_left)) $vnavigation_left = NULL;
if (!isset($vnavigation_right)) $vnavigation_right = NULL;
$tabs = (isset($tabs) && !(empty($tabs))) ? '<ul class="arttabs_primary">'.render($tabs).'</ul>' : NULL;
$tabs2 = (isset($tabs2) && !(empty($tabs2))) ?'<ul class="arttabs_secondary">'.render($tabs2).'</ul>' : NULL;
$is_maintenance = (bool)strpos($template_file, 'maintenance-page.tpl.php');
?>

<div id="art-main">
<header class="art-header"><?php if (!empty($art_header)) { echo render($art_header); } ?>

    <div class="art-shapes">
        
            </div>

<?php if (!empty($site_name)) : ?>
<?php if (!$title) : ?>
<h1 class="art-headline"><a href="<?php echo check_url($front_page); ?>" title = "<?php echo $site_name; ?>"><?php echo $site_name;  ?></a></h1><?php else : ?><div class="art-headline"><a href="<?php echo check_url($front_page); ?>" title = "<?php echo $site_name; ?>"><?php echo $site_name;  ?></a></div><?php endif; ?><?php endif; ?>
<?php if (!empty($site_slogan)) : ?>
<h2 class="art-slogan"><?php echo $site_slogan; ?>
</h2><?php endif; ?>



<div class="art-textblock art-textblock-1015892834">
        <div class="art-textblock-1015892834-text-container">
        <div class="art-textblock-1015892834-text"><a href="http://www.facebook.com/" class="art-facebook-tag-icon"></a></div>
    </div>
    
</div><div class="art-textblock art-textblock-1772722846">
        <div class="art-textblock-1772722846-text-container">
        <div class="art-textblock-1772722846-text"><a href="https://twitter.com/" class="art-twitter-tag-icon"></a></div>
    </div>
    
</div><div class="art-textblock art-textblock-896531721">
        <div class="art-textblock-896531721-text-container">
        <div class="art-textblock-896531721-text"><a href="http://www.youtube.com/" class="art-youtube-tag-icon"></a></div>
    </div>
    
</div>


                
                    
</header>
<div class="art-sheet clearfix">
<?php if (!empty($navigation) || !empty($extra1) || !empty($extra2)): ?>
<nav class="art-nav">
     
    <?php if (!empty($extra1)) : ?>
<div class="art-hmenu-extra1"><?php echo render($extra1); ?></div>
<?php endif; ?>
<?php if (!empty($extra2)) : ?>
<div class="art-hmenu-extra2"><?php echo render($extra2); ?></div>
<?php endif; ?>
<?php if (!empty($navigation)) : ?>
<?php echo render($navigation); ?>
<?php endif; ?>
</nav><?php endif; ?>

<?php if (!empty($banner1)) { echo '<div id="banner1">'.render($banner1).'</div>'; } ?>
<?php echo art_placeholders_output(render($top1), render($top2), render($top3)); ?>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <?php if (!empty($art_sidebar_left) || !empty($vnavigation_left)) : ?>
<div class="art-layout-cell art-sidebar1"><?php echo render($vnavigation_left); ?>
<?php echo render($art_sidebar_left); ?>
</div><?php endif; ?>
                        <div class="art-layout-cell art-content"><?php if (!empty($banner2)) { echo '<div id="banner2">'.render($banner2).'</div>'; } ?>
<?php if ((!empty($user1)) && (!empty($user2))) : ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top"><td class="half-width"><?php echo render($user1); ?></td>
<td><?php echo render($user2); ?></td></tr>
</table>
<?php else: ?>
<?php if (!empty($user1)) { echo '<div id="user1">'.render($user1).'</div>'; }?>
<?php if (!empty($user2)) { echo '<div id="user2">'.render($user2).'</div>'; }?>
<?php endif; ?>
<?php if (!empty($banner3)) { echo '<div id="banner3">'.render($banner3).'</div>'; } ?>

<?php if (!empty($breadcrumb)): ?>
<article class="art-post art-article">
                                
                                                
                <div class="art-postcontent"><?php { echo $breadcrumb; } ?>
</div>
                                
                

</article><?php endif; ?>
<?php $art_post_position = strpos($content, "art-postcontent"); ?>
<?php if (($is_front || (isset($node) && isset($node->nid))) && !$is_maintenance): ?>

<?php if (!empty($tabs) || !empty($tabs2)): ?>
<article class="art-post art-article">
                                
                                                
                <div class="art-postcontent"><?php if (!empty($tabs)) { echo $tabs.'<div class="cleared"></div>'; }; ?>
<?php if (!empty($tabs2)) { echo $tabs2.'<div class="cleared"></div>'; } ?>
</div>
                                
                

</article><?php endif; ?>

<?php if (!empty($mission) || !empty($help) || !empty($messages) || !empty($action_links)): ?>
<article class="art-post art-article">
                                
                                                
                <div class="art-postcontent"><?php if (isset($mission) && !empty($mission)) { echo '<div id="mission">'.$mission.'</div>'; }; ?>
<?php if (!empty($help)) { echo render($help); } ?>
<?php if (!empty($messages)) { echo $messages; } ?>
<?php if (isset($action_links) && !empty($action_links)): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
</div>
                                
                

</article><?php endif; ?>

<?php if ($art_post_position === FALSE): ?>
<article class="art-post art-article">
                                
                                                
                <div class="art-postcontent"><?php endif; ?>
<?php echo art_content_replace($content); ?>
<?php if ($art_post_position === FALSE): ?>
</div>
                                
                

</article><?php endif; ?>

<?php else: ?>

<?php $isEmpty = empty($title) && empty($tabs) && empty($tabs2) && empty($mission) && empty($help) && empty($messages) && empty($action_links); ?>
<?php
$head = $isEmpty ? '' : <<< EOT
<article class="art-post art-article">
	<div class="art-postcontent">
EOT;
$tail = $isEmpty ? '' : <<< EOT
	</div>
</article>
EOT;
$content = art_content_replace($content);
$newContent = $art_post_position ? <<< EOT
	$tail
	$content
EOT
: <<< EOT
	$content	
	$tail
EOT;
?>

<?php echo $head; ?>
<?php print render($title_prefix); ?>
<?php if (!empty($title)): print '<h1'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h1>'; endif; ?>
<?php print render($title_suffix); ?>
<?php if (!empty($tabs)) { echo $tabs.'<div class="cleared"></div>'; }; ?>
<?php if (!empty($tabs2)) { echo $tabs2.'<div class="cleared"></div>'; } ?>
<?php if (isset($mission) && !empty($mission)) { echo '<div id="mission">'.$mission.'</div>'; }; ?>
<?php if (!empty($help)) { echo render($help); } ?>
<?php if (!empty($messages)) { echo $messages; } ?>
<?php if (isset($action_links) && !empty($action_links)): ?>
<ul class="action-links">
  <?php print render($action_links); ?>
</ul>
<?php endif; ?>
<?php echo $newContent; ?>

<?php endif; ?>

<?php if (!empty($banner4)) { echo '<div id="banner4">'.render($banner4).'</div>'; } ?>
<?php if ((!empty($user3)) && (!empty($user4))) : ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top"><td class="half-width"><?php echo render($user3); ?></td>
<td><?php echo render($user4); ?></td></tr>
</table>
<?php else: ?>
<?php if (!empty($user3)) { echo '<div id="user3">'.render($user3).'</div>'; }?>
<?php if (!empty($user4)) { echo '<div id="user4">'.render($user4).'</div>'; }?>
<?php endif; ?>
<?php if (!empty($banner5)) { echo '<div id="banner5">'.render($banner5).'</div>'; } ?>
</div>
                        <?php if (!empty($art_sidebar_right) || !empty($vnavigation_right)) : ?>
<div class="art-layout-cell art-sidebar2"><?php echo render($vnavigation_right); ?>
<?php echo render($art_sidebar_right); ?>
</div><?php endif; ?>
                    </div>
                </div>
            </div><?php echo art_placeholders_output(render($bottom1), render($bottom2), render($bottom3)); ?>
<?php if (!empty($banner6)) { echo '<div id="banner6">'.render($banner6).'</div>'; } ?>

    </div>
<footer class="art-footer">
  <div class="art-footer-inner"><?php
$footer = render($footer_message);
if (isset($footer) && !empty($footer) && (trim($footer) != '')) { echo $footer; } // From Drupal structure
elseif (!empty($art_footer) && (trim($art_footer) != '')) { echo $art_footer; } // From Artisteer Content module
else { // HTML from Artisteer preview
ob_start(); ?>

		<div style="position:relative;display:inline-block;padding-left:42px;padding-right:42px">
            <a title="RSS" class="art-rss-tag-icon" style="position: absolute; bottom: -10px; left: -6px; line-height: 32px;" href="<?php echo $base_path?>rss.xml"></a>
			<p>
				Copyright © <?php echo ( date("Y") <= 2013 ? "2013" : "2013-".date("Y")); ?> Blue Ribbon Campaign, All Rights Reserved.
			</p>
			<p>
				<a href="/privacy-policy">
					Privacy Policy
				</a>
				• 
				<a href="/terms-of-use">
					Website Terms of Use
				</a>
				• 
				<a href="/contact">
					Contact Us
				</a>
				• 
				<a href="/acknowledgements">
					Acknowledgements
				</a>
			</p>
		</div>
  <?php
  $footer = str_replace('%YEAR%', date('Y'), ob_get_clean());
  echo art_replace_image_path($footer);
}
?>
<?php if (!empty($copyright)) { echo '<div id="copyright">'.render($copyright).'</div>'; } ?>
</div>
</footer>

</div>

<?php $view->print_closure($vars); ?>
