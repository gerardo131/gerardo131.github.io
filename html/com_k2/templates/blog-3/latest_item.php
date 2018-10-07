<?php
/**
 * @version		$Id: latest_item.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
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
?>

<!-- Start K2 Item Layout -->
<div class="latestItemView st-k2-view-item <?php echo $viewClass; ?>">
	<div class="row-fluid">
	<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

	<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>

	<div class="span5">
		<div class="media">
			  <?php if (!empty($this->item->video)){ ?>
			  <?php if($this->params->get('latestItemVideo') && !empty($this->item->video)): ?>
			  <!-- Item video -->
			  <div class="video <?php if($this->item->videoType=='embedded'): ?> embedded<?php endif; ?>"><?php echo $this->item->video; ?></div>
			  <?php endif; ?>
			  <?php } else { ?>
			  <?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
			  <!-- Item Image -->
			  <div class="image">
			    <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
			    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
			    </a>
			  </div>
			  <?php endif; ?>
			  <?php } ?>
		</div>
	 </div>
    <div class="span7">
	 <?php if($this->item->params->get('latestItemTitle')): ?>
	  <!-- Item title -->
	  <h2 class="title">
	  	<?php if ($this->item->params->get('latestItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
	  		<?php echo $this->item->title; ?>
	  	</a>
	  	<?php else: ?>
	  	<?php echo $this->item->title; ?>
	  	<?php endif; ?>
	  </h2>
	  <?php endif; ?>
  	<div class="st-article-info clearfix">
		<?php if($this->item->params->get('latestItemDateCreated')): ?>
		<!-- Date created -->
		<div class="date">
			<span><?php echo JTEXT::_('ST_K2_CO_DATE'); ?></span>:
			<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC')); ?>
		</div>
		<?php endif; ?>
		
		
		<?php if($this->item->params->get('latestItemCategory')): ?>
			<!-- Item category name -->
			<div class="category">
				<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>:
				<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
			</div>
		<?php endif; ?>
	
		<?php if($this->item->params->get('latestItemTags') && count($this->item->tags)): ?>
			  <!-- Item tags -->
			  <div class="tags">
				  <span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>:
				  <?php foreach ($this->item->tags as $tag): ?>
				  <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
				  <?php endforeach; ?>
			  </div>
		 <?php endif; ?>
	 </div>

  <!-- Plugins: AfterDisplayTitle -->
  <?php echo $this->item->event->AfterDisplayTitle; ?>

  <!-- K2 Plugins: K2AfterDisplayTitle -->
  <?php echo $this->item->event->K2AfterDisplayTitle; ?>

  <div class="latestItemBody">

	  <!-- Plugins: BeforeDisplayContent -->
	  <?php echo $this->item->event->BeforeDisplayContent; ?>

	  <!-- K2 Plugins: K2BeforeDisplayContent -->
	  <?php echo $this->item->event->K2BeforeDisplayContent; ?>
	  
	  <?php if($this->item->params->get('latestItemIntroText')): ?>
	  <!-- Item introtext -->
	  <div class="latestItemIntroText">
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

  

	

	<?php if($this->item->params->get('latestItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
	<!-- Anchor link to comments below -->
	<div class="latestItemCommentsLink">
		<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
			<!-- K2 Plugins: K2CommentsCounter -->
			<?php echo $this->item->event->K2CommentsCounter; ?>
		<?php else: ?>
			<?php if($this->item->numOfComments > 0): ?>
			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
			</a>
			<?php else: ?>
			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
			</a>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if ($this->item->params->get('latestItemReadMore')): ?>
	<!-- Item "read more..." link -->
	<div class="link-group">
		<a class="st-read-more" href="<?php echo $this->item->link; ?>">
			<?php echo JText::_('K2_READ_MORE'); ?>
		</a>
	</div>
	<?php endif; ?>

	<div class="clr"></div>

  <!-- Plugins: AfterDisplay -->
  <?php echo $this->item->event->AfterDisplay; ?>

  <!-- K2 Plugins: K2AfterDisplay -->
  <?php echo $this->item->event->K2AfterDisplay; ?>

	<div class="clr"></div>
	</div></div>
</div>
<!-- End K2 Item Layout -->
