<?php

namespace App\Controllers;

use \PDO;
use App\Models\Post;


class PostController
{

    protected $layout = 'layout/index.tpl.php';
    public $content;


    protected $conn;
    protected $Post;

    public function __construct(PDO $conn)
    {
        // check per vedere se la classe viene caricata e istanziata correttamente
        //echo "Post controller loaded correctly";

        $this->conn = $conn;



    }

    public function display()
    {
        // includo il file di layout idex.tpl
        // in index.tpl ho accesso a qualunque variabile settata in PostController --> il file index.tpl fa a tutti gli effetti
        //parte della classe, richiamerò gli oggetti della classe in index tramite $this
        require $this->layout;
    }

    // get all Post
    public  function getPosts()
    {
        // query riempio posts
        $posts = $this->conn->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_OBJ);

        ob_start();
        require __DIR__ . '/../views/posts.tpl.php';
          $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    // show single post
    public function show($postid)
    {
        $postid =(int)$postid;

        $txtQuery = "SELECT * FROM posts where Id =".$postid;
        $post = $this->conn->query($txtQuery)->fetchAll(PDO::FETCH_OBJ)[0];

        ob_start();
        require __DIR__ . '/../views/post.tpl.php';
        $content = ob_get_contents();
        var_dump($content);
        ob_end_clean();
        return $content;
    }

    public  function process()
    {

        $url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $url = trim($url,'/');


        $token= explode('/',$url);
        //var_dump($token);

       switch($token[0])
       {
           case 'posts':
            // primo parametro classe seconso parametro callback
            $this->content = call_user_func(array($this,'getPosts'));
            break;
           case 'post':
               if($_SERVER['REQUEST_METHOD'] === 'GET')
               {
                 // echo 'qui';
                   $this->content = call_user_func(array($this,'show'),$token[1]);
               }
               break;

        }



    }




 /*  OLD VERSION
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
    }*/

}
