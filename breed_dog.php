<?php
    $ch = curl_init();

    $url = "https://www.akc.org/dog-breeds/";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch);

//    preg_match_all('/<h3 class="breed-type-card__title(.*?)"(.*?)<\/h3>/si', $content, $matches);
    $pattern = '/<div(.*?)id="breed-type-card-"(.*?)>(.*?)<\/label>/si';
    preg_match_all($pattern, $content, $matches);
//    print_r($matches[3]);
    if(!empty($matches[3])) {
        ?>
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th width="5%">STT</th>
                <th>IMG</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>LINK</th>
            </tr>
            </thead>
            <tbody>
        <?php
        $count = 0;
        foreach ($matches[3] as $item) {
            $count++;
            preg_match('/<h3 class="breed-type-card__title(.*?)">(.*?)<\/h3>/si', $item, $name_arr);
            preg_match('/<p class="f-16 mt1">(.*?)<\/p>/si', $content, $description_arr);
            preg_match('/<img(.*?)src="(.*?)"(.*?)data-src="(.*?)"(.*?)srcset="(.*?)"(.*?) \/>/si',
                $item, $img_arr);

            $name = $name_arr[2];
            $description = $description_arr[1];
            $src_img = $img_arr[2];
            $data_src_img = $img_arr[4];
            $src_set_img = $img_arr[6];
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><img width="300" height="auto" src="<?php echo $data_src_img; ?>"
                         class="attachment-rectangle_thumbnail size-rectangle_thumbnail wp-post-image lozad" alt="<?php echo $name; ?>"
                         data-src="<?php echo $data_src_img; ?>"
                         data-sizes="(max-width: 400px) 100vw, 400px"
                         srcset="<?php echo $src_set_img; ?>"
                         data-loaded="true">
                </td>
                <td><?php echo $name; ?></td>
                <td><?php echo $description; ?></td>
                <td><a href="<?php echo $data_src_img; ?>" target="_blank"><?php echo $data_src_img; ?></a></td>
            </tr>
            <?php
        }
        ?>
            </tbody>
        </table>
        <?php
    }
    curl_close($ch);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crawl data breed dogs</title>
    <style>
        th {
            padding: 8px;
            color: yellow;
            background-color: #b3cde0;
            font-size: 19px;
        }
        td {
            text-align: center;
            font-size: 18px;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f4f4;
        }
    </style>
</head>
<body>

</body>
</html>
