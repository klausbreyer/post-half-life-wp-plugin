# Post-Half-Life

Copyright (C) 2014 Klaus Breyer

* Author: Klaus Breyer <kb@klaus-breyer.de>
* Keywords: statistics, posts, multilingual, thumbnails, social, traffic, peak
* URL: <http://klaus-breyer.de/projekte/post-half-life/>

Licensed under the [GPL version 2](http://www.gnu.org/licenses/) or later.


## Description

A Plugin for calculating the half life of a blog post. So you can determine afterwards, which content and what posting time is best for your content.

## Installation

1. Copy the folder `post-half-life` into the directory `wp-content/plugins/` and activate the plugin.
2. The plugin starts with tracking new visits immediately. But the plugin only records new data. So Wait until you published a new post and then ..
3. .. go to the "Post-Half-Life (p½)" Dashboard page to view how the post is working out in terms of his half-life. 
    

## Changelog

### 0.1.2 ###

Bugfix for Plugin Submission
* Added $wpdb-> prepare everywhere. 

### 0.1.1 ###

Bugfix for Plugin Submission
* Removed reference to icon, because there is no icon right now.


### 0.1 ###

This is first public beta release of the plugin. 
* Record every page view including the referrer for future evaluation
* Does not distinguish between unique, repeated and own visits. Every visit counts!
* Display 
