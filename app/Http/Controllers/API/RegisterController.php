<?php

namespace App\Http\Controllers\API;

use App\Deliveryman;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use App\UserHospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{

    public $successStatus = 200;
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'user_cpf' => 'required',
            'user_level' => 'required',
            'user_is_doctor' => 'required',
            'user_is_deliveryman' => 'required',
            'hospital' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();

        /// var_dump($input['hospital']);

        if ($input['user_is_deliveryman']) {
            $deliveryman = Deliveryman::create();
            $input['user_id_deliveryman'] = $deliveryman['id'];
        }

        $input['password'] = bcrypt($input['password']);

        $validateData = $this->validatefields($input);

        if ($validateData == 0) {

            //return $this->sendResponse("Tudo certo", 'User register successfully.');
            $user = User::create($input);

            //echo "ID: ".$user->id;
            foreach ($input['hospital'] as $hospital) {
                $hospital_reg['id_user'] = $user->id;
                $hospital_reg['id_hospital'] = $hospital['id_hospital'];
                //var_dump($hospital);
                $userHospital = UserHospital::create($hospital_reg);
                //var_dump($userHospital);
            }

            $success['token'] = $user->createToken('MyApp')->accessToken;

            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User register successfully.');

        } else {
            if ($validateData == 1) {
                return $this->sendError('Erro de validação!', "O email já  cadastrado!");
            }
            if ($validateData == 2) {
                return $this->sendError('Erro de validação!', "CPF já  cadastrado!");
            }
            if ($validateData == 3) {
                return $this->sendError('Erro de validação!', "Email e CPF já  cadastrados!");
            }
        }

    }

    public function validatefields($data)
    {

        $status = 0;
# 1 para email;
        # 2 para cpf;
        # 3 para email e cpf;

        $users = User::all();
        foreach ($users as $user) {

            if (strcmp($data['user_cpf'], $user['user_cpf']) == 0 and strcmp($data['email'], $user['email']) == 0) {
                $status = 3;
                break;
            }

            if (strcmp($data['email'], $user['email']) == 0) {
                $status = 1;
                break;
            }
            if (strcmp($data['user_cpf'], $user['user_cpf']) == 0) {
                $status = 2;
                break;
            }

        }

        return $status;

    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {

        $user = Auth::user();
        return response()->json(['success' => "Deu certo!!"], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hospitalByUser(Request $request)
    {

        // $userHospital =  User::find(35)->gethospitals()->get();

        $result = UserHospital::join('users', 'user_hospital.user_id', '=', 'users.id')
            ->where('users.id', '=', $request['id_user'])
            ->join('hospital', 'hospital.id', '=', 'user_hospital.id_hospital')
            ->select('hospital.*')->get();

        if ($result) {
            return $this->sendResponse($result->toArray(), 'Registro encontrado com sucesso!.');
        } else {
            return $this->sendError('Ops!', "Ocorreu algum problema na busca dos dados.");

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doctorByHospital(Request $request)
    {

        // $userHospital =  User::find(35)->gethospitals()->get();

        $result = UserHospital::join('users', 'user_hospital.user_id', '=', 'users.id')
            ->where('users.user_is_doctor', '=', true)
            ->join('hospital', 'hospital.id', '=', 'user_hospital.id_hospital')
            ->where('hospital.id', '=', $request['id_hospital'])
            ->select('users.id', 'users.name', 'users.user_doctor_crm')->get();

        if ($result) {
            return $this->sendResponse($result->toArray(), 'Registro encontrado com sucesso!.');
        } else {
            return $this->sendError('Ops!', "Ocorreu algum problema na busca dos dados.");

        }

    }

}
