<?php

namespace AppBundle\Twig;

use AppBundle\Twig\AppRuntime;

class AppExtension extends \Twig_Extension
{
  public function getFilters()
  {
    return array(
      // the logic of this filter is now implemented in a different class
      new \Twig_SimpleFilter('price', array(AppRuntime::class, 'priceFilter')),
      new \Twig_SimpleFilter('splitlines', array(AppRuntime::class, 'splitLines')),      
    );
  }
}