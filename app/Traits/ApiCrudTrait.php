<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Club;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
trait ApiCrudTrait
{
    abstract function model();
    abstract function validationRules($resource_id = 0);
    abstract function with();


    /** Return All Records  */
    public function index()
    {

        return $this->model()::when(!empty($this->with()),function($q){
          $q->with($this->with());
        })->get();
    }

    /**Save All Records To The  Database */

    public function create(Request $request)
    {
        Validator::make($request->all(),$this->validationRules())->validate();
         $status = "";
         $result = $this->model()::create($request->all());
         $random_password = $this->generate_string();
         $result->update(['password'=>bcrypt($random_password)]);
         $name= $result->name;
         $email= $result->email;
         if($this->model()==="App\Models\User")
         {
            Mail::to($email)->send(new WelcomeMail($name,$email,$random_password));

         }
         if($request->role=="club-admin")
         {

          $club=Club::create([
            'name'=>$result->name,

          ]);

          User::where('id',$result->id)->update(['club_id'=>$club->id]);
         }
         if($request->role=="player")
         {

            $club_id=$request->loggedUser['club_id'];
            User::where('id',$result->id)->update(['club_id'=>$club_id]);

         }


         $result ? $status="success" : $status="error";
         return response()->json(['status'=>$status, 'results'=> $result]);

    }
    public function show($resource_id)
    {
        return $this->model()::findOrFail($resource_id);
    }
    public function update(Request $request,$resource_id)
    {
        $resource = $this->model()::findOrFail($resource_id);
        Validator::make($request->all(),
        $this->validationRules($resource_id))->validate();
        $result = $resource->update($request->all());
        $status = "";
        $result ? $status="success" : $status="error";
        return response()->json(['status'=>$status,'info'=>$this->index(),'results'=> $result]);
    }
    public function delete($resource_id)
    {
        $resource = $this->model()::findOrFail($resource_id);
        $status = "";
        $result = $resource->delete();
        $result ? $status="success" : $status="error";
        return response()->json(['status'=>$status,'info'=>$this->index(),'results'=> $result]);


    }

    /**
     * Generate string password
     * Return string
     */

     public function generate_string() {
        $strength = 16;
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

}
?>
