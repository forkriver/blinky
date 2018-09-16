# Blinky TODO

## List of social sites to connect with

| Site       | URL            | API Available? |
|------------|----------------|----------------|
| Facebook   | facebook.com   | Y              | 
| Twitter    | twitter.com    | Y              | 
| Instagram  | instagram.com  | Y              |
| Flickr     | flickr.com     | Y              | 
| Tumblr     | tumblr.com     | ?              | 
| WordPress  | wordpress.com  | Y              | 
| Deviant Art| deviantart.com | ?              | 
| Diaspora*  | diasp.org/     | ?              | 
| 500px      | 500px.com      | Y              | 

... This list is expected to grow.

## Structure of the plugin(s)

### Core plugin

* Provide an API (functions, hooks) for extension plugins
* "Bundled" plugins: Facebook, Twitter, Instagram
* Hooks:
	* Actions:
		* New post
		* Saved post
		* Deleted post
		* New image
		* Deleted image
	* Filters:
		* CMB Meta Boxes

### Add-on plugins

* Check for existence of `Blinky_Core` class on startup