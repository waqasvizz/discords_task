<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
            // ->select(['id', 'name']);
    }
    public static function getProduct($posted_data = array())
    {
        $columns = ['products.*'];
        $select_columns = array_merge($columns, []);
        
        $query = Product::latest()->with('user');

        if (isset($posted_data['id'])) {
            $query = $query->where('products.id', $posted_data['id']);
        }
        if (isset($posted_data['user_id'])) {
            $query = $query->where('products.user_id', $posted_data['user_id']);
        }
        if (isset($posted_data['title'])) {
            $query = $query->where('products.title', 'like', '%' . $posted_data['title'] . '%'); 
        }
	    if (isset($posted_data['status'])) {
            $query = $query->where('products.status', $posted_data['status']);
        }
	    if (isset($posted_data['status'])) {
            $query = $query->where('products.status', $posted_data['status']);
        }
	    if (isset($posted_data['multi_qty_price_sum'])) {
            $columns = [DB::raw("{$posted_data['multi_qty_price_sum']}")];
            $select_columns = array_merge($select_columns, $columns);

            // $posted_data['show_only_sums'] = true;
            // $posted_data['sumBy_multiple_column'] = true;
            // $posted_data['sumBy_multiple_columnNames'] = ['total_product_price' => 'tot_price'];
        }
        
        

        // if (isset($posted_data['groupBy_value'])) {
        //     $query->groupBy($posted_data['groupBy_value']);

        //     if (isset($posted_data['groupBy_with_sum'])) {

        //         $sum_cols_query = "";
        //         foreach ($posted_data['groupBy_with_sum'] as $key => $item) {
        //             $sum_cols_query .= "sum({$key}) AS {$item}, ";
        //         }
    
        //         // this code will remove the last two characters from the string
        //         $sum_cols_query = substr($sum_cols_query, 0, -2);
    
        //         // if ($posted_data['show_only_sums'] == true)
        //         //     $select_columns = [];
    
        //         $columns = [DB::raw("{$sum_cols_query}")];
        //         $select_columns = array_merge($select_columns, $columns);

        //         // $query->selectRaw('sum(admin_gross) as admin_gross_sum')
        //         //     ->pluck('admin_gross_sum');

        //         // $columns = [DB::raw("{$sum_cols_query}")];
        //         // $select_columns = array_merge($select_columns, $columns);
        //     }
        // }

        if(isset($posted_data['sumBy_multiple_column'])) {
            $sum_cols_query = "";
            foreach ($posted_data['sumBy_multiple_columnNames'] as $key => $item) {
                $sum_cols_query .= "sum({$key}) AS {$item}, ";
            }

            // this code will remove the last two characters from the string
            $sum_cols_query = substr($sum_cols_query, 0, -2);
            if ($posted_data['show_only_sums'] == true)
                $select_columns = [];

            $columns = [DB::raw("{$sum_cols_query}")];
            $select_columns = array_merge($select_columns, $columns);
            // $select_columns[] = 'sum(quantity) AS quantity_sum';
            // if (isset($posted_data['print_query'])) {
            //     echo '<pre>';print_r($select_columns);'</pre>';exit;
            // }
        }
        

        if(isset($posted_data['user_join'])){
            $query->join('users', 'users.id', '=', 'products.user_id');
            

            if (isset($posted_data['userstatus'])) {
                $query = $query->where('users.status', $posted_data['userstatus']);
                $query = $query->where('products.status', 1);
            }
            if (isset($posted_data['role_id'])) {
                $query = $query->where('users.role_id', $posted_data['role_id']);
            }

            $columns = ['users.role_id', 'users.name'];
            $select_columns = array_merge($select_columns, $columns);
        }

        $query->select($select_columns);


        if (isset($posted_data['groupBy'])) {
            $query->groupBy($posted_data['groupBy']);
        }
        
        $query->getQuery()->orders = null;
        if (isset($posted_data['orderBy_name'])) {
            $query->orderBy($posted_data['orderBy_name'], $posted_data['orderBy_value']);
        } else {
            $query->orderBy('products.id', 'ASC');
        } 

        
        if (isset($posted_data['paginate'])) {
            $result = $query->paginate($posted_data['paginate']);
        } else {
            if (isset($posted_data['detail'])) {
                $result = $query->first();
            } else if (isset($posted_data['count'])) {
                $result = $query->count();
            } else if (isset($posted_data['array'])) {
                $result = $query->get()->ToArray();
            } else {
                $result = $query->get();
            }
        }
        
        if (isset($posted_data['all_multi_qty_price_sum'])) {
            $result = $result->sum('total_product_price');
        }

        if (isset($posted_data['print_query'])) {
            $result = $query->toSql();
            echo "Line no @"."<br>";
            echo "<pre>";
            print_r($result);
            echo "</pre>";
            exit("@@@@");
        }

        return $result;
    }

    public static function saveUpdateProduct($posted_data = array())
    {
        if (isset($posted_data['update_id'])) {
            $data = Product::find($posted_data['update_id']);
        } else {
            $data = new Product;
        }

        if (isset($posted_data['user_id'])) {
            $data->user_id = $posted_data['user_id'];
        }
        if (isset($posted_data['title'])) {
            $data->title = $posted_data['title'];
        } 
        if (isset($posted_data['description'])) {
            $data->description = $posted_data['description'];
        }
        if (isset($posted_data['image'])) {
            $data->image = $posted_data['image'];
        }
        if (isset($posted_data['price'])) {
            $data->price = $posted_data['price'];
        }
        if (isset($posted_data['quantity'])) {
            $data->quantity = $posted_data['quantity'];
        }
        if (isset($posted_data['status'])) {
            $data->status = $posted_data['status'];
        }
        
        $data->save();
        return $data;
    }

    public function deleteProduct($id=0)
    {
        $data = Product::find($id);
        return $data->delete();
    }
}