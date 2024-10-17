<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Elementor Counter Widget Class
class Elementor_Counter_Widget extends \Elementor\Widget_Base {

    // Retrieve the widget name
    public function get_name() {
        return 'counter_widget';
    }

    // Retrieve the title displayed in the Elementor editor
    public function get_title() {
        return __('Counter Widget', 'counter-widget');
    }

    // Retrieve the icon displayed in the Elementor editor
    public function get_icon() {
        return 'eicon-counter';
    }

    // Specify the categories where this widget will appear
    public function get_categories() {
        return ['general'];
    }

    // Register the widget controls (input fields, settings, etc.)
    protected function _register_controls() {
        // Begin the Content section for controls
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Control for the header text
        $this->add_control(
            'header_text',
            [
                'label' => __('Header Text', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('', 'counter-widget'),
            ]
        );

        // Control for the subheader text
        $this->add_control(
            'subheader_text',
            [
                'label' => __('Subheader Text', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('', 'counter-widget'),
            ]
        );

        // Control for selecting an icon
        $this->add_control(
            'selected_icon',
            [
                'label' => __('Select Icon', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Control for the starting number
        $this->add_control(
            'start_number',
            [
                'label' => __('Start Number', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
    
        // Control for the ending number
        $this->add_control(
            'end_number',
            [
                'label' => __('End Number', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
            ]
        );

        // Control for the prefix text
        $this->add_control(
            'prefix',
            [
                'label' => __('Prefix', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        // Control for the suffix text
        $this->add_control(
            'suffix',
            [
                'label' => __('Suffix', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        // End the content section
        $this->end_controls_section();

                
        // Style Controls
        // Start Styles Section for Header
        $this->start_controls_section(
            'style_section_header',
            [
                'label' => __('Header Styles', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Header Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __('Header Typography', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-header',
            ]
        );

        // Control for selecting the header HTML tag
        $this->add_control(
            'header_tag',
            [
                'label' => __('Header Tag', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => __('H1', 'counter-widget'),
                    'h2' => __('H2', 'counter-widget'),
                    'h3' => __('H3', 'counter-widget'),
                    'h4' => __('H4', 'counter-widget'),
                    'h5' => __('H5', 'counter-widget'),
                    'h6' => __('H6', 'counter-widget'),
                    'div' => __('div', 'counter-widget'),
                    'p' => __('p', 'counter-widget'),
                ],
            ]
        );

        // Control for the header's background color
        $this->add_control(
            'header_background_color',
            [
                'label' => __('Header Background Color', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-header' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Header Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'header_border',
                'label' => __('Header Border', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-header',
            ]
        );

        // Control for header padding
        $this->add_responsive_control(
            'header_padding',
            [
                'label' => __('Header Padding', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Control for header margin
        $this->add_responsive_control(
            'header_margin',
            [
                'label' => __('Header Margin', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // End the styles section for header
        $this->end_controls_section();

        // Start Styles Section for Subheader
        $this->start_controls_section(
            'style_section_subheader',
            [
                'label' => __('Subheader Styles', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Subheader Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subheader_typography',
                'label' => __('Subheader Typography', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-subheader',
            ]
        );

        // Control for selecting the subheader HTML tag
        $this->add_control(
            'subheader_tag',
            [
                'label' => __('Subheader Tag', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => __('H1', 'counter-widget'),
                    'h2' => __('H2', 'counter-widget'),
                    'h3' => __('H3', 'counter-widget'),
                    'h4' => __('H4', 'counter-widget'),
                    'h5' => __('H5', 'counter-widget'),
                    'h6' => __('H6', 'counter-widget'),
                    'div' => __('div', 'counter-widget'),
                    'p' => __('p', 'counter-widget'),
                ],
            ]
        );

        // Control for the subheader's background color
        $this->add_control(
            'subheader_background_color',
            [
                'label' => __('Subheader Background Color', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-subheader' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Subheader Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'subheader_border',
                'label' => __('Subheader Border', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-subheader',
            ]
        );

        // Control for subheader padding
        $this->add_responsive_control(
            'subheader_padding',
            [
                'label' => __('Subheader Padding', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-subheader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Control for subheader margin
        $this->add_responsive_control(
            'subheader_margin',
            [
                'label' => __('Subheader Margin', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-subheader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // End the styles section for subheader
        $this->end_controls_section();

        // Start Styles Section for Number
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Number Styles', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Number Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => __('Number Typography', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-number',
            ]
        );

        $this->add_control(
            'number_tag',
            [
                'label' => __('Number H Tag', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => __('H1', 'counter-widget'),
                    'h2' => __('H2', 'counter-widget'),
                    'h3' => __('H3', 'counter-widget'),
                    'h4' => __('H4', 'counter-widget'),
                    'h5' => __('H5', 'counter-widget'),
                    'h6' => __('H6', 'counter-widget'),
                    'div' => __('div', 'counter-widget'),
                    'p' => __('p', 'counter-widget'),
                ],
            ]
        );

        // Control for the number's background color
        $this->add_control(
            'number_background_color',
            [
                'label' => __('Number Background Color', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-number' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Number Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'number_border',
                'label' => __('Number Border', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-number',
            ]
        );

        // Control for number padding
        $this->add_responsive_control(
            'number_padding',
            [
                'label' => __('Number Padding', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Control for number margin
        $this->add_responsive_control(
            'number_margin',
            [
                'label' => __('Number Margin', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Control for vertical alignment of the number
        $this->add_control(
            'number_vertical_alignment',
            [
                'label' => __('Number Vertical Alignment', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'middle',
                'options' => [
                    'top' => __('Top', 'counter-widget'),
                    'middle' => __('Middle', 'counter-widget'),
                    'bottom' => __('Bottom', 'counter-widget'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-number' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        // End the styles section for number
        $this->end_controls_section();

        // Start Styles Section for Icon
        $this->start_controls_section(
            'style_section_icon',
            [
                'label' => __('Icon Styles', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Control for setting the icon color
        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-icon i' => 'color: {{VALUE}}', // Apply color to font icons
                    '{{WRAPPER}} .counter-icon svg' => 'fill: {{VALUE}};', // Apply fill color to SVG icons
                ],
            ]
        );

        // Control for responsive icon size
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size (px)', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 24, // Default size for the icon
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};', // Set font size for font icons
                    '{{WRAPPER}} .counter-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', // Set width and height for SVG icons
                ],
            ]
        );

        // Control for setting the icon alignment (left, center, right)
        $this->add_control(
            'icon_alignment',
            [
                'label' => __('Icon Alignment', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'counter-widget'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'counter-widget'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'counter-widget'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center', // Default alignment
                'selectors' => [
                    '{{WRAPPER}} .counter-icon' => 'text-align: {{VALUE}};', // Apply text alignment
                ],
            ]
        );

        // End Styles Section for Icon
        $this->end_controls_section();

        // Start Styles Section for Prefix
        $this->start_controls_section(
            'style_section_prefix',
            [
                'label' => __('Prefix Styles', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography Controls for the Prefix
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'prefix_typography',
                'label' => __('Prefix Typography', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-prefix',
            ]
        );

        // Control for the prefix text color
        $this->add_control(
            'prefix_color',
            [
                'label' => __('Prefix Color', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-prefix' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Control for vertical alignment of the prefix
        $this->add_control(
            'prefix_vertical_alignment',
            [
                'label' => __('Prefix Vertical Alignment', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'middle',
                'options' => [
                    'top' => __('Top', 'counter-widget'),
                    'middle' => __('Middle', 'counter-widget'),
                    'bottom' => __('Bottom', 'counter-widget'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-prefix' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        // Control for prefix padding
        $this->add_responsive_control(
            'prefix_padding',
            [
                'label' => __('Prefix Padding', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-prefix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // End Styles Section for Prefix
        $this->end_controls_section();

        // Start Styles Section for Suffix
        $this->start_controls_section(
            'style_section_suffix',
            [
                'label' => __('Suffix Styles', 'counter-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography Controls for the Suffix
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'suffix_typography',
                'label' => __('Suffix Typography', 'counter-widget'),
                'selector' => '{{WRAPPER}} .counter-suffix',
            ]
        );

        // Control for the suffix text color
        $this->add_control(
            'suffix_color',
            [
                'label' => __('Suffix Color', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-suffix' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Control for vertical alignment of the suffix
        $this->add_control(
            'suffix_vertical_alignment',
            [
                'label' => __('Suffix Vertical Alignment', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'middle',
                'options' => [
                    'top' => __('Top', 'counter-widget'),
                    'middle' => __('Middle', 'counter-widget'),
                    'bottom' => __('Bottom', 'counter-widget'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-suffix' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        // Control for suffix padding
        $this->add_responsive_control(
            'suffix_padding',
            [
                'label' => __('Suffix Padding', 'counter-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-suffix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // End Styles Section for Suffix
        $this->end_controls_section();

        
    }
    
// Render the widget output on the frontend
protected function render() {
    $settings = $this->get_settings_for_display();

    // Retrieve and sanitize the starting and ending numbers
    $start_number = isset($settings['start_number']) ? intval($settings['start_number']) : 0;
    $end_number = isset($settings['end_number']) ? intval($settings['end_number']) : 100;

    // Get the selected icon, prefix, and suffix text
    $icon = isset($settings['selected_icon']) ? $settings['selected_icon'] : '';
    $prefix = isset($settings['prefix']) ? $settings['prefix'] : '';
    $suffix = isset($settings['suffix']) ? $settings['suffix'] : '';

    // Determine vertical alignment for prefix and suffix
    $alignment = isset($settings['prefix_suffix_alignment']) ? $settings['prefix_suffix_alignment'] : 'middle';

    // Retrieve icon color and size settings
    $icon_color = isset($settings['icon_color']) ? $settings['icon_color'] : '';
    $icon_size = isset($settings['icon_size']['size']) ? $settings['icon_size']['size'] : '24';

    // Retrieve header and subheader text and their tags
    $header_text = isset($settings['header_text']) ? $settings['header_text'] : '';
    $subheader_text = isset($settings['subheader_text']) ? $settings['subheader_text'] : '';
    $header_tag = isset($settings['header_tag']) ? $settings['header_tag'] : 'h1';
    $subheader_tag = isset($settings['subheader_tag']) ? $settings['subheader_tag'] : 'h2';

    ?>
    <div class="screen">

        <<?php echo esc_html($header_tag); ?> class="counter-header">
            <?=$header_text; ?>
        </<?php echo esc_html($header_tag); ?>>

        <<?php echo esc_html($subheader_tag); ?> class="counter-subheader">
            <?=$subheader_text;?>
        </<?php echo esc_html($subheader_tag); ?>>

        <?php if (!empty($icon)) : ?>
            <div class="counter-icon centered" style="color: <?=$icon_color;?>; font-size: <?=$icon_size;?>px;">
                <?php \Elementor\Icons_Manager::render_icon($icon, ['aria-hidden' => 'true']); ?>
            </div>
        <?php endif; ?>

        <div class="counter-wrapper">
            <div class="counter-prefix" style="vertical-align: <?=$alignment;?>;">
                <?=$prefix;?>
            </div>
            <div class="odometer centered counter-number" data-value="<?=$start_number;?>">
                <?=$start_number;?>
            </div>
            <div class="counter-suffix" style="vertical-align: <?=$alignment;?>;">
                <?php echo esc_html($suffix); ?>
            </div>
        </div>
    </div>
                
    <script>
    // Initialize the odometer when the window loads
    window.onload = 
        setTimeout(function() {
            const odometerElements = document.querySelectorAll('.odometer');
            odometerElements.forEach((element) => {
                const targetValue = <?=$end_number;?>;
                const odometer = new Odometer({
                    el: element,
                    value: <?=$start_number;?>,
                    duration: 50, // Duration for the animation
                });
                odometer.update(targetValue); // Update the odometer to the target value
            });
        }, 150);
    </script>

    <?php
        }  
}
