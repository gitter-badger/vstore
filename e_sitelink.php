<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Sitelinks configuration module - gsitemap
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/faqs/e_sitelink.php,v $
 * $Revision$
 * $Date$
 * $Author$
 *
*/

if (!defined('e107_INIT')) { exit; }
/*if(!e107::isInstalled('gsitemap'))
{ 
	return;
}*/


class vstore_sitelink // include plugin-folder in the name.
{
	function config()
	{

		$links = array();
			
		$links[] = array(
			'name'			=> "Vstore Categories",
			'function'		=> "storeCategories"
		);	
		
		
		return $links;
	}
	
	

	function storeCategories()
	{
		$sql = e107::getDb();
		$tp = e107::getParser();
		$sublinks = array();
		
		$sql->select("vstore_cat","*","cat_id != '' ORDER BY cat_order,cat_name");
		
		while($row = $sql->fetch())
		{
			$sublinks[] = array(
				'link_name'			=> $tp->toHtml($row['cat_name'],'','TITLE'),
				'link_url'			=> e107::url('vstore','cat',$row), // '{e_PLUGIN}vstore/vstore.php?item='.$row['item_id'], // 1e107::getUrl()->sc('faqs/list/all', array('category' => $row['faq_info_id'])),
				'link_description'	=> '',
				'link_button'		=> '',
				'link_category'		=> '',
				'link_order'		=> '',
				'link_parent'		=> '',
				'link_open'			=> '',
				'link_class'		=> 0
			);
		}
		
		return $sublinks;
	    
	}
	
}
