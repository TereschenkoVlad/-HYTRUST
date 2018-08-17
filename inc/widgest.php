<?php
/**
 * Created by PhpStorm.
 * User: vladt
 * Date: 03.08.2018
 * Time: 12:32
 */


class Gnat_thumb_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'widget_gnat_thumb',
            'Improved widget',
            array( 'description' => __( 'Widget for add className and wrapper for text', 'text_domain' ), )
        );
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['text_thumb'] = strip_tags( $new_instance['text_thumb'] );
        $instance['classname_thumb'] = strip_tags( $new_instance['classname_thumb'] );
        return $instance;
    }
    public function form( $instance ) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'text_thumb' ); ?>">Text</label>
            <input class="widefat" id="text-thumb<?php echo $this->get_field_id( 'text_thumb' ); ?>"
                   name="<?php echo $this->get_field_name( 'text_thumb' ); ?>" type="text"
                   value="<?php echo $instance['text_thumb']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'classname_thumb' ); ?>">Class</label>
            <input class="widefat" id="classname_thumb<?php $i = 1; $i++; ?>"
                   name="<?php echo $this->get_field_name( 'classname_thumb' ); ?>" type="text"
                   value="<?php echo $instance['classname_thumb']; ?>" />
        </p>

        <?php
    }
    public function widget( $args, $instance ) {
        ?>
        <section class="widget gnat_thumb">
            <div class="<?php echo $instance['classname_thumb']; ?>">
                <?php echo $instance['text_thumb']; ?>
            </div>
        </section>

        <?php
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Gnat_thumb_Widget' );
});


/**=========================Button Widget===============*/


class my_Button_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'my_button_widget',
            'My button widget',
            array( 'description' => __( 'Widget for creating button', 'text_domain' ), )
        );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $i = 0;
        $i++;
        $instance['button-text'] = strip_tags( $new_instance['button-text'] );
        $instance['class-for-button-container'] = strip_tags( $new_instance['class-for-button-container'] );
        $instance['button-class'] = strip_tags( $new_instance['button-class'] );
        $instance['buttons-number'] = strip_tags( $new_instance['buttons-number'] );
        $instance['button-color'] = strip_tags( $new_instance['button-color'] );
        $instance['buttons-padding'] = strip_tags( $new_instance['buttons-padding'] );
        $instance['text-color'] = strip_tags( $new_instance['text-color'] );
        return $instance;
    }


    public function form( $instance ) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'buttons-number' ); ?>">Buttons number</label>
            <input class="widefat" id="buttons-number<?php echo $this->get_field_id( 'buttons-number' ); ?>"
                   name="<?php echo $this->get_field_name( 'buttons-number' ); ?>" type="number"
                   value="<?php echo $instance['buttons-number']; ?>" />
        </p>



        <p>
            <label for="<?php echo $this->get_field_id( 'button-text' ); ?>">Text for button</label>
            <input class="widefat" id="button-text<?php echo $this->get_field_id( 'button-text' ); ?>"
                   name="<?php echo $this->get_field_name( 'button-text' ); ?>" type="text"
                   value="<?php echo  $instance['button-text']; ?>" />
        <?php
            for ($index = 1; $index < $instance['buttons-number']; $index++) {
                $doc = new DOMDocument;

                $button = $doc->createElement('input', $instance['button-text']);
                $class = $doc->createAttribute('class');
                $class->value = 'widefat';
                $button->appendChild($class);

                $id = $doc->createAttribute('id');
                $id->value = $this->get_field_id( 'button-text' );
                $button->appendChild($id);

                $name = $doc->createAttribute('name');
                $name->value = $this->get_field_name( 'button-text' );
                $button->appendChild($name);

                $type = $doc->createAttribute('type');
                $type->value = $this->get_field_id( 'button-text' );
                $button->appendChild($type);

                $value = $doc->createAttribute('value');
                $value->value = $instance ['button-text'];
                $button->appendChild($value);

                $doc->appendChild($button);
                $doc->formatOutput = true;
                print $doc->saveHTML();
            }
        ?>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'buttons-padding' ); ?>">Buttons padding</label>
            <input class="widefat" id="buttons-padding<?php echo $this->get_field_id( 'buttons-padding' ); ?>"
                   name="<?php echo $this->get_field_name( 'buttons-padding' ); ?>" type="number"
                   value="<?php echo $instance['buttons-padding']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'class-for-button-container' ); ?>">Class for button container</label>
            <input class="widefat" id="class-for-button-container<?php $i = 1; $i++; ?>"
                   name="<?php echo $this->get_field_name( 'class-for-button-container' ); ?>" type="text"
                   value="<?php echo $instance['class-for-button-container']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button-class' ); ?>">Button class</label>
            <input class="widefat" id="button-class<?php $i = 1; $i++; ?>"
                   name="<?php echo $this->get_field_name( 'button-class' ); ?>" type="text"
                   value="<?php echo $instance['button-class']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button-color' ); ?>">Button color</label>
            <input class="widefat" id="button-color<?php $i = 1; $i++; ?>"
                   name="<?php echo $this->get_field_name( 'button-color' ); ?>" type="text"
                   value="<?php echo $instance['button-color']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text-color' ); ?>">Text color</label>
            <input class="widefat" id="text-color<?php $i = 1; $i++; ?>"
                   name="<?php echo $this->get_field_name( 'text-color' ); ?>" type="text"
                   value="<?php echo $instance['text-color']; ?>" />
        </p>

        <?php
    }

    public function background_color($instance) {
         $cursor = 'cursor: pointer;';
         $bg_color = 'background-color: ' . $instance['button-color'] . ';';
         $padding = 'padding: ' . $instance['buttons-padding'] . 'px;';
         $text_color = 'color: ' . $instance['text-color'] . ';';

         return  $result = $bg_color . $padding . $text_color . $cursor;
    }

    public function widget( $args, $instance ) {
        ?>
        <section class="widget button-widget">
            <div class="<?php echo $instance['class-for-button-container']; ?>">
                <?php
                 for ($index = 0; $index<$instance['buttons-number']; $index++)  {
                     $doc = new DOMDocument;

                     $button = $doc->createElement('button', $instance['button-text'.$index]);
                     $class = $doc->createAttribute('class');
                     $class->value = $instance['button-class'];
                     $button->appendChild($class);

                     $style = $doc->createAttribute('style');
                     $style->value = $this->background_color($instance);
                     $button->appendChild($style);

                     $doc->appendChild($button);
                     $doc->formatOutput = true;
                     print $doc->saveHTML();
                 }

                ?>
            </div>
        </section>

        <?php
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'my_Button_Widget' );
});