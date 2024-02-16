<?php

namespace TeamPage\Core\Content\Team;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class TeamMemberCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return TeamMemberEntity::class;
    }

}