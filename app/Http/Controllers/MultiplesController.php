<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MultiplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $multiple3 = [];
        $multiple5 = [];
        $multiple3and5 = [];
        $numberValue = [];

        for ($i=1; $i <= 100 ; $i++) { 
            switch (true) {
                case (($i % 3) == 0 && !(($i % 5) == 0)):
                    
                    $multiple3[] = [
                        'number' => $i,
                        'value' => 'LINIO'
                    ];

                    $numberValue[] = [
                        'number' => $i,
                        'value' => 'LINIO'
                    ];
                    break;

                case (($i % 5) == 0 && !(($i % 3) == 0)):
                    
                    $multiple5[] = [
                        'number' => $i,
                        'value' => 'IT'
                    ];

                    $numberValue[] = [
                        'number' => $i,
                        'value' => 'IT'
                    ];
                    break;

                case (($i % 5) == 0 && (($i % 3) == 0)):
                    
                    $multiple3and5[] = [
                        'number' => $i,
                        'value' => 'LINIANOS'
                    ];

                    $numberValue[] = [
                        'number' => $i,
                        'value' => 'LINIANOS'
                    ];
                    break;
                
                default:

                    $numberValue[] = [
                        'number' => $i,
                        'value' => '--'
                    ];
                    break;
            }
        }

        $paginatedItems = $this->paginatedItems($request,$numberValue);

        return view(
            'multiples-index', 
            [
                'multiple3' => $multiple3,
                'multiple5' => $multiple5,
                'multiple3and5' => $multiple3and5,
                'numberValue'=>$paginatedItems,
            ]
        );
    }

    public function paginatedItems($request,$multiple)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($multiple);
        $perPage = 15;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());

        return $paginatedItems;
    }
}
