<?php

namespace App\Controller;

use App\Repository\ContoCorrenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/getmoney/{iban}", name="getMoney" , methods={"GET"})
     */
    public function getmoney(Request $request,ContoCorrenteRepository $rep, string $iban): Response
    {
        return $this->response($request, $rep->findMoneyByIban($iban));
    }

    public function response(Request $request , $data, $message = null , $status_code=200):Response{
        if($message != null){
            $data["error"]=$message;
        }
        $response=$this->json($data,$status_code);
        $response->headers->set("Access-Control-Allow-Origin", $request->headers->get("host"));
        $response->headers->set("Access-Control-Allow-Credentials","true");

        return $response;
    }
}
