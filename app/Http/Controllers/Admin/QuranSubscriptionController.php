<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuranStudants;
use App\Models\QuranSubcription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class QuranSubscriptionController extends Controller
{
   

    public function quranSubscription(){
        $quran_students = QuranStudants::with('quranSubscriptions')->get();
        $today = Carbon::now();

       return view('admin.quran.subscriptions.subscription')->with(compact('quran_students','today'));
    }

    public function Updatesubscription($id){

       // $quran_student = QuranSubcription::where('id',$id)->get(['date_renewal','next_date_renewal']);
       $quran_student = QuranSubcription::find($id);
       $today = Carbon::now();
        $dateRenewal = $quran_student->date_renewal;
        $next_date_renewal = $quran_student->next_date_renewal;
        $dateS = new DateTime($next_date_renewal);
            $dateS->modify('+1 month'); // Add one month to the date
            $nextM = $dateS->format('Y-m-d'); // Convert the modified date to a string in the desired format
        // echo '<pre> date renewal: '.$dateRenewal; echo "<br> </pre>"; 
        // echo '<pre> next date renewal: '.$next_date_renewal; echo "<br> </pre>";
        
        // echo '<pre> next month   : '.$nextM; echo "<br> </pre>";
        
        // die;
        $quran_student->date_renewal      = $nextM;
        $quran_student->next_date_renewal =  $nextM;
        $quran_student->status = 1;
        $quran_student->update();

        $message = "Edit student status successfully";
        //$quran_students = QuranStudants::with('quranSubscriptions')->get();
        
        return redirect('admin/quran-subscription')->with('success_message',$message); 
       //return view('admin.quran.subscriptions.subscription')->with(compact('quran_students','today'));

    }



}
