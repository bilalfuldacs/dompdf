<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use PDF;

use App\Models\User;
use App\Http\Requests\Companiesrequest;
use App\Repositories\Interface\CompanyRepositoryInterface;
class CompaniesController extends Controller
{
   private $companyrepository;
   public function __construct(CompanyRepositoryInterface $CompanyRepository){
    $this->companyrepository=$CompanyRepository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {
      
      
        if ($request->hasFile('logo')) {
       
$path = $request->file('logo');

$type = $request->file('logo')->extension();

$data = file_get_contents($path);
 $base64 = 'data:image/' . $type .'/' . base64_encode($data);;

   
       
    $request->file('logo')->move('images/categories/', $base64);
    }
        Company::create([
        'name' => $request->name,
        'city' => $request->city,
        'postal_code' => $request->postal_code,
        
  
        'email' => $request->email,
        'logo' => $base64,
    ]);
    return ("data addedd ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        
        $company=$this->companyrepository->find($id);
        $user=User::where('company_id',$company->id)->get();

  $pdf = \App::make('dompdf.wrapper');
  

    
      $pdf->getDomPDF()->set_option("isRemoteEnabled", false);
 
  $pdf->setPaper('A4', 'portrait');
  $pdf->loadView('invoice1', compact('company','user'));
  return $pdf->stream('invoice.pdf');




       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
