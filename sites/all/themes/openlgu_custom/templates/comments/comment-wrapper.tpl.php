<?php

/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 *
 * @ingroup themeable
 */
?>
	<?php if($node->type == "openlgu_project") :
		$comment_count = $content['comment_form']['#node']->comment_count; 
		if(empty($comment_count)) { $comment_count = "0"; }
		
		if($comment_count > 0) {
			// Find out how many pictures there are
			$photo_count = 0; 
			foreach($content['comments'] as $a_comment) : 
				if (!empty($a_comment['comment_body']["#object"]->field_add_a_photo)) :
					$photo_count++;
				endif;
			endforeach; 
			
			// Fnd out how many video embeds there are 
			$video_count = 0; 
			foreach($content['comments'] as $a_comment) : 
				if (!empty($a_comment['comment_body']["#object"]->field_comment_embed_video)) :
					$video_count++;
				endif;
			endforeach; 
			
		}
		if (empty($photo_count)) { $photo_count = "0"; }
		if (empty($video_count)) { $video_count = "0"; }
		
		if($comment_count == 1) {
			$comment_tab_text = "1 Comment";
		} else {
			$comment_tab_text = $comment_count . " Comments";
		}
		
		if($photo_count == 1) {
			$photo_tab_text = "1 Photo";
		} else {
			$photo_tab_text = $photo_count . " Photos";
		}
		
		if($video_count == 1) {
			$video_tab_text = "1 Video";
		} else {
			$video_tab_text = $video_count . " Videos";
		}
	endif;
?>

<div class="project-comments">
	<h4>Comments</h4>
	<?php if($node->type == "openlgu_project") : ?>
		<ul class="comment-tabs">
			<li id="tab-comments"><?php echo $comment_tab_text; ?></li>
			<li id="tab-photos"><?php echo $photo_tab_text; ?></li>
			<li id="tab-video"><?php echo $video_tab_text; ?></li>
		</ul>
	<?php endif; ?>
	<div id="project-comments" class="commentsection">
	  <?php if($comment_count > 0): ?>
	  	<?php print render($content['comments']); ?>
	  <?php else: ?>
	  	<div class="comment"><p>No comments have been posted yet.</p></div>
	  <?php endif; ?>

	  <?php if ($content['comment_form']): ?>
		<h4 class="pic-vid-comment">Leave a Comment</h4>
		<?php if($node->type == "openlgu_project") : ?>
			<div class="pic-vid-comment" id="add-video">Add Video</div>
			<div class="pic-vid-comment" id="add-picture">Add Picture</div>
			<div class="pic-vid-comment" id="add-kml">Add a KML File</div>
			
		<?php endif; ?>
	    <?php print render($content['comment_form']); ?>
	  <?php endif; ?>
	</div>
</div>	