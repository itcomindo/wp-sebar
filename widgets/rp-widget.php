<?php

/**
 * Silence is golden
 */

defined('ABSPATH') or die('No script kiddies please!');
class MM_RP_Widget extends WP_Widget
{
    // constructor
    function __construct()
    {
        parent::__construct(
            'mm_rp_widget',
            'MM Input Text Widget',
            array('description' => 'Simple input text widget')
        );
    }

    // widget form creation
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo '<input type="text" class="mm-input-text" />';
        echo $args['after_widget'];
    }


    // widget form creation
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
    }

    // widget update
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

function mm_load_rp_widget()
{
    register_widget('MM_RP_Widget');
}
add_action('widgets_init', 'mm_load_rp_widget');
