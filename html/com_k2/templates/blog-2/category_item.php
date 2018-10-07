<?php
/**
 * @version		$Id: category_item.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;
$viewClass = 'st-item-normal';
if(!empty($this->item->image)) {
	$viewClass = ' st-item-image ';
}
if(!empty($this->item->video)) {
	$viewClass = ' st-item-video ';
}
// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div class="st-k2-view-item <?php echo $viewClass; ?> group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">

	<!-- Plugins: BeforeDisplay -->
  <?php echo $this->item->event->BeforeDisplay; ?>

	<!-- K2 Plugins: K2BeforeDisplay -->
  <?php echo $this->item->event->K2BeforeDisplay; ?>

	<div class="media">
		  <?php if (!empty($this->item->video)){ ?>
		  <?php if(!empty($this->item->video)): ?>
		  <!-- Item video -->
		  <div class="video <?php if($this->item->videoType=='embedded'): ?> embedded<?php endif; ?>"><?php echo $this->item->video; ?></div>
		  <?php endif; ?>
		  <?php } else { ?>
		  <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		  <!-- Item Image -->
		  <div class="image">
		    <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
		    </a>
		  </div>
		  <?php endif; ?>
		  <?php } ?>
	</div>
	<div class="st-article-body">
	<?php if($this->item->params->get('catItemTitle')): ?>
	  <!-- Item title -->
	  <h2 class="title">
	  	<?php if ($this->item->params->get('catItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
	  		<?php echo $this->item->title; ?>
	  	</a>
	  	<?php else: ?>
	  	<?php echo $this->item->title; ?>
	  	<?php endif; ?>
	  </h2>
	<?php endif; ?>
  <!-- Plugins: AfterDisplayTitle -->
  <?php echo $this->item->event->AfterDisplayTitle; ?>

  <!-- K2 Plugins: K2AfterDisplayTitle -->
  <?php echo $this->item->event->K2AfterDisplayTitle; ?>
  <div class="st-article-info clearfix">
		<?php if($this->item->params->get('catItemDateCreated')): ?>
		<!-- Date created -->
		<div class="date">
			
			<?php 
				$time = strtotime($this->item->created);
				$day = date("d", $time);
				$month = date("M", $time);
				$year = date("Y", $time);
			?>
			<div class="day"><?php echo $day; ?></div>
			<div class="month"><?php echo $month; ?></div>
		</div>
		<?php endif; ?>
		
		
		<?php if($this->item->params->get('catItemCategory')): ?>
			<!-- Item category name -->
			<div class="category">
				<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>:
				<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
			</div>
		<?php endif; ?>
	</div>
  <div class="catItemBody">

	  <!-- Plugins: BeforeDisplayContent -->
	  <?php echo $this->item->event->BeforeDisplayContent; ?>

	  <!-- K2 Plugins: K2BeforeDisplayContent -->
	  <?php echo $this->item->event->K2BeforeDisplayContent; ?>

	  <?php if($this->item->params->get('catItemIntroText')): ?>
	  <!-- Item introtext -->
	  <div class="catItemIntroText">
	  	<?php echo $this->item->introtext; ?>
	  </div>
	  <?php endif; ?>

	  <div class="clr"></div>

	  <!-- Plugins: AfterDisplayContent -->
	  <?php echo $this->item->event->AfterDisplayContent; ?>

	  <!-- K2 Plugins: K2AfterDisplayContent -->
	  <?php echo $this->item->event->K2AfterDisplayContent; ?>

	  <div class="clr"></div>
  </div>

  <?php if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
  <!-- Item image gallery -->
  <div class="catItemImageGallery">
	  <h4><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h4>
	  <?php echo $this->item->gallery; ?>
  </div>
  <?php endif; ?>

  <div class="clr"></div>

  <!-- Plugins: AfterDisplay -->
  <?php echo $this->item->event->AfterDisplay; ?>

  <!-- K2 Plugins: K2AfterDisplay -->
  <?php echo $this->item->event->K2AfterDisplay; ?>

	<div class="clr"></div>
	</div>
</div>
<!-- End K2 Item Layout -->
