<?php

use Desidus\Rudder\Microdata;

$defaultMicrodata = function ($withoutContext = false, $toJSON = false)
{
    $url = getenv('APP_URL');
    $microdata = new Microdata('http://schema.org', 'og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#');
    $microdata->setType('WebPage', 'website');
    $microdata->setTitle('', '');
    $microdata->setDescription('');
    $microdata->setLang('Italian', getenv('APP_LANG'));
    $microdata->setURL($url);
    //$microdata->setImage('', '', 400, 400);
    
    $microdata->setJSONLD([
        'headline' => '',
        'accessMode' => 'textOnVisual',
        'sameAs' => [ '' ]
    ]);

    $microdata->setOpenGraph([
        'og:site_name' => '',
        'fb:pages' => ''
    ]);

    return $microdata;
};

return [
    '/\//' => $defaultMicrodata,
    '/\/articoli([\/\w\.-]*)/i' => function($page) use ($defaultMicrodata) {
        $microdata = $defaultMicrodata();
        $microdata->setTitle($page);
        $microdata->setDescription($page);

        return $microdata;
    }
];
