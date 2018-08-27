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
          'order' => $i,
          'path' => ''
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
      $key = $b->getType() . '_' . $b->getOrder();
      if ($level == 0) {        
        $result[$key] ["params"] = $this->_loadParam($b);
        $result[$key] ['path'] = $b->getPath();
      } elseif ($level == 1) {
        if (count($result[$key]["params"]) > 0){
          if ($result[$key]['path'] == '/') {
            $result[$key] ["params"] = $this->_loadParam($b);
            $result[$key] ['path'] = $b->getPath();
          } elseif (($result[$key] ['path'] == "{$slug[0]}/*") && 
            $b->getPath() != '/'){
            $result[$key] ["params"] = $this->_loadParam($b);
            $result[$key] ['path'] = $b->getPath();
          }
        } else {
          $result[$key] ["params"] = $this->_loadParam($b);
          $result[$key] ['path'] = $b->getPath();
        }
      } elseif ($level == 2) {
        if (count($result[$key]["params"]) > 0){
          if ($result[$key]['path'] == '/') {
            $result[$key] ["params"] = $this->_loadParam($b);
            $result[$key] ['path'] = $b->getPath();
          } 
        } else {
          $result[$key] ["params"] = $this->_loadParam($b);
          $result[$key] ['path'] = $b->getPath();
        }
      }

      if ($b->getType() == 't698'){
        $result['form'] = array(
          'id' => $b->getId()
        );
      };
      if ($b->getType() == 't404'){
        $result[$key]['news'] = $this->_loadNews();
      }
    }

    // var_dump($result);
    return $result;
  }

  private function _loadParam($block){
    $result = array();
    $names = ['custstrattr', 'custboolattr', 'custtextattr', 'custmediattr',
      'custdtattr', 'slides', 'contacts'];
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

  private function _loadNews($tag = null, $limit = 20, $inline = 4){
    $result = array();
    $qb = $this->em->getRepository("AppBundle:News")->createQueryBuilder('n');
    if($tag) {
      $qb->where(
        $qb->expr()->andX(
          $qb->expr()->like('n.tag', '?1'),
          $qb->expr()->eq('n.public', true)
        )
      )
      ->setParameter('1', $tag);
    } else
      $qb->where($qb->expr()->eq('n.public', true));    

    $news = $qb->orderBy('n.newsdate', 'ASC') 
      ->setMaxResults( $limit )
      ->getQuery()
      ->getResult()
    ;
    
    $line = array();    
    $i = 0;
    foreach ($news as $n) {
      $line[] = $n;
      $i++;
      if ($i == $inline){
        $result[] = $line;
        $line = array();
        $i = 0;
      }
    }
    $result[] = $line;     
    return $result;
  }
}