<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan, App\RepaymentSchedule, App\Application, App\User, App\Payment, App\Monitor;
use App\Libraries\fuzzy_logic;
use Auth;
use DB;
use Redirect;

class LoanController extends Controller
{

    public function __construct(){
       $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $loans = Loan::orderBy('created_at', 'DESC')->paginate(15);
        return view('loan.index', compact('loans'));
    }

    public function monitoring(){
        //get all loans from the monitoring table
        $loans = Loan::with('monitor')->get();
        
        // dd($monitors[2]->monitor->date_paid);
        return view('loan.monitor',compact('loans'));
    }

    /**
     * Displays a view for showing client loan repayment paid so far
     * returns a view 
     */

    public function showPayments(){
        $payments = Payment::all();
        return view('loan.payments',compact('payments'));
    }

    public function add_payment(){
        $loans = $this->getUserLoans();
        return view('loan.addpayment', compact('loans'));
    }

    public function editPayment($id){
        $payment = Payment::find($id);
        $loans = $this->getUserLoans();
        return view('loan.addpayment',compact('payment','loans'));
    }

    public function paybacks(){
        $payments = Payment::all();
        return view('loan.paybacks',compact('payments'));
    }

    public function delete($model, $id){
        try{
            // $entities = call_user_func('App\\'.$model.'::findOrFail('.$id.')');
            $user = Payment::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('message','Data Deleted!')
                                    ->with('status','Success')
                                    ->with('color','success');
        }catch(ModelNotFoundException $e){
            throw $e;
        }
    }

    public function addPayment(Request $request){
        // dd($request->all());
        if(!empty($request->id)){
            $payment = Payment::find($request->id);
            if($payment){
                $payment->update($request->all());
            }else{
                return redirect()->back()->with('message','An Error Occured, Check your inputs')
                            ->with('status','Error')
                            ->with('color','danger');
            }    
        }else{
            Payment::create($request->all());
        }
        //update the loan amount in monitoring table
        return redirect('/payments')->with('message','Payment Recorded pending Approval')
                                    ->with('status','Success')
                                    ->with('color','success');
    }
    
    public function getUserLoans(){
        //Eager load users loan
        $user = User::find(Auth::user()->id);
        $loans = $user->loan;
        return $loans;
    }

    public function payBack(Request $request){

    }

    public function approvePayback($id){
        $payment = Payment::findOrFail($id);

        $payment->status = 'approved';
        
        $payment->save();
        
           //after approving --persit to monitoring table --first check if there is a monitoring data for this loan --amount paid and unpaid balance
            $monitor = Monitor::where('loan_id',$payment->loan_id)->get()->first();
            if($monitor){            
                $monitor->amount_paid = $payment->amount + $monitor->amount_paid;
                $monitor->unpaid_balance = $payment->loan->loan_amount - $monitor->amount_paid;
                $monitor->date_paid = $payment->created_at;
                $monitor->save(); 
                $this->check = true;
            }else{
                //build monitoring data
                $data['loan_id'] = $payment->loan_id;
                $data['user_id'] = Auth::user()->id;
                $data['amount_paid'] = $payment->amount;
                $data['unpaid_balance'] = $payment->loan->loan_amount - $payment->amount;
                $data['date_paid'] = $payment->created_at;
            // dd($data);
                // dd($data);
                //create new loan monitoring record
                Monitor::create($data);       
            } 
       
        

        return redirect('/paybacks')->with('message','Payment Approved and Recorded')
                                ->with('status','Success')
                                ->with('color','info');
    }

    public function disapprovePayback($id){
        $payment = Payment::findOrFail($id);

        $payment->status = 'disapproved';

        $payment->save();
        
            //build monitoring data
            $data['loan_id'] = $payment->loan_id;
            $data['user_id'] = Auth::user()->id;
            $data['amount_paid'] = $payment->amount;
            $data['date_paid'] = $payment->created_at;
            // dd($data);
            //after approving --persit to monitoring table --first check if there is a monitoring data for this loan --amount paid and unpaid balance
            $monitor = Monitor::where('loan_id',$payment->loan_id)->get()->first();
            if($monitor){            
                $monitor->amount_paid = abs($monitor->amount_paid - $data['amount_paid']);
                $monitor->unpaid_balance = $monitor->unpaid_balance + $payment->amount;
                $monitor->date_paid = $data['date_paid'];
                $monitor->save(); 
            }
       
        

        return redirect('/paybacks')->with('message','Payment Disapproved')
                                ->with('status','Success')
                                ->with('color','warning');
    }
   
    public function dashboard(){
        $users = User::all();
        $loans = Loan::all();
        $applications = Application::all();
        return view('loan.dashboard',compact('users','applications','loans'));
    } 

    public function application(){
        return view('loan.application');
    } 

    public function apply(Request $request){
        try{
            $loan = $request->loan_amount;
            $income = $request->income;
            $collateral = $request->collateral;
            

            //convert to fuzzy inputs in percentage;
            switch ($income) {
                case 'less than 500K':
                    $income = rand(0,20);
                    break;
                case 'less than 1M':
                    $income = rand(20,40);
                    break;
                case 'less than 5M':
                    $income = rand(40,50);
                    break;
                case 'less than 10M':
                    $income = rand(50,60);
                    break;
                case 'less than 100M':
                    $income = rand(60,80);
                    break;
                case 'greater than 100M':
                    $income = rand(80,100);
                    break;            
                
                default:
                    $income = 0;
                    break;
            }

            switch ($collateral) {
                case 'Building':
                    $collateral = rand(60,100);
                    break;
                case 'Company':
                    $collateral = rand(20,50);
                    break;
                case 'Reputation':
                    $collateral = rand(20,30);
                    break;
                case 'Land':
                    $collateral = rand(60,100);
                    break;
                case 'Car':
                    $collateral = rand(0,20);
                    break;
                default:
                    $income = 0;
                    break;
            }
            $loan = rand(0,100); //
            $statusFuzzy = $this->fuzzy($income,$loan,$collateral);
            $status = intval($statusFuzzy);

            if($status >0 && $status <= 40){
                $this->saveApplication($stat = 'Rejected');
                return redirect('/')->with('status','Rejected')
                                 ->with('message','We are sorry to inform you that our system Rejected your Loan Application')
                                 ->with('color','danger');   
            }elseif($status > 40 && $status <= 60){
                $this->saveApplication($stat='Pending');
                return redirect('/')->with('status','Pending')
                                 ->with('message','Intelligent system Advises that we review your application again...Check back Later')->with('color','info');
            }elseif($status > 60 && $status <=100){
                    $this->saveApplication($stat='Accepted');
                return redirect('/')->with('status','Success')
                                 ->with('message','We are glad to Inform you that your Loan Application was successful')
                                ->with('color','success');
            }

        }catch (\Exception $e) {
            $success = false;
            dd($e->getMessage());
        }
        if($sucess==false){
            return back()->with('status','Error')->with('message','We could not process your application')->with('color','danger');
        }
    }

    public function saveApplication($status){
        $application = new Application;
        $application->loan_amount = !empty($request->loan_amount)? $request->loan_amount:0;
        $application->income = $request->income;
        $application->collateral = $request->collateral;
        $application->user_id = Auth::user()->id;
        $application->why = $request->reason;
        $application->fuzzy_score = $statusFuzzy;
        $application->status = $status;
        return $application->save();
    }
    public function userloans(){
        $loans = Loan::where('user_id',Auth::user()->id)->get();
        // dd($loans);
        return view('loan.userloans')->with(compact('loans'));
    }
    public function showUserApplications(){
        $applications = Application::where('user_id',Auth::user()->id)->get();
        return view('loan.userapplications')->with(compact('applications'));
    } 
    public function applications(){
        $applications = Application::all();
        return view('loan.applications')->with(compact('applications'));
    }

    public function fuzzy($income, $loan, $collateral){
        $fuzzy = new fuzzy_logic();
        $fuzzy->clearMembers();
        /* ---------- set input members ---------*/
        $fuzzy->setInputNames(array('INCOME_LEVEL','LOAN_AMOUNT','COLLATERAL'));
        
        $fuzzy->addMember($fuzzy->getInputName(0),'IL_LOW',0,20,40,LINFINITY);
        $fuzzy->addMember($fuzzy->getInputName(0),'IL_MIDDLE' ,25,50,60,TRIANGLE);
        $fuzzy->addMember($fuzzy->getInputName(0),'IL_HIGH',40,70,100,RINFINITY);
                              
        $fuzzy->addMember($fuzzy->GetInputName(1),'LA_LOW',0,10,30,LINFINITY);
        $fuzzy->addMember($fuzzy->GetInputName(1),'LA_MIDDLE',20,40,60,TRIANGLE);
        $fuzzy->addMember($fuzzy->GetInputName(1),'LA_HIGH',60,80,100,RINFINITY);

        $fuzzy->addMember($fuzzy->GetInputName(2),'CO_BAD',0,10,20,LINFINITY);
        $fuzzy->addMember($fuzzy->GetInputName(2),'CO_FAIR',20,40,60,TRIANGLE);
        $fuzzy->addMember($fuzzy->GetInputName(2),'CO_GOOD',50,70,100,RINFINITY);

        $fuzzy->setOutputNames(['APPLICATION_STATUS']);
        
        $fuzzy->addMember($fuzzy->GetOutputName(0),'REJECT',0,20,30,LINFINITY);
        $fuzzy->addMember($fuzzy->GetOutputName(0),'PENDING',20, 40,55,TRIANGLE);
        $fuzzy->addMember($fuzzy->GetOutputName(0),'ACCEPT', 50, 70 ,100,RINFINITY);

        $fuzzy->clearRules();
        //set rules with lingustic variables -- 27 in total
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.REJECT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.REJECT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.REJECT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.REJECT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_LOW AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');

        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.REJECT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_MIDDLE AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');

        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_BAD THEN APPLICATION_STATUS.REJECT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_FAIR THEN APPLICATION_STATUS.PENDING');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_LOW  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_MIDDLE  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');
        $fuzzy->addRule('IF INCOME_LEVEL.IL_HIGH AND LOAN_AMOUNT.LA_HIGH  AND COLLATERAL.CO_GOOD THEN APPLICATION_STATUS.ACCEPT');

        $fuzzy->setRealInput('INCOME_LEVEL',$income);
        $fuzzy->setRealInput('LOAN_AMOUNT',$loan);
        $fuzzy->setRealInput('COLLATERAL',$collateral);

        $fuzzy_arr = $fuzzy->calcFuzzy();
        // dd($fuzzy_arr);
        $status = $fuzzy_arr['APPLICATION_STATUS'];
        return $status;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('loan.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'loan_amount' => 'required|numeric|min:1000|max:100000000',
            'loan_term' => 'required|numeric|min:1|max:50',
            'interest_rate' => 'required|numeric|min:1|max:36',
            'start_date' => 'required',
        ]);

        $month_amount = ($request->loan_term * 12) - 1;

        $success;

        DB::beginTransaction();

        try {
            $loan = new Loan;
            $loan->user_id = $request->user_id;
            $loan->loan_amount = $request->loan_amount;
            $loan->loan_term = $request->loan_term;
            $loan->interest_rate = $request->interest_rate;

            $loan->save();

            foreach($this->calRepaymentSchedule($request->loan_amount, $request->interest_rate/100, $request->loan_term, $month_amount, $request->start_date) as $repayment_schedule_data) {

                $repayment_schedule = new RepaymentSchedule;
                $repayment_schedule->loan_id = $loan->id;
                $repayment_schedule->payment_no = $repayment_schedule_data['payment_no'];
                $repayment_schedule->date = $repayment_schedule_data['date'];
                $repayment_schedule->payment_amount = $repayment_schedule_data['PMT'];
                $repayment_schedule->principal = $repayment_schedule_data['principal'];
                $repayment_schedule->interest = $repayment_schedule_data['interest'];
                $repayment_schedule->balance = $repayment_schedule_data['balance'];

                $repayment_schedule->save();
            }

            DB::commit();
            $success = true;

        }catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        if($success) {
            return redirect()->route('loan.show', $loan->id)->with('alert-info', 'The loan has been created successfully.');
        }else {
            return redirect()->route('loan.index')->with('alert-danger', 'Cannot create loan, something went wrong :(');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::find($id);

        return view('loan.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = Loan::find($id);

        return view('loan.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'loan_amount' => 'required|numeric|min:1000|max:100000000',
            'loan_term' => 'required|numeric|min:1|max:50',
            'interest_rate' => 'required|numeric|min:1|max:36',
            'start_date' => 'required',
        ]);

        $month_amount = ($request->loan_term * 12) - 1;

        $success;

        DB::beginTransaction();

        try {
            $loan = Loan::find($id);

            $loan->loan_amount = $request->loan_amount;
            $loan->loan_term = $request->loan_term;
            $loan->interest_rate = $request->interest_rate;

            $loan->save();

            foreach($loan->repayment_schedule as $repayment_schedule) {
                $repayment_schedule->delete();
            }

            foreach($this->calRepaymentSchedule($request->loan_amount, $request->interest_rate/100, $request->loan_term, $month_amount, $request->start_date) as $repayment_schedule_data) {

                $repayment_schedule = new RepaymentSchedule;

                $repayment_schedule->loan_id = $loan->id;
                $repayment_schedule->payment_no = $repayment_schedule_data['payment_no'];
                $repayment_schedule->date = $repayment_schedule_data['date'];
                $repayment_schedule->payment_amount = $repayment_schedule_data['PMT'];
                $repayment_schedule->principal = $repayment_schedule_data['principal'];
                $repayment_schedule->interest = $repayment_schedule_data['interest'];
                $repayment_schedule->balance = $repayment_schedule_data['balance'];

                $repayment_schedule->save();
            }
            
            DB::commit();
            $success = true;

        }catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        if($success) {
            return redirect()->route('loan.show', $loan->id)->with('alert-info', 'The loan has been updated successfully.');
        }else {
            return redirect()->route('loan.index')->with('alert-danger', 'Cannot update loan, something went wrong :(');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success;

        DB::beginTransaction();
        try {
            $loan = Loan::find($id);

            foreach($loan->repayment_schedule as $repayment_schedule) {
                $repayment_schedule->delete();
            }

            $loan->delete();

            DB::commit();
            $success = true;

        }catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        if($success) {
            return redirect()->back()->with('alert-info', 'The loan has been deleted successfully.');
        }
    }

    private function calRepaymentSchedule($loan_amount, $interest, $year, $month_amount, $start_date) {
        $data = [];

        for($i = 0; $i <= $month_amount; $i++) {
             if($i == 0) {
                $data[$i]['payment_no'] = $i + 1;
                $data[$i]['date'] = date('Y-m-d', strtotime('+'.$i.' month', strtotime($start_date)));
                $data[$i]['PMT'] = ($loan_amount * ($interest / 12)) / (1 - pow((1 + ($interest / 12)), (-12 * $year)));
                $data[$i]['interest'] = ($interest/12) * $loan_amount;
                $data[$i]['principal'] = $data[$i]['PMT'] - $data[$i]['interest'];
                $data[$i]['balance'] = $loan_amount - $data[$i]['principal'];
             }else {
                $data[$i]['payment_no'] = $i + 1;
                $data[$i]['date'] = date('Y-m-d', strtotime('+'.$i.' month', strtotime($start_date)));
                $data[$i]['PMT'] = $data[$i-1]['PMT'];
                $data[$i]['interest'] = ($interest/12) * $data[$i-1]['balance'];
                $data[$i]['principal'] = $data[$i]['PMT'] - $data[$i]['interest'];
                $data[$i]['balance'] = $data[$i-1]['balance'] - $data[$i]['principal'];
             }
        }

        return $data;
    }

    public function advancedSeach(Request $request) {
        $loans = Loan::whereBetween('loan_amount', [$request->loan_amount_min, $request->loan_amount_max])
                        ->orWhereBetween('loan_term', [$request->loan_term_min, $request->loan_term_max])
                        ->orWhereBetween('interest_rate', [$request->interest_rate_min, $request->interest_rate_max])
                        ->paginate(15);

        return view('loan.search', compact('loans'));
    }
}
