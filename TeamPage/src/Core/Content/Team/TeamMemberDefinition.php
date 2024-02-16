<?php

namespace TeamPage\Core\Content\Team;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class TeamMemberDefinition extends EntityDefinition
{

    public const ENTITY_NAME = 'team_member';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return TeamMemberEntity::class;
    }

    public function getCollectionClass(): string
    {
        return TeamMemberCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection(
            [
                (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
                (new StringField('name', 'name'))->addFlags(),
                (new StringField('job', 'job'))->addFlags(),
                (new StringField('picture', 'picture'))->addFlags()
            ]
        );
    }
}