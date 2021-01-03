<?php



class ImageManager extends Model 
{
    //récupérer tout les articles dans la bdd

    public function getImages(){

        return $this->getAll('images','Image');
    }

    public function getImage($id){
        return $this->getOne('images','Image', $id);
    }

    public function createImage(){
        return $this->createOneImage('images','Image');
    }

    public function deleteImage($id){
        return $this->deleteOne('images','Image',$id);
    }
}