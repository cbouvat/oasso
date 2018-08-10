<?php

namespace App\Http\Controllers\Admin;

use App\Gift;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gifts = Gift::orderBy('created_at', 'desc')->paginate();
        $gifts->load('user');

        return view('users.giftListingAll', ['gifts' => $gifts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|gte:0',
            'from_user_id' => 'nullable|numeric',
            'from_me' => 'nullable|numeric'
        ]);
        $inputs = $request->all();

        if ($request->has('from_me')) {
            if ($request['from_me'] === Auth::user()->id) {
                $inputs['user_id'] = $request['from_me'];
            } else {
                $inputs['user_id'] = Auth::user()->id;
            }

        } elseif ($request['from_user_id'] != null) {

            if (User::find($request['from_user_id']) != null) {
                $inputs['user_id'] = $request['from_user_id'];
            } else {
                return back()->with('error_message', 'Erreur, identifiant incorrect !');
            }


        } else {
            return back()->with('error_message', 'Erreur, identifiant incorrect !');
        }

        Gift::create($inputs);
        return back()->with('message', 'Le don a bien été ajouté pour ce membre !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->load(['gifts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
        $user->load('role');

        return view('users.gift', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = Gift::findOrFail($id);
        $gift->load('user');
        return view('users.giftEdit', ['gift' => $gift]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gift = Gift::findOrFail($id);
        $request->validate([
            'amount' => 'required|numeric',
            'from_user_id' => 'nullable|numeric',
        ]);
        $inputs = $request->all();

        if ($request['from_user_id'] != null) {

            if (User::find($request['from_user_id']) != null) {
                $inputs['user_id'] = $request['from_user_id'];
            } else {
                return back()->with('error_message', 'Erreur, identifiant incorrect !');
            }


        } else {
            return back()->with('error_message', 'Erreur, identifiant incorrect !');
        }

        $gift->update($inputs);

        return back()->with('message', 'Modification confirmée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giftToDelete = Gift::findOrFail($id);
        $giftToDelete->delete();
        return back()->with('message', 'Don supprimé');

    }

    public function beforeDelete($id)
    {

        return view('admin.giftBeforeDelete',[ 'idGift' => $id]);
    }
}
