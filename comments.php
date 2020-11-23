<?php

/**
 * @package hill
 * 
 */

?>

<?php
	if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'hill' ); ?></p>
<?php

	return;
	endif; 
?>    

<div id="articleComments">
<?php if ( have_comments() ) : ?>
<?php if ( post_password_required() ) : ?>

	<h4 class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'hill' ); ?></h4>

	</div><!--#articleComments -->

<?php		
		return;
	endif;
	global $post;
?>

    <h4>

	<?php // printf( _n( 'One thought on &ldquo; %2$s &rdquo;', '%1$s thoughts on &ldquo; %2$s &rdquo;', get_comments_number(), 'hill' ),

					//number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
	?>

	</h4>

    <div id="comments">

    	<ul class="commentList">
        	<?php
                    $GLOBALS['ncc'] = 1;
                    $args = array( 'type'=>'comment', 'style'=>'', 'callback' => 'hill_comment_cb' );
                    wp_list_comments($args);
                ?>
        </ul><!--.commentList -->

    </div><!--#comments -->

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>

		<nav id="comment-nav-above">

			<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'hill' ); ?></h1>

			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'hill' ) ); ?></div>

			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'hill' ) ); ?></div>

		</nav>

	<?php endif; // check for comment navigation ?>

<?php endif;?>
<?php
$user = wp_get_current_user();
$user_identity = $user->display_name;

$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$formargs = array(
	
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'title_reply'       => esc_html__( 'Leave a Reply','hill' ),
  'title_reply_to'    => esc_html__( 'Leave a Reply to %s','hill' ),
  'cancel_reply_link' => esc_html__( 'Cancel Reply','hill' ),
  'label_submit'      => esc_html__( 'Leave a reply','hill' ),
  'submit_button'     =>'<button type="submit" name="%1$s" id="%2$s" class="%3$s button">%4$s</button>',

  'comment_field' =>  '<div class="col-md-12"><label for="comment"><strong>' . ( $req ? '<span class="required">*</span> ' : '' ) . _x( 'Comment:', 'noun', 'hill' ) .
    '</strong></label></div><div class="col-md-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></div>',

  'must_log_in' => '<div class="col-md-12">' .
    sprintf(
      wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.','hill' ), array( 'a' => array( 'href' => array(), 'title' => array() ) )),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</div><br /><br />',

  'logged_in_as' => '<div class="col-md-12">' .
    sprintf(
    wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','hill' ), array( 'a' => array( 'href' => array(), 'title' => array() ) )),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</div><br /><br />',

  'comment_notes_before' => '<div class="col-md-6">' .
    esc_html__( 'Your email address will not be published.','hill' ) . ( $req ? '<span class="required">*</span>' : '' ) .
    '</div><br /><br />',
	'comment_notes_after' => '',
  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="col-md-6">' .
      '<label for="author"><strong>' .( $req ? '<span class="required">*</span> ' : '' ) . esc_html__( 'Name:', 'hill' ) . '</strong></label>'  .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . wp_kses_post($aria_req) . ' /></div>',

    'email' =>
      '<div class="col-md-6"><label for="email"><strong>' .
      ( $req ? '<span class="required">*</span> ' : '' ) . esc_html__( 'Email:', 'hill' ) . '</strong></label>' .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . wp_kses_post($aria_req) . ' /></div>',

    'url' =>
      '<div class="col-md-12"><label for="url"><strong>' .
      esc_html__( 'Website:', 'hill' ) . '</strong></label>' .
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></div>'
    )
  ),
);
echo "<div class='row'><div class='col-md-12'>";
comment_form($formargs); 
echo "</div></div>";
?>
</div><!--#articleComments -->
