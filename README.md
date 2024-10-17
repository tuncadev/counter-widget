# Counter Widget Plugin

## Overview

This plugin adds a **Counter Widget** to both **Elementor** and **Gutenberg** (WordPress block editor) with customizable options for start and end numbers, prefixes, suffixes, vertical alignment, icon selection, headers, and more. It also features animated number transitions using [Odometer.js](https://cdnjs.com/libraries/odometer.js/0.4.8), which only loads styles and scripts when the widget is present on the page.

## Features

- **Start and End Number**: Set a starting and ending number for the counter.
- **Prefix and Suffix**: Add a prefix and/or suffix with vertical alignment options (top, middle, bottom) relative to the number.
- **Icon Selection**: Choose an icon to display above the number.
- **Headers and Subheaders**: Add custom headers and subheaders with customizable tags (h1-h6, div, p).
- **Customizable Styling**: Separate styling options for the icon, number, header, and subheader, including:
  - Background color
  - Text color
  - Border, border-radius
  - Padding and margin
- **Vertical Alignment**: Align the prefix, suffix, and number vertically (top, middle, bottom).
- **Animated Number Transition**: The counter uses [Odometer.js](https://cdnjs.com/libraries/odometer.js/0.4.8) for smooth number animation.
- **Optimized Loading**: Styles and scripts are loaded only when the widget/block is present on the page.

## Installation

1. Download the `counter-widget.zip` file.
2. In your WordPress Dashboard, go to **Plugins > Add New**.
3. Click **Upload Plugin**, select the `counter-widget.zip`, and click **Install Now**.
4. After installation, click **Activate** to enable the plugin.

## How to Use

### In Gutenberg (Block Editor)

1. Create or edit a page/post in the Gutenberg editor.
2. Add a new block and search for **Counter Widget**.
3. Configure the widget using the provided controls in the right panel, including setting the start/end number, prefix/suffix, and styles for each element.

### In Elementor

1. Create or edit a page using Elementor.
2. Add the **Counter Widget** element from the Elementor panel.
3. Customize the start/end number, prefix/suffix, icon, and styles as needed.

## Requirements

- WordPress 5.0 or higher
- Elementor (optional, for Elementor users)
- Gutenberg (WordPress block editor)

## Task Description

Developed a standalone plugin that adds a Counter widget to Elementor and Gutenberg with the following requirements:

1. Set start and end numbers.
2. Set prefix and suffix with vertical alignment options (top, middle, bottom).
3. Icon selection above the number.
4. Custom text for header and subheader.
5. Tag selection (h1-h6, div, p) for number and header.
6. Separate styling options for icon, number, header, and subheader (background, color, border, border-radius, padding, margin).
7. Animated number transitions using Odometer.js with default styling.
8. Styles and scripts are only loaded if the widget/block is present on the page.

Example of the expected output: [Gyazo Example](https://gyazo.com/65374bb0393558d5ff2fa56abf505abb)

## Libraries Used

- [Odometer.js](https://cdnjs.com/libraries/odometer.js/0.4.8) for animated number transitions.

## License

This plugin is open-source and freely distributable.
