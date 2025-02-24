<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'commissions_id' => 'nullable|array', // Permitir que sea nulo
            'commissions_id.*' => 'exists:commissions,id', 
        ]);

        // Crear el profesor
        $professor = Professor::create([
            'name' => $validated['name'],
            'specialization' => $validated['specialization'],
        ]);

        // Verificar si hay comisiones antes de adjuntar
        if (!empty($validated['commissions_id'])) {
            $professor->commissions()->attach($validated['commissions_id']);
        }

        return redirect()->route('panel.index', 'Profesores')->with('success','Profesor creado correctamente.');
    }

    public function show($id)
    {
        return Professor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'specialization' => 'sometimes|string|max:255',
            'commissions_id' => 'nullable|array',
            'commissions_id.*' => 'exists:commissions,id',
        ]);

        $professor->update($validated);

        // Verificar si se enviaron comisiones
        if (!empty($validated['commissions_id'])) {
            $professor->commissions()->sync($validated['commissions_id']);
        } else {
            $professor->commissions()->detach(); // Quitar todas si no se selecciona ninguna
        }

        return redirect()->route('panel.show', ['tipo'=>'Profesores', 'id'=>$professor->id])->with('success','Profesor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('panel.index', 'Profesores')->with('success','Profesor eliminado correctamente.');
    }
}
