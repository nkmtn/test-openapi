<?php

namespace App\Controller;

//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\TryTestRepository;
use App\Repository\TaskRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     * @param UserInterface $user
     * @param TryTestRepository $r
     * @return Response
     */
    public function index(/*UserInterface $user, UserRepository $r*/): Response
    {
//        $x = $r->findOneBy(['id'=>$user->getId()]);
//        $t = $x->getTryTests();
//        $arr = [];
//        foreach ($t as $item) {
//            $arr []= [
//                'title' => $item->getTestId()->getTitle(),
//                'begin' => $item->getDateStart(),
//                'end' => $item->getDateEnd()
//            ];
//        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
//            'tests' => $arr
        ]);
    }

    public function test(TaskRepository $task): Response
    {
        $t = $task->findBy(['testId' => 1]);
        $arr = [];
        foreach ($t as $item) {
            $a = $item->getAnswers();
            $aarr = [];
            foreach ($a as $aitem) {
                $aarr []= [
                    'id' => $aitem->getId(),
                    'title' => $aitem->getTitle()
                ];
            }
            $arr []= [
                'id' => $item->getId(),
                'title' => $item->getTitle(),
                'answers' => $aarr
            ];
        }

        return $this->render('test.html.twig', [
            'controller_name' => 'test',
            'tasks' => $arr
        ]);
    }

    public function result(Request $req, TaskRepository $task): Response
    {
        $x = $req->request;
        $counter = 0;
        $t = $task->findBy(['testId' => 1]);

        foreach ($t as $item) {
            $id = $item->getId();
            $a = $item->getAnswers();
            $cor = 0;
            foreach ($a as $aitem) {
                if ($aitem->getCorrect() == "yes") {
                    $cor = $aitem->getId();
                }
            }
            if ($x->get($id) == $cor) {
                $counter++;
            }
        }

        return $this->render('result.html.twig', [
            'controller_name' => 'result',
            'result' => $counter
        ]);
    }
}
