<?php

namespace App\Controller;

use App\Entity\Deal;
use App\Repository\DealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Route("/deal")
 */
class DealController extends AbstractController
{
    /**
     * @Route("/", name="app_deal")
     */
    public function index(DealRepository $dealRepo): Response
    {
        return $this->render('deal/index.html.twig', [
            'deals' => $dealRepo->findAll(),
        ]);
    }

    /**
     * @Route("/add/", name="app_deal_add", methods={"POST"})
     */
    public function add(Request $request, ValidatorInterface $validator): Response
    {
        $em = $this->getDoctrine()->getManager();
        $deal = new Deal();
        /*$constraint = new Assert\Collection([
            'number' => new Assert\NotBlank(),
            'sum' => new Assert\Length([
                'max' => 255,
                'maxMessage' => 'Field must be at least {{ limit }} characters long',
            ]),
            'email' => new Assert\Email(),
            'phone' => new Assert\Length([
                'max' => 255,
                'maxMessage' => 'Field must be at least {{ limit }} characters long',
            ]),
            'status' => new Assert\NotBlank()
            
        ]);*/
        $payload = json_decode($request->getContent(), true);
    /*$violations = $validator->validate($payload , $constraint);

        foreach($violations as $violation)
        {
            $errors[] = [$violation->getPropertyPath() => $violation->getMessage()];
        }
        //dd($errors);
        if(isset($errors)){
            $errorsMessages = [];
            foreach ($errors as $value) {
                if(is_array($value)) {
                    foreach ($value as $property => $message) {
                        $errorsMessages[$property] = $message;        
                    }
                }
            }
            return new Response(json_encode($errorsMessages), Response::HTTP_INTERNAL_SERVER_ERROR);
        }*/
        foreach ($payload as $key => $value) {
            switch ($key) {
                case 'number':
                    $deal->setNumber($value);
                    break;
                /*case 'type':
                    $deal->setType($value); relation
                    break;*/
                case 'sum':
                    $deal->setSum($value);
                    break;
                case 'email':
                    $deal->setEmail($value);
                    break;
                case 'phone':
                    $deal->setPhone($value);
                    break;
                case 'status':
                    $deal->setStatus($value);
                    break;
            }
        }
        $em->persist($deal);
        $em->flush();
        return new Response('success', Response::HTTP_OK);
        
    }

    /**
     * @Route("/update/", name="app_deal_update", methods={"POST"})
     */
    public function update(Request $request, DealRepository $dealRepo): Response
    {
        $em = $this->getDoctrine()->getManager();
        $payload = json_decode($request->getContent(), true);
        $deal = $dealRepo->find($payload['id']);
        foreach ($payload as $key => $value) {
            switch ($key) {
                case 'number':
                    $deal->setNumber($value);
                    break;
                /*case 'type':
                    $deal->setType($value); relation
                    break;*/
                case 'sum':
                    $deal->setSum($value);
                    break;
                case 'email':
                    $deal->setEmail($value);
                    break;
                case 'phone':
                    $deal->setPhone($value);
                    break;
                case 'status':
                    $deal->setStatus($value);
                    break;
            }
        }
        $em->flush();
        return new Response('success', Response::HTTP_OK);
    }
}
