<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 26/04/18
 * Time: 16:43
 */

namespace AppBundle\Controller;

use AppBundle\Form\CommentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Comments;

class CommentsController extends Controller
{
//    - - - - - - - - - - - -
    /**
     * @Route("/ad/comment", name="ad_comment")
     *
     */
    public function CommentAction(Request $request)
    {
        $comment = new Comments();

        $formCom = $this->createForm(CommentsType::class, $comment);

        $formCom->handleRequest($request);

        if ($formCom->isSubmitted() && $formCom->isValid() ) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

//            $this->addFlash(
//                'notice',
//                'Annonce publiée!');

            return $this->redirectToRoute('ad_id');
        }

        $formview = $formCom->createView();

        return $this->render('templates/comment.html.twig', array(
            'formCom'=>$formview));
        dump($formCom);

    }
}