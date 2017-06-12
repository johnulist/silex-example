<?php
/**
 * @author Marcos Redondo <kusflo@gmail.com>
 */

namespace UserInfo\Infrastructure\Domain\Model;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

abstract class DoctrineEntityId extends GuidType
{
    public abstract function getNamespace();
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->id();
    }
    
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->getNamespace() . '\\' . $this->getName();
        
        return new $className($value);
    }
}