<?php

include "db.php";

    function createSitemap($link){
        $sql = "SELECT cpu, date FROM blog";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        //return $data;
        $getDate = date("Y-m-d");
        $putArr = "";
        foreach($data as $v){
            $cpu = $v['cpu'].'.html';
            $date = $v['date'];
            $host = 'fit-box.xyz';
            
            $putArr .= "
            <url>
            <loc>https://$host/$cpu</loc>
            <lastmod>$date</lastmod>
            <changefreq>monthly</changefreq>
            </url>";
        }

        $sql = "SELECT url FROM blog_category";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        foreach($data as $v){
            $cpu = $v['url'].'.html';
            $host = 'fit-box.xyz';
            
            $putArr .= "
            <url>
            <loc>https://$host/$cpu</loc>
            <lastmod>$getDate</lastmod>
            <changefreq>monthly</changefreq>
            </url>";
        }


        $putArr .= "</urlset>";
        







        $file = file_put_contents("sitemap.xml", "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
<url>
<loc>https://fit-box.xyz/</loc>
<lastmod>$getDate</lastmod>
<changefreq>weekly</changefreq>
</url>     
$putArr      
        ");
        return $file;
    }



if($_SERVER['REQUEST_METHOD'] == "POST"){
    createSitemap($link);
}
?>

<form method="POST">
    Сгенерировать sitemap: <input type="submit" value="Создать">

</form><p>
<a href="sitemap.xml">перейти</a>

