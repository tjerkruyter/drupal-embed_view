<?php


/**
 * @file
 * Contains \Drupal\embed_view\Twig\EmbedViewExtension.
 */

namespace Drupal\embed_view\Twig;


/**
 * Class EmbedViewExtension
 * Print a menu
 * @package Drupal\embed_view\Twig
 */
class EmbedViewExtension extends \Twig_Extension {
    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'embed_view';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('embed_view', [$this, 'embedView'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function embedView($viewName, $viewDisplay = 'default') {
        $view = views_embed_view($viewName, $viewDisplay);
        $content = \Drupal::service('renderer')->render($view);

        return [
            '#markup' => $content
        ];
    }
}