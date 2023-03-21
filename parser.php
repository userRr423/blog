<?php


require './simple_html_dom.php';
function parse()
{
    //$page = file_get_contents('https://habr.com/ru/news/');
    
    /*$data = file_get_html('https://habr.com/ru/news/');

    
    if($data->innertext!='' and count($data->find('a'))){
    foreach($data->find('a') as $a){
        echo  'https://habr.com' . $a->href . ' - '.$a->plaintext.'</a></br>';
        }
    }*/
    
    echo "<link rel='stylesheet' href='./css/style.css'>";
    $data = file_get_html('https://habr.com/ru/news/');
    $it = $data->find('.tm-article-snippet__title-link');

    $stop = 0;
    
    $n = "news";

    echo "<div class=$n>";
    foreach($it as $i)
    {
        $link = 'https://habr.com' . $i->href;
        echo "<a href=$link> $i->plaintext  </a><br>";
        $stop++;
        if($stop > 3)
        {
            break;
        }
    }

    echo "</div>";

    //$link = 'https://habr.com/ru/news/t/723644/';
    //echo "<a href=$link> ddw </a>";
    
}

parse();

?>