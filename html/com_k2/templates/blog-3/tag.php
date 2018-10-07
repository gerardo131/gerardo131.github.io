<?php
/**
 * @version		$Id: tag.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<!-- Start K2 Tag Layout -->
<div id="k2Container" class="tagView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if(count($this->items)): ?>
	<div class="tagItemList">
		<?php foreach($this->items as $item): ?>
		<?php 
			$viewClass = 'st-item-normal';
			if(!empty($item->image)) {
				$viewClass = ' st-item-image ';
			}
			if(!empty($item->video)) {
				$viewClass = ' st-item-video ';
			}
		?>
		<!-- Start K2 Item Layout -->
		<div class="st-k2-view-item <?php echo $viewClass; ?>">
			<div class="row-fluid">
				<div class="span5">
					<div class="media">
						  <?php if (!empty($item->video)){ ?>
						  <?php if($item->params->get('tagItemVideo') && !empty($item->video)): ?>
						  <!-- Item video -->
						  <div class="video <?php if($item->videoType=='embedded'): ?> embedded<?php endif; ?>"><?php echo $item->video; ?></div>
						  <?php endif; ?>
						  <?php } else { ?>
						 
						  
						  <!-- Item Image -->
						  <div class="image">
							  
							    <a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>">
							    	<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>" style="width:<?php echo $item->params->get('itemImageGeneric'); ?>px; height:auto;" />
							    </a>
							  
						  </div>
						  
						  <?php } ?>
					</div>
				</div>
	    		<div class="span7">
					<?php if($item->params->get('latestItemTitle')): ?>
					  <!-- Item title -->
					  <h2 class="title">
					  	<?php if ($item->params->get('tagItemTitleLinked')): ?>
							<a href="<?php echo $item->link; ?>">
					  		<?php echo $item->title; ?>
					  	</a>
					  	<?php else: ?>
					  	<?php echo $item->title; ?>
					  	<?php endif; ?>
					  </h2>
		  			<?php endif; ?>
					<div class="st-article-info clearfix">
						<?php if($item->params->get('tagItemDateCreated')): ?>
						<!-- Date created -->
						<div class="date">
							<span><?php echo JTEXT::_('ST_K2_CO_DATE'); ?></span>:
							<?php echo JHTML::_('date', $item->created , JText::_('K2_DATE_FORMAT_LC')); ?>
						</div>
						<?php endif; ?>
						
						
						<?php if($item->params->get('tagItemCategory')): ?>
							<!-- Item category name -->
							<div class="category">
								<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>:
								<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
							</div>
						<?php endif; ?>
					</div>
					<?php if($item->params->get('tagItemIntroText',1)): ?>
					  <!-- Item introtext -->
						<div class="tagItemIntroText">
					  		<?php echo $item->introtext; ?>
					  	</div>
					<?php endif; ?>
				</div>
		  	</div>
		</div>
		<!-- End K2 Item Layout -->
		
		<?php endforeach; ?>
	</div>

	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="k2Pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<div class="clr"></div>
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>

	<?php endif; ?>
	
</div>
<!-- End K2 Tag Layout -->
