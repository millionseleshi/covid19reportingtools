<?php

namespace App\Http\Controllers;


use App\ControlNode;
use App\DailyReport;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use function request;

class DailyReportController extends Controller
{
    //show form to send daily report
    public function childDailyReport()
    {
        return view('child.send_daily_report');
    }

    //show form to view daily report
    public function centralDailyReport()
    {
        $today_reports = DailyReport::whereDate('created_at', Carbon::today())->get();
        $daily_reports = DailyReport::orderBy('created_at', 'desc')->get();
        return view('central.view_daily_report', compact('daily_reports', 'today_reports'));
    }

    //Show daily report detail to  central
    public function sendDailyReport()
    {
        $valid_report = Validator::make(request()->all(), [
            'new_case_count' => 'numeric',
            'fatality_count' => 'numeric',
            'summary' => 'nullable',
        ]);

        if ($valid_report->fails()) {
            return redirect()->back()->with($valid_report->errors())->withInput();
        } else {
            $node_id = ControlNode::where('node_manager', Auth::user()->id)->first();
            DailyReport::create([
                "new_case_count" => request('new_case_count'),
                "fatality_count" => request('fatality_count'),
                "summary" => request('summary'),
                "control_node_id" => $node_id->id
            ]);
            return redirect()->back()->with("status", "Report Sent");
        }
    }

    public function showDailyReportDetail($id)
    {
        $responses = $this->getAllDailyReports($id);

        return view('central.report_detail', compact('responses'));
    }

    /**
     * @param $id
     * @return Collection
     */
    public function getAllDailyReports($id): Collection
    {
        $daily_report = DailyReport::find($id);
        $responses = collect([

            "new_case_count" => $daily_report->pluck('new_case_count')[0],
            'fatality_count' => $daily_report->pluck('fatality_count')[0],
            'summary' => $daily_report->pluck('summary')[0],
            'node_manager' => User::where('id',
                    ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_manager')[0])->pluck('first_name')[0]
                . " " .
                User::where('id',
                    ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_manager')[0])->pluck('last_name')[0],
            'node_city' => ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_city')[0],
            'node_subcity' => ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_subcity')[0],
            'node_woreda' => ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_woreda')[0],
            'node_kebela' => ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_kebela')[0],
            'node_name' => ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_name')[0],
            'node_contact' => User::where('id',
                ControlNode::where('id', $daily_report->pluck('control_node_id')[0])->pluck('node_manager')[0])->pluck('phone_number')[0]
        ]);
        return $responses;
    }

    /**
     * @return Factory|View
     */
    public function DailyReportSentByMe()
    {
        $control_node = ControlNode::all()->where('node_manager', '==', Auth::user()->id)->first();
        $daily_reports = DailyReport::all()->where('control_node_id', '==', $control_node->id);
        return view('child.sent_by_me', compact('daily_reports'));
    }

    public function editDailyReport()
    {
        $valid_report = Validator::make(request()->all(), [
            "id" => 'exists:daily_reports,id',
            'new_case_count' => 'numeric',
            'fatality_count' => 'numeric',
            'summary' => 'nullable',
        ]);

        if ($valid_report->fails()) {
            return redirect()->back()->with($valid_report->errors())->withInput();
        } else {
            $node_id = ControlNode::where('node_manager', Auth::user()->id)->first();
            $daily_report = DailyReport::find(request('id'));
            $daily_report->new_case_count = request('new_case_count');
            $daily_report->fatality_count = request('fatality_count');
            $daily_report->summary = request('summary');
            $daily_report->control_node_id = $node_id->id;
            $daily_report->save();
            return redirect()->back()->with("status", "Report updated");
        }
    }

    public function newCaseCountByMonth()
    {
        $new_case = [];
        for ($i = 1; $i <= 12; $i++) {
            $new_case[$i] = DB::table('daily_reports')->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $i)->sum('new_case_count');
        }
        return JsonResponse::create($new_case);
    }

    public function newCaseCountByDay()
    {
        $new_case = [];
        for ($i = 1; $i <= 31; $i++) {
            $new_case[$i] = DB::table('daily_reports')->whereYear('created_at', Carbon::now()->year)
                ->whereDay('created_at', $i)->sum('new_case_count');
        }
        return JsonResponse::create($new_case);
    }

    public function fatalityCountByMonth()
    {
        $fatality_count = [];
        for ($i = 1; $i <= 12; $i++) {
            $fatality_count[$i] = DB::table('daily_reports')->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $i)->sum('fatality_count');
        }
        return JsonResponse::create($fatality_count);
    }

    public function fatalityCountByDay()
    {
        $fatality_count = [];
        for ($i = 1; $i <= 31; $i++) {
            $fatality_count[$i] = DB::table('daily_reports')->whereYear('created_at', Carbon::now()->year)
                ->whereDay('created_at', $i)->sum('fatality_count');
        }
        return JsonResponse::create($fatality_count);
    }
}
