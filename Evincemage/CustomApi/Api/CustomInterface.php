<?php
 
namespace Evincemage\CustomApi\Api;
 
interface CustomInterface
{
   /**
     * GET for Post api
     * @param string $value
     * @return string
     */
 
    public function getPost($value);
/*
   const FLAG_NO_DISPATCH = 'no-dispatch';

   const FLAG_NO_POST_DISPATCH = 'no-postDispatch';

   const FLAG_NO_DISPATCH_BLOCK_EVENT = 'no-beforeGenerateLayoutBlocksDispatch';

   const PARAM_NAME_BASE64_URL = 'r64';

   const PARAM_NAME_URL_ENCODED = 'uenc';

   
    public function getPost($value);
    */
}