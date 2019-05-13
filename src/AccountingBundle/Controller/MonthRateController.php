<?php

namespace AccountingBundle\Controller;

use AccountingBundle\Entity\Rate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MonthRateController extends Controller
{
    public function indexAction(Request $request, $date)
    {
        $list = $this->getList($date);

        $category = $this->container->getParameter('category');

        return $this->render('@AccountingBundle/MonthRate.html.twig', array(
            'id' => $date,
            'list' => $list,
            'columns' => $category,
            'rows' => $this->getMonthDaysCount($date)
        ));
    }

    private function getList($month)
    {
        $productList = $this->getDoctrine()
            ->getRepository(Rate::class)->getByDate($month);

        return $productList;
    }

    private function getMonthDaysCount($date)
    {
        $newDate = new \DateTime($date);
        $month = $newDate->format('m');
        $year = $newDate->format('Y');
        $monthDayCount = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $monthDayCount;
    }
}
