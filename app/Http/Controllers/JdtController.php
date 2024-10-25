<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Carbon;
use App\Models\Confirmation;
use App\Models\Position;

class JdtController extends Controller
{
    public function index(){
        $token = session('token');

        if (!$token) {
            return redirect()->route('login');
        }
        return view('customer.index');
    }

    public function settings(){
        //penser a remettre le user
        $positions = Position::where("deleted_at",null)->where('user_id', "a")->orderBy('created_at', 'desc')->get();
        $confirmations = Confirmation::where("deleted_at",null)->where('user_id', "a")->orderBy('created_at', 'desc')->get();
        return view('settings', compact('positions', 'confirmations'));
    }


    public function addConfirmation(Request $request){
        Confirmation::create([
            'id' => Uuid::uuid4()->toString(),
            'libelle' => $request->libelle,
            'user_id' => 'a',//Penser a remettre le user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect(route('settings'));
    }

    public function editConfirmation(Request $request){
        $confirmation = Confirmation::where("id",$request->id)->first();
        $confirmation->libelle = $request->libelle;
        $confirmation->save();
        return redirect(route('settings'));
    }

    public function deleteConfirmation(Request $request){
        $confirmation = Confirmation::where("id",$request->id)->first();
        $confirmation->deleted_at = Carbon::now();
        $confirmation->save();
        return redirect(route('settings'));
    }




    public function addPosition(Request $request){
        Position::create([
            'id' => Uuid::uuid4()->toString(),
            'libelle' => $request->libelle,
            'user_id' => 'a',//Penser a remettre le user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect(route('settings'));
    }

    public function editPosition(Request $request){
        $position = Position::where("id",$request->id)->first();
        $position->libelle = $request->libelle;
        $position->save();
        return redirect(route('settings'));
    }

    public function deletePosition(Request $request){
        $position = Position::where("id",$request->id)->first();
        $position->deleted_at = Carbon::now();
        $position->save();
        return redirect(route('settings'));
    }
}
