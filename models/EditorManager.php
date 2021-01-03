<?php



class EditorManager extends Model 
{
    //récupérer tout les articles dans la bdd

    public function getEditors(){

        return $this->getAll('editors','Editor');
    }

    public function getEditor($id){
        return $this->getOne('editors','Editor', $id);
    }

    public function createEditor(){
        return $this->createOneEditor('editors','Editor');
    }

    public function deleteEditor($id){
        return $this->deleteOne('editors','Editor',$id);
    }
}