<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\Staff;
use App\Services\KairosService;
use Illuminate\Http\Request;

class FaceRecognitionController extends Controller
{
    protected $kairosService;

    public function __construct(KairosService $kairosService)
    {
        $this->kairosService = $kairosService;
    }

    public function showVerifyIdForm()
    {
        return view('app.attendance.verify-id');
    }

    public function verifyId(Request $request)
    {
        $validated = $request->validate(['personnel_id' => 'required|exists:staff,matriculation']);

        return view('app.attendance.facial-analysis', ['personnel_id' => $validated['personnel_id']]);
    }

    public function facialAnalysis(Request $request)
    {
        $validated = $request->validate([
            'personnel_id' => 'required|exists:staff,matriculation',
            'image' => 'required',
        ]);
    
        $user = Staff::where('matriculation', $validated['personnel_id'])->firstOrFail();
    
        // Convertir l'image capturée en base64
        $imageData = $validated['image'];
        
        // Enlever le préfixe "data:image/png;base64," de l'image capturée
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
    
        // Log the captured image data
        \Log::info('Captured image data', ['image' => $imageData]);
    
        // Appel à l'API Kairos
        try {
            $kairosResponse = $this->kairosService->recognize($imageData, 'employees_gallery');
            \Log::info('Réponse de Kairos', (array)$kairosResponse);
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'appel à l\'API Kairos', ['message' => $e->getMessage()]);
            return redirect()->route('attendance.verify-id')->withErrors('Erreur de communication avec l\'API de reconnaissance faciale. Veuillez réessayer.');
        }
    
        if (isset($kairosResponse['Errors']) || empty($kairosResponse['images'][0]['candidates'])) {
            return redirect()->route('attendance.verify-id')->withErrors('Identification échouée. Veuillez réessayer.');
        }
    
        $candidates = $kairosResponse['images'][0]['candidates'];
        $matchedUserId = $candidates[0]['subject_id'];
    
        if ($user->matriculation != $matchedUserId) {
            return redirect()->route('attendance.verify-id')->withErrors('Identification-échouée. Veuillez réessayer.');
        }
    
        return view('app.attendance.confirmation', ['personnel_id' => $user->id]);
    }
    
      
    public function markArrival(Request $request)
    {
        $validated = $request->validate(['personnel_id' => 'required|exists:staff,matriculation']);
        AttendanceRecord::create([
            'user_id' => $validated['personnel_id'],
            'check_in' => now(),
        ]);
        return redirect()->route('attendance.verify-id')->with('success', 'Arrivée marquée avec succès.');
    }

    public function markDeparture(Request $request)
    {
        $validated = $request->validate(['personnel_id' => 'required|exists:staff,matriculation']);
        AttendanceRecord::create([
            'user_id' => $validated['personnel_id'],
            'check_out' => now(),
        ]);
        return redirect()->route('attendance.verify-id')->with('success', 'Départ confirmé avec succès.');
    }
}
