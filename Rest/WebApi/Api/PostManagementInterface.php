<?php 
namespace Rest\WebApi\Api;
 
 
interface PostManagementInterface {


	/**
	 * GET for Post api
	 * @param string $param
	 * @return string
	 */
	
	public function getPost($columns);
	//public function getCategoryFilter($id);
	//public function getPost($catid);

}