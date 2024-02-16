<?php declare(strict_types=1);

namespace TeamPage\Storefront\Controller;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use TeamPage\Core\Content\Team\TeamMemberCollection;
use TeamPage\Storefront\Page\Team\TeamPageLoader;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class TeamPageController extends StorefrontController
{
    /**
     * @var TeamPageLoader
     */
    private TeamPageLoader $teamPageLoader;

    /**
     * @param TeamPageLoader $teamPageLoader
     */
    private EntityRepository $TeamMemberRepository;

    public function __construct(TeamPageLoader $teamPageLoader, EntityRepository $TeamMemberRepository)
    {
        $this->teamPageLoader = $teamPageLoader;
        $this->TeamMemberRepository = $TeamMemberRepository;
    }

    #[Route(path: '/team', name: 'frontend.team.page', methods: ['GET'])]
    public function teamPage(Request $request, SalesChannelContext $context): Response
    {
        $page = $this->teamPageLoader->load($request, $context);
        $teamMembers = $this->TeamMemberRepository->search(new Criteria(), $context->getContext());

        return $this->renderStorefront('@TeamPage/storefront/page/teamPage.html.twig', [
            'teamMembers' => $teamMembers
        ]);

    }
}