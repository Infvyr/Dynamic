<?php
 require_once "mainDbase/db";

 $link = db_connect();
 //$articles = articles_all($link);
 $articles = articles_all($link);

   /* function articles_all($link)
    {
        /* INITIAL
        $query = "SELECT * from `articles` ORDER BY id ASC";
        $res = mysqli_query($link, $query);

        if(!$res) die(mysqli_error($link));

        //Extragere din BD
        $n = mysqli_num_rows($res);
        $articles = array();

        for ($i=0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($res);
            $articles[] = $row;
        }
        return $articles;*/
      /*  ============================================================================ */
/*
        $query = " SELECT * FROM `articles` ORDER BY calendar DESC";
        $res = mysqli_query($link, $query);
        if (!$res) {
            exit(mysqli_error());
        }

        echo '<div class="col l6 m6 s12" id="main_sec">';

        $row = array();
        for ($i=0; $i < mysqli_num_rows($res); $i++) {

            $row = mysqli_fetch_array($res, MYSQL_ASSOC);
            printf("
                <div class='row' style='margin-top:15px; margin-bottom:15px'>
                <div class='col l5 m5 s6'>
                    <img src='%s' class='responsive-img z-depth-1' id='main_img1'>
                </div>
                <div class='l7 m7 s6'>
                    <h4 id='title_article'>%s</h4>
                    <p class='left-align blue-grey-text text-darken-4' id='half_article'>%s</p>
                </div>
                <div class='row' style='margin-bottom:5px'>
                    <div class='col l7 m7 s7 left-align'>
                    <a href='?option=id_text=%s' class='waves-effect left-align indigo-text'' id='more_txt'>continuare &nbsp;<i class='fa fa-long-arrow-right'></i></a>
                    </div>
                <div class='col l5 m5 s5 right-align indigo-text' id='pub_date'>
                    <i class='fa fa-calendar'>&nbsp;</i>%s
                </div>
                </div>
                </div>
                <div class='divider'></div>
                ", $row['img_src'], $row['title'], $row['halfArticle'], $row['id'], $row['calendar']
                );

        }*/
    }

   /* function articles_get($link, $id_article)
    {
        // query
        $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
        $res = mysqli_query($link, $query);

        if (!$res) die(mysqli_error($link));

        $article = mysqli_fetch_assoc($res);
        return $article;
    }*/
?>


