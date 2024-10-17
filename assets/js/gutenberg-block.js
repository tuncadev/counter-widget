const { registerBlockType } = wp.blocks;
const { TextControl, RangeControl, PanelBody, PanelRow, SelectControl, ColorPalette } = wp.components;
const { useBlockProps, MediaUpload, InspectorControls } = wp.blockEditor;

registerBlockType('counter-widget/block', {
    title: 'Counter Widget',
    icon: 'clock',
    category: 'widgets',
    attributes: {
        startNumber: { type: 'number', default: 0 },
        endNumber: { type: 'number', default: 100 },

        subheaderText: { type: 'string', default: 'Subheader Text' },
        prefix: { type: 'string', default: '' },
        prefixColor: { type: 'string', default: '#000000' },
        suffix: { type: 'string', default: '' },
        suffixColor: { type: 'string', default: '#000000' },
        numberTag: { type: 'string', default: 'div' }, 
        numberBackgroundColor: { type: 'string', default: '#fff' },
        numberColor: { type: 'string', default: '#000000' }, // Number color
        numberPaddingTop: { type: 'number', default: 0 }, 
        numberPaddingRight: { type: 'number', default: 0 },
        numberPaddingBottom: { type: 'number', default: 0 }, 
        numberPaddingLeft: { type: 'number', default: 0 },
        numberBorder: { type: 'string', default: 'none' }, 
        numberBorderRadius: { type: 'number', default: 0 }, 

        headerText: { type: 'string', default: 'Header Text' },
        headerTag: { type: 'string', default: 'h1' },

        headerColor: { type: 'string', default: '#000000' }, 
        headerBackgroundColor: { type: 'string', default: '#fff' },
        headerPaddingTop: { type: 'number', default: 0 }, 
        headerPaddingRight: { type: 'number', default: 0 }, 
        headerPaddingBottom: { type: 'number', default: 0 }, 
        headerPaddingLeft: { type: 'number', default: 0 },
        headerBorder: { type: 'string', default: 'none' }, 
        headerBorderRadius: { type: 'number', default: 0 },

        subheaderColor: { type: 'string', default: '#000000' },
        subheaderBackgroundColor: { type: 'string', default: '#fff' },
        subheaderPaddingTop: { type: 'number', default: 0 }, 
        subheaderPaddingRight: { type: 'number', default: 0 }, 
        subheaderPaddingBottom: { type: 'number', default: 0 }, 
        subheaderPaddingLeft: { type: 'number', default: 0 },
        subheaderBorder: { type: 'string', default: 'none' }, 
        subheaderBorderRadius: { type: 'number', default: 0 },

        iconUrl: { type: 'string', default: '' }, 
        iconAlt: { type: 'string', default: 'counter icon' }, 
        iconSize: { type: 'number', default: 60 },


    },
    edit: ({ attributes, setAttributes }) => {
        const blockProps = useBlockProps();

        // Default WordPress logo URL
        const defaultIconUrl = 'https://s.w.org/about/images/logos/wordpress-logo-notext-rgb.png';

        return wp.element.createElement(
            'div',
            { ...blockProps },
            wp.element.createElement(InspectorControls, null,
                wp.element.createElement(PanelBody, { title: 'Header Settings' },
                    wp.element.createElement(PanelBody, { title: 'Header Typography' },
                        wp.element.createElement(SelectControl, {
                            label: 'Header Tag',
                            value: attributes.headerTag,
                            options: [
                                { label: 'h1', value: 'h1' },
                                { label: 'h2', value: 'h2' },
                                { label: 'h3', value: 'h3' },
                                { label: 'h4', value: 'h4' },
                                { label: 'h5', value: 'h5' },
                                { label: 'h6', value: 'h6' },
                                { label: 'div', value: 'div' },
                                { label: 'p', value: 'p' },
                            ],
                            onChange: (value) => setAttributes({ headerTag: value })
                        }),
                        wp.element.createElement(ColorPalette, {
                            label: 'Text Color',
                            value: attributes.headerColor,
                            onChange: (value) => setAttributes({ headerColor: value }),
                        }),
                        wp.element.createElement(ColorPalette, {
                            label: 'Background Color',
                            value: attributes.headerBackgroundColor,
                            onChange: (value) => setAttributes({ headerBackgroundColor: value }),
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Header Padding' },
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Top',
                            value: attributes.headerPaddingTop,
                            onChange: (value) => setAttributes({ headerPaddingTop: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Right',
                            value: attributes.headerPaddingRight,
                            onChange: (value) => setAttributes({ headerPaddingRight: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Bottom',
                            value: attributes.headerPaddingBottom,
                            onChange: (value) => setAttributes({ headerPaddingBottom: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Left',
                            value: attributes.headerPaddingLeft,
                            onChange: (value) => setAttributes({ headerPaddingLeft: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Header Border & Radius' },
                        wp.element.createElement(TextControl, {
                            label: 'Border',
                            value: attributes.headerBorder,
                            onChange: (value) => setAttributes({ headerBorder: value }),
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Border Radius',
                            value: attributes.headerBorderRadius,
                            onChange: (value) => setAttributes({ headerBorderRadius: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                ),
                wp.element.createElement(PanelBody, { title: 'Subheader Settings' },
                    wp.element.createElement(PanelBody, { title: 'Subheader Typography' },
                        wp.element.createElement(ColorPalette, {
                            label: 'Text Color',
                            value: attributes.subheaderColor,
                            onChange: (value) => setAttributes({ subheaderColor: value }),
                        }),
                        wp.element.createElement(ColorPalette, {
                            label: 'Background Color',
                            value: attributes.subheaderBackgroundColor,
                            onChange: (value) => setAttributes({ subheaderBackgroundColor: value }),
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Subheader Padding' },
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Top',
                            value: attributes.subheaderPaddingTop,
                            onChange: (value) => setAttributes({ subheaderPaddingTop: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Right',
                            value: attributes.subheaderPaddingRight,
                            onChange: (value) => setAttributes({ subheaderPaddingRight: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Bottom',
                            value: attributes.subheaderPaddingBottom,
                            onChange: (value) => setAttributes({ subheaderPaddingBottom: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Left',
                            value: attributes.subheaderPaddingLeft,
                            onChange: (value) => setAttributes({ subheaderPaddingLeft: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Subheader Border & Radius' },
                        wp.element.createElement(TextControl, {
                            label: 'Border',
                            value: attributes.subheaderBorder,
                            onChange: (value) => setAttributes({ subheaderBorder: value }),
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Border Radius',
                            value: attributes.subheaderBorderRadius,
                            onChange: (value) => setAttributes({ subheaderBorderRadius: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                ),
                wp.element.createElement(PanelBody, { title: 'Counter Settings' },
                    wp.element.createElement(SelectControl, {
                        label: 'Number Tag',
                        value: attributes.numberTag,
                        options: [
                            { label: 'h1', value: 'h1' },
                            { label: 'h2', value: 'h2' },
                            { label: 'h3', value: 'h3' },
                            { label: 'h4', value: 'h4' },
                            { label: 'h5', value: 'h5' },
                            { label: 'h6', value: 'h6' },
                            { label: 'div', value: 'div' },
                            { label: 'p', value: 'p' },
                        ],
                        onChange: (value) => setAttributes({ numberTag: value })
                    }),
                    wp.element.createElement(PanelRow, {},
                        wp.element.createElement('label', { style: { marginRight: '10px' } }, 'Counter Color'),
                    ),
                    wp.element.createElement(ColorPalette, {
                        label: 'Text Color',
                        value: attributes.numberColor,
                        onChange: (value) => setAttributes({ numberColor: value }),
                    }),
                    wp.element.createElement(PanelRow, {},
                        wp.element.createElement('label', { style: { marginRight: '10px' } }, 'Counter Background'),
                    ),
                    wp.element.createElement(ColorPalette, {
                        label: 'Background Color',
                        value: attributes.numberBackgroundColor,
                        onChange: (value) => setAttributes({ numberBackgroundColor: value }),
                    }),
                    wp.element.createElement(PanelBody, { title: 'Counter Number Alignment' },
                        wp.element.createElement(SelectControl, {
                            label: 'Counter Vertical Alignment',
                            value: attributes.numberVerticalAlign,
                            options: [
                                { label: 'Top', value: 'top' },
                                { label: 'Middle', value: 'middle' },
                                { label: 'Bottom', value: 'bottom' },
                            ],
                            onChange: (value) => setAttributes({ numberVerticalAlign: value })
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Counter Padding' },
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Top',
                            value: attributes.numberPaddingTop,
                            onChange: (value) => setAttributes({ numberPaddingTop: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Right',
                            value: attributes.numberPaddingRight,
                            onChange: (value) => setAttributes({ numberPaddingRight: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Bottom',
                            value: attributes.numberPaddingBottom,
                            onChange: (value) => setAttributes({ numberPaddingBottom: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Padding Left',
                            value: attributes.numberPaddingLeft,
                            onChange: (value) => setAttributes({ numberPaddingLeft: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Counter Margin' },
                        wp.element.createElement(RangeControl, {
                            label: 'Margin Top',
                            value: attributes.numberMarginTop,
                            onChange: (value) => setAttributes({ numberMarginTop: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Margin Right',
                            value: attributes.numberMarginRight,
                            onChange: (value) => setAttributes({ numberMarginRight: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Margin Bottom',
                            value: attributes.numberMarginBottom,
                            onChange: (value) => setAttributes({ numberMarginBottom: value }),
                            min: 0,
                            max: 100,
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Margin Left',
                            value: attributes.numberMarginLeft,
                            onChange: (value) => setAttributes({ numberMarginLeft: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                    wp.element.createElement(PanelBody, { title: 'Counter Border & Radius' },
                        wp.element.createElement(TextControl, {
                            label: 'Border',
                            value: attributes.numberBorder,
                            onChange: (value) => setAttributes({ numberBorder: value }),
                        }),
                        wp.element.createElement(RangeControl, {
                            label: 'Border Radius',
                            value: attributes.numberBorderRadius,
                            onChange: (value) => setAttributes({ numberBorderRadius: value }),
                            min: 0,
                            max: 100,
                        }),
                    ),
                ),
                wp.element.createElement(PanelBody, { title: 'Prefix Styles' },
                    wp.element.createElement(PanelRow, {},
                        wp.element.createElement('label', { style: { marginRight: '10px' } }, 'Prefix Color'),
                    ),
                    wp.element.createElement(ColorPalette, {
                        label: 'Prefix Color',
                        value: attributes.prefixColor,
                        onChange: (value) => {
                           
                            setAttributes({ prefixColor: value });
                        } 
                    }),
                    wp.element.createElement(SelectControl, {
                        label: 'Prefix Vertical Alignment',
                        value: attributes.prefixVerticalAlign,
                        options: [
                            { label: 'Top', value: 'top' },
                            { label: 'Middle', value: 'middle' },
                            { label: 'Bottom', value: 'bottom' },
                        ],
                        onChange: (value) => setAttributes({ prefixVerticalAlign: value })
                    }),
                ),
                wp.element.createElement(PanelBody, { title: 'Suffix Styles' },
                    wp.element.createElement(PanelRow, {},
                        wp.element.createElement('label', { style: { marginRight: '10px' } }, 'Suffix Color'),
                    ),
                    wp.element.createElement(ColorPalette, {
                        label: 'Suffix Color',
                        value: attributes.suffixColor,
                        onChange: (value) => setAttributes({ suffixColor: value }),
                    }),
                    wp.element.createElement(SelectControl, {
                        label: 'Suffix Vertical Alignment',
                        value: attributes.suffixVerticalAlign,
                        options: [
                            { label: 'Top', value: 'top' },
                            { label: 'Middle', value: 'middle' },
                            { label: 'Bottom', value: 'bottom' },
                        ],
                        onChange: (value) => setAttributes({ suffixVerticalAlign: value })
                    }),
                ),
                wp.element.createElement(PanelBody, { title: 'Icon Settings' },
                    wp.element.createElement(MediaUpload, {
                        label: 'Icon',
                        onSelect: (media) => setAttributes({ iconUrl: media.url }),
                        type: 'image',
                        value: attributes.iconUrl,
                        render: ({ open }) => wp.element.createElement(
                            'img',
                            { src: attributes.iconUrl || defaultIconUrl, onClick: open, style: { width: attributes.iconSize + 'px' } }
                        ),
                    }),
                    wp.element.createElement(RangeControl, {
                        label: 'Icon Size',
                        value: attributes.iconSize,
                        onChange: (value) => setAttributes({ iconSize: value }),
                        min: 10,
                        max: 500
                    })
                )
            ),
            // Displaying the icon
            wp.element.createElement('img', {
                src: attributes.iconUrl || defaultIconUrl,
                alt: attributes.iconAlt || 'Default WordPress Icon',
                style: { width: attributes.iconSize + 'px' },
            }),
            // Header and subheader text
            wp.element.createElement(TextControl, {
                label: 'Header Text',
                value: attributes.headerText,
                onChange: (value) => setAttributes({ headerText: value }),
            }),
            wp.element.createElement(TextControl, {
                label: 'Subheader Text',
                value: attributes.subheaderText,
                onChange: (value) => setAttributes({ subheaderText: value }),
            }),
            // Number, prefix, and suffix controls
            wp.element.createElement(RangeControl, {
                label: 'Start Number',
                value: attributes.startNumber,
                onChange: (value) => setAttributes({ startNumber: value }),
                min: 0,
                max: 1000,
            }),
            wp.element.createElement(RangeControl, {
                label: 'End Number',
                value: attributes.endNumber,
                onChange: (value) => setAttributes({ endNumber: value }),
                min: 0,
                max: 1000,
            }),
            wp.element.createElement(TextControl, {
                label: 'Prefix',
                value: attributes.prefix,
                onChange: (value) => setAttributes({ prefix: value }),
            }),
            wp.element.createElement(TextControl, {
                label: 'Suffix',
                value: attributes.suffix,
                onChange: (value) => setAttributes({ suffix: value }),
            })
        );
    },
    save: ({attributes}) => {
        
        // Server-rendered block, so leave this empty
        return null;
    },
});
