<?php
/*
// "Very Simple Image Gallery" Plugin for Joomla 2.5 - Version 1.6.7
// License: GNU General Public License version 2 or later; see LICENSE.txt
// Author: Andreas Berger - andreas_berger@bretteleben.de
// Copyright (C) 2012 Andreas Berger - http://www.bretteleben.de. All rights reserved.
// Project page and Demo at http://www.bretteleben.de
// ***Last update: 2012-04-17***
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.form.formfield');//import the necessary class definition for formfield
class JFormFieldbexml extends JFormField {
	
	protected $type = 'bexml';

	var	$_name = 'Very Simple Image Gallery';
	var $_version = '1.6.7';

	protected function getInput(){
		$view =$this->element['view'];

		switch ($view){

		case 'intro':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>".$this->_name." Version: ".$this->_version."</b><br />";
            $html.="for support and updates visit:&nbsp;";
            $html.="<a href='http://www.bretteleben.de' target='_blank'>www.bretteleben.de</a>";
            $html.="</div>";
		break;

		case 'gallery':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>Gallery</b> - Settings regarding the gallery in general.";
            $html.="</div>";
		break;

		case 'thumbs':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>Thumbnails</b> - Settings regarding the thumbnails (size, quality, position, ...).";
            $html.="</div>";
		break;

		case 'captions':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>Captions</b> - Show title and/or text for images. Captions are set in the article using the code {vsig_c}parameters{vsig_c} (see <a href='http://www.bretteleben.de/lang-en/joomla/very-simple-image-gallery/-anleitung-plugin-code.html' target='_blank'>Howto Plugin Code</a>).";
            $html.="</div>";
		break;

		case 'links':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>Links</b> - Link images to any target (default or selective). Links are set in the article using the code {vsig_l}parameters{vsig_l} (see <a href='http://www.bretteleben.de/lang-en/joomla/very-simple-image-gallery/-anleitung-plugin-code.html' target='_blank'>Howto Plugin Code</a>).";
            $html.="</div>";
		break;

		case 'sets':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>Sets</b> - Split galleries into multiple sets and enable necessary navigation (see <a href='http://www.bretteleben.de/lang-en/joomla/very-simple-image-gallery/-anleitung-plugin.html' target='_blank'>Howto</a>).";
            $html.="</div>";
		break;

		case 'gd':
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>GD library</b> - Information about the PHP GD library on your server. <br />The plugin uses this PHP extension to create thumbnails.";
						if(function_exists("gd_info")){
            	$html.="<br />GD is supported by your server!<br /><br />";
							$gd = gd_info();
							$be_gdarray=array(
										"gd" => "<span style='color:red'>unknown</span>",
										"jpg" => "<span style='color:red'>not enabled</span>",
										"png" => "<span style='color:red'>not enabled</span>",
										"gifr" => "<span style='color:red'>not enabled</span>",
										"gifw" => "<span style='color:red'>not enabled</span>");
							foreach ($gd as $k => $v) {
								if(stristr($k,"gd")!=FALSE){$be_gdarray["gd"]=$v;}
								if((stristr($k,"jpg")!=FALSE||stristr($k,"jpeg")!=FALSE)&&$v==1&&function_exists("imagecreatefromjpeg")){$be_gdarray["jpg"]="enabled";}
								if(stristr($k,"png")!=FALSE&&$v==1&&function_exists("imagecreatefrompng")){$be_gdarray["png"]="enabled";}
								if(stristr($k,"gif read")!=FALSE&&$v==1){$be_gdarray["gifr"]="enabled";}
								if(stristr($k,"gif create")!=FALSE&&$v==1&&function_exists("imagecreatefromgif")){$be_gdarray["gifw"]="enabled";}
							}
            	$html.="GD Version: ".$be_gdarray["gd"]."<br />";
            	$html.="JPG Support: ".$be_gdarray["jpg"]."<br />";
            	$html.="PNG Support: ".$be_gdarray["png"]."<br />";
            	$html.="GIF read Support: ".$be_gdarray["gifr"]."<br />";
            	$html.="GIF create Support: ".$be_gdarray["gifw"]."<br />";
						}else{
            	$html.="<br /><span style='color:red'>GD is not supported by your server!</span><br />";
						}
            $html.="<br /><a href='http://www.bretteleben.de/lang-en/joomla/very-simple-image-gallery/faq-a-troubleshooting.html#faq01' target='_blank'>Very Simple Image Gallery FAQ&Troubleshooting</a>";
            $html.="</div>";
		break;

		default:
            $html="<div style='background-color:#c3d2e5;margin:0;padding:2px;display:block;clear:both;'>";
            $html.="<b>Other settings</b>";
            $html.="</div>";
		break;

		}
		return $html;
	}
}