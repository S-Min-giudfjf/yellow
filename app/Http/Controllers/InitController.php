<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InitController extends Controller
{
    public function index()
    {
        $job = "";
        $jobKinds1 = "selected=selected";
        $jobKinds2 = "";
        $jobKinds3 = "";
        $jobKinds4 = "";
        $jobLand1 = "selected=selected";
        $jobLand2 = "";
        $jobLand3 = "";
        $jobLand4 = "";
        $income1 = "selected=selected";
        $income2 = "";
        $income3 = "";
        $income4 = "";
        $income5 = "";
        $jobs = \DB::table('jobs')->get();
        $freeWord = "value=フリーワード";

        $user = Auth::user();
        if ($user == NULL) {
            DB::table('logs')->insert([
                'user' => "guest"
            ]);
        } else {
            DB::table('logs')->insert([
                'user' => $user->name
            ]);
        }

        foreach ($jobs as $j) {
            $job .= $j->info;   // 各データの名前を表示
        }

        return view('top', compact(
            'job',
            'freeWord',
            'jobKinds1',
            'jobKinds2',
            'jobKinds3',
            'jobKinds4',
            'jobLand1',
            'jobLand2',
            'jobLand3',
            'jobLand4',
            'income1',
            'income2',
            'income3',
            'income4',
            'income5',
        ));
    }

    public function search(Request $request)
    {
        $jobKinds = $request->input('jobKinds');
        $jobLand = $request->input('jobLand');
        $income = $request->input('income');
        $freeWord = $request->input('freeWord');


        $jobKinds1 = "";
        $jobKinds2 = "";
        $jobKinds3 = "";
        $jobKinds4 = "";
        $jobLand1 = "";
        $jobLand2 = "";
        $jobLand3 = "";
        $jobLand4 = "";
        $income1 = "";
        $income2 = "";
        $income3 = "";
        $income4 = "";
        $income5 = "";

        if ($jobKinds == "0") {
            $jobKinds1 = "selected=selected";
        } else if ($jobKinds == "1") {
            $jobKinds2 = "selected=selected";
        } else if ($jobKinds == "2") {
            $jobKinds3 = "selected=selected";
        } else if ($jobKinds == "3") {
            $jobKinds4 = "selected=selected";
        }

        if ($jobLand == "0") {
            $jobLand1 = "selected=selected";
        } else if ($jobLand == "1") {
            $jobLand2 = "selected=selected";
        } else if ($jobLand == "2") {
            $jobLand3 = "selected=selected";
        } else if ($jobLand == "3") {
            $jobLand4 = "selected=selected";
        }

        if ($income == "0") {
            $income1 = "selected=selected";
        } else if ($income == "300") {
            $income2 = "selected=selected";
        } else if ($income == "400") {
            $income3 = "selected=selected";
        } else if ($income == "500") {
            $income4 = "selected=selected";
        } else if ($income == "600") {
            $income5 = "selected=selected";
        }



        $job = "";
        $jobs = "";

        $jobs = DB::table('jobs')
            ->when(!$jobKinds == "0", function ($q) use ($jobKinds) {
                $q->where('jobkinds', $jobKinds);
            })
            ->when(!$jobLand == "0", function ($q) use ($jobLand) {
                $q->where('jobLand', $jobLand);
            })
            ->when(!$income == "0", function ($q) use ($income) {
                $q->where('income', '>', $income);
            })
            ->when($freeWord <> "フリーワード", function ($q) use ($freeWord) {
                $q->where('jobTitle', 'like', '%' . $freeWord . '%');
            })
            ->get();

        foreach ($jobs as $j) {
            $job .= $j->info;   // 各データの名前を表示
        }

        // ifフリーワードがブランクならフリーワードと入れる 初期値対策
        if ($freeWord == "") {
            $freeWord = "フリーワード";
        }

        $freeWord = "value=" . $freeWord;
        return view('top', compact(
            'job',
            'freeWord',
            'jobKinds1',
            'jobKinds2',
            'jobKinds3',
            'jobKinds4',
            'jobLand1',
            'jobLand2',
            'jobLand3',
            'jobLand4',
            'income1',
            'income2',
            'income3',
            'income4',
            'income5',
        ));
    }

    public function detail(Request $request)
    {

        $detail = $request->input('detail');
        $income = $request->input('income');

        $detailInfo = DB::table('jobs')->where('id', $detail)->first();
        $detail = $detailInfo->detail;


        $freeWord = "フリーワード";
        $jobKinds1 = "selected=selected";
        $jobKinds2 = "";
        $jobKinds3 = "";
        $jobKinds4 = "";
        $jobLand1 = "";
        $jobLand2 = "";
        $jobLand3 = "";
        $jobLand4 = "";
        $income1 = "selected=selected";
        $income2 = "";
        $income3 = "";
        $income4 = "";
        $income5 = "";

        $freeWord = "value=" . $freeWord;
        return view('detail', compact(
            'detail',
            'freeWord',
            'jobKinds1',
            'jobKinds2',
            'jobKinds3',
            'jobKinds4',
            'jobLand1',
            'jobLand2',
            'jobLand3',
            'jobLand4',
            'income1',
            'income2',
            'income3',
            'income4',
            'income5',
        ));
    }

    public function entry(Request $request) {}

    public function seni(Request $request)
    {
        return view('tes');
    }
    public function goLogin()
    {
        return view('auth/login');
    }
    public function db()
    {
        $fuga = "abc";
        echo $fuga;

        echo DB::table('jobs')->count();

        $userBuilder = DB::table('users');
        echo $userBuilder->first();
    }
}
