<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');
class mm_widget_with_fields extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'mm_widget_with_fields',
            'MM Widget with Fields',
            array('description' => 'Widget dengan input checkbox, text, dan textarea.')
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo '<p>' . esc_html($instance['text']) . '</p>';
        echo '<p>' . esc_textarea($instance['textarea']) . '</p>';
        echo '<p>' . ($instance['checkbox'] ? 'Checkbox: Checked' : 'Checkbox: Unchecked') . '</p>';
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'Judul Widget';
        $text = !empty($instance['text']) ? $instance['text'] : '5';
        $textarea = !empty($instance['textarea']) ? $instance['textarea'] : '';
        $checkbox = !empty($instance['checkbox']) ? $instance['checkbox'] : false;
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Judul:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>">Text:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="number" value="<?php echo esc_attr($text); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('textarea')); ?>">Textarea:</label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('textarea')); ?>" name="<?php echo esc_attr($this->get_field_name('textarea')); ?>"><?php echo esc_textarea($textarea); ?></textarea>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($checkbox, 'on'); ?> id="<?php echo esc_attr($this->get_field_id('checkbox')); ?>" name="<?php echo esc_attr($this->get_field_name('checkbox')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('checkbox')); ?>">Checkbox</label>
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : '';
        $instance['textarea'] = (!empty($new_instance['textarea'])) ? strip_tags($new_instance['textarea']) : '';
        $instance['checkbox'] = (!empty($new_instance['checkbox'])) ? 'on' : '';
        return $instance;
    }
}


function mm_load_widget_with_fields()
{
    register_widget('mm_widget_with_fields');
}
add_action('widgets_init', 'mm_load_widget_with_fields');
