<?php declare(strict_types=1);

namespace TeamPage\Storefront\Page\Team;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Page\PageLoadedEvent;
use Symfony\Component\HttpFoundation\Request;

class TeamPageLoadedEvent extends PageLoadedEvent
{
    /**
     * @var TeamPage
     */
    protected TeamPage $page;

    public function __construct(TeamPage $page, SalesChannelContext $salesChannelContext, Request $request)
    {
        $this->page = $page;
        parent::__construct($salesChannelContext, $request);
    }

    public function getPage(): TeamPage
    {
        return $this->page;
    }
}