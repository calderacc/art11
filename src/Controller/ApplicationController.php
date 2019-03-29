<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\ListItem;
use App\Form\ListItemType;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    /**
     * @Route("/application", name="application")
     */
    public function index(Request $request, RegistryInterface $registry, SessionInterface $session): Response
    {
        $listItem = new ListItem();

        $form = $this->createForm(ListItemType::class, $listItem)->add('submit', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $session->getFlashBag()->add('success', 'application.persited');

            $registry->getManager()->persist($listItem);
            $registry->getManager()->flush();
        }

        return $this->render('frontend/index.html.twig', [
            'title' => 'Art 11',
            'applicationForm' => $form->createView(),
        ]);
    }
}
