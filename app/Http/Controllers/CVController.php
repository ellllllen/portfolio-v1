<?php namespace App\Http\Controllers;

class CVController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('cv');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadPdfVersion()
    {
        return response()->download('storage/cv.pdf');
    }
} 