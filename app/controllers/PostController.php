<?php

namespace App\Controllers;

use function Couchbase\defaultDecoder;
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
        $this->Post = new Post($conn);

    }

    public function display()
    {
        // includo il file di layout idex.tpl
        // in index.tpl ho accesso a qualunque variabile settata in PostController --> il file index.tpl fa a tutti gli effetti
        //parte della classe, richiamerò gli oggetti della classe in index tramite $this
        require $this->layout;
    }

    // get all Post
    public function getPosts()
    {

        $posts = $this->Post->all();
        $arr = ['posts' => $posts]; // crea array associativo
        //$arr = array('posts' => $posts); // altro modo per creare array associativo
        //$arr = compact('posts') )// altro modo ancora

        return view('posts', $arr);


    }

    // show single post
    public function show($postid)
    {
        $postid = (int)$postid;
        $post = $this->Post->find($postid);

        $arr = ['post' => $post]; // crea array associativo


        return view('post', $arr);

    }

    public function create()
    {
        return view('newPost', []);
    }

    public function save()
    {
      // echo 'save!';
       $this->Post->save($_POST);

  /*      header("Content-type:application/json");
        echo json_encode($_POST);
        exit;*/
    }

    public function update()
    {
        return 'update';
    }


    public function dispatch()
    {

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/');


        $tokens = explode('/', $url);

        $action = $tokens[0];
        $token2 = isset($tokens[1]) ? $tokens[1] : '';

        switch ($action) {

            case 'posts':
            case '':
            case 'home':
            case 'getPost':

                // primo parametro classe seconso parametro callback --> perchè usare call_user_func ??
                // OK serve per iniettare metodo  (potrei avere metodo "post")
                // $this->content = $this->{$token[0]}();
                //$this->content = call_user_func(array($this,'getPosts'));

                $this->content = $this->getPosts();


                break;
            case 'post':

                if ($_SERVER['REQUEST_METHOD'] === 'GET') {

                    if (is_numeric($token2)) {
                        //$this->content = call_user_func(array($this,'show'),$token[1]);
                        $this->content = $this->show($token2);
                    } else {

                        if (method_exists($this, $token2)) {
                            //$this->content = $this->create();
                            $this->content = $this->{$token2}(); // chiamo il metodo passandogli il nome as string

                        } /*else {
                            $this->content = '<h1> Ooops something went wrong on ' . $token2 . '</h1>';
                        }*/


                    }
                }
                else if($_SERVER['REQUEST_METHOD'] === 'POST')
                {

                    if (is_numeric($token2)) {

                        $this->content = $this->update($token2);
                    } else {

                        if (method_exists($this, $token2)) {

                            //echo(save);
                            $this->content = $this->{$token2}(); // chiamo il metodo passandogli il nome as string

                      }
                  /*else {
                            $this->content = '<h1> Ooops something went wrong on ' . $token2 . '</h1>';
                        }*/


                    }
                }


                break;

          /*  default:
                $this->content = $this.page*/

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
