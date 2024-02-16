<?php

namespace TeamPage\Core\Content\Team;

use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;

class TeamMemberEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $job;

    /**
     * @var string
     */
    protected string $picture;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function setJob(string $job): void
    {
        $this->job = $job;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

}