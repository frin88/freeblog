<?php
namespace App\Controllers;
use \PDO;
use App\Models\Post;


class PostController {
    
    protected $layout = 'layout/index.tpl.php';
    public $content = 'Elio Malossi';
    
    protected $conn;
    protected $Post;

    public function __construct()//(PDO $conn)
    {
        // check per vedere se la classe viene caricata e istanziata correttamente
        echo "Post controller loaded correctly";

        //$this->conn = $conn;
        
        //$this->Post = new Post($conn);
        //echo __DIR__;
    }

    public function display()
    {
        // carico il file di layout == this.layout

        require $this->layout;
    }
    /*
    public function getPosts(){
        
        $posts = $this->Post->all();
        $this->content = view('posts', compact('posts'));
    }
    
    public function show($postid, $commentid = null)
    {
      
        $post = $this->Post->find($postid);
        return view('post', compact('post'));
    }
    
    public function create()
    {
        return view('newPost');
    }
    
    public function save()
    {
       // header("Content-type:application/json");
       // echo json_encode($_POST);
       // exit;
        $this->Post->save($_POST);
        redirect('/');
    }
    */
}
