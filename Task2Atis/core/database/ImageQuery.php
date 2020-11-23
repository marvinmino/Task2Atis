<?php 

namespace App\Core\Database;

use PDO;
class ImageQuery extends QueryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertImage($url,$id_album)
    {      
            $this->insert('images', [
                'url'       => $url,
                'id_album'  => $id_album,
                'date'      => date("Y-m-d"),
                ]);
        return redirect('images?a_id='.$id_album);
        
    }
    public function deleteImg($email,$conval)
    {   
        $album=$this->selectAllOneCon('albums','id',($this->selectAllOneCon('images','id', $conval)[0]->id_album))[0];
        $delUrl=$this->selectAllOneCon('images','id', $conval)[0];
        if($album->thumbnail==$delUrl->url)
        $this->update('albums','thumbnail','app/content/thumbnails/default_thumb.png','id',$album->id);
        $this->delete('images','id',$conval);
        if (!unlink($delUrl->url)) {
            echo ("$delUrl->url cannot be deleted due to an error");
          } else {
            echo ("$delUrl->url has been deleted");
          }
          
          return redirect("images?a_id=$album->id");
    }
}