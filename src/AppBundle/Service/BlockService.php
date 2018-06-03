<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use AppBundle\Entity\Block;

class BlockService {

  protected $em;
  private $container;

  public function __construct(EntityManager $entityManager, Container $container)
  {
    $this->em = $entityManager;
    $this->container = $container;
  }

  public function loadBlocks($blocks, $slug, $level)
  {    
    $blocks = explode(',', $blocks);
    $available_blocks = Block::getTypes();

    $result = array();
    foreach ($blocks as $key => $value) {
      $blocks[$key] = $value = trim($value);      
      $i = 0;
      while (array_key_exists("{$value}_{$i}", $result)) $i++;        
      if (array_key_exists($value, $available_blocks))
        $result["{$value}_{$i}"] = array(
          'file' => $value, 
          'params' => array(),
          'order' => $i
        );
    }    

    $qb = $this->em->getRepository("AppBundle:Block")->createQueryBuilder('b');
    
    if ($level == 0) {
      $qb->where('b.path = :path')
        ->setParameter('path', '/');
    } elseif ($level == 1) {
      $qb->where(
        $qb->expr()->orX(
          $qb->expr()->eq('b.path', '?1'),
          $qb->expr()->eq('b.path', '?2')
        ))
        ->setParameter('1', '/')
        ->setParameter('2', $slug[0])
      ;
    } elseif ($level == 2) {
      $qb->where(
        $qb->expr()->orX(
          $qb->expr()->eq('b.path', '?1'),
          $qb->expr()->like('b.path', '?2')
        ))
        ->setParameter('1', '/')
        ->setParameter('2', "{$slug[0]}%")
      ;      
    }

    $conditions = array();

    foreach($result as $b)
    {
      $conditions[] = $qb->expr()->andX(
        $qb->expr()->eq('b.type', ":".$b['file']),
        $qb->expr()->eq('b.order', ":_".$b['file'].'_'.$b['order'])
      );      
      $qb->setParameter($b['file'], $b['file']);
      $qb->setParameter(":_".$b['file'].'_'.$b['order'], $b['order']);
    }

    $qb->andWhere($qb->expr()->orX()->addMultiple($conditions));
    $blocks = $qb->getQuery()->getResult();

    foreach ($blocks as $b) {
      if ($level == 0) {        
        $key = $b->getType() . '_' . $b->getOrder();
        $result[$key] ["params"] = $this->_loadParam($b);
      } elseif ($level == 1) {
//TODO
      } elseif ($level == 2) {
//TODO
      }
    }
    
    // var_dump($result);
    return $result;
  }

  private function _loadParam($block){
    $result = array();    
    $names = ['custstrattr', 'custboolattr', 'custtextattr', 'custmediattr', 'custdtattr'];
    foreach ($names as $n) {
      $i = 1;      
      $f = true;
      while ($f) {
        $a_n = $n . str_pad($i, 2, 0, STR_PAD_LEFT);      
        $f_n = "get$a_n";      
        if (method_exists($block, $f_n)) {
          $result[$a_n] = $block->$f_n();
        } else { $f = false; }
        $i++;
      }      
    }
    return $result;
  }
}