<?php

namespace AccountingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class rateListController extends Controller
{
    public function indexAction(Request $request)
    {
        $list = $this->getList();
        return $this->render('@AccountingBundle/rateList.html.twig', array(
            'list' => $this->makeSort($list)
        ));
    }

    private function getList()
    {
        $productList = $this->getDoctrine()
            ->getRepository('AccountingBundle:Rate')
            ->findAll();

        return $productList;
    }

    private function makeSort($list)
    {
        usort($list, function ($a, $b) {
            return $a->getDateInsert() > $b->getDateInsert();
        });
        return $list;
    }
}
