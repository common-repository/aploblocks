=== Aploblocks - Styling and Patterns for the block editor ===
Contributors: AploWeb
Tags: gutenberg, block editor, layouts, sticky header, patterns
Requires at least: 6.1
Tested up to: 6.4
Requires PHP: 7.4
Stable tag: 1.0.2
License: GPL-v2-or-later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Aploblocks adds extra design features to the core wordpress blocks.  It is designed for block themes and helps you achieve incredible designs with very little effort.  If you know how to use the block editor then you will know how to use AploBlocks.  Don't know CSS very well or want to speed up your development?  This plugin is ideal for you!

The growing library of patterns can be added straight in to your design to help you quickly start building beautiful sites.

Some of the features below give you an indication of just what you can achieve with absolutely no coding experience.

* **Pattern inserter -  Add ready made patterns straight in to your design.
* **Entrance Animations:** 18 (and growing) options for on-scroll animations with custom speed and delay settings
* **Sticky Header:** Make your header template part sticky with the option to hide on scroll.
* **Block Styles:** New styles to display cover block content on hover.
* **Filters:** Change images to how you want them to look, options for blur, brightness, contrast, opacity, hue & saturation.  Configure a filter to be added or removed on hover.
* **Shadow Filter:** Customise the offset, blur, opacity & colour of a blocks shadow.  Options to add or remove on hover.
* **Transforms:** Rotate, scale & move blocks.  Transforms can also be added or remove on hover.
* **Masks:** Choose from a range of polygon or image masks to shape the block how you want it and then customise to suit your needs.

Filters for a group block can be added as a backdrop filter if you want to apply the filter to the background.  With a gallery block you can quickly apply filters to all images in the block or even make the filter apply to images that are not hovered over.

Aploblocks is designed to simply plug in to any standard block theme and enhance the core blocks.  If you want to modify an existing block theme with the features above then you can get started in minutes!

Find more information [here](https://aploweb.com/aploblocks-plugin/)!

**Basic Usage:** After installation the Aploblocks plugin sidebar will be available in the top right of the editor.
 From here you can choose to insert patterns.  When a block is selected in the editor extra Panels in the block settings will be available to 
 configure the animations, filters, masks etc for the block.  The General settings panel in the block editor gives a number of configuration options
 including mobile options for blocks.

== Installation ==

This plugin can be installed directly from your site.

From the dashboard go the plugins section and add a new plugin.  Either search for the plugin or upload it if you have already downloaded it.  Install & activate the plugin and you are good to go

== Screenshots ==

1. Block masking
2. Shadow filter
3. Masking & negative margins
4. Scale & rotate transforms
5. Card pullout on hover
6. Gallery with switch option

== Changelog ==

= 1.02 - 23 February 2024 =
* Fix - Allow overflow on cover block
* Fix - Formatting of range controls in editor

= 1.0.1 - 10 April 2023 = 
* Fix - z-index wasn't set on sticky header!

= 1.0 - 08 April 2023 =
* added - pattern inserter will indicate if a theme colour isn't set
* fix, only load patterns when pattern modal opened
* added social links to supported blocks

= 0.9.5 - 04 April 2023 =
* removed pattern group from plugin code as this is theme specific
* added extra polygon clip options
* added extra rotate and perspective transforms
* added remove clip on mobile option
* added extra entrance animations
* added color to shadow filter
* added image mask panel & remove mask mobile option
* added reverse column stack option
* added pattern inserter functionality
* added unit selection to pull styles (breaking change - blocks will need to be updated on backend)
* changed transforms/filters on media&text to now target media rather than whole block (potentially breaking)
* added sticky header functionality
* added registered styles - image caption, cover hover, navigation underline, sticky column, separator styles, sticky header

= 0.8.6 - 12 February 2023 =
* Added version constant
* Removed console logging

= 0.8.5 - 11 February 2023 =
* Initial release
