<?php

namespace App\Controller;

use App\Entity\KeyWord;
use App\Form\KeyWordForm;
use App\Repository\KeyWordRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/key/word')]
final class KeyWordController extends AbstractController
{
    #[Route(name: 'app_key_word_index', methods: ['GET'])]
    public function index(KeyWordRepository $keyWordRepository): Response
    {
        return $this->render('key_word/index.html.twig', [
            'key_words' => $keyWordRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_key_word_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $keyWord = new KeyWord();
        $form = $this->createForm(KeyWordForm::class, $keyWord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($keyWord);
            $entityManager->flush();

            return $this->redirectToRoute('app_key_word_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('key_word/new.html.twig', [
            'key_word' => $keyWord,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_key_word_show', methods: ['GET'])]
    public function show(KeyWord $keyWord): Response
    {
        return $this->render('key_word/show.html.twig', [
            'key_word' => $keyWord,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_key_word_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, KeyWord $keyWord, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KeyWordForm::class, $keyWord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_key_word_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('key_word/edit.html.twig', [
            'key_word' => $keyWord,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_key_word_delete', methods: ['POST'])]
    public function delete(Request $request, KeyWord $keyWord, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$keyWord->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($keyWord);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_key_word_index', [], Response::HTTP_SEE_OTHER);
    }
}
