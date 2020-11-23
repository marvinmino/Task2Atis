<?php 

namespace App\Core\Database;

use PDO;
class AlbumQuery extends QueryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertAlbum($name,$user_email)
    {
        
            $this->insert('albums', [
                'name'       => $name,
                'date'       => date("Y-m-d"),
                'user_email' => $user_email,
                ]);
        mkdir('app/content/' . $this->selectAllOneCon('users','email', $user_email)[0]->dir . '/' . $name);
        return redirect('home');
        
    }
    public function thumbnail($thumb,$id)
    {     $this->update('albums','thumbnail',$thumb,'id',$id);
        return redirect('home');
    }
    public function deleteAlbum($user_email,$conval){
        $str='/app/content/'.$this->selectAllOneCon('users','email', $user_email)[0]->dir.'/'.$this->selectAllOneCon('albums','id', $conval)[0]->name;
        function delete_files($target) {
            if(is_dir($target)){
                $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
        
                foreach( $files as $file ){
                    delete_files( $file );      
                }
        
                rmdir( $target );
            } elseif(is_file($target)) {
                unlink( $target );  
            }
        }
        delete_files($str);
        $this->delete('images','id_album',$conval);
        $this->delete('albums', 'id', $conval);
    }
    
}
