<?php

namespace App\Http\Controllers;

use App\ControlNode;
use App\Mail\OneTimePasswordMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ControlNodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all()->where('role', '!=', 'admin');
        return view('admin.add_control_node', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid_node = $this->getStoreValidator($request);
        if ($valid_node->fails()) {
            return redirect()->back()->withErrors($valid_node->errors())->withInput();
        } else {
            ControlNode::create($request->all());
            return redirect()->back()->with('status', 'Control node created');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getStoreValidator(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        $valid_node = Validator::make($request->all(), [
            'node_city' => 'required',
            'node_subcity' => 'required',
            'node_woreda' => 'required',
            'node_kebela' => 'required',
            'node_name' => 'required',
            'node_detail' => 'nullable',
            'node_manager' => 'exists:users,id',
            'node_type' => ['required', 'in:central,child']
        ]);
        return $valid_node;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCentralNodeDashboard()
    {
        $total_case = DB::table('daily_reports')->get('new_case_count')->count();
        $total_fatality_count = DB::table('daily_reports')->get('fatality_count')->count();
        $total_manager = DB::table('users')->where('role', '!=', 'admin')->count();
        $node_count = DB::table('control_nodes')->count('*');
        $response = collect([
            'total_case' => $total_case,
            'total_fatality_count' => $total_fatality_count,
            'total_manager' => $total_manager,
            'node_count' => $node_count
        ]);
        return view('central.dashboard', compact('response'));
    }

    public function addUserView()
    {
        return view('admin.add_user');
    }

    public function addUser()
    {
        $validator = Validator::make(\request()->all(), [
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'nullable|email|unique:users,email',
            'phone_number' => 'required|string|max:10',
            'alternative_phone_number' => 'nullable',
            'role' => 'in:child_node_manager,central_node_manager'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $pass_generated = \Illuminate\Support\Str::random(8);

            $user = User::create(
                [
                    'first_name' => \request('first_name'),
                    'last_name' => \request('last_name'),
                    'email' => \request('email'),
                    'phone_number' => \request('phone_number'),
                    'alternative_phone_number' => \request('alternative_phone_number'),
                    'password' => bcrypt($pass_generated),
                    'role' => \request('role')
                ]);

            Mail::to($user)->send(new OneTimePasswordMail($user, $pass_generated));


            return redirect()->back()->with('status', "User created");
        }
    }

    public function viewUserList()
    {
        $users = User::all()->where('role', '!=', 'admin');
        return view('admin.view_users_list', compact('users'));
    }
}
