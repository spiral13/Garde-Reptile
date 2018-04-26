<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 25/04/18
 * Time: 12:54
 */

namespace AppBundle\Controller;


use AppBundle\Form\AdType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Ad;

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
        return $this->render('templates/offer.html.twig');

    }

    /**
     * @Route("/ad/request", name="ad_request")
     */
    public function ListRequestAction()
    {
        return $this->render('templates/request.html.twig');

    }


    /**
     * @Route("/ad/create", name="ad_create")
     *
     */
    public function CreateAction(Request $request)
    {
        $ad = new Ad();

        $form = $this->createForm(AdType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->flush();

            return new Response("Annonce publiée.");
        }

        $formview = $form->createView();

        return $this->render('templates/createAd.html.twig', array(
            'form'=>$formview));

    }



}