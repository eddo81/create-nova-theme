<?php
/**
 * The template for displaying archive pages.
 *
 * @package <%= packageName %>
 * @author  "Daniel Andersson <daniel@bozzanova.se>"
 * @author  "Eduardo Jönnerstig <eduardo@bozzanova.se>"
 * @author  "Jon Täng <jon@bozzanova.se>"
 * @license MIT https://opensource.org/licenses/MIT
 * @link    https://codex.wordpress.org/Template_Hierarchy
 * @since   <%= version %>
 */

get_header();

render_template('template-parts/partials/loop');

get_footer();