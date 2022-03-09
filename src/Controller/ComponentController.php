<?php

namespace App\Controller;

use App\Entity\Component;
use App\Entity\Template;
use App\Form\ComponentType;
use App\Repository\ComponentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/component')]
class ComponentController extends AbstractController
{
    #[Route('/', name: 'component_index', methods: ['GET'])]
    public function index(ComponentRepository $componentRepository): Response
    {
        return $this->render('component/index.html.twig', [
            'components' => $componentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'component_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $component = new Component();
        $form = $this->createForm(ComponentType::class, $component);
        $form->handleRequest($request);
        


        if ($form->isSubmitted() && $form->isValid()) {
            // dd($request->request->get('template_id'));
            $template = $entityManager->getRepository(Template::class)->find($_POST['template_id']);
            $component->setTemplate($template);

            $entityManager->persist($component);
            $entityManager->flush();


            return $this->redirectToRoute('template_show', [ 'id'=>$_POST['template_id']], Response::HTTP_SEE_OTHER);
        }
        // dd($_GET['id']);
        return $this->renderForm('component/new.html.twig', [
            'component' => $component,
            'form' => $form,
            'id'=>$_GET['id']
        ]);
    }

    #[Route('/{id}', name: 'component_show', methods: ['GET'])]
    public function show(Component $component): Response
    {
        return $this->render('component/show.html.twig', [
            'component' => $component,
        ]);
    }

    #[Route('/{id}/edit', name: 'component_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Component $component, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ComponentType::class, $component);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('component_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('component/edit.html.twig', [
            'component' => $component,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'component_delete', methods: ['POST'])]
    public function delete(Request $request, Component $component, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$component->getId(), $request->request->get('_token'))) {
            $entityManager->remove($component);
            $entityManager->flush();
        }

        return $this->redirectToRoute('component_index', [], Response::HTTP_SEE_OTHER);
    }
}
