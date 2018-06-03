<?php

namespace AppBundle\ORM;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\ORM\Mapping as M;

class QuoteStrategy implements M\QuoteStrategy
{
  private function quote($token, AbstractPlatform $platform)
  {   
    switch ($platform->getName()) {
      case 'mysql':
      default:
        return '`' . $token . '`';
    }
  }

  public function getColumnName($fieldName, M\ClassMetadata $class, AbstractPlatform $platform)
  {
    return $this->quote($class->fieldMappings[$fieldName]['columnName'], $platform);
  }
  
  public function getTableName(M\ClassMetadata $class, AbstractPlatform $platform)
  {
    return $platform->quoteIdentifier($class->table['name']);
  }

  public function getSequenceName(array $definition, M\ClassMetadata $class, AbstractPlatform $platform)
  {
    return $platform->quoteIdentifier($definition['sequenceName']);
  }

  public function getJoinTableName(array $association, M\ClassMetadata $class, AbstractPlatform $platform)
  {
    return $platform->quoteIdentifier($association['joinTable']['name']);
  }

  public function getJoinColumnName(array $joinColumn, M\ClassMetadata $class, AbstractPlatform $platform)
  {
    return $platform->quoteIdentifier($joinColumn['name']);
  }

  public function getReferencedJoinColumnName(array $joinColumn, M\ClassMetadata $class, AbstractPlatform $platform)
  {
    return $platform->quoteIdentifier($joinColumn['referencedColumnName']);
  }

  public function getIdentifierColumnNames(M\ClassMetadata $class, AbstractPlatform $platform)
  {
    $quotedColumnNames = array();
    foreach ($class->identifier as $fieldName) {
      if (isset($class->fieldMappings[$fieldName])) {
        $quotedColumnNames[] = $this->getColumnName($fieldName, $class, $platform);
        continue;
      }
      // Association defined as Id field
      $joinColumns = $class->associationMappings[$fieldName]['joinColumns'];
      $assocQuotedColumnNames = array_map(
        function ($joinColumn) use ($platform)
        {
          return $platform->quoteIdentifier($joinColumn['name']);
        },
        $joinColumns
      );
      $quotedColumnNames = array_merge($quotedColumnNames, $assocQuotedColumnNames);
    }
    return $quotedColumnNames;
  }

  public function getColumnAlias($columnName, $counter, AbstractPlatform $platform, M\ClassMetadata $class = null)
  {
    $columnName = $columnName . $counter;
    $columnName = substr($columnName, -$platform->getMaxIdentifierLength());
    $columnName = preg_replace('/[^A-Za-z0-9_]/', '', $columnName);
    $columnName = is_numeric($columnName) ? '_' . $columnName : $columnName;
    return $platform->getSQLResultCasing($columnName);
  }
}  