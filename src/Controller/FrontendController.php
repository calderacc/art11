<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\ListItem;
use App\Form\ListItemType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        $form = $this->createForm(ListItemType::class, new ListItem(), [
            'action' => 'application',
        ])->add('submit', SubmitType::class);

        return $this->render('frontend/index.html.twig', [
            'title' => 'Art 11',
            'applicationForm' => $form->createView(),
        ]);
    }
}
