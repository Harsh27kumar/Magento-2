<?php 

namespace Store\ImageUploader\Api\Data;

interface ImageInterface {
  const ID = 'image_id';
  const PATH = 'path';

  public function getPath ();

  public function setPath ($value);
}