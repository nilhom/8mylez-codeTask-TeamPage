<?php declare(strict_types=1);

namespace TeamPage\Storefront\Page\Team;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Page\GenericPageLoaderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;

class TeamPageLoader
{
    /**
     * @var GenericPageLoaderInterface
     */
    private GenericPageLoaderInterface $genericPageLoader;

    /**
     * @var EventDispatcherInterface
     */
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(GenericPageLoaderInterface $genericPageLoader, EventDispatcherInterface $eventDispatcher)
    {
        $this->genericPageLoader = $genericPageLoader;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function load(Request $request, SalesChannelContext $context): TeamPage
    {
        $page = $this->genericPageLoader->load($request, $context);
        $page = TeamPage::createFrom($page);

        $this->eventDispatcher->dispatch(
            new TeamPageLoadedEvent($page, $context, $request)
        );

        return $page;
    }
}