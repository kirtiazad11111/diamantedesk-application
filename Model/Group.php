<?php
/*
 * Copyright (c) 2014 Eltrino LLC (http://eltrino.com)
 *
 * Licensed under the Open Software License (OSL 3.0).
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://opensource.org/licenses/osl-3.0.php
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@eltrino.com so we can send you a copy immediately.
 */

namespace Diamante\AutomationBundle\Model;

use Diamante\DeskBundle\Model\Shared\Entity;
use Rhumsaa\Uuid\Uuid;

class Group implements Entity
{

    const INCLUSIVE_CONNECTOR = 'AND';
    const EXPRESSION_CONNECTOR = 'OR';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $connector;

    /**
     * @var Group|null
     */
    protected $parent;

    protected $rule;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @param string     $connector
     * @param Group|null $parent
     */
    public function __construct($connector = self::INCLUSIVE_CONNECTOR, Group $parent = null) {
        $this->id = (string)Uuid::uuid4();
        $this->connector = $connector;
        $this->parent = $parent;
        $this->createdAt = new \DateTime('now', new \DateTimeZone('UTC'));
        $this->updatedAt = clone $this->createdAt;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getConnector()
    {
        return $this->connector;
    }

    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}