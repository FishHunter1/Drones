use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('reporte_incidente', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('tipo');
            $table->string('descripcion');
            $table->string('reporte_daños');
            $table->string('tipo_combustible');
            $table->integer('kilometraje');
            $table->double('longitud');
            $table->double('latitud');
            $table->foreignId('vehiculo_id')->nullable()->constrained('vehiculos')->onDelete('set null');
            $table->foreignId('conductor_id')->nullable()->constrained('conductores')->onDelete('set null');
            $table->timestamps();
        });
    }
    public function down()
    {
       Schema::dropIfExists('reporte_incidente');
    }
}