<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.user.index', [
            'users' => $structure->users()->where('role', 'user')->get(),
            'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns(),
        ]);
    }

    public function create()
    {
        return view('app.user.create', [
            'my_fields' => $this->user_fields()
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = new User();

        $user->structure_id = Auth::user()->structure_id;
        $user->name = $request->name;
        $user->place_id = $request->place;
        $user->role = 'user';

        if ($user->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('user');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    public function show(User $user)
    {
        if ($user->place !== null) {
            //  $qrcode = QrCode::size(200)->generate(str_replace('user', 'site', url()->current()));
            $qrcode = QrCode::size(200)->generate(str_replace('user', 'y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQjFcTs', url()->current()));
            // dd($user->place);
            
            $quizzes = $user->place->quizzes()->where('status', '1')->get();
            $placeQuizzes = $user->place->quizzes()->where('status', '1')->count();
            // $placeQuizzes = $user->place->places_quizzes()->count();
            // $quizzes = $user->place->quizzes()->get();
            $rates = $user->rates()->count();
            $rateYes = $user->rates()->where('answer', true)->count();
            $rateNo = $user->rates()->where('answer', false)->count();

            return view('app.user.show', [
                'user' => $user,
                'qrcode' => $qrcode,
                'quizzes' => $quizzes,
                'placeQuizzes' => $placeQuizzes,
                'rates' => $rates,
                'rateYes' => $rateYes,
                'rateNo' => $rateNo,
            ]);
        } else {
            return back();
        }
    }

    public function edit(User $user)
    {
        return view('app.user.edit', [
            'user' => $user,
            'my_fields' => $this->user_fields()
        ]);
    }

    public function print(User $user)
    {
        //  $qrcode = QrCode::size(200)->generate(str_replace('user/print', 'site', url()->current()));
        $qrcode = QrCode::size(200)->generate(str_replace('user/print', 'y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQjFcTs', url()->current()));

        $pdf = PDF::loadView('app.user.print', compact('user', 'qrcode'));
        
        return $pdf->stream();
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user = User::find($user->id);

        $user->name = $request->name;
        $user->place_id = $request->place;

        if ($user->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('user');
        };
    }

    public function destroy(User $user)
    {
        try {
            $evaluates = $user->rates()->get();

            foreach ($evaluates as $evaluate) {
                $evaluate->delete();
            }

            $user = $user->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('user');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function user_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'place_name' => "chambre",
        );
        return $columns;
    }

    private function user_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'print' => 'Imprimer',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function user_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'place' => [
                'title' => 'chambre',
                'field' => 'model',
                'options' => Place::where('structure_id', Auth::user()->structure_id)->get(),
            ],
        ];
        return $fields;
    }
}
