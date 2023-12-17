<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    OSSN Core Team <info@openteknik.com>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
ossn_register_callback('ossn', 'init', function(){
			//register a menu item on search page load
			ossn_register_callback('page', 'load:search', function(){
					//keep other search arguments in place
					$args = OssnPagination::constructUrlArgs(array(
							'type'
					));
					$type = 'mycustom';
					ossn_register_menu_item('search', array(
								'name' => $type, //must be unique
								'text' => 'search:key', //this must be a langauge key not actual text as it handles itself ossn_print("search:key"),
								'href' => "search?type={$type}{$args}",
					));
			});			
			$type = "mycustom";
			ossn_add_hook('search', "type:{$type}", function($hook, $type, $return, $params){
					  	$query_string = $params['q'];
						//return your page contents here
						//example ossn_plugin_view('....
						return $query_string;
			});
});
