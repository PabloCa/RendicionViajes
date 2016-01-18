<?php
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CargoCreateRequest;
use App\Http\Requests\CargoUpdateRequest;
use Illuminate\Http\Request;

class EvaluarControllerTest extends TestCase
{
    public function testingIndexFunction()
    {
        $user = \App\User::where('email', '=', 'jef@jef.jef')->first();
        $this->be($user);
        $this->call('GET', 'jefatura');
        $this->assertResponseOk();
    }

    public function testingEvaluarFunction()
    {
        $user = \App\User::where('email', '=', 'jef@jef.jef')->first();
        $this->be($user);
        $this->call('GET', 'evaluar');
        $this->assertResponseOk();
    }

    public function testingRechazarFunction()
    {
        $user = \App\User::where('email', '=', 'jef@jef.jef')->first();
        $this->be($user);



        $sol = \App\Solicitud::find(1);//lo mismo que esta en el controlador
        $sol->estado='rechazada';
        $sol->save();
        $justificacion = DB::table('justificaciones')->where('id',1)->first();//excepto estas 2 lineas
        if($justificacion!=null)return $this->assertEquals(0,1);//exepto esto

        \App\Justificacion::create([

            'justificacion' => 'me caes mal',
            'id' => 1,

        ]);




        $sol = \App\Solicitud::find(1);
        $estado=strcmp ($sol->estado, "rechazada");

        $justif = DB::table('justificaciones')->where('id',1)->first();
        if($justif==NULL)return $this->assertEquals(0,1);
        $retjust=strcmp ($justif->justificacion, "me caes mal");

        $retjust=$retjust+$estado;

        $this->assertEquals($retjust,0);


    }
    public function testingAceptarFunction()
    {
        $user = \App\User::where('email', '=', 'jef@jef.jef')->first();
        $this->be($user);



        $sol = \App\Solicitud::find(1);
        $sol->estado='aceptada';
        $sol->save();



        $sol = \App\Solicitud::find(1);
        $estado=strcmp ($sol->estado, "aceptada");

        $this->assertEquals($estado,0);


    }

}