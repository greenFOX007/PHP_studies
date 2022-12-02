<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        span{
            background-color: yellow;
        }
    </style>
    <?php

    $text = "What is Symfony. Symfony is a set of PHP Components, a Web Application framework, a Philosophy, and a Community - all working together in harmony.\n Symfony Framework. The leading PHP framework to create websites and web applications. Built on top of the Symfony Components.\n Symfony Components. A set of decoupled and reusable components on which the best PHP applications are built, such as Drupal, phpBB, and eZ Publish.\n Symfony Community. A passionate group of over 600,000 developers from more than 120 countries, all committed to helping PHP surpass the impossible.\n Symfony Philosophy. Embracing and promoting professionalism, best practices, standardization and interoperability of applications.\n";


    // Число слов Symfony
    $count = mb_substr_count($text, 'Symfony');

    echo "<p>Количество слов Symfony = $count </p>";

    //выделение цветом слов
    $replaceText = nl2br(mb_ereg_replace('Symfony', '<span>Symfony</span>', $text));

    echo "<p> $replaceText </p>";

    //Число абзацев  
    $paragraph_count = mb_substr_count(nl2br($text), '<br />');

    echo "<p>Количество абзацев = $paragraph_count </p>";

    //Число предложений 
    $sentence_count = mb_substr_count($text, '.');

    echo "<p>Количество предложений = $sentence_count </p>";

    //Число слов 

    // убираю все знаки пунктуации, разбиваю на массив строк по сепаратору пробел, 
    // через фильтр убираю нулевые значения в массиве, и считаю число элементов массива
    
    $fillterCallback = fn ($x) => $x != "";

    $array_words = explode(" ", mb_ereg_replace('[\.\-\,]', '', $text));
    $words_count = count(array_filter($array_words, $fillterCallback));

    echo "<p>Количество слов = $words_count </p>";

    //Число символов 

    $symbols_count = mb_strlen(mb_ereg_replace('[\n]','',$text) );


    echo "<p>$symbols_count</p>";


    //Поиск длинного слова
    $words_count2 = count($array_words);
    $max = $array_words[0];

    for ($i = 0; $i < $words_count2; $i++) {
        if (mb_strlen($array_words[$i]) > mb_strlen($max)) {
            $max = $array_words[$i];
        }
    };

    echo "<p>Самое длинное слово: $max  </p>";

    for ($i = 0; $i < $words_count2; $i++) {
        if (mb_strlen($array_words[$i]) == mb_strlen($max)) {
            if ($array_words[$i] !== $max) {
                echo "<span>а так же: $array_words[$i] </span>";
            }
        }
    }


    // Поиск колличества символов 

    $symbols_array = array_unique(mb_str_split(mb_ereg_replace('[\n]','',$text))) ;

    sort($symbols_array, SORT_STRING);

    foreach($symbols_array as $value){
        $symbols = mb_substr_count($text,$value);
        if($value == ' '){
            echo "<p>Количество символа <span>Пробел</span> : $symbols </p>";
        }else{
            echo "<p>Количество символа <span>$value</span> : $symbols </p>";
        }        
    }

    ?>
</body>

</html>