<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.add.add.done
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

if ($id)
{
	if (!empty($pag_grp_main_page_id) && !empty($rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]))
	{
		$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']] = $pag_grp_main_page_id.'.'.$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']];
		$pag_grp_upd = $db->query("UPDATE $db_pages SET page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]."' WHERE page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$pag_grp_main_page_id."' OR page_id = ".$id);
	}
	elseif (!empty($rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]))
	{
		$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']] = $id.'.'.$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']];
		$pag_grp_upd = $db->query("UPDATE $db_pages SET page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]."' WHERE page_id = ".$id);
	}
	else
	{
		$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']] = $id;
		$pag_grp_upd = $db->query("UPDATE $db_pages SET page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]."' WHERE page_id = ".$id);
	}
}