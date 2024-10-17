<?php
class Gutenberg_Counter_Widget {
    
    public function __construct() {
        add_action('init', [$this->register_block()]);
        add_action('enqueue_block_assets', [$this, 'enqueue_assets']); // For frontend assets
    }

    // Register the block
    public function register_block() {
        register_block_type('counter-widget/block', [
            'attributes' => [

            'prefix' => ['type' => 'string', 'default' => ''],
            // Prefix and suffix colors
            'prefixColor' => ['type' => 'string', 'default' => '#000000'],
            'prefixVerticalAlign' => ['type' => 'string', 'default' => 'middle'], // 'top', 'middle', 'bottom'

            'suffixColor' => ['type' => 'string', 'default' => '#000000'],
            'suffix' => ['type' => 'string', 'default' => ''],
            'suffixVerticalAlign' => ['type' => 'string', 'default' => 'middle'], // 'top', 'middle', 'bottom'

            

            'iconUrl' => ['type' => 'string', 'default' => ''],
            'iconAlt' => ['type' => 'string', 'default' => 'counter icon'],
            'iconSize' => ['type' => 'number', 'default' => 60],

            
            

            // Header styles
            'headerText' => ['type' => 'string', 'default' => 'Header Text'],
            'headerTag' => ['type' => 'string', 'default' => 'h1'],
            'headerColor' => ['type' => 'string', 'default' => '#000000'],
            'headerBackgroundColor' => ['type' => 'string', 'default' => '#ffffff'],
            'headerPaddingTop' => ['type' => 'number', 'default' => 0],
            'headerPaddingRight' => ['type' => 'number', 'default' => 0],
            'headerPaddingBottom' => ['type' => 'number', 'default' => 0],
            'headerPaddingLeft' => ['type' => 'number', 'default' => 0],
            'headerBorder' => ['type' => 'string', 'default' => 'none'],
            'headerBorderRadius' => ['type' => 'number', 'default' => 0],

            // Subheader styles
            'subheaderText' => ['type' => 'string', 'default' => 'Subheader Text'],
            'subheaderColor' => ['type' => 'string', 'default' => '#000000'],
            'subheaderBackgroundColor' => ['type' => 'string', 'default' => '#ffffff'],
            'subheaderPaddingTop' => ['type' => 'number', 'default' => 0],
            'subheaderPaddingRight' => ['type' => 'number', 'default' => 0],
            'subheaderPaddingBottom' => ['type' => 'number', 'default' => 0],
            'subheaderPaddingLeft' => ['type' => 'number', 'default' => 0],
            'subheaderBorder' => ['type' => 'string', 'default' => 'none'],
            'subheaderBorderRadius' => ['type' => 'number', 'default' => 0],

            // Number styles
            'startNumber' => ['type' => 'number', 'default' => 0],
            'endNumber' => ['type' => 'number', 'default' => 100],
            'numberColor' => ['type' => 'string', 'default' => '#000000'],
            'numberTag' => ['type' => 'string', 'default' => 'div'],
            'numberBackgroundColor' => ['type' => 'string', 'default' => '#ffffff'],
            'numberPaddingTop' => ['type' => 'number', 'default' => 0],
            'numberPaddingRight' => ['type' => 'number', 'default' => 0],
            'numberPaddingBottom' => ['type' => 'number', 'default' => 0],
            'numberPaddingLeft' => ['type' => 'number', 'default' => 0],
            'numberBorder' => ['type' => 'string', 'default' => 'none'],
            'numberBorderRadius' => ['type' => 'number', 'default' => 0],
            'numberVerticalAlign' => ['type' => 'string', 'default' => 'middle'], // 'top', 'middle', 'bottom'
            
            ],
            'render_callback' => [$this, 'render_block'], // Server-rendered block
        ]);
    }

    // Render the block in PHP
    public function render_block($attributes) {
        $headerPaddingTop = esc_attr($attributes['headerPaddingTop']) . 'px';
        $headerPaddingRight = esc_attr($attributes['headerPaddingRight']) . 'px';
        $headerPaddingBottom = esc_attr($attributes['headerPaddingBottom']) . 'px';
        $headerPaddingLeft = esc_attr($attributes['headerPaddingLeft']) . 'px';
    
        $subheaderPaddingTop = esc_attr($attributes['subheaderPaddingTop']) . 'px';
        $subheaderPaddingRight = esc_attr($attributes['subheaderPaddingRight']) . 'px';
        $subheaderPaddingBottom = esc_attr($attributes['subheaderPaddingBottom']) . 'px';
        $subheaderPaddingLeft = esc_attr($attributes['subheaderPaddingLeft']) . 'px';
    
        $numberPaddingTop = esc_attr($attributes['numberPaddingTop']) . 'px';
        $numberPaddingRight = esc_attr($attributes['numberPaddingRight']) . 'px';
        $numberPaddingBottom = esc_attr($attributes['numberPaddingBottom']) . 'px';
        $numberPaddingLeft = esc_attr($attributes['numberPaddingLeft']) . 'px';
    
        

        // Header styles
        $header_styles = sprintf(
            '.counter-header { color: %s; background-color: %s; padding: %s %s %s %s; border: %s; border-radius: %s; }',
            esc_attr($attributes['headerColor']),
            esc_attr($attributes['headerBackgroundColor']),
            $headerPaddingTop,
            $headerPaddingRight,
            $headerPaddingBottom,
            $headerPaddingLeft,
            esc_attr($attributes['headerBorder']),
            esc_attr($attributes['headerBorderRadius']) . 'px'
        );

        // Subheader styles
        $subheader_styles = sprintf(
            '.counter-subheader { color: %s; background-color: %s; padding: %s %s %s %s; border: %s; border-radius: %s; }',
            esc_attr($attributes['subheaderColor']),
            esc_attr($attributes['subheaderBackgroundColor']),
            $subheaderPaddingTop,
            $subheaderPaddingRight,
            $subheaderPaddingBottom,
            $subheaderPaddingLeft,
            esc_attr($attributes['subheaderBorder']),
            esc_attr($attributes['subheaderBorderRadius']) . 'px'
        );

        // Number styles
        $number_styles = sprintf(
            '.odometer { vertical-align: %s; color: %s; background-color: %s; padding: %s %s %s %s; border: %s; border-radius: %s; }',
            esc_attr($attributes['numberVerticalAlign']),
            esc_attr($attributes['numberColor']),
            esc_attr($attributes['numberBackgroundColor']),
            $numberPaddingTop,
            $numberPaddingRight,
            $numberPaddingBottom,
            $numberPaddingLeft,
            esc_attr($attributes['numberBorder']),
            esc_attr($attributes['numberBorderRadius']) . 'px'
        );

        $prefix_styles = sprintf(
            '.counter-prefix { vertical-align: %s; color: %s; }',
            esc_attr($attributes['prefixVerticalAlign']),
            esc_attr($attributes['prefixColor']),            
        );
        $suffix_styles = sprintf(
            '.counter-suffix { vertical-align: %s; color: %s; }',
            esc_attr($attributes['suffixVerticalAlign']),
            esc_attr($attributes['suffixColor']),
        );

        // Enqueue the generated dynamic styles
        add_action('wp_enqueue_scripts', function() use ($header_styles, $subheader_styles, $number_styles, $prefix_styles, $suffix_styles) {
            wp_add_inline_style('counter-widget-editor-style', $header_styles);
            wp_add_inline_style('counter-widget-editor-style', $subheader_styles);
            wp_add_inline_style('counter-widget-editor-style', $number_styles);
            wp_add_inline_style('counter-widget-editor-style', $prefix_styles);
            wp_add_inline_style('counter-widget-editor-style', $suffix_styles);
        });
        
       
        ob_start(); 
        ?>
        <div class="counter-widget">
        <div class="counter-header">
            <<?php echo esc_html($attributes['headerTag']); ?>>
                <?php echo esc_html($attributes['headerText']); ?>
            </<?php echo esc_html($attributes['headerTag']); ?>>
        </div>
        <div class="counter-subheader">
            <div>
                <?php echo esc_html($attributes['subheaderText']); ?>
            </div>
        </div>
        <div class="counter-icon">
            <img src="<?php echo esc_url($attributes['iconUrl']); ?>" alt="<?php echo esc_attr($attributes['iconAlt']); ?>" style="width: <?php echo intval($attributes['iconSize']); ?>px;">
        </div>
        <div class="counter-wrapper">
            <div class="counter-prefix">
                <div>
                    <?php echo esc_html($attributes['prefix']); ?>
                </div>
            </div>
            <<?php echo esc_html($attributes['numberTag']); ?> id="odometer" class="odometer" style="color: <?= esc_attr($attributes['numberColor']); ?>;" data-value="<?php echo intval($attributes['startNumber']); ?>">
                <?php echo intval($attributes['startNumber']); ?>
            </<?php echo esc_html($attributes['numberTag']); ?>>
            <div class="counter-suffix">
                <div>
                    <?php echo esc_html($attributes['suffix']); ?>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                const odometer = document.getElementById('odometer');
                if (odometer) {
                    odometer.innerHTML = '<?php echo intval($attributes['endNumber']); ?>';
                }
            }, 1000);
        </script>
    </div>
        <?php
        return ob_get_clean();
    }

    // Enqueue block frontend assets
    public function enqueue_assets() {
        if (!is_admin()) {
            wp_enqueue_script(
                'odometer-js',
                'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js',
                array(),
                '0.4.8',
                true
            );
            wp_enqueue_style(
                'odometer-theme-default',
                'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css',
                array(),
                '0.4.8'
            );
            // Enqueue the block editor styles
            wp_enqueue_style(
                'counter-widget-editor-style',
                plugin_dir_url(__FILE__) . '../assets/css/gutenberg-block.css',
            );
        }
    }
}
