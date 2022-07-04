<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;


class UserController extends Controller
{
    public function loginForm()
    {
        return view('auth_v1.login');
    }
    
    public function accountLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],  
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    
    public function dashboard(Request $request)
    {
        $data = array();
        $data['active_and_verified_users'] = User::getUser([
            'count' => true,
            'status' => 1,
        ]);
        $data['all_active_products'] = Product::getProduct([
            'count' => true,
            'status' => 1,
        ]);
        $data['all_active_user_products'] = Product::getProduct([
            'count' => true,
            'user_join' => true,
            'userstatus' => 1,
        ]);
        $data['active_products_not_belong_user'] = Product::getProduct([
            'count' => true,
            'user_join' => true,
            'status' => 1,
            'role_id' => 2,
        ]);
        $data['amount_attached_products'] = Product::getProduct([
            'detail' => true,
            'status' => 1,            
            'show_only_sums' => true,
            'sumBy_multiple_column' => true,
            'sumBy_multiple_columnNames' => ['quantity' => 'quantity_sum']
        ]);
        
        $data['Summarized_price_active_products'] = Product::getProduct([
            'status' => 1,
            'groupBy' => 'products.id',
            'multi_qty_price_sum' => 'sum(price)*sum(quantity) as total_product_price',
            'all_multi_qty_price_sum' => true,
        ]);
        $data['Summarized_price_user_active_products'] = Product::getProduct([
            // 'print_query' => true,
            'status' => 1,
            'groupBy' => 'products.user_id',
            'multi_qty_price_sum' => 'price*quantity as total_product_price, SUM(price*quantity) as total_user_product_price',
        ]);
        // echo '<pre>';print_r($data['Summarized_price_active_products']);'</pre>';exit;
        return view('dashboard', compact('data'));
    }
    

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/login');
    }
    
    public function exchangeratesapi()
    {
         return view('exchangeratesapi');
    }

    public function callExchangeRatesApi(Request $request){
        $request_data = $request->all();

        $rules = array(
            'amount' => 'required',
            'from' => 'required',
            'to' => 'required',
        );

        $validator = \Validator::make($request_data, $rules);

        if ($validator->fails()) {
            return $this->sendError('Please fill all the required fields.', ["error"=>$validator->errors()->first()], 200);   
        } else {


                $CURLOPT_URL = 'https://api.apilayer.com/exchangerates_data/convert?to='.$request_data['to'].'&from='.$request_data['from'].'&amount='.$request_data['amount'].'';
                if(isset($request_data['exchangeDate'])){
                    $CURLOPT_URL .= '&date='.$request_data['exchangeDate'];
                }
                // echo '<pre>';print_r($CURLOPT_URL);'</pre>';
                // echo '<pre>key:';print_r(config("app.EXCHANGE_RATE_API_KEY"));'</pre>';exit;

                $curl = curl_init();

                curl_setopt_array($curl, array(
                // CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=gbp&from=eur&amount=10",
                CURLOPT_URL => $CURLOPT_URL,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: text/plain",
                    "apikey: yI0Uqs59dKP3GSSBVjwTjgFGz3ZvtkxT"
                ),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
                exit;

            }
    }
    
}