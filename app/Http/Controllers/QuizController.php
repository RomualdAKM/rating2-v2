<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Place;
use App\Models\PlaceQuiz;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.quiz.index', [
            'quizzes' => $structure->quizzes()->where('status', '1')->orWhere('status', '')->get(),
            'my_actions' => $this->quiz_actions(),
            'my_attributes' => $this->quiz_columns(),
            'my_fields' => $this->quiz_fields(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        $quiz = new Quiz();

        $quiz->structure_id = Auth::user()->structure_id;
        $quiz->question = $request->question;
        $quiz->type = $request->type;

        if ($quiz->save()) {

            if ($request->places == null) {
                $places = new EloquentCollection();
                $places_id = Place::where('structure_id', Auth::user()->structure_id)->get('id');
                for ($i = 0; $i < count($places_id); $i++) {
                    $places[] = $places_id[$i]->id;
                }

            } else {
                $places = $request->places;
            }

            foreach ($places as $place) {
                PlaceQuiz::create([
                    'place_id' => $place,
                    'quiz_id' => $quiz->id,
                    'structure_id' => Auth::user()->structure_id,
                ]);
            }

            Alert::toast("Données enregistrées", 'success');

            return redirect('quiz');

        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        return view('app.quiz.show', [
            'quiz' => $quiz,
            'my_fields' => $this->show_fields(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        return view('app.quiz.edit', [
            'quiz' => $quiz,
            'my_fields' => $this->quiz_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $quiz = Quiz::find($quiz->id);

        $quiz->question = $request->question;
        $quiz->type = $request->type;

        if ($quiz->save()) {

            if ($request->places == null) {
                $places = new EloquentCollection();
                $places_id = Place::where('structure_id', Auth::user()->structure_id)->get('id');
                for ($i = 0; $i < count($places_id); $i++) {
                    $places[] = $places_id[$i]->id;
                }
            } else {
                $places = $request->places;
            }

            PlaceQuiz::where('quiz_id', $quiz->id)->delete();

            foreach ($places as $place) {
                PlaceQuiz::create([
                    'place_id' => $place,
                    'quiz_id' => $quiz->id,
                    'structure_id' => Auth::user()->structure_id,
                ]);
            }

            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('quiz');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {

        $quiz = Quiz::find($quiz->id);

        $quiz->status = '0';

        $quiz->save();

        Alert::toast('Supprimé avec succès', 'success');

        return redirect('quiz');

        // try {
        //     $quiz = $quiz->delete();
        //     Alert::success('Opération effectuée', 'Suppression éffectué');
        //     return redirect('quiz');
        // } catch (\Exception $e) {
        //     Alert::error('Erreur', 'Element introuvable');
        //     return redirect()->back();
        // }
    }

    private function quiz_columns()
    {
        $columns = (object) [
            'question' => 'Question',
            'place' => 'chambre',
            'type' => 'Type de reponse',
        ];
        return $columns;
    }

    private function quiz_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'show' => 'Voir',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function quiz_fields()
    {
        $fields = [
            'question' => [
                'title' => 'Question',
                'field' => 'textarea',
            ],
            'places' => [
                'title' => 'chambre',
                'field' => 'multiple-select',
                'options' => Place::where('structure_id', Auth::user()->structure_id)->get(),
            ],
            'type' => [
                'title' => 'Type de réponse',
                'field' => 'select',
                'options' => [
                    'Réponse par taux de satisfaction' => 'Réponse par taux de satisfaction',
                    'Réponse par taux appliqué' => 'Réponse par taux appliqué',
                    'Réponse par oui / non' => 'Réponse par oui / non',
            ],
            ],
        ];
        return $fields;
    }

    private function show_fields()
    {
        $fields = [
            'question' => [
                'title' => 'Question',
                'field' => 'textarea',
                'colspan' => true,
            ],
        ];
        return $fields;
    }
}
