<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;
class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->nullable();
            $table->string('nombres');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('zona_id')->nullable();
       
            $table->enum('tipodocumento', [cliente::FACTURA, cliente::BOLETA])->default(cliente::BOLETA)->nullable();
            $table->string('numdocumento')->nullable();
            // $table->string('fechadeventa'); timestamp('published_at')->nullable();
            $table->timestamp('fechadeventa')->nullable();
            $table->timestamp('fechaderecepcion')->nullable();
           // $table->date('fechadeventa')->nullable()->nullable();
           // $table->date('fechaderecepcion')->nullable()->nullable();  

            $table->enum('estadocivil', [cliente::SOLTERO, cliente::CASADO, cliente::VIUDO, cliente::DIVORCIADO])->nullable();
            $table->enum('pagoadministrativo', [cliente::CONFORME, cliente::NOFIGURAPAGOADMIN])->nullable();

            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('chasis')->nullable();
            $table->string('motor')->nullable();
            $table->string('color')->nullable();
            $table->string('dua')->nullable();
            $table->string('item')->nullable();

            //$table->timestamp('certificadofecha')->nullable();

            $table->string('tipovehiculo')->nullable(); 
            $table->enum('tipoventa', [cliente::CONFORME, cliente::NOFIGURAPAGOADMIN])->nullable(); 
                   
            //$table->string('reporteduaitem')->nullable();
       
           // $table->string('reportecertificadofecha')->nullable();
            
            $table->decimal('montodelacompra',8,2)->nullable();

            
            $table->text('observacion')->nullable();

            $table->string('pdf1')->nullable();
            $table->string('pdf2')->nullable();
            $table->string('pdf3')->nullable();
          

            $table->date('fechaingrespsunarp')->nullable();

            $table->string('numerodetitulo')->nullable();
            $table->string('codigoverificacion')->nullable();
            $table->string('recibo')->nullable();
            
            $table->decimal('importepagado',8,2)->nullable();
            $table->string('oficinaregistral')->nullable();
         
            $table->string('pdfstatus')->nullable();  
            $table->date('fechadeobservacion')->nullable();
            $table->date('fechadevencimiento')->nullable();
            $table->string('pdfobservacion')->nullable();
            $table->date('fechaingresolevantaobservacion')->nullable();

            //$table->date('fecingresolevanta')->nullable();
            //$table->string('statusreingresado')->nullable();

           // $table->string('statusinscrito')->nullable();
            $table->string('pdftarjetadepropiedad')->nullable();
            $table->string('numerodeplaca')->nullable();

  


           // $table->unsignedBigInteger('marca_id');
           $table->date('fechadepagodeplaca')->nullable();
           $table->date('fechaderecojodeplaca')->nullable();
           $table->date('fechadeenviodeplaca')->nullable();


           $table->string('guiaderemision')->nullable();  
           $table->string('statusfinal')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
