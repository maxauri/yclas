<?php defined('SYSPATH') or die('No direct script access.');
/**
 * description...
 *
 * @author		Chema <chema@garridodiaz.com>
 * @package		OC
 * @copyright	(c) 2009-2011 Open Classifieds Team
 * @license		GPL v3
 * *
 */
class Model_Location extends ORM {

	/**
	 * Table name to use
	 *
	 * @access	protected
	 * @var		string	$_table_name default [singular model name]
	 */
	protected $_table_name = 'locations';

	/**
	 * Column to use as primary key
	 *
	 * @access	protected
	 * @var		string	$_primary_key default [id]
	 */
	protected $_primary_key = 'id_location';


	/**
	 * Rule definitions for validation
	 *
	 * @return array
	 */
	public function rules()
	{
		return array(
				        'id_location'		=> array(array('numeric')),
				        'name'				=> array(array('not_empty'), array('max_length', array(':value', 64)), ),
				        'id_location_parent'=> array(),
				        'parent_deep'		=> array(),
				        'seoname'			=> array(array('not_empty'), array('max_length', array(':value', 145)), ),
				        'description'		=> array(array('max_length', array(':value', 255)), ),
		);
	}

	/**
	 * Label definitions for validation
	 *
	 * @return array
	 */
	public function labels()
	{
		return  array(
	        'id_location'			=> 'Id',
	        'name'					=> 'Name',
	        'id_location_parent'	=> 'Id parent',
	        'parent_deep'			=> 'Parent deep',
	        'seoname'				=> 'Seoname',
	        'description'			=> 'Description',
	        'lat'					=> 'Lat',
	        'lng'					=> 'Lng',
		);
	}

	public function form_setup($form)
	{
		$form->fields['description']['display_as'] = 'textarea';
		$form->fields['id_location_parent']['display_as'] = 'select';
		$form->fields['id_location_parent']['options'] = range(0, 30);
		$form->fields['parent_deep']['display_as'] = 'select';
		$form->fields['parent_deep']['options'] = range(0, 3);
		$form->fields['seoname']['caption'] = 'seoname';		
	}

	public function exclude_fields()
	{
	    return array();
	}



} // END Model_Location