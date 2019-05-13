<?php

namespace AccountingBundle\Controller;

use AccountingBundle\Entity\Rate;
use AccountingBundle\form\ReserverenType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use \DateTime;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->getAddingForm($request);
        return $this->render('@AccountingBundle/index.html.twig', array(
            'form' => $form ? $form->createView() : false,
        ));
    }

    /**
     * в задании не указано нужно ли создавать формы с учетом повторного использования, поэтому пока они в контроллере
     */
    public function getAddingForm(Request $request)
    {
        /** @var \DateTime $curentDate */
        $curentDate = new DateTime('tomorrow');

        /** @var Rate $rate */
        $rate = new Rate();
        $rate->setRate('Make a new Rate');
        $rate->setName('NewRate');
        $rate->setCategory('1');
        $rate->setDateInsert($curentDate);
        $rate->setSumm(0.00);

//        для боевого проекта стоит сделать отдельный файл с конфигами
        $category = $this->container->getParameter('category');

        /** @var Form $form */
        $form = $this->createForm(ReserverenType::class, $rate)
            ->add('name', TextType::class)
            ->add('dateInsert', DateType::class)
            ->add('category', ChoiceType::class,[
                'choices'  => $category,
            ])
            ->add('summ',NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Rate'));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rate = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($rate);
            $em->flush();

            //return $this->redirectToRoute('');
            return false;
        }

        return $form;
    }
}
