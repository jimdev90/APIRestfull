<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $usuarios = User::all();
//        return response()->json(['data' => $usuarios], 200);
        return $this->showAll($usuarios);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $reglas = [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
        ];

        $this->validate($request, $reglas);

        $campos = $request->all();
        $campos['password'] = bcrypt($request->password);
        $campos['verified'] = User::USUARIO_NO_VERIFICADO;
        $campos['verification_token'] = User::generarVerificationToken();
        $campos['admin'] = User::USUARIO_REGULAR;

        $usuario = User::create($campos);
//        return response()->json(['data' => $usuario], 201);
        return $this->showOne($usuario, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
//    public function show($id)
    public function show(User $user)
    {
//        $user = User::findOrFail($id);
//        return response()->json(['data' => $user], 200);
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
//    public function update(Request $request, $id)
    public function update(Request $request, User $user)
    {
//        $user = User::findOrFail($id);

        $reglas = [
            'email' => ['email', 'unique:users,email,' . $user->id],
            'password' => ['min:6', 'confirmed'],
            'admin' => ['in:' . User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_REGULAR]
        ];

        $this->validate($request, $reglas);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email') && $user->email != $request->email) {

            $user->verified = User::USUARIO_NO_VERIFICADO;
            $user->verification_token = User::generarVerificationToken();
            $user->email = $request->email;

        }

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('admin')) {
            if (!$user->esVerificado()){
//                return response()->json(['error' => 'Únicamente los usuarios verificados pueden cambiar su valor de administrador', 'code' => 409], 409);
                return $this->errorResponse('Únicamente los usuarios verificados pueden cambiar su valor de administrador', 409);
            }
            $user->admin = $request->admin;
        }

        if (!$user->isDirty()){
//            return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar', 'code' => 422], 422);
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualiza', 422);
        }

        $user->save();

//        return response()->json(['data' => $user], 200);
        return $this->showOne($user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
//    public function destroy($id)
    public function destroy(User $user)
    {
//        $user = User::findOrFail($id);
        $user->delete();

//        return response()->json(['data' => $user], 200);
        return $this->showOne($user);
    }
}
