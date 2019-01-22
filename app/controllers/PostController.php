<?php

namespace App\Controllers;

use \PDO;
use App\Models\Post;


class PostController
{

    protected $layout = 'layout/index.tpl.php';
    public $content; //= 'Frincola is the best';


    protected $conn;
    protected $Post;

    public function __construct(PDO $conn)
    {
        // check per vedere se la classe viene caricata e istanziata correttamente
        //echo "Post controller loaded correctly";

        $this->conn = $conn;

        // query riempio posts
        $posts = $this->conn->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_OBJ);

        ob_start();
        require __DIR__ . '/../views/posts.tpl.php';
        $this->content = ob_get_contents();
        ob_end_clean();


        //$this->Post = new Post($conn);

    }

    public function display()
    {
        // includo il file di layout idex.tpl
        // in index.tpl ho accesso a qualunque variabile settata in PostController --> il file index.tpl fa a tutti gli effetti
        //parte della classe, richiamerò gli oggetti della classe in index tramite $this
        require $this->layout;
    }

    public function show($postid = null) //default null
    {
        $message = "Frincola is the best";
        $title = "Best title ever";

        //HTML INJECTION

        // cattura gli echo e li salva in un buffer --> se non uso buffer e uso solo require il contenuto di post viene messo in testa
        ob_start();
        // includo la view post.tpl
        require __DIR__ . '/../views/post.tpl.php';
        // prende il contenuto del buffer  lo associo a this.content e lo mostro --> sto inettando il contenuto di post.tpl in layout
        $this->content = ob_get_contents();
        // pulisce il buffer
        ob_end_clean(); // reset buffer
    }

    /*
    public function getPosts(){
        
        $posts = $this->Post->all();
        $this->content = view('posts', compact('posts'));
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
