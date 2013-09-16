=== WordPress Snap ===

Contributors: Valentin Brandt
Plugin Name: WordPress Snap
Plugin URI: http://www.geekeries.fr/snippet/creer-automatiquement-miniatures-sites-wordpress/
Tags: snap, thumbnails, snapshot, tinymce
Author URI: http://www.geekeries.fr/
Donate link: http://www.geekeries.fr/contribuer/faire-don/
Author: Valentin Brandt
Requires at least: 3.0
Tested up to: 3.3
Stable tag: trunk

WordPress Snap is a simple shortcode for display a thumbnail from any website.

== Description ==

WordPress Snap is a simple shortcode for display a thumbnail from any website. This plugin uses the WordPress.com service to generate a website preview thumbnail.

The orignal `shortcode` created by Valentin Brandt on [WordPress Geekeries](http://www.geekeries.fr "wordpress").

* Use pointers in WordPress 3.3 
* Quicktag Button in HTML Editor
* CSS3 Effect (View `Installation` tab)

== Installation ==

It is very easy. Upload plugin to the plugins directory and activate.

Use
[snap url="http://www.geekeries.fr/" alt="My image" w="400" h="300"] to display a thumbnail of any website

With link, use this shortcode
[snap url="http://www.geekeries.fr/" alt="My image" w="400" h="300" link="on" title="My Title"]

To change the attribute `class`, specify your class.
[snap url="http://www.geekeries.fr/" alt="My image" w="400" h="300" link="on" title="My Title" class="my_class"] 

For a great CSS3 effect. Add this snippet on your CSS files.

`img.snap {
	padding: 0!important;
	border: 1px solid #ccc!important;
	transition:.2s ease-in-out; -webkit-transition:.2s ease-in-out; -moz-transition:.2s ease-in-out;
	-webkit-box-shadow:2px 5px 15px #bbb; -moz-box-shadow:2px 5px 15px #bbb; box-shadow:2px 5px 15px #bbb;
}
a img.snap:hover  {
	-webkit-box-shadow:0px 0px 10px #bbb; -moz-box-shadow:0px 0px 10px #bbb; box-shadow:0px 0px 10px #bbb;
}
a img.snap:active  {
	-webkit-box-shadow: 0px 0px 0px #bbb; -moz-box-shadow:0px 0px 0px #bbb; box-shadow:0px 0px 0px #bbb;
}`


For more info go to the <a href="http://www.geekeries.fr/snippet/creer-automatiquement-miniatures-sites-wordpress/">WordPress Snap</a>'s page.

== Screenshots ==

1. Easy :) - Add your thumbnail.
2. WordPress Geekeries Snap

== Changelog ==

= 2.1.1 =
* Fix ! : Work with WordPress 3.3 and 3.2

= 2.1 =
* Compatible WordPress 3.3 
* Use pointers in WordPress 3.3 

= 2.0.1 =
* Fix bug 

= 2.0 =
* NEW : Easy ! Add your thumbnail with TinyMCE Window 
* Add a `target=""` attribute. For add a target on your link. 
* Add a `rel=""` attribute. For add a rel on your link. 


= 1.3.3 =
* Added a Quicktag Button in HTML editor `Add WordPress Snap`. Use `CTRL+ALT+S` for adding snap (HTML editor) 

= 1.3.2 =

* Add a `class=""` attribute. For add a class on your thumbnail. 
* Some code changes (add link)

= 1.3.1 =

* Fix: Dynamic path- Thanks Julio POTIER on <a href="http://blog.boiteaweb.fr/">Sécurité Web</a>

= 1.3 =
* Add a `title="My Title"` attribute. For add a title on your link. 
* Add a `link="on"` attribute. For add a link on your thumbnail. 

= 1.2 =
* Add TinyMCE Button. Easy to use :)
* Icon by `Randy Jensen` http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/

= 1.1 =
* Update

= 1.0 =
* First version
* [Uploaded August 15, 2011]

Thanks to all who sent bug reports and ideas for
improvements.