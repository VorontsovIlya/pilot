<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use AppBundle\Entity\Block;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Orm\Route;

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

      if (array_key_exists($value, $available_blocks)){
        $result["{$value}_{$i}"] = array(
          'file' => $value,
          'params' => array(),
          'order' => $i,
          'path' => ''
        );
      }
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

      if (($b->getType() == 't404')){
        $result[$key]['news'] = $this->_loadNewsBlock();
      }

      if ( ($b->getType() == 't0004')){
        if (!isset($slug[1])) { 
          $result[$key]['news'] = $this->_loadNewsBlock(20);
        } else {
          if (isset($slug[2]) && ($slug[1] == "tag")){
            $result[$key]['news'] = $this->_loadNewsBlock(20, 4, $slug[2]);
          }
        }
      }

      if ( ($b->getType() == 't604')){
        $result[$key]['params']['slides01'] = $this->_loadArtists(); 
      }

      if ($b->getType() == 't0795'){        
        if ($slug[0] != '/artist'){  
          $result[$key]['params']['slides01'] = $this->_loadMusic(); 
        }
      };

      if ($b->getType() == 't0552'){        
        if ($slug[0] != '/artist'){  
          $result[$key]['params']['slides01'] = $this->_loadMusic(true, 8); 
        }
      };

      if ($b->getType() == 't0223'){        
        if ($slug[0] != '/artist'){  
          $videos = $this->_loadVideo(); 
          $result[$key]['params']['slides01'] = $videos;
          $artists = array();
          foreach ($videos as $v) {            
            $artist = $v['artist']->getTitle();
            if (!in_array($artist, $artists)){
              $artists[] = $artist;
            }
          }          
          $result[$key]['params']['custboolattr01'] = true; 
          $result[$key]['params']['slides02'] = $artists;
        }
      };

    }

    $result['artist'] = false;

    if ($level == 2){
      if ($slug[0] == '/artist'){
        $result['artist']['loaded'] = true;
        $result = $this->_loadArtist($result, $slug);
      }
    }

    return $result;
  }

  private function _loadParam($block){
    $result = array();
    $names = ['custstrattr', 'custboolattr', 'custtextattr', 'custmediattr',
      'custdtattr', 'slides', 'contacts', 'menu'];
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

  private function _loadNewsBlock($limit = 4, $inline = 4, $tag = null){
    $result = array();
    $qb = $this->em->getRepository("AppBundle:News")->createQueryBuilder('n');
    if($tag) {
      $qb->where(
        $qb->expr()->andX(
          $qb->expr()->like('n.tag', '?1'),
          $qb->expr()->eq('n.public', true)
        )
      )
      ->setParameter('1', "%".$tag."%");
    } else
      $qb->where($qb->expr()->eq('n.public', true));

    $news = $qb->orderBy('n.newsdate', 'desc')
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
    return $news;
  }

  private function _loadArtist($data, $slug){
    $qb = $this->em->getRepository("AppBundle:Artist")->createQueryBuilder('a');
    $artist = $qb->where('a.path = :path')
      ->setParameter('path', $slug[1])
      ->setMaxResults( 1 )
      ->getQuery()
      ->getResult();
    if(count($artist) == 1){
      $artist = $artist[0];
      $data['artist'] = true;
      if (isset($data['t0002_0']['params'])){
        $data['t0002_0']['params']['custmediattr01'] = $artist->getImage();
        $data['t0002_0']['params']['custstrattr01'] = $artist->getTitle();
      }
      if (isset($data['t188_0']['params'])){
        $data['t188_0']['params']['custstrattr01'] = $artist->getSocialFB();
        $data['t188_0']['params']['custstrattr02'] = $artist->getSocialVK();
        $data['t188_0']['params']['custstrattr03'] = $artist->getSocialTw();
        $data['t188_0']['params']['custstrattr04'] = $artist->getSocialYTube();
        $data['t188_0']['params']['custstrattr05'] = $artist->getSocialInst();
      }
      if (isset($data['t795_0']['params'])){
        $data['t795_0']['params']['custstrattr01'] = $artist->getTitle();
        $data['t795_0']['params']['custstrattr02'] = $artist->getDescr();
      }
      if (isset($data['t004_0']['params'])){
        $data['t004_0']['params']['custtextattr01'] = $artist->getContent();
      }
      if (isset($data['t552_0']['params'])){
        $data['t552_0']['params']['slides01'] = $artist->getSlides01();
      }
      if (isset($data['t0795_0']['params'])){
        $data['t0795_0']['params']['slides01'] = $artist->getMusic();
      }      
      if (isset($data['t0223_0']['params'])){
        $data['t0223_0']['params']['slides01'] = $artist->getVideo();
      }      
    }
    return $data;
  }

  private function _loadMusic($starred = false, $count = 50){
    $qb = $this->em->getRepository("AppBundle:Music")->createQueryBuilder('m');
    // if($starred) {
    //   $qb->orderBy('m.starred', 'ASC');
    // }
    $music = $qb->where('m.active = :active')
      ->orderBy('m.id', 'DESC')
      ->setParameter('active', true)
      ->setMaxResults($count)
      ->getQuery()
      ->getResult()
    ;
    $result = array();
    $line = array();
    foreach ($music as $m){
      $line['title'] = $m->getTitle();
      $line['artist'] = $m->getArtist();
      $line['link'] = $m->getLink();
      $line['image'] = $m->getImage();
      $line['route'] = $m->getRoute();
      $result[] = $line;
      $line = array();
    }
    return $result;
  }

  private function _loadVideo($starred = false, $count = 50){
    $qb = $this->em->getRepository("AppBundle:Video")->createQueryBuilder('v');
    // if($starred) {
    //   $qb->orderBy('v.starred', 'ASC');
    // }
    $video = $qb->where('v.active = :active')
      ->orderBy('v.id', 'DESC')
      ->setParameter('active', true)
      ->setMaxResults($count)
      ->getQuery()
      ->getResult()
    ;
    $result = array();
    $line = array();
    foreach ($video as $v){
      $line['title'] = $v->getTitle();
      $line['artist'] = $v->getArtist();
      $line['video'] = $v->getVideo();      
      $result[] = $line;
      $line = array();
    }
    return $result;
  }

  private function _loadArtists(){
    $qb = $this->em->getRepository("AppBundle:Artist")->createQueryBuilder('a');
    $artists = $qb->getQuery()
      ->getResult();

    $result = array();
    $line = array();
    foreach ($artists as $a){
      $line['title'] = $a->getTitle();
      $line['image'] = $a->getImage();
      $line['path'] = $a->getPath();
      $line['social_fb'] = $a->getSocialFB();
      $line['social_vk'] = $a->getSocialVK();
      $line['social_ytube'] = $a->getSocialYTube();
      $line['social_inst'] = $a->getSocialInst();
      // $line['video'] = $a->getVideo();      
      $result[] = $line;
      $line = array();
    }
    return $result;
  }
}