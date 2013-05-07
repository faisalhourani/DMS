<?php
/*
	Section: TextBox
	Author: PageLines
	Author URI: http://www.pagelines.com
	Description: A simple box for text and HTML.
	Class Name: PageLinesTextBox
	Filter: component
*/

class PageLinesTextBox extends PageLinesSection {

	function section_opts(){
		$opts = array(
			array(
				'type'		=> 'multi',
				'key'		=> 'textbox_text', 
				'span'		=> 2,
				'opts'		=> array(
					array(
						'type' 			=> 'text',
						'key'			=> 'textbox_title',
						'label' 		=> 'Title (Optional)',
					),
					array(
						'type' 			=> 'textarea',
						'key'			=> 'textbox_content',
						'label' 		=> 'Text Content',
					),
					
				)
			), 
			array(
				'type'		=> 'multi',
				'key'		=> 'textbox_config', 
				'opts'		=> array(
					array(
						'key'			=> 'textbox_pad',
						'type' 			=> 'text',
						'label' 	=> __( 'Padding <small>(CSS Shorthand)</small>', 'pagelines' ),
						'ref'		=> __( 'This option uses CSS padding shorthand. For example, use "15px 30px" for 15px padding top/bottom, and 30 left/right.', 'pagelines' ),
						
					),
					array(
						'key'			=> 'textbox_font_size',
						'type'			=> 'count_select',
						'count_start'	=> 10,
						'count_number'	=> 30,
						'suffix'		=> 'px',
						'title'			=> __( 'Textbox Font Size', 'pagelines' ),
						'default'		=> 14, 
					),
					
					array(
						'type' 			=> 'select',
						'key'			=> 'textbox_align',
						'label' 		=> 'Alignment',
						'opts'			=> array(
							'textleft'		=> array('name' => 'Align Left (Default)'),
							'textright'		=> array('name' => 'Align Right'),
							'textcenter'	=> array('name' => 'Center'),
							'textjustify'	=> array('name' => 'Justify'),
						)
					),
					array(
						'type' 			=> 'select_animation',
						'key'			=> 'textbox_animation',
						'label' 		=> 'Viewport Animation',
						'help' 			=> 'Optionally animate the appearance of this section on view.',
					),
					
				)
			),
			
			
			
		);

		return $opts;

	}

	function section_template() {

		$text = $this->opt('textbox_content');

		
		
		$title = $this->opt('textbox_title');
		
		$text = (!$text && !$title) ? '<p><strong>TextBox</strong> &raquo; Add Content!</p>' : sprintf('<div class="hentry">%s</div>', do_shortcode( wpautop($text) ) ); 
		
		$title = ($title) ? sprintf('<strong>%s</strong><br/>', $title) : '';

		$class = $this->opt('textbox_animation');
			
		$align = $this->opt('textbox_align');
		
		$pad = ($this->opt('textbox_pad')) ? sprintf('padding: %s;', $this->opt('textbox_pad')) : ''; 
		$size = ($this->opt('textbox_font_size')) ? sprintf('font-size: %spx;', $this->opt('textbox_font_size')) : ''; 
		
		printf('<div class="textbox-wrap pl-animation %s %s" style="%s%s">%s%s</div>', $align, $class, $pad, $size, $title, $text);

	}
}


