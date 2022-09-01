<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/session_check")
 */
class SessionCheckController extends AbstractController
{
    /**
     * @Route("/modify_check/", name="session_modify_check", methods={"GET", "POST"})
     */
    public function modifyCheck(Request $request): Response
    {
        $session = $request->getSession();
        $payload = json_decode($request->getContent(), true);
        if (!empty($payload)) {
            foreach ($payload as $key => $value) {
                $session->set($key, $value);    
            }
            
            return new Response('success', Response::HTTP_OK);
        }
        return new Response('Resourse not found or empty json data', Response::HTTP_NOT_FOUND);
    }
}
