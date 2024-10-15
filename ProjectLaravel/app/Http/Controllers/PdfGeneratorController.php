<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\User;

class PdfGeneratorController extends Controller
{
    public function index($id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }

        // Данные
        $data = [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email
        ];

        // Шаблон
        $pdf = PDF::loadView('resume', $data);

        // Возвращение PDF
        return $pdf->stream('resume.pdf');
    }
}
