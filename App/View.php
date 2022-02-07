<?php
/**
 * Renderar vyer med Twig
 * Version 3.3 används i detta projekt
 * https://twig.symfony.com/
 * https://twig.symfony.com/doc/3.x/templates.html
 * https://twig.symfony.com/doc/3.x/api.html
 */

namespace App;

class View
{
    /**
     * @param string $twigFile
     * @param array $data
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __construct(string $twigFile, array $data)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
        $twig = new \Twig\Environment($loader, []);
        $template = $twig->load($twigFile);
        echo $template->render($data);
    }

    /**
     * Rendera twigfil som är input. Valbart att skicka med data.
     * @param string $twigFile
     * @param array $data
     * @return void
     */
    public static function render(string $twigFile, array $data = []){
        $view = new View($twigFile,$data);
    }
}