<?php
namespace Grav\Plugin;
use \Grav\Common\Plugin;
use Grav\Common\Twig\Twig;
use RocketTheme\Toolbox\Event\Event;

class ImageColorPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        require_once(__DIR__.'/classes/colors.inc.php');

        return [
            'onTwigExtensions' => ['onTwigExtensions', 0],
        ];
    }
    public function onTwigExtensions()
    {
        require_once(__DIR__ . '/twig/ImageColorTwigExtension.php');
        $this->grav['twig']->twig->addExtension(new ImageColorTwigExtension());
    }
}
