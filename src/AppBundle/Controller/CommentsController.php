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
use AppBundle\Entity\Ad;

class CommentsController extends Controller
{
    /**
     * @Route("/ad/{id}/comment", name="ad_comment")
     *
     */
    public function CommentAction(Request $request)
    {
        $comment = new Comments();

        $user = $this->getUser();
        $comment->setUser($user);

        $form = $this->createForm(CommentsType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->persist($user);
            $em->flush();

//            $this->addFlash(
//                'notice',
//                'Annonce publiée!');

            return $this->redirectToRoute('homepage');
        }

        $formview = $form->createView();

        return $this->render('templates/comment.html.twig', array(
            'form'=>$formview));


    }
}