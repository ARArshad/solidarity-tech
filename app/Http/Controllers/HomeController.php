<?php

namespace App\Http\Controllers;
use App\Services\InterestService;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @var InterestService
     */
    private InterestService $interestService;

    /**
     * Create a new controller instance.
     * @return void
     */

    public function __construct(InterestService $interestService)
    {
        $this->interestService = $interestService;
     }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $interests = $this->interestService->allInterests();

        return view('main', compact('interests'));
    }
}
