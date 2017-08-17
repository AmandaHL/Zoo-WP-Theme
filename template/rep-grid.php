<?php
/* 
Rep Page sections
*/
?>
<?php
$metafield_id = get_the_ID();
$ind_rep_sales = get_post_meta($metafield_id, 'zf_ind_rep_sales', true);
$ind_rep_eng = get_post_meta($metafield_id, 'zf_ind_rep_engineer', true);
$ind_rep_order = get_post_meta($metafield_id, 'zf_ind_rep_order', true);
$ind_rep_oc_tech = get_post_meta($metafield_id, 'zf_ind_rep_oc_tech', true);
$ind_rep_oc_install = get_post_meta($metafield_id, 'zf_ind_rep_oc_install', true);
$ind_rep_dc_tech = get_post_meta($metafield_id, 'zf_ind_rep_dc_tech', true);
$ind_rep_dc_install = get_post_meta($metafield_id, 'zf_ind_rep_dc_install', true);
?>
<section>
<div class="rep-section">
<h2 class="rep-header">Downloads</h2>
<div class="rep-grid">
<div>
<h3 class="rep-subhead">Sales Materials</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_sales
	. '</div>';
?>
</div>

<div>
<h3 class="rep-subhead">Engineering Information</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_eng
	. '</div>';
?>
</div>

<div>
<h3 class="rep-subhead">Ordering</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_order
	. '</div>';
?>
</div>
</div><!--downloads rep grid-->
</div><!--.rep-section-->


<div class="rep-section">
<h2 class="rep-header">Open Ceiling Fans</h2>
<div class="rep-grid">
<div>
<h3 class="rep-subhead">Technical Information</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_oc_tech
	. '</div>';
?>
</div>

<div>
<h3 class="rep-subhead">Installation</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_oc_install
	. '</div>';
?>
</div>
</div><!--open ceiling rep grid-->
</div><!--.rep-section-->


<div class="rep-section">
<h2 class="rep-header">Drop Ceiling Fans</h2>
<div class="rep-grid">
<div>
<h3 class="rep-subhead">Technical Information</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_dc_tech
	. '</div>';
?>
</div>

<div>
<h3 class="rep-subhead">Installation</h3>
<p>PDF DOWNLOADS</p>
<?php
	echo '<div>'
	. $ind_rep_dc_install
	. '</div>';
?>
</div>
</div><!--drop celing rep grid-->
</div><!--.rep-section-->


<div class="rep-section">
<h2 class="rep-header">Videos</h2>
<?php get_template_part('template/videos');?>
</div><!--.rep-section-->
</section>	