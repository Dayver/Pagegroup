<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.edit.update.import
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

//require_once cot_incfile('pagegroup', 'plug');
//pag_grp_value_import();
$pag_grp_main_page_id = cot_import('rpage'.$cfg['plugin']['pagegroup']['extrfldnamegroup'].'_main_page_id', 'POST', 'INT');
if (!empty($pag_grp_main_page_id) && !empty($rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]))//�������� �����������\����������� � ������������ �������
{
	//TODO: ������ ��� add - ��������� ���� ���� ���������� �� ���� � �������� �������� �� �������� ����
	//MAY BE TODO: ������ ��� edit - ��������� ���� �������� ���� ������� � ������ ������ �� �������� ������������� ������ � ������� �� ��� ������
	$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']] = $pag_grp_main_page_id.'.'.$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']];
	$pag_grp_upd = $db->query("UPDATE $db_pages SET page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]."' WHERE page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$pag_grp_main_page_id."' OR page_id = ".$id);
}
elseif (!empty($rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]))//�������� ��������������� ������� � ������\����������� �� ������
{
	//MAY BE TODO: ������ ��� edit - ��������� ���� �������� ���� ������� � ������ ������ �� �������� ������������� ������ � ������� �� ��� ������
	$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']] = $id.'.'.$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']];
	$pag_grp_upd = $db->query("UPDATE $db_pages SET page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]."' WHERE page_id = ".$id);
}
else//�������� ��� ������ �����\��������� �� �����
{
	//MAY BE TODO: ������ ��� edit - ��������� ���� �������� ���� ������� � ������ ������ �� �������� ������������� ������ � ������� �� ��� ������
	$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']] = $id;
	$pag_grp_upd = $db->query("UPDATE $db_pages SET page_".$cfg['plugin']['pagegroup']['extrfldnamegroup']." = '".$rpage['page_'.$cfg['plugin']['pagegroup']['extrfldnamegroup']]."' WHERE page_id = ".$id);
}
