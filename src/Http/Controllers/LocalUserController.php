<?php

namespace Uspdev\SenhaunicaSocialite\Http\Controllers;

use App\Models\User;
use Uspdev\SenhaunicaSocialite\Http\Requests\LocalUserRequest;

class LocalUserController extends Controller
{
    /**
     * Cria usuário local
     */
    public function store(LocalUserRequest $request)
    {
        $this->authorize('admin');

        $user = User::findOrCreateLocalUser($request->validated());

        if (!($user instanceof \App\Models\User)) {
            return redirect()->back()->withErrors($user)->withInput();
        }

        return back()->with('alert-info', 'Usuário criado com sucesso. Você pode editar as permissões dele clicando em alguma permissão!');
    }

}
