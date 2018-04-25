<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 25/04/18
 * Time: 12:54
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends Controller
{

    /**
     * @Route("/ad", name="ad")
     */
    public function IndexAction()
    {
        return new Response('Page Annonces');

    }

    /**
     * @Route("/ad/offer", name="ad_offer")
     */
    public function ListOfferAction()
    {
        return new Response('Page Liste Annonces Offres');

    }

    /**
     * @Route("/ad/request", name="ad_request")
     */
    public function ListRequestAction()
    {
        return new Response('Page Liste Annonces Demande');

    }



}